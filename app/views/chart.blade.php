@extends('layout')

@section('content')
	<div class="chart">
		<h1>Stock Chart</h1>
		<p> Enter timespan (minutes):
			<form action="/chart" method="POST">
				<input type="number" min="1" value="60" name="timespan" required>
				<input type="submit">
			</form>
		</p>
		@yield('results')
	</div>
@stop