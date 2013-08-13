<?php

class ProductsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $products = Product::all();
        return View::make('products.index')->with(array('products'=> $products));
    }

}
