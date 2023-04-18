<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::resource('/products', ProductController::class);

    Route::resource('/categories', CategoryController::class);
    Route::get('/orders', [BackendController::class, 'orderNew']);
    Route::get('/sales', [BackendController::class, 'sales']);

    Route::get('/orders/{id}', [BackendController::class, 'show'])->name('orders.show');
    // Route::get('/orders/{id}', [BackendController::class, 'card'])->name('orders.card');
    Route::put('/orders/{order}', [BackendController::class, 'update'])->name('orders.update');

    // Route::delete('/orders/new/{id}', [BackendController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/{id}/export', [BackendController::class, 'export'])->name('orders.export');
    Route::get('/pie-chart', [BackendController::class, 'pieChart'])->name('pie-chart');
    Route::get('/report-by-day', [BackendController::class, 'ordersReport'])->name('orders.report.by.day');
    Route::post('/products/{id}/like', [ProductController::class, 'like'])->name('products.like');
    Route::post('/products/{id}/unlike', [ProductController::class, 'unlike'])->name('products.unlike');


    Route::get('/dashboard', [BackendController::class, 'dashboard']);
});


Auth::routes();
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.');

// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::post('/checkout', [FrontendController::class, 'checkoutPage'])->name('checkoutPage');
Route::post('/checkout/success', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/order/confirmation/{order}', [OrderController::class, 'confirmation'])->name('order.confirmation');


Route::post('/send-sms', [SMSController::class, 'sendSMS'])->name('send-sms');
Route::post('/product/{product}/comment', [CommentController::class, 'store'])->name('comment.store');

Route::get('/', [FrontendController::class, 'featureProduct']);
// Route::get('/shop', [FrontendController::class, 'shop']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/shop', [FrontendController::class, 'shop'])->name('frontend.shop');
Route::get('/product/{id}', [FrontendController::class, 'productDetail'])->name('frontend.productDetail');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart',  [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{itemId}',  [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart/quantity/{productId}', [CartController::class, 'getCartQuantity']);
Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/product/{id}/like', [FrontendController::class, 'like'])->name('product.like');
Route::post('/product/{id}/unlike', [FrontendController::class, 'unlike'])->name('product.unlike');

// // Authentication Routes...
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// // Registration Routes...
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register',  [RegisterController::class, 'register']);
