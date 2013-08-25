@extends('layout/main') 

@section('title')
{{{$categoryname}}}
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a></li>
		<li class='active'>{{$categoryname}}</li>
	</ul>
@stop

@section('main')
<div class="col-md-12">
	<div class="row">
		@yield('breadcrumb') 
	</div>
	<div class="row">
		<div align="center">
			{{$products->links()}}
		</div>
	</div>
	<div class="row">
	@include('elements.prodlist')
	</div>
	<div class="row">
		<div align="center">
			{{$products->links()}}
		</div>
	</div><!-- end categories -->
</div>
@stop