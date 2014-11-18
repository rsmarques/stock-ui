@extends('layout')

@section('content')
	<div class="create">
		<h1>Create Stock Entry</h1>
		<form action="/create" method="POST">
			<p>Enter stock value: <input type="number" min="0" name="value" required></p>
			<p>Enter time: <input type="time" name="time" value="00:00" required></p>
			<p><input type="submit"></p>
		</form>
		@yield('message')
	</div>
@stop