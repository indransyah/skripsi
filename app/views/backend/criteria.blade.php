@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
	<li><a href="#fakelink">Home</a></li>
	<li class="active">Kriteria</li>
</ol>
<h1 class="page-header" style="margin-top:0;">Kriteria</h1>
<!-- Kriteria -->
<div class="row">
	<div class="col-lg-6">
		<div class="the-box full">
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
			</div><!-- /.table-responsive -->
			<button class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah kriteria</button>
		</div><!-- /.the-box full -->
	</div>
</div>
<!-- / Kriteria -->
@stop