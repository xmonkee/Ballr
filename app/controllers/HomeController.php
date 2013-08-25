<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    public function __construct(Product $productmodel)
    {
        $this->productmodel = $productmodel;

    }

	public function getIndex()
	{
        $groups = $this->productmodel->getGroups();
		return View::make('index')->with(array(
            'groups'=>$groups, 
            'action'=>'HomeController@getCategory', 
            ));
	}


	public function getLogin()
	{
        if(Auth::check())
        {
            Session::flash('message','You are already logged in');
            return Redirect::to('/');
        }
		return View::make('login');
	}


	public function postLogin()
    {
        If (Auth::attempt(array(
            'email'=>Input::get('email'),
            'password'=>Input::get('password')
            ) ,Input::get('isRemember'))) 
        {
            return Redirect::intended('vendors');
        }
        else 
        {
            Session::flash('message', 'Email or Password incorrect');
            return Redirect::to('login');
        }
    }

    public function getLogout()
    {
    	Auth::logout();
    	return Redirect::to('/');
    }

    public function getRegister()
    {
        if(Auth::check())
        {
            Session::flash('message','You are already logged in');
            return Redirect::to('/');
        }
    	return View::make('register');
    }

    public function postRegister()
    {
        $input = Input::all();
        $validation = Validator::make($input, Vendor::$rules);

        if ($validation->passes())
        {   
            $vendor = Vendor::create($input);
            Auth::login($vendor);
            return Redirect::to('vendors');
        }

        return Redirect::to('register')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    public function getProduct($id, $hash, $name='')
    {
        if($hash != Ballr::hash($id)) App::abort(401, 'You are not Authorized');
        $product = $this->productmodel->find($id);
        return View::make('product')
                   ->with(array(
                    'product'=>$product,
                    'categoryname'=>$product->category->name
                    ));
    }

    public function getCategory($categoryname)
    {
        $category = Category::where('name', $categoryname)
                            ->first();
        $products = $category 
                    ->products()
                    ->orderBy('updated_at','desc')
                    ->paginate(Config::get('ballr.pages'));
        return View::make('category')
                   ->with(array(
                    'products'=>$products,
                    'categoryname'=>$categoryname,
                    ));
    }

}