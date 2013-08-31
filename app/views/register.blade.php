@extends('layout.main')

@section('title')
Create an Account
@stop


@section('main')
  <div class="breadcrumb">
    Register your Store 
  </div>
  @if ($errors->any())
    <ul>
      {{ implode('', $errors->all('<li class="text-danger">:message</li>')) }}
    </ul>
  @endif

  <div class="col-lg-12 well">
    <div class="row">
    {{ Form::open(array('url' => 'register', 'files' => true, 'role'=>'form')) }}
      <div class="col-lg-6">
        <div class="form-group">
          <label for="name">Your Store Name</label>
          {{Form::input('text', 'name',NULL,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          <label for="description">Short Description</label>
            {{Form::textarea('description', NULL, array('rows'=>2, 'class'=>'form-control'))}}
        </div>
        <div class="form-group">
          <label for="address" class="form-label">Street Address</label>
            {{Form::textarea('address','',array('rows'=>3,'class'=>'form-control'))}}
        </div>
        <div class="form-group">
          <label for="city" class="form-label">City</label>
            {{Form::input('text', 'city',NULL,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          <label for="state" class="form-label">State</label>
            {{ Form::select('state',$states,NULL,array('class'=>'form-control')) }}
        </div>
      </div>


      <div class="col-lg-6">
        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
            {{Form::input('email', 'email',NULL,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
            {{Form::input('password', 'password',NULL,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          <label for="password_confirmation" class="form-label">Re-enter Password</label>
            {{Form::input('password', 'password_confirmation',NULL,array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          <label for="image" class="form-label">Image or Logo</label>
            {{Form::input('file', 'image',NULL)}}
        </div>
        <div class="form-group">
            {{ Form::submit('Submit', array('class' => 'pull-right btn btn-primary btn-large')) }}
        </div>
      </div>
    {{ Form::close() }}


  </div>
</div>
@stop


