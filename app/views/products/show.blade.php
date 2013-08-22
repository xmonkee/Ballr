@extends('layout.main')

@section('title')
{{$product->name}}
@stop

@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="/">Home</a> </li>
	<li><a href="{{action('ProductsController@showCategory', $product->category->id)}}">{{$product->category->name}}</a></li>
	<li class="active"><a href="#">{{$product->name}}</a></li>
</ul>
@stop

@section('main')
<div class="col-md-12">
	<div class="row">
		@yield('breadcrumb') 
	</div>
	<div class="row"> <!-- Title -->
		<h1>@yield('title')</h1>
		<hr>
		<div class="col-md-6 product-list"> <!-- Main Image -->
			<a id="main-image" class="thumbnail" href="{{asset(Ballr::getImage($product->image1))}}">
				<img class="img-responsive" src="{{asset(Ballr::getImage($product->image1))}}" />
			</a>
			<div class="row">
				@foreach(array('image1','image2','image3') as $imagekey)
				@if($product->$imagekey)	
					<div class="col-md-4"> <!-- thumbnails -->
						<a href="{{asset(Ballr::getImage($product->$imagekey))}}" class="thumbnail image-loader">
							<img src="{{Ballr::getThumb($product->$imagekey)}}" alt="">
						</a>
					</div>
				@endif
				@endforeach
			</div>
		</div>


		<div class="col-md-5"> <!-- Description -->
			
			{{$product->description}}
			<br> 
		</div>		

	</div>	 
</div>
@stop