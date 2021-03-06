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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function (){
    Route::resource('/menu', 'MenuController', ['as'=>'admin']);
    Route::resource('/categories', 'CategoriesController', ['as'=>'admin']);
    Route::resource('/criteria', 'CriteriaController', ['as'=>'admin']);
    Route::resource('/products', 'ProductsController', ['as'=>'admin']);
    Route::resource('/filter', 'FilterController', ['as'=>'admin']);
    Route::resource('/parameters', 'ParametersController', ['as'=>'admin']);
    Route::resource('/order', 'OrderController');
});



