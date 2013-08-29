<?php

class ProductPresenter{

	protected $productmodel;
    protected $product;
    public $vendor;
    public $category;

    public function reset()
    {
        $this->productmodel = Product::orderBy('updated_at','desc');
        return $this;
    }
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
		$field = $fieldname::where('name',$fieldvalue)->firstOrFail();
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
        $props=array();
        for($i=1; $i<=10; $i++)
        {
            $prop ='prop'.$i;
            $key = $this->category->$prop;
            $value = $this->product->$prop;
            if($key)
            $props[$key] = $value;
        }
        return $props;

    }

    public function paginate($items)
    {
    	return $this->productmodel->with('vendor')->paginate($items);
    }

    public function find($id)
    {
    	$this->product = $this->productmodel->findOrFail($id);
        $this->vendor = $this->product->vendor;
        $this->category = $this->product->category;
        return $this->product;
    }
}