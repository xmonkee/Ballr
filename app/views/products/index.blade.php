@extends('layout/main') 

@section('title')
Products
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a></li>
		<li><a href="{{action('ProductsController@getIndex')}}">Products</a></li>
	</ul>
@stop

@section('main')
<div class="col-md-12">
	<div class="row">
		@yield('breadcrumb') 
	</div>
	@foreach($groups as $group)
	<a href="{{action('ProductsController@showCategory', $group['category']->name)}}"><h3>{{$group['category']->name}}</h3></a>
	<hr>
	<?php $products=$group['products'] ?>
	@include('products.prodlist')
	<a href="{{action('ProductsController@showCategory', $group['category']->name)}}"><h4 class="pull-right">...more</h4></a> 
 	@endforeach
</div>
@stop