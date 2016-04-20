@extends('layouts.master')

@section('title', $post->title)

@section('content')

	<h1>This is single post!</h1>

    	<p>{{ $post->title }} :: {{ $post->content }}</p>

    	<p>
    		<a class="btn btn-info" href="{{ url('edit/post/' . $post->id) }}">Edit Post</a>
    		<a class="btn btn-warning" href="{{ URL::previous() }}">Back</a>
    	</p>

@endsection