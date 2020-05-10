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
//Client
Route::get('/','HomeController@index')->name('Home');






//Admin
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/home', 'AdminController@home')->name('admin.home');
    Route::post('/login', 'AdminController@login')->name('admin.login');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');

    Route::prefix('category')->group(function() {
        Route::get('/', 'CategoryController@index')->name('category.product.list');
        Route::get('/create', 'CategoryController@create')->name('category.product.create');
        Route::post('/store', 'CategoryController@store')->name('category.product.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.product.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('category.product.update');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.product.destroy');
        Route::get('/status/{id}', 'CategoryController@status')->name('category.product.status');
    });
    Route::prefix('brand')->group(function() {
        Route::get('/', 'BrandController@index')->name('brand.list');
        Route::get('/create', 'BrandController@create')->name('brand.create');
        Route::post('/store', 'BrandController@store')->name('brand.store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('brand.edit');
        Route::post('/update/{id}', 'BrandController@update')->name('brand.update');
        Route::get('/delete/{id}', 'BrandController@destroy')->name('brand.destroy');
        Route::get('/status/{id}', 'BrandController@status')->name('brand.status');
    });
    Route::prefix('product')->group(function() {
        Route::get('/', 'ProductController@index')->name('product.list');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/store', 'ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('product.update');
        Route::get('/delete/{id}', 'ProductController@destroy')->name('product.destroy');
        Route::get('/status/{id}', 'ProductController@status')->name('product.status');
    });
});
