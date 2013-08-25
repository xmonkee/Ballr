<?php

class ProductPresenter{

	protected $productmodel;

	public function __construct()
	{
		$this->productmodel = Product::orderBy('updated_at','desc');
	}

	// public function filter($vendorname=null, $categoryname=null)
	// {
	// 	return $this->where('vendor', $vendorname)->where('category', $categoryname);
	// }

	public function where($fieldname, $fieldvalue=null)
	{
		if(is_null($fieldvalue)) return $this;
		if($fieldvalue=='all') return $this;
		$field = $fieldname::where('name',$fieldvalue)->first();
		$this->productmodel = $this->productmodel->where($fieldname.'_id', $field->id);
		return $this;
	}

	protected function products()
	{
		return $this->productmodel->get();
	}

    public function getGroups($groupsize=null)
    {
        if (is_null($groupsize)) $groupsize = Config::get('ballr.rowSize');
        $this->products()->load('category');
        $groups = array();
        foreach($this->products() as $product)
        {
            $category = $product->category->name;
            if(isset($groups[$category])) if(count($groups[$category]) >= Config::get('ballr.rowSize')) continue;
            $groups[$category][]=$product;
        }
        return $groups;
    }

    public function paginate($items)
    {
    	return $this->productmodel->paginate($items);
    }

    public function find($id)
    {
    	return $this->productmodel->find($id);
    }
}