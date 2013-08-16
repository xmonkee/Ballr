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
      {{ implode('', $errors->all('<li class="alert-error">:message</li>')) }}
    </ul>
  @endif


  {{ Form::open(array('url' => 'register', 'files' => true, 'class'=>'well')) }}
    <fieldset>
      <div class="span5 no_margin_left">
        <div class="control-group">
          <label for="name" class="control-label">Your Store Name</label>
          <div class="controls ">
            {{Form::input('text', 'name')}}
          </div>
        </div>
        <div class="control-group">
          <label for="description" class="control-label">Short Description</label>
          <div class="controls">
            {{Form::textarea('description', NULL,array('rows'=>2))}}
          </div>
        </div>
        <div class="control-group">
          <label for="address" class="control-label">Street Address</label>
          <div class="controls ">
            {{Form::textarea('address','',array('rows'=>3))}}
          </div>
        </div>
        <div class="control-group">
          <label for="city" class="control-label">City</label>
          <div class="controls ">
            {{Form::input('text', 'city')}}
          </div>
        </div>
        <div class="control-group">
          <label for="state" class="control-label">State</label>
          <div class="controls ">
            {{ Form::select('state',State::statelist()) }}
          </div>
        </div>
      </div>


      <div class="span5 no_margin_left">
        <div class="control-group">
          <label for="email" class="control-label">Email Address</label>
          <div class="controls">
            {{Form::input('email', 'email')}}
          </div>
        </div>
        <div class="control-group">
          <label for="password" class="control-label">Password</label>
          <div class="controls ">
            {{Form::input('password', 'password')}}
          </div>
        </div>
        <div class="control-group">
          <label for="password_confirmation" class="control-label">Re-enter Password</label>
          <div class="controls ">
            {{Form::input('password', 'password_confirmation')}}
          </div>
        </div>
        <div class="control-group">
          <label for="image" class="control-label">Image or Logo</label>
          <div class="controls ">
            {{Form::input('file', 'image')}}
          </div>
        </div>
        <div class="control-group">
          <div class="controls ">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-large')) }}
          </div>
        </div>
      </div>
    </fieldset>
  {{ Form::close() }}
@stop


