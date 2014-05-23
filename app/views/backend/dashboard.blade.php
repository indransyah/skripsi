@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
	<li><a href="#fakelink">Home</a></li>
	<li class="active">Dashboard</li>
</ol>
@if(Session::has('message'))
<div class="alert alert-info alert-bold-border fade in alert-dismissable">
            <!-- <strong>Oh snap!</strong> Change a few things up and 
            <a href="#" class="alert-link">try submitting again.</a> -->
            <strong>Welcome {{ Auth::user()->username; }}!</strong>
            {{ Session::get('message') }}
</div>
@endif<!-- 
<div class="alert alert-info alert-bold-border fade in alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Selamat datang Administrator!</strong> You successfully read this 
	<a href="#fakelink" class="alert-link">important alert message.</a>
</div> -->
@stop