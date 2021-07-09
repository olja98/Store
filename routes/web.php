<?php

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



Auth::routes();


//Route::get('/', 'FrontEndController@index')->name('website.index');

Route::get('/shop', 'ShopController@index');
Route::get('/shop/product/{product}', 'ShopController@list');

Route::get('/home', 'HomeController@index')->name('home');



Route::post('/purchase', 'UserController@purchase');

Route::get('/dashboard', 'BackendController@index')->name('backend.index');

Route::resource('/dashboard/productcategory', 'ProductCategoryController');


Route::resource('/dashboard/product', 'ProductController');

Route::resource('/dashboard/productImage', 'ProductImageController');

Route::resource('/dashboard/customerDetail', 'CustomerDetailController');

Route::resource('/dashboard/payment', 'PaymentController');

Route::resource('/dashboard/contactForm', 'ContactFormController');

