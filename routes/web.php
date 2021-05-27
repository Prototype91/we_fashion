<?php

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

// Home Page
Route::get('/', 'FrontController@index');

// Discount Page
Route::get('discount', 'FrontController@showProductsByDiscount');

// Route to display a product
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

// Page by category
Route::get('category/{id}', 'FrontController@showProductsByCategory')->where(['id' => '[0-9]+']);

Auth::routes();

// Route HomeController
Route::get('/home', 'HomeController@index')->name('home');

// Routes with middleware
Route::middleware(["auth", "checkElevation"])->group(function() {
    Route::resource('admin/product', 'ProductController');
    Route::resource('admin/category', 'CategoryController');
});