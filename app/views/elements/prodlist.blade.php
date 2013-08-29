	<ul class="large-block-grid-6 small-block-grid-2">
	@foreach($products as $product)
	<li>
		<div class="product-list-item">
	  	<a href="{{action('StoreController@getProduct', array(
	  	isset($product->vendor->name)? $product->vendor->name: 'all', 
	  	$product->id, 
	  	Ballr::hash($product->id), 
	  	$product->name))}}">
		    <img class="img-responsive" src="{{Ballr::getThumb($product->image1)}}" alt="...">
		</a>
		<div class="caption">	
			{{{$product->name}}}
			<br />
			<a href="{{action('StoreController@getIndex', array($product->vendor->name))}}">{{{$product->vendor->name}}}</a>
			<p><em><b>
				{{Ballr::get('curr')}}
				@if(isset($product->price))
				{{{number_format($product->price,2)}}}
				@endif
			</b></em></p>
		</div>
		</div>
	</li>
	@endforeach
	</ul>