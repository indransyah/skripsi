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
<h1 class="page-header" style="margin-top:0;">{{ $criteria->criteria }}'s Subcriteria Judgment</h1>
<!-- Kriteria -->
@if(count($subcriteria)<2)
<div class="alert alert-warning fade in alert-dismissable text-center">
  <strong>Subcriteria must be at least 2 subcriteria!</strong>
</div>
@else
<div class="row">
	<div class="col-lg-8">
		<div class="the-box full">
			<div class="table-responsive">
				<table class="table table-info table-hover table-th-block">
					<thead>
						<tr>
							<th>Subcriteria</th>
							<th>Judgment</th>
							<th>Subcriteria</th>
							<th style="width: 10%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 0; $i < count($subcriteria); $i++)
							@for ($j = $i+1; $j < count($subcriteria); $j++)
							<tr>
								<td>{{ $subcriteria[$i]->subcriteria }}</td>
								<td>
									<select name="{{ $subcriteria[$i]->subcriteria_id.'-'.$subcriteria[$j]->subcriteria_id }}" class="form-control">
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
								<td>{{ $subcriteria[$j]->subcriteria }}</td>
								<td class="text-center">
									<button class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right" title="Reverse the criteria" onclick="reverse()">
										<i class="glyphicon glyphicon-transfer"></i>
									</button>
								</td>
							</tr>
							@endfor
						@endfor
					</tbody>
				</table>
			</div>
			<a class="btn btn-success pull-left" href="{{ URL::to('criteria/create') }}"><i class="glyphicon glyphicon-save"></i> Save</a>
		</div>
	</div>
</div>
<script type="text/javascript">
	function reverse(){
		var a = document.getElementById("1-0").innerHTML;
		alert(a);
	}
</script>
@endif
<!-- / Kriteria -->
@stop