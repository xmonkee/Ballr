@extends('layout/main') 

@section('title')
Products
@stop

@section('sidebar')
<div class="breadcrumb">
	Categories 
</div>
<div class="product_list">
	<ul class="nav">
		@foreach(Category::with('products')->get() as $category)
		<li><a href="{{action('ProductsController@showCategory', $category->id)}}">{{$category->name}} ({{$category->products->count()}})</a></li>
		<hr>
		@endforeach
	</ul>
</div>
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a> <span class="divider">/</span></li>
		<li><a href="{{action('ProductsController@showCategory', $products[0]->category->id)}}">{{$products[0]->category->name}}</a></li>
	</ul>
@stop

@section('main')
<div class="row">
	<div class="span2"><!-- start categories -->
		@yield('sidebar') 
	</div>
	<div class="span10"><!-- start categories -->
			@yield('breadcrumb') 
		<div align="center">
			{{$products->links()}}
		</div>
		<ul class="thumbnails">
			@foreach($products as $product)
				<li class="span2">
					<a href="{{action('ProductsController@showProduct',$product->id)}}">
					<div class="thumbnail">
					<img alt="" src="{{asset(Config::get('ballr.thumbs').$product->image1)}}">
						<div class="caption">
							<h5>{{$product->name}}</h5>
						</div>
					</div>
				</a>
				</li>
			@endforeach
		</ul>
		<div align="center">
			{{$products->links()}}
		</div>
	</div><!-- end categories -->
</div>
@stop