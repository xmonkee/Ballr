@extends('theme.main')

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
            'class' => 'form-horizontal'))}}
   <fieldset>
   <div class="span6 no_margin_left">
       <legend>{{$vendor->email}}</legend>

        <div class="control-group">
            <label for="name" class="control-label">Name</label>
            <div class="controls docs-input-sizes">
              <input type="text" name="name" class="span4" value="{{Auth::user()->name}}">  
            </div>
       </div>
        <div class="control-group">
            <label for="address" class="control-label">Street Address</label>
            <div class="controls docs-input-sizes">
              <input type="textarea" name="address" class="span4" value="{{Auth::user()->address}}" rows="4">  
            </div>
       </div>
        <div class="control-group">
            <label for="city" class="control-label">City</label>
            <div class="controls docs-input-sizes">
              <input type="text" name="city" class="span4" value="{{Auth::user()->city}}" >  
            </div>
       </div>
        <div class="control-group">
            <label for="state" class="control-label">State</label>
            <div class="controls docs-input-sizes">
            {{ Form::select('state',State::statelist())}}
            </div>
        </div>
   </div>

   <div class="span6 no_margin_right">
       <legend>Image</legend>
            <img src = "{{asset(Config::get('ballr.thumbs').Auth::user()->image)}}" \><br \>
            <small> choose to change </small><br />
             {{ Form::file('image') }}
        <div class="control-group">
            {{ Form::submit('Update', array('class' => 'btn btn-primary btn-large')) }}
            {{ link_to('vendors', 'Cancel', array( 'class' => 'btn btn-info btn-large')) }}
        </div>
    </div>
{{ Form::close() }}


@stop