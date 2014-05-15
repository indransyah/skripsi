@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
	<li><a href="#fakelink">Home</a></li>
	<li class="active">Dashboard</li>
</ol>

<div class="alert alert-info alert-bold-border fade in alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Selamat datang Administrator!</strong> You successfully read this 
	<a href="#fakelink" class="alert-link">important alert message.</a>
</div>
@stop