<div class="row">
	<ul class="product-list list-inline">
	@foreach($products as $product)
	<li>
	  	<a href="{{action('ProductsController@showProduct', array($product->id, Ballr::hash($product->id), $product->name))}}">
		    <img class="img-responsive" src="{{Ballr::getThumb($product->image1)}}" alt="...">
		</a>
      <p>{{Ballr::trunc($product->name)}}</p>
      <p><em><b>{{Ballr::curr($product->price)}}</b></em></p>
	</li>
	@endforeach
	</ul>
</div>