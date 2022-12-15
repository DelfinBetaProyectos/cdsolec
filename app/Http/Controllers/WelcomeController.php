<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\{Content, Comment, Category, Product, Extrafield, Setting};
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
    $tasa_usd = Setting::find(2)->value;
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

    $products = Product::query()->with([
                  'prices' => function ($query) {
                    $query->where('price_level', '=', '1')
                          ->orderBy('date_price', 'desc');
                  }
                ])
                ->where('tosell', '=', '1')
                ->whereHas('prices', function ($query) {
                  $query->where('price_level', '=', '1');
                })
                ->whereHas('categories', function ($query) {
                  $query->where('fk_categorie', '=', '807');
                })
                ->orderBy('rowid', 'ASC')
                ->take(10)
                ->get();

    return view('welcome')->with('about', $about)
                          ->with('brands', $brands)
                          ->with('products', $products)
                          ->with('tasa_usd', $tasa_usd);
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
    $tasa_usd = Setting::find(2)->value;
    $category_id = $request->input('category', '715');
    $category = Category::findOrFail($category_id);

    if ($category_id == '715') {
      $products = Product::query()->with([
                            'prices' => function ($query) {
                              $query->where('price_level', '=', '1')
                                    ->orderBy('date_price', 'desc');
                            },
                            'extrafields'
                          ])
                          ->filterBy($filters, $request->only(['search', 'at1', 'at2', 'at3', 'at4', 'at5', 'at6', 'at7', 'at8', 'at9', 'at10', 'at11', 'at12', 'at13', 'at14', 'at15', 'at16', 'at17', 'at18', 'at19', 'at20', 'at21', 'at22', 'at23', 'at24', 'at25', 'at26', 'at27', 'at28', 'at29', 'at30']))
                          ->where('tosell', '=', '1')
                          ->whereHas('prices', function ($query) {
                            $query->where('price_level', '=', '1');
                          })
                          ->orderBy('rowid', 'ASC')
                          ->paginate(20);
    } else {
      $products = Product::query()->with([
                            'prices' => function ($query) {
                              $query->where('price_level', '=', '1')
                                    ->orderBy('date_price', 'desc');
                            },
                            'extrafields'
                          ])
                          ->filterBy($filters, $request->only(['search', 'at1', 'at2', 'at3', 'at4', 'at5', 'at6', 'at7', 'at8', 'at9', 'at10', 'at11', 'at12', 'at13', 'at14', 'at15', 'at16', 'at17', 'at18', 'at19', 'at20', 'at21', 'at22', 'at23', 'at24', 'at25', 'at26', 'at27', 'at28', 'at29', 'at30']))
                          ->where('tosell', '=', '1')
                          ->whereHas('prices', function ($query) {
                            $query->where('price_level', '=', '1');
                          })
                          ->whereHas('categories', function ($query) use ($category_id) {
                            $query->where('fk_categorie', '=', $category_id);
                          })
                          ->orderBy('rowid', 'ASC')
                          ->paginate(20);
    }

    $params_filters = $filters->valid();
    $params_filters['category'] = $category_id;
    $products->appends($params_filters);

    $extrafields = Extrafield::where('elementtype', '=', 'product')->get();
    $attributes = [];
    $matriz = [];

    if ($category->attributes) {
      $attributes = $category->attributes->toArray();

      if ($products->isNotEmpty()) {
        foreach ($products as $product) {
          if ($product->extrafields) {
            $matriz[$product->rowid] = $product->extrafields->toArray();
          }
        }
      }

      $matriz = collect($matriz);
    }

    $url = $request->url();  // Without Query String
    $url_full = $request->fullUrl();  // With Query String
    $var_explode = explode('?', $url_full, 2);
    $query_string = $var_explode[1];

    return view('web.products')->with('category', $category)
                               ->with('products', $products)
                               ->with('tasa_usd', $tasa_usd)
                               ->with('extrafields', $extrafields)
                               ->with('attributes', $attributes)
                               ->with('matriz', $matriz)
                               ->with('query_string', $query_string);
  }

  /**
   * Display Product.
   * 
   * @param  string  $ref
   * @return \Illuminate\Http\Response
   */
  public function product(string $ref)
  {
    $tasa_usd = Setting::find(2)->value;
    $product = Product::with([
                        'prices' => function ($query) {
                          $query->where('price_level', '=', '1')
                                ->orderBy('date_price', 'desc');
                        }
                      ])
                      ->whereHas('prices', function ($query) {
                        $query->where('price_level', '=', '1');
                      })
                      ->where('ref', '=', $ref)
                      ->first();

    if (app()->environment('production')) {
      $image = null;
      $datasheet = null;
      if ($product->documents->isNotEmpty()) {
        $documents = $product->documents;
        $total = count($product->documents);
        $i = 0;
        while ((!$datasheet || !$image) && ($i < $total)) {
          if (!$datasheet && (pathinfo($documents[$i]->filename, PATHINFO_EXTENSION) == 'pdf')) {
            $datasheet = '/storage/produit/'.$product->ref.'/'.$documents[$i]->filename;
          }
          if (!$image && (pathinfo($documents[$i]->filename, PATHINFO_EXTENSION) == 'jpg')) {
            $image = 'storage/produit/'.$product->ref.'/'.$documents[$i]->filename;
          }
          $i++;
        }
      }

      if (!$image) { $image = 'img/logos/CD-SOLEC-ICON.jpg'; }
    } else {
      $image = 'img/logos/CD-SOLEC-ICON.jpg';
      $datasheet = null;
    }

    $extrafields = Extrafield::where('elementtype', '=', 'product')->get();

    $product_fields = $product->extrafields->toArray();

    $attributes = [];
    if ($product->categories->isNotEmpty()) {
      $elements = [];
      foreach ($product->categories as $category) {
        $current = $category;
        $depth = 1;
        while (isset($current->fk_parent) && ($current->fk_parent != "715")) {
          $current = $current->parent;
          $depth++;
        }

        $elements[$category->rowid] = $depth;
      }

      if (count($elements) > 0) {
        $max = array_search(max($elements), $elements);

        $subcategory = Category::find($max);

        $attributes = optional($subcategory->attributes)->toArray();
      }
    }

    return view('web.product')->with('product', $product)
                              ->with('image', $image)
                              ->with('datasheet', $datasheet)
                              ->with('tasa_usd', $tasa_usd)
                              ->with('extrafields', $extrafields)
                              ->with('product_fields', $product_fields)
                              ->with('attributes', $attributes);
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
