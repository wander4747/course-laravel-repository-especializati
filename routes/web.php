<?php

use Illuminate\Support\Facades\Route;

Route::get('amin', function () {
    return view('welcome');
})->name('admin');

Route::any('admin/categories/search', 'Admin\CategoryController@search')->name('categories.search');
Route::any('admin/products/search', 'Admin\ProductController@search')->name('products.search');


Route::resource('admin/categories', 'Admin\CategoryController');
Route::resource('admin/products', 'Admin\ProductController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

