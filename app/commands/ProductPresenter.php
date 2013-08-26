<?php

class ProductPresenter{

	protected $productmodel;

	protected function get()
	{
		return $this->productmodel->with('vendor','category')->get();
	}

	public function __construct()
	{
		$this->productmodel = Product::orderBy('updated_at','desc');
	}

	public function where($fieldname, $fieldvalue=null)
	{
		if(is_null($fieldvalue)) return $this;
		if($fieldvalue=='all') return $this;
		$field = $fieldname::where('name',$fieldvalue)->first();
		$this->productmodel->where($fieldname.'_id', $field->id);
		return $this;
	}


    public function getGroups($groupsize=null)
    {
        if (is_null($groupsize)) $groupsize = Config::get('ballr.rowSize');
        $groups = array();
        foreach($this->get() as $product)
        {
            $category = $product->category->name;
            if(isset($groups[$category])) if(count($groups[$category]) >= Config::get('ballr.rowSize')) continue;
            $groups[$category][]=$product;
        }
        return $groups;
    }

    public function paginate($items)
    {
    	return $this->productmodel->with('vendor')->paginate($items);
    }

    public function find($id)
    {
    	return $this->productmodel->find($id);
    }
}