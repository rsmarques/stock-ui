@extends('chart')

@section('results')
	<ul>
		@foreach($results as $result)
			<li>Time: {{ $result['time'] }}, Value: {{$result['value']}} $</li>
		@endforeach
	</ul>
@stop