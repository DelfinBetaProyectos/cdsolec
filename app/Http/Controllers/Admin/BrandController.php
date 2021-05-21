<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\{AdminCreateBrandRequest, AdminUpdateBrandRequest};
use App\Queries\BrandFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
  /**
   * Instantiate a new controller instance.
   * 
   * @return void
   */
  public function __construct()
  {
    $this->middleware(['auth', 'role:admin']);
  }

  /**
   * Display a listing of the resource.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Queries\BrandFilter   $filters
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, BrandFilter $filters)
  {
    $brands = Brand::query()
                    ->filterBy($filters, $request->only(['search', 'from', 'to']))
                    ->orderBy('name', 'ASC')
                    ->paginate();

    $brands->appends($filters->valid());

    return view('admin.brands.index')->with('brands', $brands);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $brand = new Brand;

    return view("admin.brands.create")->with("brand", $brand);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\Brands\AdminCreateBrandRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(AdminCreateBrandRequest $request)
  {
    $request->createBrand();

    return redirect()->route('brands.index')->with('message', 'Marca Agregada con éxito.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function show(Brand $brand)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function edit(Brand $brand)
  {
    return view("admin.brands.edit")->with("brand", $brand);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\Brands\AdminUpdateBrandRequest  $request
   * @param  \App\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function update(AdminUpdateBrandRequest $request, Brand $brand)
  {
    $request->updateBrand($brand);

    return redirect()->route('brands.index')->with("message", "Marca Editada con éxito.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Brand  $brand
   * @return \Illuminate\Http\Response
   */
  public function destroy(Brand $brand)
  {
    $brand->delete();

    return redirect()->route('brands.index')->with('message', 'Marca Eliminada con éxito.');
  }

  /**
   * Display a listing trashed of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function trash()
  {
    $brands = Brand::onlyTrashed()->paginate();
    
    return view('admin.brands.trash')->with("brands", $brands);
  }

  /**
   * Restore the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function restore(int $id)
  {
    $brand = Brand::onlyTrashed()->where('id', $id)->first();

    $brand->restore();

    return redirect()->back()->with('message', 'Marca Restaurada con éxito.');
  }

  /**
   * Delete the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(int $id)
  {
    $brand = Brand::onlyTrashed()->where('id', $id)->first();

    $brand->forceDelete();

    Storage::disk('public')->delete('brands/'.$brand->image);

    return redirect()->back()->with('message', 'Marca Destruída con éxito.');
  }
}
