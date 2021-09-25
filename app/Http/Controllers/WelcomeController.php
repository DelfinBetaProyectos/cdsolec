<?php

namespace App\Http\Controllers;

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

        return view('welcome')->with('brands', $brands);
    }

    /**
     * Display About.
     * 
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('web.about');
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
     * Display Contact.
     * 
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('web.contact');
    }
}
