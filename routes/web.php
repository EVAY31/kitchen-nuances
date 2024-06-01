<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[ProductController::class,'index'])->name('home_page');
//Route::get('/', function () {return view('welcome');})->name('home_page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('documents/download/{document}', [DocumentController::class, 'download'])->name('documents.download');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::resource('/categories', CategoryController::class)->only(['index', 'show']);
Route::resource('/brands', BrandController::class)->only(['index', 'show']);
Route::resource('/addresses', AddressController::class);
Route::resource('/phones', PhoneController::class);
Route::get('/basket/{basket}', [BasketController::class, 'show'])->name('basket.show');
Route::post('/basket', [BasketController::class, 'store'])->name('basket.store');
Route::post('/basket/{basket}/update/{product}', [BasketController::class, 'update'])->name('basket.update');
Route::delete('/basket/delete/{basket}', [BasketController::class, 'destroy'])->name('basket.delete');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/{basket}', [OrderController::class, 'store'])->name('orders.store');
Route::get('/contacts', function () {return view('contacts.contacts');})->name('contacts');
Route::get('/delivery-payment', function () {return view('delivery-payment.index');})->name('delivery-payment');

require __DIR__.'/auth.php';
