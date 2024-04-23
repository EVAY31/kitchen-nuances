<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProductController::class,'index']);

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::resource('/categories', CategoryController::class)->only(['index', 'show']);
Route::resource('/brands', BrandController::class)->only(['index', 'show']);
Route::resource('/addresses', AddressController::class);
Route::get('/basket/{basket}', [BasketController::class, 'show'])->name('basket.show');
Route::post('/basket', [BasketController::class, 'store'])->name('basket.store');
Route::post('/basket/{basket}/update/{product}', [BasketController::class, 'update'])->name('basket.update');
Route::delete('/basket/delete/{basket}', [BasketController::class, 'destroy'])->name('basket.delete');
