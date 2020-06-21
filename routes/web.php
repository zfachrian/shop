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
Route::group(['prefix' => 'login', 'namespace' => 'back'], function () {
    Route::get('/', 'authController@index')->name('login');
    Route::post('/', 'authController@loginAuth')->name('loginAuth');
});

Route::group(['middleware' => 'is.login', 'prefix' => 'panel', 'as' => 'back.', 'namespace' => 'back'], function () {   
    //dashboard
    Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

    //category
    Route::group(['prefix' => 'category', 'as' => 'category.'],function (){
        Route::get('/', 'categoryController@index')->name('index');
        Route::get('/create', 'categoryController@create')->name('create');
    });

    //product
    Route::group(['prefix' => 'product', 'as' => 'product.'],function (){
        Route::get('/', 'productController@index')->name('index');
        Route::get('/create', 'productController@create')->name('create');
    });

    //logout
    Route::get('/logout', 'authController@logout')->name('logout');
});


