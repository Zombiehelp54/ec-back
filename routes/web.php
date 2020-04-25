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






Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::resource('category', 'CategoryController');
Route::get('/search', 'SearchController@index');
Route::resource('product', 'ProductController');

Route::get('/cart', 'CartController@index');
Route::get('/cart/{id}', 'CartController@action');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/product/{id}/edit', 'AdminController@editProduct');
Route::post('/admin/product/{id}/edit', 'AdminController@editProductAction');
Route::get('/admin/product/{id}/delete', 'AdminController@deleteProduct');
Route::get('/admin/category/{id}/edit', 'AdminController@editCategory');
Route::post('/admin/category/{id}/edit', 'AdminController@editCategoryAction');
Route::get('/admin/category/{id}/delete', 'AdminController@deleteCategory');
Route::get('/admin/product/new', 'AdminController@newProduct');
Route::post('/admin/product/new', 'AdminController@newProductAction');

Route::get('/admin/category/new', 'AdminController@newCategory');
Route::post('/admin/category/new', 'AdminController@newCategoryAction');

Route::get('/admin/login', 'AdminController@login');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/history', 'HistoryController@index');
Route::post('/checkout', 'CartController@checkout');
