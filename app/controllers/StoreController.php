<?php

class StoreController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(ProductPresenter $productpresenter)
    {
           $this->productpresenter = $productpresenter;
    }

    public function getIndex($vendorname)
    {
        $groups = $this ->productpresenter
                        ->where('Vendor', $vendorname)
                        ->getGroups();
        
        return View::make('store.index')
                           ->with(array(
                            'groups'=> $groups,
                            'vendorname'=> $vendorname,
                            ));
    }

    public function getCategory($vendorname, $categoryname)
    {
        $products = $this   ->productpresenter
                            ->where('Vendor', $vendorname)
                            ->where('Category', $categoryname)
                            ->paginate(Config::get('ballr.pages'));

        return View::make('store.category')
                   ->with(array(
                    'products'=>$products,
                    'categoryname'=>$categoryname,
                    'vendorname'=>$vendorname
                    ));
    }

    public function getProduct($vendorname, $id, $hash, $name='')
    {
        if($hash != Ballr::hash($id)) App::abort(401, 'You are not Authorized');
        $product = $this->productpresenter->find($id);
        return View::make('store.product')
                   ->with(array(
                    'product'=>$product,
                    'vendorname'=>$product->vendor->name,
                    'categoryname'=>$product->category->name
                    ));
    }


}
