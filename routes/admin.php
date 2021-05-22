<?php

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;

/*
|--------------------------------------------------------------------------
| Admin Routes of Users
|--------------------------------------------------------------------------
*/
Route::get('/users/{user}/password', [UserController::class, 'password'])->name('users.password')
      ->where('user', '[0-9]+');
Route::put('/users/{user}/password', [UserController::class, 'passwordUpdate'])->name('users.passwordUpdate')
      ->where('user', '[0-9]+');
Route::get('/users/trash', [UserController::class, 'trash'])->name('users.trash');
Route::get('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore')->where('id', '[0-9]+');
Route::patch('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete')->where('id', '[0-9]+');
Route::resource('users', UserController::class);

/*
|--------------------------------------------------------------------------
| Admin Routes of Settings
|--------------------------------------------------------------------------
*/
Route::get('/settings/trash', [SettingController::class, 'trash'])->name('settings.trash');
Route::get('/settings/{id}/restore', [SettingController::class, 'restore'])->name('settings.restore')->where('id', '[0-9]+');
Route::patch('/settings/{id}/delete', [SettingController::class, 'delete'])->name('settings.delete')->where('id', '[0-9]+');
Route::resource('settings', SettingController::class);

/*
|--------------------------------------------------------------------------
| Admin Routes of Categories
|--------------------------------------------------------------------------
*/
Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore')->where('id', '[0-9]+');
Route::patch('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete')->where('id', '[0-9]+');
Route::resource('categories', CategoryController::class);

/*
|--------------------------------------------------------------------------
| Admin Routes of Brands
|--------------------------------------------------------------------------
*/
Route::get('/brands/trash', [BrandController::class, 'trash'])->name('brands.trash');
Route::get('/brands/{id}/restore', [BrandController::class, 'restore'])->name('brands.restore')->where('id', '[0-9]+');
Route::patch('/brands/{id}/delete', [BrandController::class, 'delete'])->name('brands.delete')->where('id', '[0-9]+');
Route::resource('brands', BrandController::class);
