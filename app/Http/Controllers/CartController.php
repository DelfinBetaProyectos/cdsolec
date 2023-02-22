<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
  /**
   * Display a listing of the resource.
   * 
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $cart = $request->session()->get('cart', []);

    dd($cart);

    return view('web.cart');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'product' => 'required|exists:mysqlerp.llx_product,rowid',
      'quantity' => 'required|integer|min:1',
    ]);
    
    try {
      $product = Product::findOrFail($data['product']);
      $stock = $product->stock - $product->seuil_stock_alerte;

      if (($data['quantity'] > 0) && ($data['quantity'] <= $stock)) {
        $cart = $request->session()->get('cart', []);

        $cart[$product->rowid] = [
          'product' => $product->rowid,
          'quantity' => $data['quantity']
        ];

        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index');
      } else {
        return redirect()->route('cart.index')->withErrors([
          'product' => 'Cantidad no disponible'
        ]);
      }
    } catch (\Throwable $th) {
      //throw $th;
      return redirect()->route('cart.index')->withErrors([
        'product' => 'Producto no encontrado'
      ]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
