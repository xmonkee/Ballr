@extends('layout.main')

@section('title')
Login to manage your products
@stop

@section('main')
  <div class="breadcrumb">
    Login to your store 
  </div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-lg-offset-4 col-md-offset-4 col-sm-offset-3">
	{{Form::open(array('url'=>'login', 'class'=>'well'))}}
	<div class="form-group">
		{{Form::label('email','Email ',array("class"=>"form-label"))}}
		{{Form::email('email', NULL, array('class'=>'form-control'))}}
	</div>
	<div class="form-group">
		{{Form::label('password','Passwrod ',array("class"=>"form-label"))}}
		<input class="form-control" name="password" type="password">
	</div>
	<div class="checkbox">
		<label>
		{{Form::checkbox('isRemember','Remember me', true, array('class'=>'form-control'))}}
		Remember me 
		</label>
	</div>
{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
{{Form::close()}}
	</div>
@stop
