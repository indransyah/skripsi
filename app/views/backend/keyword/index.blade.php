@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
	<li><a href="#fakelink">Home</a></li>
	<li class="active">Keyword</li>
</ol>
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
				<tr>
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
				</tr>
			</tbody>
		</table>
	</div><!-- /.table-responsive -->
</div><!-- /.the-box full -->
<!-- / Keyword -->

@stop