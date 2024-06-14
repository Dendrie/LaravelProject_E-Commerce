<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductCreation;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\PlacedOrderController;
use App\Http\Controllers\MyProduct;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/save-order', [ParcelController::class, 'saveOrder'])->name('order.save');

Route::get('/landingpage', [LandingpageController::class, 'landingpage'])->name('landingpage');
Route::get('/loginpage', [LandingpageController::class, 'loginpage'])->name('loginpage');
Route::get('/signuppage', [LandingpageController::class, 'signuppage'])->name('signuppage');

// Route::middleware('auth')->group(function () {
//     Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
//     Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
//     Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
// });
// web.php
Route::middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'home'])->name('home');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkoutProcess'])->name('checkout.process');
    Route::get('/placeorder', [OrderController::class, 'placeOrder'])->name('placeorder');
    Route::post('/order', [PlacedOrderController::class, 'store'])->name('order.placed');


    Route::get('/orderparcel', [ParcelController::class, 'index'])->name('orderparcel.index');
    Route::post('/parcels/update-status', [ParcelController::class, 'updateStatus'])->name('parcels.updateStatus');

});
Route::get('/order/success', function () {
    return view('home');
})->name('order.success');
    // Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    // Route::get('/place-order', function () {
    //     return view('placeorder');
    // })->name('place-order');



Route::middleware('auth')->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});




Route::get('/sellerorders', [LandingpageController::class, 'sellerorders'])->name('sellerorders');
Route::get('/navbar', [LandingpageController::class, 'navbar'])->name('navbar');
Route::get('/privacy&policy', [LandingpageController::class, 'privacy'])->name('privacy&policy');
Route::get('/terms&condition', [LandingpageController::class, 'terms'])->name('terms&condition');
Route::get('/aboutus', [LandingpageController::class, 'aboutus'])->name('aboutus');
Route::get('/sellreg', [LandingpageController::class, 'sellreg'])->name('sellreg');
Route::get('/sellreg2', [LandingpageController::class, 'sellreg2'])->name('sellreg2');
Route::get('/purchased', [LandingpageController::class, 'purchased'])->name('purchased');

Route::get('/contactus', [LandingpageController::class, 'contactus'])->name('contactus');
Route::get('/cookies', [LandingpageController::class, 'cookies'])->name('cookies');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginpage'])->name('login.perform');
Route::get('/signup', [RegisterController::class, 'create'])->name('signuppage');
Route::post('/signup', [RegisterController::class, 'store'])->name('users.store');
Route::get('/login', function () {
    return view('loginpage');
})->name('loginpage');
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/mypurchased', [OrderController::class, 'indexe'])->name('mypurchased.index');

Route::get('/sellerland', [LandingpageController::class, 'sellerland'])->name('sellerland');
Route::middleware(['auth'])->group(function () {
    Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
    Route::post('/shops', [ShopController::class, 'store'])->name('shops.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/create', [ProductCreation::class, 'create'])->name('products.create');
Route::post('/products', [ProductCreation::class, 'store'])->name('products.store');
Route::delete('/products/{id}', [ProductCreation::class, 'destroy'])->name('products.destroy');
});

Route::middleware(['auth'])->group(function () {
Route::get('/MyProducts', [MyProduct::class, 'MyProducts'])->name('MyProducts');
Route::get('/products/{id}', [MyProduct::class, 'getProductDetails']);
});

Route::middleware(['auth'])->group(function () {
Route::get('/home', [ProductController::class, 'home'])->name('home');
}); 

Route::get('/search', [ProductController::class, 'search'])->name('search');