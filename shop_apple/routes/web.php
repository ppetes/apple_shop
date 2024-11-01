<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\HistoryController;


Route::get('/product/iphone', [ProductController::class, 'showIphoneProducts'])->name('product.iphone');
Route::get('/product/ipad', [ProductController::class, 'showIpadProducts'])->name('product.ipad');
Route::get('/product/airpods', [ProductController::class, 'showAirpodsProducts'])->name('product.airpods');
Route::get('/product/mac', [ProductController::class, 'showMacProducts'])->name('product.mac');
Route::get('/product/watch', [ProductController::class, 'showWatchProducts'])->name('product.watch');
Route::get('/product/tv', [ProductController::class, 'showAppleTVProducts'])->name('product.tv');
Route::get('/product/accessories', [ProductController::class, 'showAccessoriesProducts'])->name('product.accessories');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show'); // Show cart contents for authenticated user
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cartId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout'); // Checkout route
});

Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/history', [HistoryController::class, 'index'])->name('invoices.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
