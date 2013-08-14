@extends('layout/main') -->

@section('title')
Products
@stop

@section('main')
<div class="row">
	<div class="span2"><!-- start categories -->
		Sidebar
	</div>
	<div class="span10"><!-- start categories -->
		<ul class="thumbnails">
			@foreach($products as $product)
				<li class="span2">
					<div class="thumbnail">
						<a href="{{asset(Config::get('ballr.images').$product->image1)}}"><img alt="" src="{{asset(Config::get('ballr.thumbs').$product->image1)}}"></a>
						<div class="caption">
							<a href="{{asset(Config::get('ballr.images').$product->image1)}}"><h5>{{$product->name}}</h5></a>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
		{{$products->links()}}
	</div><!-- end categories -->
</div>
@stop