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

// routes sécurisées
// Route::resource('admin/product', 'ProductController')->middleware('auth');

// Page d'accueil
Route::get('/', 'FrontController@index');

// Page par Soldes
Route::get('discount', 'FrontController@showProductsByDiscount');

// Route pour afficher un article
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

// Page par Genre
Route::get('category/{id}', 'FrontController@showProductsByCategory')->where(['id' => '[0-9]+']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(["auth", "checkElevation"])->group(function() {
    Route::resource('admin/product', 'ProductController');
    Route::resource('admin/category', 'CategoryController');
});