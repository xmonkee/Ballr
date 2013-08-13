@extends('layout/main')

@section('title')
Products
@stop

@section('main')
<div class="row">
	<div class="span9"><!-- start categories -->
		<ul class="thumbnails">
			@foreach($products as $product)
			<li class="span3">
				<div class="thumbnail">
					<a href="listings.html"><img alt="" src="{{asset(Config::get('ballr.thumbs').$product->image1)}}"></a>
					<div class="caption">
						<a href="listings.html"><h5>{{$product->name}}</h5></a>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div><!-- end categories -->
</div>
@stop