@extends('backend.layouts.index')
@section('content')

<ol class="breadcrumb">
	<li>{{ HTML::link('home', 'Home') }}</li>
	<li>{{ HTML::link('judgment', 'Judgment') }}</li>
	<li class="active">Subcriteria</li>
</ol>
@if (Session::has('success'))
<div class="alert alert-success square fade in alert-dismissable text-left">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{ Session::get('success') }}</strong>
</div>
@endif
<h1 class="page-header" style="margin-top:0;">Criteria</h1>
@if(count($criterias)<2)
<div class="alert alert-warning fade in alert-dismissable text-center">
  <strong>Criteria must be at least 2 criteria!</strong>
</div>
@else
<div class="row">
	<div class="col-lg-6">
		<div class="the-box full">
			<div class="table-responsive">
				<table class="table table-info table-hover table-th-block">
					<thead>
						<tr>
							<th style="width: 10%;">#</th>
							<!-- <th>ID</th> -->
							<th style="width: 70%;">Criterias</th>
							<th>Actions</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($criterias as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<td data-toggle="tooltip" data-placement="top" title="{{ $value->description }}">{{ $value->criteria }}</td>
							<!-- <td class="clickableRow" href="{{ URL::to('criteria/' . $value->criteria_id) }}" style="cursor:pointer;">{{ $value->criteria }}</td> -->
							<td>
								<a class="btn btn-default btn-sm" href="{{ URL::to('judgment/subcriteria/' . $value->criteria_id) }}" data-toggle="tooltip" data-placement="left" title="Show subcriteria judgment">
									<i class="glyphicon glyphicon-th-list"></i>
								</a>
								<!-- <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Subcriteria judgment not consistent">
									<i class="glyphicon glyphicon-remove"></i>
								</a> -->
								
							</td>
							<td>
								<a class="btn btn-success btn-sm active" data-toggle="tooltip" data-placement="right" title="Subcriteria judgment consistent">
									<i class="glyphicon glyphicon-ok"></i>
								</a>
							</td>
						</tr>
						@endforeach					
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
		</div><!-- /.the-box full -->
	</div>
</div>
@endif
@stop