<?php

class Product extends Eloquent {
    protected $guarded = array('id');
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

    public function category()
    {
    	return $this->belongsTo('Category','category_id');
    }

    public function vendor()
    {
    	return $this->belongsTo('Vendor','vendor_id');
    }

}

