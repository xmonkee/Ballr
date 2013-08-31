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
    public function __construct(ProductPresenter $productPresenter)
    {
        $this->productPresenter = $productPresenter;

    }

    public function getIndex()
    {
        $groups = $this ->productPresenter
                        ->getGroups();
        
        return View::make('index')
                           ->with(array(
                            'groups'=> $groups,
                            'vendorname' => Ballr::get('allName')
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
        $states = DB::table('states')->orderBy('state')->lists('state', 'id');
    	return View::make('register')->with(compact('states'));
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

}