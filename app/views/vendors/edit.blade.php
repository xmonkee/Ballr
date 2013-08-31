@extends('layout.main')

@section('title')
Edit your Account
@stop

@section('main')

  <div class="breadcrumb">
    Edit your account
  </div>
  @if ($errors->any())
    <ul>
      {{ implode('', $errors->all('<li class="text-danger">:message</li>')) }}
    </ul>
  @endif

  <div class="col-lg-12 well">
    <div class="row">
{{Form::model($vendor, array(
            'url' => array('vendors/edit'),
            'files' => 'true',  
            'role' => 'form'))}}
   <div class="col-lg-6">
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
              {{Form::input('text', 'name',NULL, array('class'=>'form-control'))}}
       </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
              {{Form::textarea('description',NULL,array('rows'=>3,'class'=>'form-control'))}}
       </div>
        <div class="form-group">
            <label for="address" class="form-label">Street Address</label>
              {{Form::textarea('address',NULL,array('rows'=>3,'class'=>'form-control'))}}
       </div>
        <div class="form-group">
            <label for="city" class="form-label">City</label>
              {{Form::input('text', 'city',NULL, array('class'=>'form-control'))}}
       </div>
        <div class="form-group">
            <label for="state" class="form-label">State</label>
            {{ Form::select('state',DB::table('states')->orderBy('state')->lists('state', 'id'),NULL, array('class'=>'form-control'))}}
        </div>
   </div>

   <div class="col-lg-6">
        <div class="form-group">
          <label for="image" class="form-label">
            Logo
            <img class="img-responsive" src = "{{asset(Config::get('ballr.thumbs').Auth::user()->image)}}" \><br \>
            <small> Choose a new image to change logo </small><br />
          </label>
             {{ Form::file('image',NULL, array('class'=>'form-control')) }}
        </div>
            {{ Form::submit('Update', array('class' => 'btn btn-primary btn-large')) }}
            {{ link_to('vendors', 'Cancel', array( 'class' => 'btn btn-info btn-large')) }}
    </div>
{{ Form::close() }}

  </div>
</div>

@stop