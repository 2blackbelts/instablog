@extends('layouts.master')

@section('title', 'Hello Page')

@section('content')

	<h1>Hello this is the Hello Page!</h1>
	<p>
		{{ $message }} <a href="/create/post">Create a post</a>
	</p>


	@foreach ($posts as $post)
    	<p>
    		<a href="{{ url('post/' . $post->id) }}">{{ $post->title }} :: {{ $post->content }}</a></p>
	@endforeach

@endsection