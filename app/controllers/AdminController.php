<?php

class AdminController extends BaseController{

    public function __construct()
    {
        $this->beforeFilter('admin');

    }

    public function getIndex(){
       return View::make('admin.index');
    }

	public function getVendors(){

		$vendors=Vendor::all();
		return View::make('admin.vendors.index',compact('vendors'));
	}

    public function getLogin()
    {

        return View::make('admin.login');
    }

    public function postLogin()
    {
        If (Auth::attempt(array('email'=>Input::get('email'),'password'=>Input::get('password')),Input::get('isRemember'))) {
            return Redirect::intended('/');;
        }
        else {
            Session::flash('message', 'Email or Password incorrect');
            return Redirect::to('login');
        }
    }

    public function getTest()
    {
    	echo Auth::user()->email;
    }
}
