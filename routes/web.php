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
//     return view('layouts');
// });

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {

    Route::get('/', 'HomePageController@index')->name('homePage');
    Route::get('/subCatProduct/{id}', 'HomePageController@subCatProduct')->name('subCatProduct');


    Route::get('/search', 'HomePageController@search')->name('search');
    Route::post('/search-result', 'HomePageController@searchResult')->name('search.result');
    Route::get('/product-show/{id}', 'HomePageController@show')->name('product.show');

    Route::get('/details/{id}', 'HomePageController@details')->name('details');
    Route::get('/contact', 'HomePageController@contact')->name('contact');


});

