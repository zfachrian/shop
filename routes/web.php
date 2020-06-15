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

// Route::get('/', function () {
//     return view('front.index');
// });

//home
Route::get('/', 'front\homeController@index');

//shop
Route::get('/shop', 'front\shopController@index');

//contact
Route::get('/contact', 'front\contactController@index');

//review
Route::get('/review', 'front\reviewController@index');



//login
Route::get('/login', 'back\authController@index')->name('login');

//dashboard
Route::get('/dashboard', 'back\dashboardController@index')->name('dashboard');

//category
Route::get('/category', 'back\categoryController@index')->name('back-category');

//product
Route::get('/product', 'back\productController@index')->name('back-product');
Route::get('/product/create', 'back\productController@create')->name('back-product-create');
