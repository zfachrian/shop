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
Route::get('/detailProduct/{id}', 'front\shopController@detailProduct');
Route::post('/buy/{id}', 'front\shopController@buy');

//contact
Route::get('/contact', 'front\contactController@index');

//review
Route::get('/review', 'front\reviewController@index');



//login
Route::group(['prefix' => 'login', 'namespace' => 'back'], function () {
    Route::get('/', 'authController@index')->name('login');
    Route::post('/', 'authController@loginAuth')->name('loginAuth');
});

Route::group(['middleware' => 'is.login', 'prefix' => 'panel', 'as' => 'back.', 'namespace' => 'back'], function () {   
    Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
    
    Route::resource('banner', 'bannerController');
    Route::resource('category', 'categoryController');
    Route::resource('product', 'productController');
    Route::resource('news', 'newsController');

    Route::get('/logout', 'authController@logout')->name('logout');
});


