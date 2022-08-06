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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('index', 'Category\CategoryController@index')->name('category.index');
// Route::get('create', 'Category\CategoryController@create')->name('category.create');
// Route::post('store', 'Category\CategoryController@store')->name('category.store');
// Route::get ('show/{category}', 'Category\CategoryController@show')->name('category.show');
// Route::get('edit/{category}', 'Category\CategoryController@edit')->name('category.edit');
// Route::put('update/{category}', 'Category\CategoryController@update')->name('category.update');
// Route::delete('delete/{category}', 'Category\CategoryController@destroy')->name('category.destroy');

// Route::get('status-update/{id}','StatusController@status_update');
//Auth::routes();

//Route:resource('category','Category\CategoryController');

//Route::get('/home', 'HomeController@index')->name('home');
