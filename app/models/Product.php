<?php

class Product extends Eloquent {
    protected $guarded = array();
    public static $rules = array(
        'name' => 'required|min:5',
        'image1' => 'required',
    );

    public function __construct(){
        if(!($this->vendor_id = Auth::user()->id)) throw new Exception('Can\'t create Product'); 
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

