@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
  <li>{{ HTML::link('home', 'Home') }}</li>
  <li>{{ HTML::link('criteria', 'Criteria') }}</li>
  <li class="active">Add</li>
</ol>
@if (Session::has('error'))
<div class="alert alert-danger square fade in alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>{{ Session::get('error') }}</strong>
  {{ HTML::ul($errors->all()) }}
</div>
@endif
<h1 class="page-header" style="margin-top:0;">Add Criteria</h1>
<!-- Kriteria -->
<div class="row">
  <div class="col-lg-6">
    {{ Form::open(array('url'=>'criteria', 'class'=>'form-horizontal')) }}
    <!-- <form class="form-horizontal" role="form"> -->
      <div class="form-group">
        <label for="criteria" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
           {{ Form::text('criteria', null, array('class'=>'form-control', 'placeholder'=>'Criteria\'s name', 'required'=>'true')) }}
          <!-- <input type="text" class="form-control" id="criteria" placeholder="Criteria's Name"> -->
        </div>
      </div>
      <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
          {{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Description', 'required'=>'true')) }}
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
          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add</button>
        </div>
      </div>
    <!-- </form> -->
    {{ Form::close() }}
    <!-- <div class="the-box full">
      <div class="table-responsive">
        <table class="table table-info table-hover table-th-block">
          <thead>
            <tr>
              <th>#</th>
              <th>ID</th>
              <th>Kriteria</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>C01</td>
              <td>Jumlah kata</td>
              <td>
                <button type="button" class="btn btn-info btn-sm">
                  <i class="glyphicon glyphicon-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>C02</td>
              <td>Pencarian per bulan</td>
              <td>
                <button type="button" class="btn btn-info btn-sm">
                  <i class="glyphicon glyphicon-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>C03</td>
              <td>Persaingan</td>
              <td>
                <button type="button" class="btn btn-info btn-sm">
                  <i class="glyphicon glyphicon-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>C04</td>
              <td>Harga</td>
              <td>
                <button type="button" class="btn btn-info btn-sm">
                  <i class="glyphicon glyphicon-pencil"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                  <i class="glyphicon glyphicon-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <button class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah kriteria</button>
    </div> --><!-- /.the-box full -->
  </div>
</div>
<!-- / Kriteria -->
@stop