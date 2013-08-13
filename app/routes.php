<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|



Route::get('logout', function(){
	Auth::logout();
	echo "Logged out";
});

*/

Route::get('test',function(){
	$filename=Product::all()->first()->image1;                                                                            
	$image = new Imagick(storage_path().'/uploads/'.$filename);
	$image->resizeImage(200,200, Imagick::FILTER_LANCZOS, 1, true);
	$image->writeImage(storage_path() . '/uploads/thumbnails/'. $filename);
	echo sha1(time().Str::random(10)).'<br>';
	echo time();
	echo '<img src="'. '/uploads/thumbnails/' . $filename .'" />';
});
Route::controller('vendors', 'VendorsController');
Route::controller('products', 'ProductsController');
Route::controller('/', 'HomeController');
