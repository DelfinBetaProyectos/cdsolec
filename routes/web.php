<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| Web Routes PROVICIONALES
|--------------------------------------------------------------------------
*/

Route::get('/about', function () {
    return view('web.about');
})->name('about');

Route::get('/products', function () {
    return view('web.products');
})->name('products');

Route::get('/product', function () {
    return view('web.product');
})->name('product');