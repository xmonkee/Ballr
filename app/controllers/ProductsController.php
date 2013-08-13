<?php

class ProductsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        // $products = Category::where('name','=','suits')->products;
        // $products = Category::products();
        // return '<pre>'.var_dump($products).'</pre>';
        $poducts = Product::all();

    }

}
