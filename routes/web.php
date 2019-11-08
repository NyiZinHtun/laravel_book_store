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

	//Category Route

Route::get('admin/categories','Admin\CategoryController@index');
Route::get('admin/categories/add','Admin\CategoryController@add');
Route::post('admin/categories/add','Admin\CategoryController@create');
Route::get('admin/categories/delete/{id}','Admin\CategoryController@delete');
Route::get('admin/categories/edit/{id}','Admin\CategoryController@edit');
Route::post('admin/categories/edit/{id}','Admin\CategoryController@update');

	//Book Route
Route::get('admin/home','Admin\BookController@index');
Route::get('admin/books','Admin\BookController@index');
Route::get('admin/', 'Admin\BookController@index');
Route::get('admin/books/add','Admin\BookController@add');
Route::post('admin/books/add','Admin\BookController@create');
Route::get('admin/books/edit/{id}','Admin\BookController@edit');
Route::post('admin/books/edit/{id}','Admin\BookController@update');
Route::get('admin/books/delete/{id}','Admin\BookController@delete');

Route::get('/home','BookController@index');
Route::get('/books','BookController@index');
Route::get('/','BookController@index');
Route::get('/add_to_cart/{id}','BookController@add_to_cart');
Route::get('/clear_cart','BookController@clear_cart');
Route::get('/cart_view','BookController@view');

Route::group(['middleware'=>'auth'],function(){
	Route::resource('/orders','OrderController');
});
// Route::get('/orders/delete/{id}','OrderController@delete');
// Route::get('/orders/{order}/edit','OrderController@edit');
// Route::post('/orders/edit/{id}','OrderController@update');
// Route::get('/orders/view/{id}','OrderController@view');


Auth::routes();

