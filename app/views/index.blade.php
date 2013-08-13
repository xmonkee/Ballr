@extends('theme.main')

@section('main')

@if(Auth::check())
	<h2>Welcome {{Auth::user()->name}} </h2>
	<br>
@else
	<h2> You are not logged in </h2>
@endif

@if(Session::has('message'))
    <span class="alert-error">{{Session::get('message')}}</span>
	<br>
@endif

<h3>

{{link_to('register','Register with us')}}
<br>
{{link_to('login', 'Login to your profile')}}
<br>
{{link_to('products/create', 'Add a product')}}
<br>
{{link_to('logout','Logout')}}
<br>
{{link_to('vendors','Vendors Panel')}}
<br>
{{link_to('admin','Admin Panel')}}
</h3>

@stop
