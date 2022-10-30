<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\{Content, Comment, Category, Product};
use App\Queries\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
  /**
   * Display Welcome.
   * 
   * @return \Illuminate\Http\Response
   */
  public function welcome()
  {
    $about = Content::find(1);

    $brands = DB::connection('mysqlerp')
                ->table('llx_societe')
                ->leftJoin('llx_categorie_fournisseur', 'llx_societe.rowid', '=', 'llx_categorie_fournisseur.fk_soc')
                ->where([
                  ['llx_societe.fournisseur', '=', '1'],
                  ['llx_categorie_fournisseur.fk_categorie', '=', '717'],
                ])
                ->take(10)
                ->get();

    return view('welcome')->with('about', $about)
                          ->with('brands', $brands);
  }

  /**
   * Display About.
   * 
   * @return \Illuminate\Http\Response
   */
  public function about()
  {
    $about = Content::find(2);

    return view('web.about')->with('about', $about);
  }

  /**
   * Display Products.
   * 
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Queries\ProductFilter   $filters
   * @return \Illuminate\Http\Response
   */
  public function products(Request $request, ProductFilter $filters)
  {
    $category_id = $request->input('category', '715');
    $category = Category::findOrFail($category_id);

    $products = Product::query()->with([
                          'prices' => function ($query) {
                            $query->where('price_level', '=', '1')
                                  ->orderBy('date_price', 'desc');
                          }
                       ])
                       ->filterBy($filters, $request->only(['search']))
                       ->where('tosell', '=', '1')
                       ->whereHas('prices', function ($query) {
                          $query->where('price_level', '=', '1');
                       })
                       ->orderBy('rowid', 'ASC')
                       ->paginate(20);

    $products->appends($filters->valid());

    return view('web.products')->with('category', $category)
                               ->with('products', $products);
  }

  /**
   * Display Product.
   * 
   * @return \Illuminate\Http\Response
   */
  public function product()
  {
    return view('web.product');
  }

  /**
   * Display Brands.
   * 
   * @return \Illuminate\Http\Response
   */
  public function brands()
  {
    $brands = DB::connection('mysqlerp')
                ->table('llx_societe')
                ->leftJoin('llx_categorie_fournisseur', 'llx_societe.rowid', '=', 'llx_categorie_fournisseur.fk_soc')
                ->where([
                  ['llx_societe.fournisseur', '=', '1'],
                  ['llx_categorie_fournisseur.fk_categorie', '=', '717'],
                ])
                ->get();

    return view('web.brands')->with('brands', $brands);
  }

  /**
   * Display Cart.
   * 
   * @return \Illuminate\Http\Response
   */
  public function cart()
  {
    return view('web.cart');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function comments_create()
  {
    $contact = Content::find(3);

    return view('web.contact')->with('contact', $contact);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function comments_store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'min:3', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'phone' => ['required', 'regex:/^\(\d{3}\)-\d{3}-\d{4}$/i'],
      'message' => ['required', 'string', 'min:3', 'max:4294967200'],
    ], [
      'name.required' => 'Nombre es requerido',
      'name.min' => 'El Nombre debe tener al menos 3 caracteres',
      'name.max' => 'El Nombre debe tener maximo 255 caracteres',
      'email.required' => 'Email es requerido',
      'email.email' => 'Email inválido',
      'email.max' => 'El Email debe tener maximo 255 caracteres',
      'phone.required' => 'Teléfono es requerido',
      'phone.regex' => 'Teléfono es inválido. Ejem.:(243)-234-5678',
      'message.required' => 'Mensaje es requerido',
      'message.min' => 'El Mensaje debe tener al menos 3 caracteres',
      'message.max' => 'El Mensaje debe tener maximo 4294967200 caracteres',
    ]);

    $comment = Comment::create([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'message' => $request->message
    ]);
      
    Mail::to('ventas@cd-solec.com', 'Contacto CD-SOLEC')->send(new ContactMail($comment));

    return redirect()->back()->with("message", "Mensaje enviado Existosamente, ¡Gracias por su contacto!");
  }
}
