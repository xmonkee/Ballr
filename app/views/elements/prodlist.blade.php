	<ul class="product-list list-inline">
	@foreach($products as $product)
	<li>
	  	<a href="{{action('StoreController@getProduct', array(
	  	isset($product->vendor->name)? $product->vendor->name: 'all', 
	  	$product->id, 
	  	Ballr::hash($product->id), 
	  	$product->name))}}">
		    <img class="img-responsive" src="{{Ballr::getThumb($product->image1)}}" alt="...">
		</a>
		<div class="caption">	
			<p>{{{$product->name}}}</p>
			@if(isset($product->vendor->name)) 
			{{link_to_action('StoreController@getIndex',$product->vendor->name, array($product->vendor->name))}}
			@endif
			<p><em><b>
				{{Ballr::get('curr')}}
				@if(isset($product->price))
				{{{number_format($product->price,2)}}}
				@endif
			</b></em></p>
		</div>
	</li>
	@endforeach
	</ul>
