@extends('layout.main')

@section('main')

<div class="breadcrumb">
@if(Auth::check())
	Welcome {{Auth::user()->name}} 
@else
	You are not logged in
@endif
</div>

@if(Session::has('message'))
    <span class="alert-error">{{Session::get('message')}}</span>
	<br>
@endif

<h3>

{{link_to('register','Register with us')}}
<br>
{{link_to('login', 'Login to your profile')}}
<br>
{{link_to('products', 'View Products')}}
<br>
{{link_to('logout','Logout')}}
<br>
{{link_to('vendors','Vendors Panel')}}
<br>
{{link_to('admin','Admin Panel')}}
</h3>

@stop
