@extends('layout.main')

@section('title')
Login to manage your products
@stop

@section('main')
@if(Session::has('message'))
    <h3>	<span class="alert-error">{{Session::get('message')}}</span>	</h3>
	<br>
@endif
{{Form::open(array('url'=>'login', 'class'=>'well'))}}
<fieldset>
	<div class="control-group">
		{{Form::label('email','Email ',array("class"=>"control-label"))}}
		<div class="control">
			{{Form::email('email')}}
		</div>
	</div>
	<div class="control-group">
		{{Form::label('password','Passwrod ',array("class"=>"control-label"))}}
		<div class="control">
			{{Form::password('password')}}
		</div>
	</div>
	<div class="control-group">
		{{Form::label('isRemember','Keep me logged in ',array("class"=>"control-label"))}}
		<div class="control">
			{{Form::checkbox('isRemember','Remember me', true)}}
		</div>
	</div>
</fieldset>
{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
{{Form::close()}}
@stop
