@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
  <li>{{ HTML::link('home', 'Home') }}</li>
  <li>{{ HTML::link('subcriteria', 'Subcriteria') }}</li>
  <li class="active">Add</li>
</ol>
@if (Session::has('error'))
<div class="alert alert-danger square fade in alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>{{ Session::get('error') }}</strong>
  {{ HTML::ul($errors->all()) }}
</div>
@endif
<h1 class="page-header" style="margin-top:0;">Add Subcriteria</h1>
<div class="row">
  <div class="col-lg-6">
    {{ Form::open(array('url'=>'subcriteria/create/'.$id, 'class'=>'form-horizontal')) }}
    <!-- {{ Form::hidden('criteria_id', $id); }} -->
      <div class="form-group">
        <label for="criteria" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
           {{ Form::text('subcriteria', null, array('class'=>'form-control', 'placeholder'=>'Subcriteria\'s name', 'required'=>'true')) }}
        </div>
      </div>
      <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
          {{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Description', 'required'=>'true')) }}
        </div>
      </div>
      <div class="form-group">
        <label for="field" class="col-sm-2 control-label">Field</label>
        <div class="col-sm-10">
           {{ Form::select('field', array('group'=>'Group', 'keyword'=>'Keyword', 'currency'=>'Currency', 'search'=>'Search', 'competition'=>'Competition', 'bid'=>'BID', 'impression'=>'Impression', 'account'=>'Account', 'plan'=>'Plan', 'extract'=>'Extract'), null, array('class'=>'form-control','required'=>'true')) }}
        </div>
      </div>
      <div class="form-group">
        <label for="criteria" class="col-sm-2 control-label">Filter</label>
        <div class="col-sm-10">
           {{ Form::text('filter', null, array('class'=>'form-control', 'placeholder'=>'Filter')) }}
        </div>
      </div>
      <div class="form-group">
        <label for="criteria" class="col-sm-2 control-label">Conditional</label>
        <div class="col-sm-10">
           {{ Form::text('conditional', null, array('class'=>'form-control', 'placeholder'=>'Conditional', 'required'=>'true')) }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add</button>
        </div>
      </div>
    {{ Form::close() }}
  </div>
</div>
@stop