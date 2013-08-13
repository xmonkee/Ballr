@extends('layout.main')
@section('title')
	Welcome {{$vendor->name}}
@stop

@section('main')
@if(Session::has('message'))
    <span class="alert-error">{{Session::get('message')}}</span>
	<br>
@endif
    <img src = "{{asset(Config::get('ballr.thumbs').Auth::user()->image)}}" \><br \>

<h3>

{{link_to('/', 'Site Home')}} 
<br>
{{link_to('vendors/edit', 'Edit your profile')}}
<br>
<br>
{{link_to('logout', 'Logout')}} 
<br>

</h3>
@stop