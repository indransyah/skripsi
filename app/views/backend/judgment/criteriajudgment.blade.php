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
<h1 class="page-header" style="margin-top:0;">Criteria Judgments</h1>
<!-- Kriteria -->
@if(count($criterias)<2)
<div class="alert alert-info alert-bold-border fade in alert-dismissable text-center">
  <strong>Criteria must be at least 2 criteria!</strong>
</div>
@else
<div class="row">
	<div class="col-lg-8">
		{{ Form::open(array('url'=>'judgment/pairwisecomparison', 'class'=>'form-horizontal')) }}
		<div class="the-box full">
			<div class="table-responsive">
				<table class="table table-info table-hover table-th-block">
					<thead>
						<tr>
							<th>Criteria</th>
							<th>Jugdment</th>
							<th>Criteria</th>
							<th style="width: 10%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 0; $i < count($criterias); $i++)
							@for ($j = $i+1; $j < count($criterias); $j++)
							<tr>
								<td id="label|{{ $criterias[$i]->criteria_id.'-'.$criterias[$j]->criteria_id }}">{{ $criterias[$i]->criteria }}</td>
								<td>{{ Form::select($criterias[$i]->criteria_id.'-'.$criterias[$j]->criteria_id, $options, null, array('class'=>'form-control','id'=>$criterias[$i]->criteria_id.'-'.$criterias[$j]->criteria_id)) }}
									<!-- <select id="{{ $criterias[$i]->criteria_id.'-'.$criterias[$j]->criteria_id }}" name="{{ $criterias[$i]->criteria_id.'-'.$criterias[$j]->criteria_id }}" class="form-control">
										<option value="1">1. Sama penting dengan</option>
										<option value="2">2. Mendekati sedikit lebih penting dari</option>
										<option value="3">3. Sedikit lebih penting dari</option>
										<option value="4">4. Mendekati lebih penting dari</option>
										<option value="5">5. Lebih penting dari</option>
										<option value="6">6. Mendekati sangat penting dari</option>
										<option value="7">7. Sangat penting dari</option>
										<option value="8">8. Mendekati mutlak dari</option>
										<option value="9">9. Mutlak sangat penting dari</option>
									</select> -->
								</td>
								<td id="label|{{ $criterias[$j]->criteria_id.'-'.$criterias[$i]->criteria_id }}">{{ $criterias[$j]->criteria }}</td>
								<td class="text-center">
									<a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right" title="Reverse the criteria" onclick="reverse({{$criterias[$i]->criteria_id}},{{$criterias[$j]->criteria_id}})">
										<i class="glyphicon glyphicon-transfer"></i>
									</a>
								</td>
							</tr>
							@endfor
						@endfor
					</tbody>
				</table>
			</div>
			<button type="submit" class="btn btn-success pull-left"><i class="glyphicon glyphicon-save"></i> Save</button>
		</div>
		{{ Form::close() }}
	</div>
</div>
<script type="text/javascript">
	function reverse(i,j){
		var x = i+"-"+j;
		var selectName = document.getElementById(i+"-"+j).name;
		if (x==selectName) {
			document.getElementById(i+"-"+j).name = j+"-"+i;
		} else {
			document.getElementById(i+"-"+j).name = i+"-"+j;
		}
		var tmp = document.getElementById("label|"+i+"-"+j).innerHTML;
		document.getElementById("label|"+i+"-"+j).innerHTML = document.getElementById("label|"+j+"-"+i).innerHTML;
		document.getElementById("label|"+j+"-"+i).innerHTML = tmp;
	}
</script>
@endif
<!-- / Kriteria -->
@stop