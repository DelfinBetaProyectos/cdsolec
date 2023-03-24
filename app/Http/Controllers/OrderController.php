<?php

namespace App\Http\Controllers;

use App\Models\Propal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Propal  $propal
   * @return \Illuminate\Http\Response
   */
  public function show(Propal $propal)
  {
    if (Auth::user()->society->rowid == $propal->fk_soc) {
      return view('web.checkout')->with('propal', $propal);
    } else {
      return redirect()->route('orders.index');
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Propal  $propal
   * @return \Illuminate\Http\Response
   */
  public function edit(Propal $propal)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Propal  $propal
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Propal $propal)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Propal  $propal
   * @return \Illuminate\Http\Response
   */
  public function destroy(Propal $propal)
  {
    //
  }
}
