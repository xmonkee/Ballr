@extends('layout.main')

@section('title')
{{{($product->name)}}}
@stop

@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="/">Home</a> </li>
	<li><a href="{{action('StoreController@getIndex', array($vendorname))}}">{{{$vendorname}}}</a></li>
	<li><a href="{{action('StoreController@getCategory', array($vendorname, $categoryname))}}">{{{$categoryname}}}</a></li>
	<li class="active">{{{Ballr::trunc($product->name)}}}</li>
</ul>
@stop

@section('main')
<div class="col-md-12">
	<div class="row">
		@yield('breadcrumb') 
	</div>
	<div class="row"> <!--Product Section -->
		<div class="col-md-6"> <!-- Main Image -->
				<div class="main-image-box">
					 <a class="main-image" href="{{asset(Ballr::getImage($product->image1))}}">
						<img  src="{{asset(Ballr::getImage($product->image1))}}" />
					</a>
				</div>
		</div>
		<div class="col-md-6"> <!-- Thumbnails and description -->
				<p><strong>{{link_to_action('StoreController@getIndex', $vendorname, $vendorname)}}</strong></p>
				<p><strong>Price: {{{Ballr::getPrice($product->price)}}}</strong></p>	
				<hr />	
				<ul class="large-block-grid-6 small-block-grid-3">
				@foreach(array('image1','image2','image3') as $imagekey)
				@if($product->$imagekey)	
					<li>
						<a href="{{asset(Ballr::getImage($product->$imagekey))}}" class="image-loader">
							<img style="width:95%" src="{{Ballr::getThumb($product->$imagekey)}}" alt="">
						</a>
					</li>
				@endif
				@endforeach
				</ul>
				<hr>
				<p> {{{$product->description}}}</p>
	        	@foreach($props as $propname=>$value)
					<p><strong>{{{$propname}}}:</strong>{{{Ballr::trunc($value)}}}</p>
				@endforeach
		</div>
	</div>
	<div class="row" style="padding-top:50px"> <!-- Other products -->
	      <h3>More Products from {{link_to_action('StoreController@getIndex', $vendorname, array($vendorname))}}:</h3>
		@include('elements.shelves')
	</div>
</div>	 
@stop