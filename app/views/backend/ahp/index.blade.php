@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
	<li>{{ HTML::link('home', 'Home') }}</li>
	<li class="active">AHP</li>
</ol>
<h1 class="page-header" style="margin-top:0;">AHP</h1>
<!-- AHP -->
<div class="the-box full">
	<div class="table-responsive">
		<table class="table table-info table-th-block">
			<thead>
				<tr class="info">
					<td style="width: 15%; font-weight: bold;">Criterias</td>
					<td>Word</td>
					<td>Search</td>
					<td>Competition</td>
					<td>BID</td>
					<!-- <th style="width: 15%;"></th>
					<th>Word</th>
					<th>Search</th>
					<th>Competition</th>
					<th>BID</th> -->
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="info">Word</td>
					<td>baju muslim</td>
					<td>49500</td>
					<td>High</td>
					<td>$ 0.09</td>
				</tr>
				<tr>
					<td class="info">Search</td>
					<td>baju muslim</td>
					<td>49500</td>
					<td>High</td>
					<td>$ 0.09</td>
				</tr>
				<tr>
					<td class="info">Competition</td>
					<td>baju muslim</td>
					<td>49500</td>
					<td>High</td>
					<td>$ 0.09</td>
				</tr>
				<tr>
					<td class="info">BID</td>
					<td>baju muslim</td>
					<td>49500</td>
					<td>High</td>
					<td>$ 0.09</td>
				</tr>
			</tbody>
		</table>
	</div><!-- /.table-responsive -->
	<a class="btn btn-success pull-left" href="{{ URL::to('keyword/create') }}"><i class="glyphicon glyphicon-plus"></i> Import</a>
</div><!-- /.the-box full -->
<!-- /AHP -->
@stop