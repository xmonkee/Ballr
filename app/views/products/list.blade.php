@extends('layout/main') 

@section('title')
Products
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a></li>
		<li><a href="{{action('ProductsController@showCategory', $products[0]->category->id)}}">{{$products[0]->category->name}}</a></li>
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
		<div align="center">
		<ul class="product-list">
		@foreach($products as $product)
		<li>
		  	<a href="{{action('ProductsController@showProduct', $product->id)}}">
			    <img class="img-responsive" src="{{Ballr::getThumb($product->image1)}}" alt="...">
			</a>
	      <p>{{$product->name}}</p>
	      <p><em><b>&#8377 {{$product->price}}</b></em></p>
		</li>
		@endforeach
		</ul>
	</div>
	</div>
	<div class="row">
		<div align="center">
			{{$products->links()}}
		</div>
	</div><!-- end categories -->
</div>
@stop