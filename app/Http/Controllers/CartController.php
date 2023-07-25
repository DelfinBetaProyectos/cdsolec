<?php

namespace App\Http\Controllers;

use App\Models\{Product, Setting, Propal, User};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    $iva = Setting::find(1)->value;
    $tasa_usd = Setting::find(2)->value;

    $cart = $request->session()->get('cart', []);
    $mycart = [];

    if (Auth::check() && Auth::user()->society) { $price_level = Auth::user()->society->price_level; } else { $price_level = 1; }

    foreach ($cart as $item) {
      $product = Product::findOrFail($item['product']);

      $stock = $product->stock - $product->seuil_stock_alerte;

      $prices = $product->prices()->where('price_level', '=', $price_level)
                                  ->orderBy('date_price', 'desc')
                                  ->first();

      if (app()->environment('production')) {
        $image = null;
        if ($product->documents->isNotEmpty()) {
          $documents = $product->documents;
          $total = count($product->documents);
          $i = 0;
          while (!$image && ($i < $total)) {
            if (!$image && (pathinfo($documents[$i]->filename, PATHINFO_EXTENSION) == 'jpg')) {
              $image = 'storage/produit/'.$product->ref.'/'.$documents[$i]->filename;
            }
            $i++;
          }
        }

        if (!$image) { $image = 'img/favicon/apple-icon.png'; }
      } else {
        $image = 'img/favicon/apple-icon.png';
      }

      $mycart[$product->rowid] = [
        'id' => $product->rowid,
        'image' => $image,
        'ref' => $product->ref,
        'label' => $product->label,
        'price' => $prices->price,
        'stock' => $stock,
        'quantity' => $item['quantity']
      ];
    }

    return view('web.cart')->with('percent_iva', $iva)
                           ->with('tasa_usd', $tasa_usd)
                           ->with('cart', $mycart);
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
    $data = $request->validate([
      'quantity' => 'required|integer|min:1',
    ]);
    
    try {
      $percent_iva = Setting::find(1)->value;
      $tasa_usd = Setting::find(2)->value;

      $product = Product::findOrFail($id);
      $stock = $product->stock - $product->seuil_stock_alerte;

      if (Auth::check() && Auth::user()->society) { $price_level = Auth::user()->society->price_level; } else { $price_level = 1; }

      if (($data['quantity'] > 0) && ($data['quantity'] <= $stock)) {
        $cart = $request->session()->get('cart', []);

        $cart[$product->rowid] = [
          'product' => $product->rowid,
          'quantity' => $data['quantity']
        ];

        $request->session()->put('cart', $cart);

        $subtotal_bs = 0;
        $subtotal_usd = 0;
        foreach ($cart as $item) {
          $product = Product::findOrFail($item['product']);
          $prices = $product->prices()->where('price_level', '=', $price_level)
                                  ->orderBy('date_price', 'desc')
                                  ->first();

          $subtotal_bs += $prices->price * $tasa_usd * $item['quantity'];
          $subtotal_usd += $prices->price * $item['quantity'];
        }
        $iva_bs = ($subtotal_bs * $percent_iva) / 100;
        $iva_usd = ($subtotal_usd * $percent_iva) / 100;
        $total_bs = $subtotal_bs + $iva_bs;
        $total_usd = $subtotal_usd + $iva_usd;

        return response()->json([
          'error' => false,
          'subtotal_bs' => number_format($subtotal_bs, 2, ',', '.'),
          'subtotal_usd' => number_format($subtotal_usd, 2, ',', '.'),
          'iva_bs' => number_format($iva_bs, 2, ',', '.'),
          'iva_usd' => number_format($iva_usd, 2, ',', '.'),
          'total_bs' => number_format($total_bs, 2, ',', '.'),
          'total_usd' => number_format($total_usd, 2, ',', '.')
        ]);
      } else {
        return response()->json([
          'error' => true,
          'subtotal_bs' => 0,
          'subtotal_usd' => 0,
          'iva_bs' => 0,
          'iva_usd' => 0,
          'total_bs' => 0,
          'total_usd' => 0
        ]);
      }
    } catch (\Throwable $th) {
      //throw $th;
      return response()->json([
        'error' => true,
        'subtotal_bs' => 0,
        'subtotal_usd' => 0,
        'iva_bs' => 0,
        'iva_usd' => 0,
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

    return redirect()->route('cart.index');
  }

  /**
   * Checkout cart.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function checkout(Request $request)
  {
    $cart = $request->session()->get('cart', []);
    $percent_iva = Setting::find(1)->value;
    $tasa_usd = Setting::find(2)->value;

    if (Auth::check() && Auth::user()->society) { $price_level = Auth::user()->society->price_level; } else { $price_level = 1; }
    $user = User::find(Auth::user()->rowid);

    $query = Propal::select('ref')->orderBy('ref', 'desc')->first();
    $last_ref = explode("-", $query);
    $correlative = intval($last_ref[1]) + 1;
    $correlative = str_pad($correlative, 4, '0', STR_PAD_LEFT);
    $ref = 'PR'.date('ym').'-'.$correlative;

    $propal = Propal::create([
      'ref' => $ref,
      'fk_soc' => $user->society->rowid,
      'datec' => Carbon::now(),
      'fin_validite' => Carbon::now()->addDays(15),
      'date_valid' => Carbon::now(),
      'fk_user_author' => $user->rowid,
      'fk_user_valid' => $user->rowid,
      'fk_statut' => 1,
      'total_ht' => 0,  // Total sin IVA
      'tva' => 0,       // IVA
      'total' => 0,     // Total + IVA
      'fk_multicurrency' => 1,
      'multicurrency_code' => 'USD',
      'multicurrency_tx' => $tasa_usd,  // Tasa del USD
      'multicurrency_total_ht' => 0,
      'multicurrency_total_tva' => 0,
      'multicurrency_total_ttc' => 0
    ]);

    $subtotal_bs = 0;
    $subtotal_usd = 0;
    foreach ($cart as $item) {
      $product = Product::findOrFail($item['product']);

      $stock = $product->stock - $product->seuil_stock_alerte;

      $prices = $product->prices()->where('price_level', '=', $price_level)
                                  ->orderBy('date_price', 'desc')
                                  ->first();

      $subtotal_bs += $prices->price * $tasa_usd * $item['quantity'];
      $subtotal_usd += $prices->price * $item['quantity'];

      $total_ht = $prices->price * $item['quantity'];
      $tva_tx = $percent_iva;
      $total_tva = ($prices->price * $item['quantity'] * $percent_iva) / 100;
      $total_ttc = $total_ht + $total_tva;

      $propal->propal_detail()->create([
        'fk_product' => $product->rowid,
        'label' => $product->ref,
        'description' => $product->label,
        'tva_tx' => $tva_tx,  // IVA del Producto
        'qty' => $item['quantity'],
        'remise_percent' => 0,  // Porcentaje Descuento al Producto
        'price' => $prices->price,  // Precio del Producto con Descuento
        'subprice' => $prices->price,  // Precio del Producto sin Descuento
        'total_ht' => $total_ht,  // Precio total del Producto sin IVA (price*qty)
        'total_tva' => $total_tva,  // Monto total del IVA aplicado a ese Producto
        'total_ttc' => $total_ttc,  // Precio total del Producto + IVA (total_ht+total_tva)
        'product_type' => 0, // 0 = Producto | 1 = Servicio
        'multicurrency_subprice' => $prices->price,
        'multicurrency_total_ht' => $total_ht,
        'multicurrency_total_tva' => $total_tva,
        'multicurrency_total_ttc' => $total_ttc
      ]);
    }
    $iva_bs = ($subtotal_bs * $percent_iva) / 100;
    $iva_usd = ($subtotal_usd * $percent_iva) / 100;
    $total_bs = $subtotal_bs + $iva_bs;
    $total_usd = $subtotal_usd + $iva_usd;

    $propal->update([
      'total_ht' => $subtotal_usd,  // Total sin IVA
      'tva' => $iva_usd,            // IVA
      'total' => $total_usd,        // Total + IVA
      'multicurrency_total_ht' => $subtotal_usd,
      'multicurrency_total_tva' => $iva_usd,
      'multicurrency_total_ttc' => $total_usd
    ]);

    $request->session()->forget(['cart']);

    return redirect()->route('orders.show', $propal);
  }
}
