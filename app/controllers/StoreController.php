<?php

class StoreController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex($vendorname)
    {
    	$vendor = Vendor::where('name', $vendorname)->first();
    	$products = $vendor->products()
    					   ->orderBy('updated_at','desc')
    					   ->get(); // take latest 100 products
    	$groups = Product::getGroups($products);
        
        return View::make('store.index')
                           ->with(array(
                            'groups'=> $groups,
                            'vendorname'=> $vendor->name,
                            'action' => 'StoreController@getCategory',
                            'arguments' => array('vendorname', 'categoryname')
                            ));
    }

    public function showProduct($id, $hash, $name='')
    {
        if($hash != Ballr::hash($id)) App::abort(401, 'You are not Authorized');
        $product = Product::find($id);
        return View::make('products.show')
                   ->with(array(
                    'product'=>$product,
                    'category'=>$product->category()
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
