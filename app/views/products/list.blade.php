@extends('layout/main') -->

@section('title')
Products
@stop

@section('sidebar')
<div class="breadcrumb">
	Categories 
</div>
<div class="product_list">
	<ul class="nav">
		@foreach(Category::all() as $category)
		<li><a class="active" href="/categories/{{$category->id}}">{{$category->name}}</a></li>
		<hr>
		@endforeach
	</ul>
</div>
@stop

@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="/">Home</a> <span class="divider">/</span></li>
		<li><a class="disabled" href="/categories">Account</a> <span class="divider">/</span></li>
		<li class="active"><a href="/">Register</a></li>
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
					<div class="thumbnail">
						<a href="{{asset(Config::get('ballr.images').$product->image1)}}"><img alt="" src="{{asset(Config::get('ballr.thumbs').$product->image1)}}"></a>
						<div class="caption">
							<a href="{{asset(Config::get('ballr.images').$product->image1)}}"><h5>{{$product->name}}</h5></a>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
		<div align="center">
			{{$products->links()}}
		</div>
	</div><!-- end categories -->
</div>
@stop