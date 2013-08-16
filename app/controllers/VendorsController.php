<?php

class VendorsController extends BaseController {



    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->vendor=Auth::user();
    }


    public function getIndex()
    {
        return View::make('vendors.index',array('vendor'=>$this->vendor));
    }


    /**
     * Show the form for editing vendor
     */
    public function getEdit()
    {
        return View::make('vendors.edit', array('vendor'=>$this->vendor));
    }

    /**
     * Update the vendor settings
     *
     */
    public function postEdit()
    {
      
        // TODO move image transformation to model
        // TODO make seperate save password form
        // TODO add email reminder for password
        $vendor =Auth::user();
        $input = Input::all();
        $except = array('email','password');
        if ($input['name'] == $vendor->name) $except[]='name';
        $validation = Validator::make($input, array_except(Vendor::$rules,$except));

        $imagename = $vendor->image;    
        if ($validation->passes())
        {   
            if(!is_null($input['image'])) $imagename = Ballr::saveImage($input['image']);
            $vendor->name=$input['name'];
            $vendor->city=$input['city'];
            $vendor->state=$input['state'];
            $vendor->address=$input['address'];
            $vendor->description=$input['description'];
            $vendor->image=$imagename;
            $vendor->save();

            Session::flash('message','Changes Saved');
            return Redirect::to('vendors');
        }

        return Redirect::to('vendors/edit')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteDestroy($id)
    {
        $this->vendor->find($id)->delete();

        return Redirect::to('vendors/index');
    }



}
