@extends('layouts.master')

@section('title', $post->title)

@section('content')

	<h1>This is single post!</h1>

    	<p>{{ $post->title }} :: {{ $post->content }}</p>

@endsection