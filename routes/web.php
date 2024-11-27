<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home;

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PricingController;

use App\Http\Controllers\PrintingSuppliesController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'
])->middleware(['auth', 'admin']);

Route::get('/services', [ServicesController::class, 'index'])->name('services');

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    // Handle form submission logic here
    return redirect()->route('contact')->with('success', 'Thank you for reaching out!');
})->name('contact.submit');

Route::get('/buy-printing-supplies', [PrintingSuppliesController::class, 'index'])->name('buy-printing-supplies');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');