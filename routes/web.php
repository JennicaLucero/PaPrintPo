<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home;

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PricingController;

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
