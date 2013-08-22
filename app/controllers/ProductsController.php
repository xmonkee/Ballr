<?php

class ProductsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $productmodel = Product::orderBy('updated_at','desc'); // take latest 100 products
        $groups=array();
        while( $productmodel->count() > 0 and count($groups) <= 5) //keep looping till we have seen at least 100 products or displayed 5 categories
        {
            $category = $productmodel->first()->category;
            $products = $category->products()->orderBy('updated_at', 'desc');
            $productmodel = $productmodel->where('category_id','!=',$category->id);
            $groups[] = array('category'=>$category, 'products'=>$products->take(5)->get());
        }
        
        return View::make('products.index')
                           ->with(array(
                            'groups'=> $groups
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
