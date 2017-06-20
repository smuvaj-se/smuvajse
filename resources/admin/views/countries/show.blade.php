@extends('admin::layouts.main')

@section('content_header')
	<h2>Countries</h2>
@endsection

@section('content')
	<div id="app-container">
		@include('admin::partials._countries')
	</div>
@endsection
