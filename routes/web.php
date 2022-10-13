<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about');
Route::get('/produk', 'App\Http\Controllers\CategoryController@index')->name('produk');
Route::get('/produk/{id}', 'App\Http\Controllers\CategoryController@detail')->name('produk-detail');
Route::get('/details/{id}', 'App\Http\Controllers\DetailController@index')->name('detail');
Route::post('/details/{id}', 'App\Http\Controllers\DetailController@add')->name('detail-add');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart');
Route::delete('/cart/{id}', 'App\Http\Controllers\CartController@delete')->name('cart-delete');

Route::post('/checkout', 'App\Http\Controllers\CheckoutController@process')->name('checkout');
Route::post('/checkout/callback', 'App\Http\Controllers\CheckoutController@callback')->name('midtrans-callback');

Route::get('/success', 'App\Http\Controllers\CartController@success')->name('success');

Route::get('/register/success', 'App\Http\Controllers\Auth\RegisterController@success')->name('register-success');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::get('/dashboard/products', 'App\Http\Controllers\DashboardProductController@index')->name('dashboard-product');
Route::get('/dashboard/products/create', 'App\Http\Controllers\DashboardProductController@create')->name('dashboard-product-create');
Route::get('/dashboard/products/{id}', 'App\Http\Controllers\DashboardProductController@details')->name('dashboard-product-details');

Route::get('/dashboard/transactions', 'App\Http\Controllers\DashboardTransactionController@index')->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', 'App\Http\Controllers\DashboardTransactionController@details')->name('dashboard-transaction-details');
Route::post('/dashboard/transactions/{id}', 'App\Http\Controllers\DashboardTransactionController@update')->name('dashboard-transaction-update');

Route::get('/dashboard/settings', 'App\Http\Controllers\DashboardSettingsController@store')->name('dashboard-settings-store');
Route::get('/dashboard/account', 'App\Http\Controllers\DashboardSettingsController@account')->name('dashboard-settings-account');
Route::post('/dashboard/account/{redirect}', 'App\Http\Controllers\DashboardSettingsController@update')->name('dashboard-settings-redirect');

// ->middleware({'auth','admin'})
Route::prefix('admin')
->middleware(['auth','admin'])
->group(function() {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index') ->name('admin-dashboard');
    Route::resource('category','App\Http\Controllers\Admin\CategoryController');
    Route::resource('user','App\Http\Controllers\Admin\UserController');
    Route::resource('product','App\Http\Controllers\Admin\ProductController');
    Route::resource('product-gallery','App\Http\Controllers\Admin\ProductGalleryController');
    Route::resource('transaction','App\Http\Controllers\Admin\TransactionController');
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


