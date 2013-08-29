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
		<div class="col-md-5"> <!-- Main Image -->
			<div class="row">
				<div class="main-image-box">
					 <a class="main-image" href="{{asset(Ballr::getImage($product->image1))}}">
						<img  src="{{asset(Ballr::getImage($product->image1))}}" />
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-md-offset-1"> <!-- Thumbnails and description -->
			<div class="row">
				<p><strong>{{link_to_action('StoreController@getIndex', $vendorname, $vendorname)}}</strong></p>
				<p><strong>Price: {{{Ballr::getPrice($product->price)}}}</strong></p>	
				<hr />	
				@foreach(array('image1','image2','image3') as $imagekey)
				@if($product->$imagekey)	
					<div class="col-md-2 col-xs-4">
						<div class="row">
						<a href="{{asset(Ballr::getImage($product->$imagekey))}}" class="image-loader">
							<img style="width:95%" src="{{Ballr::getThumb($product->$imagekey)}}" alt="">
						</a>
						</div>
					</div>
				@endif
				@endforeach
			</div>
			<div class="row">
				<hr>
				<p> {{{$product->description}}}</p>
	        	@foreach($props as $propname=>$value)
					<p><strong>{{{$propname}}}:</strong>{{{Ballr::trunc($value)}}}</p>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row" style="padding-top:50px"> <!-- Other products -->
	      <h3>More Products</h3>
		@include('elements.shelves')
	</div>
</div>	 
@stop