<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\{AdminCreateCategoryRequest, AdminUpdateCategoryRequest};
use App\Queries\CategoryFilter;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
   * @param  \App\Queries\CategoryFilter   $filters
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, CategoryFilter $filters)
  {
    $categories = Category::query()
                          ->filterBy($filters, $request->only(['search', 'from', 'to']))
                          ->orderBy('name', 'ASC')
                          ->paginate();

    $categories->appends($filters->valid());

    return view('admin.categories.index')->with('categories', $categories);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $category = new Category;

    return view("admin.categories.create")->with("category", $category);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\Categories\AdminCreateCategoryRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(AdminCreateCategoryRequest $request)
  {
    $request->createCategory();

    return redirect()->route('categories.index')->with('message', 'Categoría Agregada con éxito.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {    
    return view("admin.categories.edit")->with("category", $category);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\Categories\AdminUpdateCategoryRequest  $request
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(AdminUpdateCategoryRequest $request, Category $category)
  {
    $request->updateCategory($category);

    return redirect()->route('categories.index')->with("message", "Categoría Editada con éxito.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    $category->delete();

    return redirect()->route('categories.index')->with('message', 'Categoría Eliminada con éxito.');
  }

  /**
   * Display a listing trashed of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function trash()
  {
    $categories = Category::onlyTrashed()->paginate();

    return view('admin.categories.trash')->with("categories", $categories);
  }

  /**
   * Restore the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function restore(int $id)
  {
    $category = Category::onlyTrashed()->where('id', $id)->first();

    $category->restore();

    return redirect()->back()->with('message', 'Categoría Restaurada con éxito.');
  }

  /**
   * Delete the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(int $id)
  {
    $category = Category::onlyTrashed()->where('id', $id)->first();

    $category->forceDelete();

    return redirect()->back()->with('message', 'Categoría Destruída con éxito.');
  }
}
