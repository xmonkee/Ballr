@extends('layout.main')

@section('title')
Create an Account
@stop


@section('main')

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="alert-error">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('url' => 'register', 'files' => true, 'class'=>'form-horizontal')) }}
   <fieldset>
   <div class="span6 no_margin_left">
       <legend>Your Personal Details</legend>

        @foreach(Vendor::$bizElements as $e)
        <div class="control-group">
            <label for="{{$e['name']}}" class="control-label">{{$e['label']}}</label>
            <div class="controls docs-input-sizes">
              <input type="{{$e['type']}}" name="{{$e['name']}}" class="span4">  
            </div>
       </div>
      
        @endforeach

        <div class="control-group">
            <label for="state" class="control-label">State</label>
            <div class="controls docs-input-sizes">
            {{ Form::select('state',State::statelist()) }}
            </div>
        </div>
    </div>


   <div class="span6 no_margin_left">
       <legend>Your Login Details</legend>

        @foreach(Vendor::$loginElements as $e)

        <div class="control-group">
            <label for="{{$e['name']}}" class="control-label">{{$e['label']}}</label>
            <div class="controls docs-input-sizes">
              <input type="{{$e['type']}}" name="{{$e['name']}}" class="span4">  
            </div>
       </div>
      
        @endforeach

         <div class="control-group">
            <div class="controls docs-input-sizes">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-large pull-right')) }}
            </div>
        </div>
    </div>




{{ Form::close() }}
@stop


