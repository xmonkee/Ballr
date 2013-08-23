@extends('layout.main')

@section('title')
{{e($product->name)}}
@stop

@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="/">Home</a> </li>
	<li><a href="{{action('ProductsController@showCategory', $product->category->name)}}">{{e($product->category->name)}}</a></li>
	<li class="active"><a href="#">{{Ballr::trunc($product->name)}}</a></li>
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
		<div class="col-md-6"> <!-- Main Image -->
			 <a id="main-image"  href="{{asset(Ballr::getImage($product->image1))}}">
				<img class="img-responsive" src="{{asset(Ballr::getImage($product->image1))}}" />
			</a>
		</div>
		<div class="col-md-1 col-xs-12">
			<div class="row">
			@foreach(array('image1','image2','image3') as $imagekey)
			@if($product->$imagekey)	
				<div class="col-md-12 col-xs-4">
				<a href="{{asset(Ballr::getImage($product->$imagekey))}}" class="image-loader">
					<img class="img-responsive" src="{{Ballr::getThumb($product->$imagekey)}}" alt="">
				</a>
				</div>
			@endif
			@endforeach
			</div>
		</div>
		<div class="col-md-5">
			<p class="lead"> {{$product->description}} </p>
		</div>
	</div>
</div>	 
@stop