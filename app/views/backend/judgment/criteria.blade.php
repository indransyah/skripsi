@extends('backend.layouts.index')
@section('content')

<ol class="breadcrumb">
	<li>{{ HTML::link('home', 'Home') }}</li>
	<li>{{ HTML::link('judgment', 'Judgment') }}</li>
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
							<th>Criteria</th>
							<th>Jugdment</th>
							<th>Criteria</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 0; $i < count($criterias); $i++)
							@for ($j = $i+1; $j < count($criterias); $j++)
							<tr>
								<td>{{ $criterias[$i]->criteria }}</td>
								<td>
									<select class="form-control">
										<option value="1">1. Sama penting dengan</option>
										<option value="2">2. Mendekati sedikit lebih penting dari</option>
										<option value="3">3. Sedikit lebih penting dari</option>
										<option value="4">4. Mendekati lebih penting dari</option>
										<option value="5">5. Lebih penting dari</option>
										<option value="6">6. Mendekati sangat penting dari</option>
										<option value="7">7. Sangat penting dari</option>
										<option value="8">8. Mendekati mutlak dari</option>
										<option value="9">9. Mutlak sangat penting dari</option>
									</select>
								</td>
								<td>{{ $criterias[$j]->criteria }}</td>
							</tr>
							@endfor
						@endfor
					</tbody>
				</table>
			</div>
			<a class="btn btn-success pull-left" href="{{ URL::to('criteria/create') }}"><i class="glyphicon glyphicon-plus"></i> Add</a>
		</div>
	</div>
</div>
<!-- / Kriteria -->
@stop