<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\{Content, Comment};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    /**
     * ERP API data.
     */
    protected $erpapi_key;
    protected $erpapi_url;

    /**
     * Instantiate a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->erpapi_key = config('erpapi.key');
        $this->erpapi_url = config('erpapi.url');
    }

    /**
     * Display Welcome.
     * 
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $about = Content::find(1);

        $url = $this->erpapi_url.'thirdparties?mode=4&category=717&limit=10';
        $response = Http::withHeaders(['DOLAPIKEY' => $this->erpapi_key])
                        ->withOptions(['verify' => false])
                        ->accept('application/json')
                        ->get($url);

        $brands = $response->json();

        return view('welcome')->with('about', $about)->with('brands', $brands);
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
     * @return \Illuminate\Http\Response
     */
    public function products(Request $request)
    {
        if(empty($request->category)) {
            return redirect()->route('welcome');
        }

        //--------------------- API - CATEGORIA ----------------------
        $url = $this->erpapi_url.'categories/'.$request->category.'?include_childs=true';
        $response = Http::withHeaders(['DOLAPIKEY' => $this->erpapi_key])
                        ->withOptions(['verify' => false])
                        ->accept('application/json')
                        ->get($url);

        $category = $response->json();
        
        //-------------------- API - SUBCATEGORIAS -------------------
        $url = $this->erpapi_url.'categories/'.$category['fk_parent'].'?include_childs=true';
        $response = Http::withHeaders(['DOLAPIKEY' => $this->erpapi_key])
                        ->withOptions(['verify' => false])
                        ->accept('application/json')
                        ->get($url);

        $parent = $response->json();

        $page = $request->page ?? 1;

        // $url = $this->erpapi_url.'products/?mode=1&category='.$category['id'].'&sortfield=t.ref&sortorder=ASC&page='.$page;
        $url = $this->erpapi_url.'products/?category='.$category['id'].'&sortfield=t.ref&sortorder=ASCsqlfilters=t.tosell=1';
        // dd($url);

        $response = Http::withHeaders(['DOLAPIKEY' => $this->erpapi_key])
                        ->withOptions(['verify' => false])
                        ->accept('application/json')
                        ->get($url);

        $products = $response->json();
        // dd($products);
        // dd(count($products));

        $products = new LengthAwarePaginator($products, count($products), 20, $page, ['path' => $request->url()]);
        // dd($products);

        return view('web.products')->with('category', $category)
                                   ->with('parent', $parent)
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
        $url = $this->erpapi_url.'thirdparties?mode=4&category=717';
        $response = Http::withHeaders(['DOLAPIKEY' => $this->erpapi_key])
                        ->withOptions(['verify' => false])
                        ->accept('application/json')
                        ->get($url);

        $brands = $response->json();

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
