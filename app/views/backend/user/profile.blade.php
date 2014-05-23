@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
  <li>
    {{ HTML::link('home', 'Home') }}
  </li>
  <li>
    {{ HTML::link('user', 'User') }}
  </li>
  <li class="active">Profile</li>
</ol>
<h1 class="page-header" style="margin-top:0;">Profile</h1>
<div class="row">
  <div class="col-lg-6">
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" value="{{ Auth::user()->name; }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="{{ Auth::user()->email; }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" disabled="true" value="{{ Auth::user()->username; }}">
        </div>
      </div>
      <!-- <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="password">
        </div>
      </div> -->
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
          <a class="pull-right">Change your password?</a>
        </div>
      </div>
    </form>
  </div>
</div>
@stop