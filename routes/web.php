<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect']);


Route::resource('/products', ProductController::class);


Route::get('/search', [HomeController::class, 'search'])->name('serach');
Route::post('/addCard/{id}', [HomeController::class, 'addCard'])->name('addCard');
Route::get('/showCard', [HomeController::class, 'showCard'])->name('showCard');
Route::get('/removeCard/{id}', [HomeController::class, 'removeCard'])->name('removeCard');
Route::post('/order', [HomeController::class, 'confirmOrder'])->name('order');

Route::get('/showOrder', [ProductController::class, 'showOrder'])->name('showOrder');
Route::get('/updateStatus/{id}', [ProductController::class, 'updateStatus'])->name('updateStatus');

Route::get('/product/search', [ProductController::class, 'productSearch'])->name('productSearch');




