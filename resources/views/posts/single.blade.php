@extends('layouts.master')

@section('title', $post->title)

@section('content')

	<div class="blog-post">
        <h2 class="blog-post-title">
        	<a href="{{ url('post/' . $post->id) }}">{{ $post->title }}</a>
        </h2>
        <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by <a href="{{ url('user/' . $post->author->id) }}">
          {{ $post->author->name }}</a></p>
        <p>{{ $post->content }}</p>
	</div><!-- /.blog-post -->

	<p>
		@if(Auth::user())
			@if($post->ownedByAuth())
				<a class="btn btn-info" href="{{ url('edit/post/' . $post->id) }}">Edit Post</a>
			@endif
		@endif
		<a class="btn btn-warning" href="{{ URL::previous() }}">Back</a>
	</p>
	
@endsection

