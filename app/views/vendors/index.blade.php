@extends('layout.main')

@section('title')
	Welcome {{$vendor->name}}
@stop

@section('main')
@if(Session::has('message'))
    <span class="alert-error">{{Session::get('message')}}</span>
	<br>
@endif
<div class="span3">
<img src = "{{Ballr::getThumb(Auth::user()->image)}}" \><br \>
</div>
<h3>

{{link_to('/', 'Site Home')}} 
<br>
{{link_to('vendors/edit', 'Edit your profile')}}
<br>
{{link_to('manage', 'manage products')}}
<br>
<br>
{{link_to('logout', 'Logout')}} 
<br>

</h3>
@stop