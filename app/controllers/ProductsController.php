<?php

class ProductsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $products = Product::orderBy('updated_at','desc')->paginate(Config::get('ballr.pages'));
        return View::make('products.index')->with(array('products'=> $products));
    }

}
