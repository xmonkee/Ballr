@extends('layout/main') 

@section('title')
Products
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a></li>
		<li class="active">{{$vendorname}}</li>
	</ul>
@stop

@section('main')

<div class="col-md-12">
	<div class="row">
		@yield('breadcrumb') 
	</div>
	<div class="row">
		@foreach($groups as $categoryname=>$products)
		<a href="{{action('StoreController@getCategory', array($vendorname, $categoryname))}}"><h3>{{{$categoryname}}}</h3></a>
		<hr>
		@include('elements.prodlist')
		<a href="{{action('StoreController@getCategory', array($vendorname, $categoryname))}}"><h4 class="pull-right">...more</h4></a> 
	 	@endforeach
	</div>
</div>
@stop