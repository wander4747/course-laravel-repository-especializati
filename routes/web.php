<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {


    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::any('users/search', 'UserController@search')->name('users.search');


    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('users', 'UserController');

    Route::get('/', 'DashboardController@index')->name('admin');
});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
