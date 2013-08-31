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
                        ->whereVendor($vendorname)
                        ->getGroups();
        $vendor = $this->productPresenter->vendor;
        return View::make('store.index')->with(compact(
                            'groups',
                            'vendorname',
                            'vendor'
                            ));
    }

    public function getCategory($vendorname, $categoryname)
    {
        $products = $this   ->productPresenter
                            ->whereVendor($vendorname)
                            ->whereCategory($categoryname)
                            ->paginate(Config::get('ballr.pages'));

        return View::make('store.category')
                   ->with(compact(
                    'products',
                    'categoryname',
                    'vendorname'
                    ));
    }

    public function getProduct($vendorname, $id, $hash, $name='')
    {
        if($hash != Ballr::hash($id)) App::abort(401, 'You are not Authorized');
        $groups = $this->productPresenter->whereVendor($vendorname)->getGroups();
        $product = $this->productPresenter->find($id);
        $props = $this->productPresenter->getProps();
        $vendorname = $this->productPresenter->vendor->name;
        $categoryname = $this->productPresenter->category->name;
        return View::make('store.product')->with(compact(
                                            'product',
                                            'props',
                                            'vendorname',
                                            'categoryname',
                                            'groups'
                                            ));
    }


}
