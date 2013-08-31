@extends('layout.main')

@section('title')
	Welcome {{$vendor->name}}
@stop

@section('main')
@if(Session::has('message'))
    <span class="alert-error">{{Session::get('message')}}</span>
	<br>
@endif
<div class="col-md-6">
<img src = "{{Ballr::getThumb(Auth::user()->image)}}" \><br \>
</div>

<div class="col-md-6">

<h3>{{link_to('/', 'Site Home')}} </h3>
<h3>{{link_to('vendors/edit', 'Edit your profile')}}</h3>
<h3>{{link_to('manage', 'manage products')}}</h3>
<h3>{{link_to('logout', 'Logout')}} </h3>
<h3>{{link_to_action('StoreController@getIndex', 'Store Front', array($vendor->name))}}
</div>
@stop