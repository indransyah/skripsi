@extends('backend.layouts.index')
@section('content')
<ol class="breadcrumb">
	<li>{{ HTML::link('home', 'Home') }}</li>
	<li>{{ HTML::link('judgment', 'Judgment') }}</li>
	<li class="active">Pairwise Comparison</li>
</ol>
@if (Session::has('success'))
<div class="alert alert-success square fade in alert-dismissable text-left">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{ Session::get('success') }}</strong>
</div>
@endif
@if ($status=="KONSISTEN")
<div class="alert alert-success square fade in alert-dismissable text-left">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Nilai perbandingan KONSISTEN</strong>
</div>
@endif
<h1 class="page-header" style="margin-top:0;">Pairwise Comparison</h1>
<div class="the-box full">
	<div class="table-responsive">
		<table class="table table-th-block text-center">
			<thead>
				<tr class="info">
					<td>CRITERIA</td>
					@foreach($criterias as $key => $value)
					<td>{{ $value->criteria }}</td>
					@endforeach
				</tr>
			</thead>
			<tbody>
				<?php $max = count($criterias); ?>
				@for($i=0;$i<$max;$i++)
				<tr>
					<td class="info">{{ $criterias[$i]->criteria }} </td>
					@for($j=0;$j<$max;$j++)
					<td>{{ round($judgments[$i][$j], 2) }}</td>
					@endfor
				</tr>
				@if($i==($max-1))
				<tr>
					<td class="info">TOTAL</td>
					@for($j=0;$j<$max;$j++)
					<td class="warning">{{ round($judgmentTotal[$j],2) }}</td>
					@endfor
				</tr>
				@endif
				@endfor
			</tbody>
		</table>
	</div><!-- /.table-responsive -->
</div><!-- /.the-box full -->

<h1 class="page-header" style="margin-top:0;">Normalization</h1>
<div class="the-box full">
	<div class="table-responsive">
		<table class="table table-th-block text-center">
			<thead>
				<tr class="info">
					<td>CRITERIA</td>
					@foreach($criterias as $key => $value)
					<td>{{ $value->criteria }}</td>
					@endforeach
					<td>TPV</td>
					<!-- <td>Ranking</td> -->
					<td>Ax</td>
				</tr>
			</thead>
			<tbody>
				<?php $max = count($criterias); ?>
				@for($i=0;$i<$max;$i++)
				<tr>
					<td class="info">{{ $criterias[$i]->criteria }} </td>
					@for($j=0;$j<$max;$j++)
					<td>{{ round($normalization[$i][$j], 2) }}</td>
					@endfor
					<td class="warning">{{ round($tpv[$i], 2) }}</td>
					<!-- <td>{{ round($ranking[$i], 2) }}</td> -->
					<td class="warning">{{ round($Ax[$i], 2) }}</td>
				</tr>
				@if($i==($max-1))
				<tr>
					<td class="info">TOTAL</td>
					@for($j=0;$j<$max;$j++)
					<td class="warning">{{ round($normalizationTotal[$j],2) }}</td>
					@endfor
					<td class="warning">{{ array_sum($tpv) }}</td>
					<!-- <td>-</td> -->
					<td class="warning">-</td>
				</tr>
				@endif
				@endfor
			</tbody>
		</table>
	</div><!-- /.table-responsive -->
</div><!-- /.the-box full -->
@stop