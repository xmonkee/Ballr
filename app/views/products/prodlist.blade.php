<div class="row">
	<ul class="product-list">
	@foreach($products as $product)
	<li>
	  	<a href="{{action('ProductsController@showProduct', $product->id)}}">
		    <img class="img-responsive" src="{{Ballr::getThumb($product->image1)}}" alt="...">
		</a>
      <p>{{Ballr::trunc($product->name)}}</p>
      <p><em><b>{{Ballr::curr($product->price)}}</b></em></p>
	</li>
	@endforeach
	</ul>
</div>