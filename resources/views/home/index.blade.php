@extends('master')
@section('container')
<style>
.error {
	color:red;
	font-style:italic;
}
</style>
<h1>Awesome URL Shortener</h1>
{!! Form::open(array('url' => '/')) !!}
	{{Form::label('url', 'Enter Url')}}:
	{{ Form::text('url')}}
	
{!! Form::close() !!}
	@if($errors)
	<p clas="error">{{ $errors->first('url') }}</p>
	@endif
@endsection