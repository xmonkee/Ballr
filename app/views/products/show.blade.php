@extends('layout.main')

@section('title')
{{$product->name}}
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
		<li><a href="{{action('ProductsController@showCategory', $product->category->id)}}">{{$product->category->name}}</a><span class="divider">/</span></li>
		<li class="active"><a href="#">{{$product->name}}</a></li>
	</ul>
@stop

@section('main')
<div class="row">
	<div class="span2">
		@yield('sidebar') 
	</div>

	<div class="span10">

		@yield('breadcrumb') 
		
		<h1>{{$product->name}}</h1>
	 <hr>
		<ul class="thumbnails">
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
		</ul>
	</div><!-- end categories -->
</div>
@stop