<?php

namespace App\Http\Controllers;

use App\Models\{Product, Setting};
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
      $tasa_usd = Setting::find(2)->value;
      $request->session()->put('tasa_usd', $tasa_usd);

      $product = Product::findOrFail($data['product']);
      $stock = $product->stock - $product->seuil_stock_alerte;

      $prices = $product->prices()->where('price_level', '=', '1')
                                  ->orderBy('date_price', 'desc')
                                  ->first();

      if (($data['quantity'] > 0) && ($data['quantity'] <= $stock)) {
        $cart = $request->session()->get('cart', []);

        $cart[$product->rowid] = [
          'id' => $product->rowid,
          'ref' => $product->ref,
          'label' => $product->label,
          'price' => $prices->price,
          'stock' => $stock,
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
    $data = $request->validate([
      'quantity' => 'required|integer|min:1',
    ]);
    
    try {
      $tasa_usd = Setting::find(2)->value;
      $request->session()->put('tasa_usd', $tasa_usd);

      $product = Product::findOrFail($id);
      $stock = $product->stock - $product->seuil_stock_alerte;

      $prices = $product->prices()->where('price_level', '=', '1')
                                  ->orderBy('date_price', 'desc')
                                  ->first();

      if (($data['quantity'] > 0) && ($data['quantity'] <= $stock)) {
        $cart = $request->session()->get('cart', []);

        $cart[$product->rowid] = [
          'id' => $product->rowid,
          'ref' => $product->ref,
          'label' => $product->label,
          'price' => $prices->price,
          'stock' => $stock,
          'quantity' => $data['quantity']
        ];

        $request->session()->put('cart', $cart);

        $total_bs = 0;
        $total_usd = 0;
        foreach ($cart as $item) {
          $total_bs += $item['price'] * $tasa_usd * $item['quantity'];
          $total_usd += $item['price'] * $item['quantity'];
        }

        return response()->json([
          'error' => false,
          'total_bs' => number_format($total_bs, 2, ',', '.'),
          'total_usd' => number_format($total_usd, 2, ',', '.')
        ]);
      } else {
        return response()->json([
          'error' => true,
          'total_bs' => 0,
          'total_usd' => 0
        ]);
      }
    } catch (\Throwable $th) {
      //throw $th;
      return response()->json([
        'error' => true,
        'total_bs' => 0,
        'total_usd' => 0
      ]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $cart = $request->session()->get('cart', []);

    if (count($cart) > 1) {  // comprobamos si la order tiene mas de un producto
      unset($cart[$id]);
      $request->session()->put('cart', $cart);
    } else {  // si solo tiene uno eliminamos las variables de sesión q no voy a utilizar mas
      $request->session()->forget(['cart']);
      $request->session()->forget(['tasa_usd']);
    }

    return redirect()->route('cart.index');
  }

  /**
   * Remove all cart.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function clear(Request $request)
  {
    $request->session()->forget(['cart']);
    $request->session()->forget(['tasa_usd']);

    return redirect()->route('cart.index');
  }
}
