<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [WelcomeController::class, 'dashboard'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/brands', [WelcomeController::class, 'brands'])->name('brands');
Route::get('/products', [WelcomeController::class, 'products'])->name('products');
Route::get('/product/{product}', [WelcomeController::class, 'product'])->name('product');
Route::get('/contact', [WelcomeController::class, 'comments_create'])->name('comments.create');
Route::post('/contact', [WelcomeController::class, 'comments_store'])->name('comments.store');

Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::apiResource('cart', CartController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/orders/{propal}/name', [OrderController::class, 'name'])->name('orders.name');

    Route::resource('orders', OrderController::class)->parameters(['orders' => 'propal']);
});

/* Mail Preview */
Route::get('/mail/orders/{propal}', [OrderController::class, 'mail'])->name('orders.mail');
