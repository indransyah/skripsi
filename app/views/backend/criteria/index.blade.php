@extends('backend.layouts.index')
@section('content')

<ol class="breadcrumb">
	<li>{{ HTML::link('home', 'Home') }}</li>
	<li class="active">Criteria</li>
</ol>
@if (Session::has('success'))
<div class="alert alert-success square fade in alert-dismissable text-left">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{ Session::get('success') }}</strong>
</div>
@endif
<h1 class="page-header" style="margin-top:0;">Criterias</h1>
<!-- Kriteria -->
<div class="row">
	<div class="col-lg-6">
		<div class="the-box full">
			<div class="table-responsive">
				<table class="table table-info table-hover table-th-block">
					<thead>
						<tr>
							<th style="width: 10%;">#</th>
							<!-- <th>ID</th> -->
							<th style="width: 65%;">Criterias</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($criterias as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<!-- <td>{{ $value->criteria_id }}</td> -->
							<!-- <td class="clickableRow" href="{{ URL::to('criteria/' . $value->criteria_id) }}" style="cursor:pointer;">{{ $value->criteria }}</td> -->
							<td data-toggle="tooltip" data-placement="top" title="{{ $value->description }}">{{ $value->criteria }}</td>
							<td>
								<a class="btn btn-default btn-sm" href="{{ URL::to('criteria/' . $value->criteria_id) }}" data-toggle="tooltip" data-placement="left" title="Show subcriterias">
									<i class="glyphicon glyphicon-indent-left"></i>
								</a>
								<a class="btn btn-info btn-sm" href="{{ URL::to('criteria/' . $value->criteria_id. '/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit criteria">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $value->criteria_id }}" data-toggle="tooltip" data-placement="right" title="Delete criteria">
									<i class="glyphicon glyphicon-trash"></i>
								</a>
								<div class="modal fade" id="deleteModal-{{ $value->criteria_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">DELETE CONFIRMATION</h4>
											</div>
											<div class="modal-body">
												Are you sure to delete {{ $value->criteria }} from your database ?
											</div>
											<div class="modal-footer">
												{{ Form::open(array('url'=>'criteria/'.$value->criteria_id, 'method'=>'DELETE',)) }}
												<button type="submit" class="btn btn-danger">Delete
												</button>
												{{ Form::close() }}
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
						@endforeach					
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			<a class="btn btn-success pull-left" href="{{ URL::to('criteria/create') }}"><i class="glyphicon glyphicon-plus"></i> Add</a>
		</div><!-- /.the-box full -->
	</div>
</div>
<!-- / Kriteria -->
@stop