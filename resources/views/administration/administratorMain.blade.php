@extends('templates/main')

@section('title')
	Administration
@stop

@section('content')
	<h1>Administration : main menu</h1>
		<p><a href="{{ url('/newsalon') }}" class="btn btn-success btn-block">Create new salon</a></p>
		<p><a href="{{ url('/administrators') }}" class="btn btn-success btn-block">Administrators management</a></p>

@stop

@section('script')

@stop