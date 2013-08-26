@extends('layout/main') 

@section('title')
Welcome to {{Ballr::get('name')}}
@stop

@section('main')

<div class="col-md-12">
	<div class="row">
		@include('elements.shelves')
	</div>
</div>
@stop