	<ul class="product-list list-inline">
	@foreach($products as $product)
	<li>
	  	<a href="{{url('product', array($product->id, Ballr::hash($product->id), $product->name))}}">
		    <img class="img-responsive" src="{{Ballr::getThumb($product->image1)}}" alt="...">
		</a>
      <p>{{Ballr::trunc($product->name)}}</p>
      @if(isset($product->vendor->name)) 
      {{link_to_action('StoreController@getIndex',$product->vendor->name, array($product->vendor->name))}}
      @endif
      <p><em><b>{{Ballr::curr($product->price)}}</b></em></p>
	</li>
	@endforeach
	</ul>
