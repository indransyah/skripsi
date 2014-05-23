@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
  <li>{{ HTML::link('home', 'Home') }}</li>
  <li>{{ HTML::link('criteria', 'Criteria') }}</li>
  <li class="active">Edit</li>
</ol>
@if (Session::has('error'))
<div class="alert alert-danger square fade in alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>{{ Session::get('error') }}</strong>
  {{ HTML::ul($errors->all()) }}
</div>
@endif
<h1 class="page-header" style="margin-top:0;">Edit Criteria</h1>
<!-- Kriteria -->
<div class="row">
  <div class="col-lg-6">
  {{ Form::model($criteria, array('url' => 'criteria/'.$criteria->id, 'method' => 'PUT', 'class'=>'form-horizontal')) }}
  <!-- {{ Form::open(array('url'=>'criteria/'.$criteria->id, 'class'=>'form-horizontal', 'method'=>'PUT')) }} -->
  <div class="form-group">
        <label for="criteria" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
           {{ Form::text('criteria', null, array('class'=>'form-control', 'required'=>'true')) }}
          <!-- <input type="text" class="form-control" id="criteria" placeholder="Criteria's Name"> -->
        </div>
      </div>
      <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
          {{ Form::textarea('description', null, array('class'=>'form-control', 'required'=>'true')) }}
          <!-- <textarea class="form-control" rows="3" id="description" placeholder="Description"></textarea> -->
        </div>
      </div>
      <!-- <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember me
            </label>
          </div>
        </div>
      </div> -->
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Edit</button>
        </div>
      </div>
  {{ Form::close() }}
  </div>
</div>
<!-- / Kriteria -->
@stop