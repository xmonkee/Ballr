<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
*/

Route::controller('vendors', 'VendorsController');

Route::get('categories/{id}', 'ProductsController@showCategory');

Route::get('products','ProductsController@getIndex') ;

Route::get('products/{id}', 'ProductsController@showProduct');

Route::controller('/', 'HomeController');

