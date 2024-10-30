<?php

use Illuminate\Support\Facades\Route;

// category Routes

Route::group(['prefix' => 'category', 'as' => 'category.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'CategoryController@index')->name('index');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::post('/update/{id}', 'CategoryController@update')->name('update');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
    Route::get('/delete{id}', 'CategoryController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'CategoryController@inactive')->name('inactive');
    Route::get('/active/{id}', 'CategoryController@active')->name('active');

});

// Subcategory Routes

Route::group(['prefix' => 'subcategory', 'as' => 'subcategory.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'SubCategoryController@index')->name('index');
    Route::post('/store', 'SubCategoryController@store')->name('store');
    Route::post('/update/{id}', 'SubCategoryController@update')->name('update');
    Route::get('/edit/{id}', 'SubCategoryController@edit')->name('edit');
    Route::get('/delete{id}', 'SubCategoryController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'SubCategoryController@inactive')->name('inactive');
    Route::get('/active/{id}', 'SubCategoryController@active')->name('active');

});

// brand Routes
Route::group(['prefix' => 'brand', 'as' => 'brand.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'BrandController@index')->name('index');
    Route::post('/store', 'BrandController@store')->name('store');
    Route::post('/update/{id}', 'BrandController@update')->name('update');
    Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
    Route::get('/delete{id}', 'BrandController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'BrandController@inactive')->name('inactive');
    Route::get('/active/{id}', 'BrandController@active')->name('active');

});

// slider Routes

Route::group(['prefix' => 'slider', 'as' => 'slider.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'SliderController@index')->name('index');
    Route::post('/store', 'SliderController@store')->name('store');
    Route::get('/edit/{id}', 'SliderController@edit')->name('edit');
    Route::post('/update/{id}', 'SliderController@update')->name('update');
    Route::get('/delete{id}', 'SliderController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'SliderController@inactive')->name('inactive');
    Route::get('/active/{id}', 'SliderController@active')->name('active');

});


Route::group(['prefix' => 'product', 'as' => 'product.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/create', 'ProductController@create')->name('create');
    Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
    Route::post('/store', 'ProductController@store')->name('store');
    Route::post('/update/{id}', 'ProductController@update')->name('update');
    Route::get('/delete{id}', 'ProductController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'ProductController@inactive')->name('inactive');
    Route::get('/active/{id}', 'ProductController@active')->name('active');




});





Route::group(['prefix' => 'service', 'as' => 'service.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'ServiceController@index')->name('index');
    Route::post('/store', 'ServiceController@store')->name('store');
    Route::post('/update/{id}', 'ServiceController@update')->name('update');
    Route::get('/edit/{id}', 'ServiceController@edit')->name('edit');
    Route::get('/delete{id}', 'ServiceController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'ServiceController@inactive')->name('inactive');
    Route::get('/active/{id}', 'ServiceController@active')->name('active');

});

Route::group(['prefix' => 'bestOffer', 'as' => 'bestOffer.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'BestOfferController@index')->name('index');
    Route::post('/store', 'BestOfferController@store')->name('store');
    Route::post('/update/{id}', 'BestOfferController@update')->name('update');
    Route::get('/edit/{id}', 'BestOfferController@edit')->name('edit');
    Route::get('/delete{id}', 'BestOfferController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'BestOfferController@inactive')->name('inactive');
    Route::get('/active/{id}', 'BestOfferController@active')->name('active');

});


Route::group(['prefix' => 'social', 'as' => 'social.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('/', 'SocialController@index')->name('index');
    Route::post('/update/{id}', 'SocialController@update')->name('update');

});

Route::group(['prefix' => 'setting', 'as' => 'setting.', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('/', 'SettingController@index')->name('index');
    Route::post('/update/{id}', 'SettingController@update')->name('update');

});



Route::group(['middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {


    //get sub category

    Route::get('get/subcategory/{category_id}', 'ProductController@getSubcategory');

});
