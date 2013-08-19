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

	<div class="span10"> <!-- Title -->
		@yield('breadcrumb') 
		<h1>@yield('title')</h1>
		<hr>
		<div class="row">

			<div class="span4"> <!-- Main Image -->
				<a id="main-image" href="{{asset(Ballr::getImage($product->image1))}}">
					<img alt="" src="{{asset(Ballr::getImage($product->image1))}}" />
				</a>
			</div>

			<div class="span1"> <!-- thumbnails -->
				@foreach(array('image1','image2','image3') as $imagekey)
				@if($product->$imagekey)	
					<a href="{{asset(Ballr::getImage($product->$imagekey))}}" class="thumbnail image-loader">
						<img src="{{Ballr::getThumb($product->$imagekey)}}" alt="">
					</a>
				@endif
				@endforeach
			</div>

			<div class="span5"> <!-- Description -->
				
				{{$product->description}}
				<br> 
			</div>		

		</div>	 
	</div>
</div><!-- end categories -->
@stop