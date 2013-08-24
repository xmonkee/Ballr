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

    public function category()
    {
    	return $this->belongsTo('Category','category_id');
    }

    public function vendor()
    {
    	return $this->belongsTo('Vendor','vendor_id');
    }

    //returns an array of categories and products within those categories
    public static function getGroups($products=null, $groupsize=null)
    {
        if (is_null($products)) $products = Product::all();
        if (is_null($groupsize)) $groupsize = Config::get('ballr.rowSize');
        $products->load('category');
        $groups = array();
        foreach($products as $product)
        {
            $category = $product->category->name;
            if(isset($groups[$category])) if(count($groups[$category]) >= Config::get('ballr.rowSize')) continue;
            $groups[$category][]=$product;
        }
        return $groups;
    }
}

