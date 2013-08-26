<?php

class ProductPresenter{

	protected $productmodel;
    protected $product;
    public $vendor;
    public $category;

	protected function get()
	{
		return $this->productmodel->with('vendor','category')->get();
	}

	public function __construct()
	{
		$this->productmodel = Product::orderBy('updated_at','desc');
	}

    // $this->where('category', 'Suits')
	public function where($fieldname, $fieldvalue=null)
	{
		if(is_null($fieldvalue)) return $this;
		if($fieldvalue==Ballr::get('allName')) return $this;
		$field = $fieldname::where('name',$fieldvalue)->first();
		$this->productmodel->where($fieldname.'_id', $field->id);
        $this->$fieldname = $field;
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

    public function getProps()
    {
        for($i=1; $i<=10; $i++)
        {
            $key='prop'.$i;
            $props[$this->category->$key] = $this->product->$key;
        }
        return $props;

    }

    public function paginate($items)
    {
    	return $this->productmodel->with('vendor')->paginate($items);
    }

    public function find($id)
    {
    	$this->product = $this->productmodel->find($id);
        $this->vendor = $this->product->vendor;
        $this->category = $this->product->category;
        return $this->product;
    }
}