<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class CategoriesComposer
{
  public function compose(View $view)
  {
    //--------------------- API - CATEGORIAS ---------------------
    $url = config('erpapi.url').'categories?sortfield=t.rowid&sortorder=ASC&type=product&sqlfilters=fk_parent%3D715';

    $response = Http::withHeaders(['DOLAPIKEY' => config('erpapi.key')])
                    ->withOptions(['verify' => false])
                    ->accept('application/json')
                    ->get($url);

    $view->categories = $response->json();
    // ----------------------------------------------------------

    //---------------- API - SECTORES DE INTERES ----------------
    $url = config('erpapi.url').'categories?sortfield=t.rowid&sortorder=ASC&type=product&sqlfilters=fk_parent%3D693';

    $response = Http::withHeaders(['DOLAPIKEY' => config('erpapi.key')])
                    ->withOptions(['verify' => false])
                    ->accept('application/json')
                    ->get($url);

    $view->sectors = $response->json();
    // ----------------------------------------------------------
  }
}