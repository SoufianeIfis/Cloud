@extends('app')

@section('content')
@if (Auth::guest())
<div class="container-fluid">
<div class="panel panel-default"
<div class="panel-heading">
    <div class="panel-body">
      <center><p>You need to be registered to view this page.<a href="/auth/login"> Click here to login.</a></p></center>
    </div>
  </div>
  </div>
  @else
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Cloud Wac Contact Page</h1>

        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>

        {!! Form::open(array('route' => 'contact', 'class' => 'form')) !!}

        <div class="form-group">
          {!! Form::label('Your Name') !!}
          {!! Form::text('name', null, array('required',  'class'=>'form-control', 'placeholder'=>'Your name')) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Your E-mail Address') !!}
          {!! Form::text('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your e-mail address')) !!}
        </div>

        <div class="form-group">
          {!! Form::label('Your Message') !!}
          {!! Form::textarea('message', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your message')) !!}
        </div>

        <div class="form-group">
          {!! Form::submit('Contact Us !', array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  @endif
  @endsection