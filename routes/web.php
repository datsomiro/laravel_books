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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/api/books', 'APIBookController@index');

Route::get('/test', 'TestController@index');

Route::get('/books', 'BookController@index')->name('books');
Route::get('/books/create', 'BookController@create');
Route::get('/books/{id}', 'BookController@show')->name('books.show');

Route::post('/books', 'BookController@store');

Route::post('/books/{book_id}/review', 'BookController@storeReview');
Route::post('/books/{book_id}/addtoorder', 'BookController@addToOrder')->name('books.add-to-order');

Route::get('/eshop', 'EshopController@index');
Route::get('/eshop/categories/{id}', 'EshopController@category');
Route::get('/eshop/subcategories/{id}', 'EshopController@subcategory');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/{id}', 'CategoryController@show');
Route::get('/categories/{id}/edit', 'CategoryController@edit');
Route::put('/categories/{id}', 'CategoryController@update');
Route::get('/categories/{id}/delete', 'CategoryController@delete'); // will show message "really want to delete?
Route::delete('/categories/{id}', 'CategoryController@destroy');

Route::get('/subcategories', 'SubcategoryController@index');
Route::get('/subcategories/create', 'SubcategoryController@create');
Route::post('/subcategories', 'SubcategoryController@store');
Route::get('/subcategories/{id}', 'SubcategoryController@show');
Route::get('/subcategories/{id}/edit', 'SubcategoryController@edit');
Route::put('/subcategories/{id}', 'SubcategoryController@update');
Route::get('/subcategories/{id}/delete', 'SubcategoryController@delete'); // will show message "really want to delete?
Route::delete('/subcategories/{id}', 'SubcategoryController@destroy');

Route::get('/bookshops', 'BookshopController@index');
Route::get('/bookshops/create', 'BookshopController@create');
Route::post('/bookshops', 'BookshopController@store');

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

