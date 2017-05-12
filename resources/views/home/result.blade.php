@extends('master')
@section('title', 'URL Shortener')
@section('container')
<h1>Here is your shortened Url</h1>
{!!link_to($shortened, $title = 'http://urlshortner.dev/'.$shortened, $attributes = array(), $secure = null)!!}
@endsection