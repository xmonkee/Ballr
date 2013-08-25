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

// Route::get('test', function(){
// 	$products = Product::all();
// 	echo "<!DOCTYPE html>";
// 	echo "<html> <pre>";
// 	foreach($products as $product)
// 	{
// 	}
// 	echo "</pre> </html>";
// });

Route::controller('vendors', 'VendorsController');

Route::group(array('prefix'=>'store'), function(){
	Route::controller('{vendorname}', 'StoreController');
});

Route::get('/', function(){
	return Redirect::to('store/all');
});

Route::controller('/', 'HomeController');

