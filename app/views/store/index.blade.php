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
		@include('elements.shelves')
	</div>
</div>
@stop