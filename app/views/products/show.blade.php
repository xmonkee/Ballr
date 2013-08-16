@extends('layout.main')

@section('title')
$product->name
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
@section('')