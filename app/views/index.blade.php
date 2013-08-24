@extends('layout/main') 

@section('title')
Home
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a></li>
	</ul>
@stop

@section('main')
<div class="col-md-12">

	<div class="row">
		@yield('breadcrumb') 
	</div>

	<div class="row">
		@foreach($groups as $categoryname=>$products)
		<a href="{{url('category', $categoryname)}}"><h3>{{{$categoryname}}}</h3></a>
		<hr>
		@include('elements.prodlist')
		<a href="{{url('category', $categoryname)}}"><h4 class="pull-right">...more</h4></a> 
	 	@endforeach
	</div>
</div>
@stop