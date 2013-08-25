<?php

class StoreController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(Product $productmodel, Vendor $vendor)
    {
           $this->vendor = $vendor;
           $this->productmodel = $productmodel;

    }

    public function getIndex($vendorname)
    {
    	$this->vendor = $this->vendor->where('name', $vendorname)->first();
    	$this->productmodel = $this->vendor->products()
    					   ->orderBy('updated_at','desc');
    	$groups = $this->productmodel->getGroups();
        
        return View::make('store.index')
                           ->with(array(
                            'groups'=> $groups,
                            'vendorname'=> $vendor->name,
                            'action' => 'StoreController@getCategory',
                            'arguments' => array('vendorname', 'categoryname')
                            ));
    }

    public function getCategory($vendorname, $categoryname)
    {
    	$vendor = Vendor::where('name', $vendorname)->first();
        $category = Category::where('name', $categoryname)->first();
        $products = $category 
                    ->products()
                    ->where('vendor_id', $vendor->id)
                    ->orderBy('updated_at','desc')
                    ->paginate(Config::get('ballr.pages'));
        return View::make('store.category')
                   ->with(array(
                    'products'=>$products,
                    'categoryname'=>$category->name,
                    'vendorname'=>$vendor->name
                    ));
    }

}
