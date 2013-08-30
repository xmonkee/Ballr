<?php

class StoreController extends BaseController {

    var $productPresenter; 
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(ProductPresenter $productPresenter)
    {
           $this->productPresenter = $productPresenter;
    }

    public function getIndex($vendorname)
    {
        $groups = $this ->productPresenter
                        ->where('Vendor', $vendorname)
                        ->getGroups();
        
        return View::make('store.index')
                           ->with(array(
                            'groups'=> $groups,
                            'vendorname'=> $vendorname,
                            'vendor' => $this->productPresenter->where('vendor', $vendorname)->vendor,
                            ));
    }

    public function getCategory($vendorname, $categoryname)
    {
        $products = $this   ->productPresenter
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
        $groups = $this->productPresenter->where('Vendor',$vendorname)->getGroups();
        $product = $this->productPresenter->find($id);
        $props = $this->productPresenter->getProps();
        return View::make('store.product')
                   ->with(array(
                    'product'=>$product,
                    'vendorname'=>$this->productPresenter->vendor->name,
                    'categoryname'=>$this->productPresenter->category->name,
                    'props' => $props,
                    'groups' => $groups
                    ));
    }


}
