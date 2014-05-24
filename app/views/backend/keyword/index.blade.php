@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
	<li>{{ HTML::link('home', 'Home') }}</li>
	<li class="active">Keyword</li>
</ol>
@if (Session::has('success'))
<div class="alert alert-success square fade in alert-dismissable text-left">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{ Session::get('success') }}</strong>
</div>
@endif
<h1 class="page-header" style="margin-top:0;">Keywords</h1>
<!-- Keyword -->
<div class="the-box full">
	<div class="table-responsive">
		<table class="table table-info table-hover table-th-block">
			<thead>
				<tr>
					<th style="width: 30px;">No</th>
					<th>Keyword</th>
					<th>Avg. Monthly Searches</th>
					<th>Competition</th>
					<th>BID</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($keywords as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->keyword }}</td>
					<td>{{ $value->search }}</td>
					<td>{{ $value->competition }}</td>
					<td>{{ $value->bid }}</td>
					<td>
						<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $value->id }}">
							<i class="glyphicon glyphicon-trash"></i>
						</a>
						<div class="modal fade" id="deleteModal-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">DELETE CONFIRMATION</h4>
									</div>
									<div class="modal-body">
										Are you sure to delete {{ $value->keyword }} from your database ?
									</div>
									<div class="modal-footer">
										{{ Form::open(array('url'=>'keyword/'.$value->id, 'method'=>'DELETE',)) }}
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
				
				<!-- <tr>
					<td>1</td>
					<td>baju muslim</td>
					<td>49500</td>
					<td>High</td>
					<td>$ 0.09</td>
					<td>
						<button type="button" class="btn btn-danger btn-sm">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>model baju muslim</td>
					<td>18100</td>
					<td>High</td>
					<td>$ 0.11</td>
					<td>
						<button type="button" class="btn btn-danger btn-sm">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>baju muslim terbaru</td>
					<td>14800</td>
					<td>High</td>
					<td>$ 0.08</td>
					<td>
						<button type="button" class="btn btn-danger btn-sm">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>baju muslim wanita gemuk</td>
					<td>110</td>
					<td>High</td>
					<td>$ 0.09</td>
					<td>
						<button type="button" class="btn btn-danger btn-sm">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td>baju muslim modis</td>
					<td>1600</td>
					<td>High</td>
					<td>$ 0.07</td>
					<td>
						<button type="button" class="btn btn-danger btn-sm">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
					</td>
				</tr> -->
			</tbody>
		</table>
	</div><!-- /.table-responsive -->
	<a class="btn btn-success pull-left" href="{{ URL::to('keyword/create') }}"><i class="glyphicon glyphicon-plus"></i> Import</a>
</div><!-- /.the-box full -->
<!-- / Keyword -->

@stop