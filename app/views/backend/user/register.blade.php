<!DOCTYPE html>
<html lang="en">
<head>
  @include('backend.layouts.meta')
  <title>Register - Keyword Planner</title>
  {{ HTML::style('assets/css/register.css') }}
</head>
<body>
  <div class="container text-center">
  {{ Form::open(array('url'=>'user/register', 'class'=>'form-horizontal form-signin')) }}
    <!-- <form class="form-horizontal form-signin" role="form"> -->
      <h1 style="margin-bottom: 20px;">Register</h1>
      @if (Session::has('message'))
        <div class="alert alert-danger square fade in alert-dismissable text-left">
          {{ Session::get('message') }}
          {{ HTML::ul($errors->all()) }}
          
        </div>
      @endif
      <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-9">
          {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name', 'required'=>'true')) }}
          <!-- <input type="name" class="form-control" name="name" value="" required> -->
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
          {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'required'=>'true')) }}
          <!-- <input type="email" class="form-control" name="email" value="" required> -->
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-9">
          {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username', 'required'=>'true')) }}
          <!-- <input type="text" class="form-control" name="username" value="" required> -->
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
          {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'required'=>'true')) }}
          <!-- <input type="password" class="form-control" name="password" required> -->
        </div>
      </div>
      <div class="form-group">
        <label for="password_confirmation" class="col-sm-3 control-label">Confirm Password</label>
        <div class="col-sm-9">
          {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Password Confirmation', 'required'=>'true')) }}
          <!-- <input type="password" class="form-control" name="password_confirmation" required> -->
        </div>
      </div>
      <br />
      <button type="submit" class="btn btn-info btn-block btn-lg"></i> Register</button>
      <br />
      A Member? {{ HTML::link('user/login', 'Login here!') }}
    {{ Form::close() }}
  </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
  </html>