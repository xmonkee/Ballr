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
	<div class="row"> <!-- Title -->
		<div class="col-md-5"> <!-- Main Image -->
			<div class="row">
			 <a id="main-image"  href="{{asset(Ballr::getImage($product->image1))}}">
				<img style="width:100%;" class="img-responsive" src="{{asset(Ballr::getImage($product->image1))}}" />
			</a>
			</div>
			<div class="row">
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
		</div>
		<div class="col-md-6 col-md-offset-1">
			<div class="row">
					<table class="table table-condensed">
				        <tbody>
							<tr>
								<td><h3><small><em>{{{Ballr::get('storePrefix')}}}</em></small></h3></td>
								<td><h3>{{link_to_action('StoreController@getIndex', $vendorname, $vendorname)}}</h3></td>
							</tr>
							<tr>
								<td><h3><small><em>Price</em></small></h3></td>
								<td><h3>{{{Ballr::getPrice($product->price)}}}</h3></td>
							</tr>
							<tr>
								<td><small><em>Description</em></small></td>
								<td>
								{{{strtoupper(substr($product->description, 0,1)).substr($product->description, 1)}}}
								</td>
							</tr>
				        	@foreach($props as $propname=>$value)
							<tr>
								<td>{{{$propname}}}</td>
								<td>{{{Ballr::trunc($value)}}}</td>
							</tr>
							@endforeach
				        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>	 
@stop