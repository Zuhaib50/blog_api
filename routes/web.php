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


Route::get('/','DashboardController@index');
Route::get('dashboard','DashboardController@index');
Route::get('create-category','categoriesController@create');
Route::post('post-category-form','categoriesController@store');
Route::get('get-categories','categoriesController@index');
Route::get('edit-catrgory/{id}','categoriesController@edit');
Route::post('update-category-form/{id}','categoriesController@update');
Route::get('delete-category/{id}','categoriesController@destroy');
Route::get('post-blog-form','blogPostController@create');
Route::post('store-blog-form','blogPostController@store');
Route::get('get-all-posts','blogPostController@index');
