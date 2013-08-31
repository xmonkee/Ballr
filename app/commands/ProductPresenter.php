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

    public function whereVendor($vendorname=null)
    {
        if(is_null($vendorname)) return $this;
        if($vendorname==Ballr::get('allName')) return $this;
        $vendor = Vendor::where('name',$vendorname)->firstOrFail();
        $this->productmodel->where('vendor_id', $vendor->id);
        $this->vendor = $vendor;
        return $this;
    }

    public function whereCategory($categoryname=null)
    {
        if(is_null($categoryname)) return $this;
        $category = Category::where('name',$categoryname)->firstOrFail();
        $this->productmodel->where('category_id', $category->id);
        $this->category = $category;
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