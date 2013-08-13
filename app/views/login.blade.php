@extends('theme.main')

@section('title')
Login to manage your products
@stop

@section('main')
@if(Session::has('message'))
    <h3>	<span class="alert-error">{{Session::get('message')}}</span>	</h3>
	<br>
@endif
{{Form::open(array('url'=>'login'))}}
{{Form::label('email','Email')}}
{{Form::email('email')}}
<br>
{{Form::label('password','Password')}}
{{Form::password('password')}}
<br>
{{Form::label('isRemember','Keep me logged in')}}
{{Form::checkbox('isRemember', 'Remember me',true)}}
<br>
{{Form::submit('Login', array('class' => 'btn btn-primary btn-large'))}}
@stop
