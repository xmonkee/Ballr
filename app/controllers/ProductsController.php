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
        return View::make('products.list')->with(array('products'=> $products));
    }

    public function showProduct($id)
    {
        $product = Product::find($id);
        return View::make('products.show')->with(array('product'=>$product));
    }

    public function showCategory($id)
    {
    if(!$category = Category::find($id)) throw new Exception('Not Found');
    if(!$products = $category->products()->paginate(Config::get('ballr.pages'))) throw new Exception('Not Found');
    return View::make('products.list')->with(array('products'=>$products));
    }

}
