<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $title = "Home Page";
    $name = Auth::user()->name;
    $products = Product::where('status', "active")
    ->orderBy('created_at', 'desc')->get();
    return view('dashboard.home', compact('title','name','products'));
})->middleware('auth');

//AUTHENTICATION
Route::get('/register-page', [AuthController::class,'registerPage'])->name('register');
Route::post('/register', [AuthController::class,'register']);
Route::get('/login-page', [AuthController::class,'loginPage'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);

//CART
Route::get('/cart', function () {
    $title = "Cart Page";
    $name = Auth::user()->name;
    return view('dashboard.cart', compact('title','name'));
})->name('cart.index')->middleware('auth');

//CHECKOUT
Route::get('/checkout/{transactionId}', [CheckoutController::class, 'payment'])->name('checkout');
Route::get('/checkout/success/{transaction}', [CheckoutController::class, 'success'])->name('checkout.success');

//CMS PRODUCT
Route::middleware('admin')->prefix('/dashboard-cms')->group(function () {
    Route::resource('/product', DashboardProductController::class);
});


