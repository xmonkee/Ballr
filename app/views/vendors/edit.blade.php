@extends('layout.main')

@section('title')
Edit your Account
@stop

@section('main')

@if ($errors->any())
       <span class='alert-error'> {{ implode('', $errors->all()) }} </span>
       <br>
@endif

{{Form::model($vendor, array(
            'url' => array('vendors/edit'),
            'files' => 'true',  
            'class' => 'form-horizontal well'))}}
   <fieldset>
   <div class="span5 no_margin_left">
       <div class="breadcrumb">{{$vendor->email}}</div>

        <div class="control-group">
            <label for="name" class="control-label">Name</label>
            <div class="controls">
              {{Form::input('text', 'name')}}
            </div>
       </div>
        <div class="control-group">
            <label for="description" class="control-label">Description</label>
            <div class="controls">
              {{Form::textarea('description',NULL,array('rows'=>3))}}
            </div>
       </div>
        <div class="control-group">
            <label for="address" class="control-label">Street Address</label>
            <div class="controls">
              {{Form::textarea('address',NULL,array('rows'=>3))}}
            </div>
       </div>
        <div class="control-group">
            <label for="city" class="control-label">City</label>
            <div class="controls">
              {{Form::input('text', 'city')}}
            </div>
       </div>
        <div class="control-group">
            <label for="state" class="control-label">State</label>
            <div class="controls">
            {{ Form::select('state',State::statelist())}}
            </div>
        </div>
   </div>

   <div class="span5 no_margin_right">
       <div class="breadcrumb">Image</div>
            <img src = "{{asset(Config::get('ballr.thumbs').Auth::user()->image)}}" \><br \>
            <small> Choose a new image to change logo </small><br />
             {{ Form::file('image') }}
        <div class="control-group">
            {{ Form::submit('Update', array('class' => 'btn btn-primary btn-large')) }}
            {{ link_to('vendors', 'Cancel', array( 'class' => 'btn btn-info btn-large')) }}
        </div>
    </div>
{{ Form::close() }}


@stop