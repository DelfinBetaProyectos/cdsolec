<?php

namespace App\Http\Controllers;

use App\Models\{Content, Comment};
use Illuminate\Http\Request;

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

        $headers = array('Content-Type:application/json', 'DOLAPIKEY: '.$this->erpapi_key);

        $url = $this->erpapi_url.'thirdparties?mode=4&category=717&limit=10';

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        
        if ($err) {
            $brands = null;
            // dd("cURL Error: " . $err);
        } else {
            $brands = json_decode($response);
        }

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
        $headers = array('Content-Type:application/json', 'DOLAPIKEY: '.$this->erpapi_key);

        if(empty($request->category)) {
            $category = null;
        } else {
            $url = $this->erpapi_url.'categories/'.$request->category.'?include_childs=true';

            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);

            $response = curl_exec($ch);
            $err = curl_error($ch);
            curl_close($ch);
            
            if ($err) {
                $category = null;
                // dd("cURL Error: " . $err);
            } else {
                $category = json_decode($response);
            }
        }

        return view('web.products')->with('category', $category);
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
        $headers = array('Content-Type:application/json', 'DOLAPIKEY: '.$this->erpapi_key);

        $url = $this->erpapi_url.'thirdparties?mode=4&category=717';

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        
        if ($err) {
            $brands = null;
            // dd("cURL Error: " . $err);
        } else {
            $brands = json_decode($response);
        }

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

        return redirect()->back()->with("message", "Mensaje enviado Existosamente, ¡Gracias por su contacto!");
    }
}
