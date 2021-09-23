<?php

namespace App\View\Composers;

use Illuminate\View\View;

class CategoriesComposer
{
  public function compose(View $view)
  {
    $headers = array('Content-Type:application/json', 'DOLAPIKEY: '.config('erpapi.key'));

    //--------------------- API - CATEGORIAS ---------------------
    $url = config('erpapi.url').'categories?sortfield=t.rowid&sortorder=ASC&type=product&sqlfilters=fk_parent%3D715';

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
      $view->categories = json_decode($response);
    }
    // ----------------------------------------------------------

    //---------------- API - SECTORES DE INTERES ----------------
    $url = config('erpapi.url').'categories?sortfield=t.rowid&sortorder=ASC&type=product&sqlfilters=fk_parent%3D693';

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
      $view->sectors = json_decode($response);
    }
    // ----------------------------------------------------------
  }
}