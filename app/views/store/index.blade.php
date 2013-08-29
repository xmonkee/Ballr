@extends('layout/main') 

@section('title')
{{{$vendorname}}}
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a></li>
		<li class="active">{{$vendorname}}</li>
	</ul>
@stop

@section('sidebar')
		<ul class="breadcrumb">
			<li class="active">Categories</li>
		</ul>

		<div class="well sidebar-nav">
			<ul class="nav">
				@foreach($groups as $categoryname=>$products)
				<li>{{link_to_action('StoreController@getCategory', $categoryname, array($vendorname, $categoryname))}}</a></li>
				@endforeach
			</ul>
		</div><!--/.well -->
@stop

@section('main')
<div class="col-md-3 sidebar" id="sidebar" role="navigation">
	@yield('sidebar')
</div>


<div class="col-md-9">
		@yield('breadcrumb') 
	<div class = "row"> <!-- About seller -->
		<div class="col-md-6"> <!-- Main Image -->
				<img src="{{asset(Ballr::getImage($vendor->image))}}" />
		</div>
		<div class="col-md-6">
			<p>{{{$vendor->description}}}<p>
			<address>
			  <strong>{{{$vendorname}}}</strong><br>
			  {{{$vendor->address}}}<br>
			  <span class="glyphicon glyphicon-earphone"></span> 123456789<br>
			  <a href="mailto:#">{{{$vendor->email}}}</a>
			</address>
		</div>
	</div>
	<div style="padding-top:20px"> <!-- Other products -->
	      <h3>Latest Products:</h3>
		@include('elements.shelves')
</div>
@stop

