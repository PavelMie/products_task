<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductAddController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductEditController;
use App\Http\Controllers\ProductViewController;
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
Route::post('/login', [LoginController::class,'login']);

Route::get('/login', [LoginController::class,'index'])
    ->name('login');

Route::post('/logout', [LogoutController::class,'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/', [ProductController::class,'index'])
    ->name('products');
Route::get('/products', [ProductController::class,'index'])
    ->name('products');

Route::get('/getproducts',[ProductController::class,'getProducts'])
    ->name('getproducts');

Route::get('/product/add', [ProductAddController::class,'index'])
    ->name('products.add')
    ->middleware('auth');
Route::post('/product/add', [ProductController::class,'add'])
    ->name('product.add')
    ->middleware('auth');

Route::get('/product/{id}/view', [ProductViewController::class,'index'])
    ->name('products.edit');

Route::get('/product/{id}/edit', [ProductEditController::class,'index'])
    ->name('products.edit')
    ->middleware('auth');
Route::post('/product/edit', [ProductController::class,'edit'])
    ->name('product.edit')
    ->middleware('auth');

Route::post('/product/{id}/delete', [ProductController::class,'delete'])
    ->name('product.delete')
    ->middleware('auth');

Route::post('/price/add', [ProductController::class,'priceAdd'])
    ->name('price.add')
    ->middleware('auth');
Route::post('/price/delete', [ProductController::class,'priceDelete'])
    ->name('price.delete')
    ->middleware('auth');

