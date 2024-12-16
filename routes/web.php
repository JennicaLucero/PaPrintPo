<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home;

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\PrintingSuppliesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SubmissionsController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\AdminServiceController;

Route::get('/', [HomeController::class, 'home'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('admin/dashboard', [HomeController::class, 'index'
// ])->middleware(['auth', 'admin']);

Route::get('/printing-services', [ServicesController::class, 'index'])->name('printing-services');

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::post('/printing-services', [ServicesController::class, 'store'])->name('services.store');

Route::get('/buy-printing-supplies', [PrintingSuppliesController::class, 'index'])->name('buy-printing-supplies');

// Cart-related routes
Route::middleware(['auth'])->group(function() {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{supplyId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::put('/update/{cartId}', [CartController::class, 'update'])->name('cart.update');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/submissions', [SubmissionsController::class, 'index'])->name('submissions');
    Route::post('/submissions/{id}/approve', [SubmissionsController::class, 'approve'])->name('submissions.approve');
    Route::post('/submission/{id}/decline', [SubmissionsController::class, 'decline'])->name('submissions.decline');
});

// Admin service Management
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/services', [AdminServiceController::class, 'index'])->name('admin.services');
    Route::post('/admin/services/{id}/update-price', [AdminServiceController::class, 'updatePrice'])->name('admin.services.price');
    Route::post('/admin/services/{id}/send-for-approval', [AdminServiceController::class, 'sendForApproval'])->name('admin.services.send');
});
    
    // Route::post('/admin/services/{service}/approve', [AdminServiceController::class, 'approveTransaction'])->name('admin.services.approve');
    // Route::post('/admin/services/{service}/decline', [AdminServiceController::class, 'declineTransaction'])->name('admin.services.decline');
// });

// Route::get('/admin/services', [AdminServiceController::class, 'index'])->name('admin.services');
// Route::post('/admin/services/{id}', [AdminServiceController::class, 'updatePrice'])->name('admin.services.price');
// Route::post('/admin/services/{id}', [AdminServiceController::class, 'changeStatus'])->name('admin.services.status');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services');
    Route::get('/admin/contact', [AdminController::class, 'contactMessages'])->name('admin.contact');
    Route::get('/admin/orders', [OrderController::class, 'adminOrders'])->name('admin.orders');
    Route::put('/admin/orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');
});


// Checkout routes
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
});





