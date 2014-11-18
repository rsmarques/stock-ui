@extends('create')

@section('message')
	<p>Entry ({{ $stock_entry['time'] }} => {{ $stock_entry['value'] }}) sucessfully created!</p>
@stop