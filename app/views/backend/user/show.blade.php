@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
	<li><a href="#fakelink">Home</a></li>
	<li class="active">User</li>
</ol>
<h1 class="page-header" style="margin-top:0;">Users</h1>
<!-- Keyword -->
<div class="the-box full">
	<div class="table-responsive">
		<table class="table table-info table-hover table-th-block">
			<thead>
				<tr>
					<th style="width: 30px;">#</th>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Username</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@for ($i = 1; $i <= 5; $i++)
    			<tr>
					<td>{{ $i }}</td>
					<td>U{{ $i }}</td>
					<td>Name {{ $i }}</td>
					<td>email{{ $i }}@gmail.com</td>
					<td>Username {{ $i }}</td>
					<td>
						<button type="button" class="btn btn-danger btn-sm">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
					</td>
				</tr>
				@endfor
				
			</tbody>
		</table>
	</div><!-- /.table-responsive -->
</div><!-- /.the-box full -->
<!-- / Keyword -->

@stop