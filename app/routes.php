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
Route::controller('products', 'ProductsController');
Route::get('categories/{id}', function($id){
	if(!$category = Category::find($id)) throw new Exception('Not Found');
	if(!$products = $category->products()->paginate(Config::get('ballr.pages'))) throw new Exception('Not Found');
	return View::make('products.list')->with(array('products'=>$products));
});
Route::controller('/', 'HomeController');

