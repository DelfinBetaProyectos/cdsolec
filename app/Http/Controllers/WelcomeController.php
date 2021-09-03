<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display Welcome.
     * 
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('welcome');
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
        $headers = array('Content-Type:application/json', 'DOLAPIKEY: bJD33zn72gC9O6duXc59vOZh2N8OFiFk');

        if(empty($request->category)) {
            $category = null;
        } else {
            $url = 'http://www.cd-solec.com/erp/htdocs/api/index.php/categories/'.$request->category.'?include_childs=true';

            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);

            $response = curl_exec($ch);
            $err = curl_error($ch);
            curl_close($ch);
            
            if ($err) {
                dd("cURL Error #:" . $err);
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
