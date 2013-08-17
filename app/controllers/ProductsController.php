<?php

class ProductsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $products = Product::orderBy('updated_at','desc')
                           ->paginate(Config::get('ballr.pages'));

        return View::make('products.list')
                           ->with(array(
                            'products'=> $products
                            ));
    }

    public function showProduct($id)
    {
        $product = Product::find($id);
        return View::make('products.show')
                   ->with(array(
                    'product'=>$product,
                    'category'=>$product->category()
                    ));
    }

    public function showCategory($id)
    {
        $products = Category::find($id)
                            ->products()
                            ->orderBy('updated_at','desc')
                            ->paginate(Config::get('ballr.pages'));
        return View::make('products.list')
                   ->with(array(
                    'products'=>$products
                    ));
    }

}
