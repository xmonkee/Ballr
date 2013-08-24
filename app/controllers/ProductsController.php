<?php

class ProductsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

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

    public function showCategory($name)
    {
        $category = Category::where('name', $name)
                            ->first();
        $products = $category 
                    ->products()
                    ->orderBy('updated_at','desc')
                    ->paginate(Config::get('ballr.pages'));
        return View::make('products.category')
                   ->with(array(
                    'products'=>$products,
                    'categoryname'=>$category->name,
                    ));
    }

}
