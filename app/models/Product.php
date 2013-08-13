<?php

class Product extends Eloquent {
    protected $guarded = array();
    public static $rules = array(
        'name' => 'required|min:5',
        'image1' => 'required',
    );

    public static function boot()
    {
        parent::boot();

        Product::saving(function($product){
            $product->vendor()->associate(Auth::user());
        });

    }

    
    // public function __construct(){
    //     if(!($this->vendor()->associate(Auth::user()))) throw new Exception('Can\'t create Product'); 
    // }

    public function category()
    {
    	return $this->belongsTo('Category','category_id');
    }

    public function vendor()
    {
    	return $this->belongsTo('Vendor','vendor_id');
    }

}

