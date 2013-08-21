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
		@foreach($products as $product)
		<div class="col-sm-4 col-md-3">
		  	<a href="{{action('ProductsController@showProduct', $product->id)}}">
				<div class="thumbnail">
				    <img src="{{Ballr::getThumb($product->image1)}}" alt="...">
				    <div class="caption">
				      <h4>{{$product->name}}</h4>
				      <p>{{$product->description}}</p>
				    </div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
	<div class="row">
		<div align="center">
			{{$products->links()}}
		</div>
	</div><!-- end categories -->
</div>
@stop