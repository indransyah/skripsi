@extends('backend.layouts.index')
@section('content')

<!-- {{var_dump($judgments)}} -->
<table class="table table-info table-th-block">
	<thead>
		<tr>
			<th>CRITERIA</th>
			@foreach($criterias as $key => $value)
			<th>{{$value->criteria}}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
	<!-- {{count($criterias)}} -->
	@foreach($criterias as $key => $value)
		<tr>
			<td>{{$value->criteria}}</td>
			@for($i=0;$i<$max;$i++)
			<td>{{$judgments[$i]->judgment}}</td>
			@endfor
		</tr>
<!-- 		<tr>
			<td>1</td>
			<td>Ari</td>
			<td>Rusmanto</td>
			<td>Yogyakarta, ID</td>
		</tr> -->
	@endforeach
	</tbody>
</table>
@stop