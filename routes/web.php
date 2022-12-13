<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/login', [LoginController::class, 'authenticate']);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/brands', [WelcomeController::class, 'brands'])->name('brands');
Route::get('/products', [WelcomeController::class, 'products'])->name('products');
Route::get('/product/{product}', [WelcomeController::class, 'product'])->name('product');
Route::get('/cart', [WelcomeController::class, 'cart'])->name('cart');
Route::get('/contact', [WelcomeController::class, 'comments_create'])->name('comments.create');
Route::post('/contact', [WelcomeController::class, 'comments_store'])->name('comments.store');
