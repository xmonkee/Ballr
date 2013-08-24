@extends('layout/main') 

@section('title')
$category->name
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a></li>
		<li><a href="{{url('category', $categoryname)}}">{{$categoryname}}</a></li>
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
	@include('elements.prodlist')
	<div class="row">
		<div align="center">
			{{$products->links()}}
		</div>
	</div><!-- end categories -->
</div>
@stop