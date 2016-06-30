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

	@foreach($post->images as $image)
	<div class="col-md-3 col-sm-6">
		<div class="thumbnail">
			<img src="{!! Croppa::url('/uploads/images/' . $image->path, 100, 100) !!}">
			<!-- <img src="/uploads/images/{{ $image->path }}"> -->
		</div>
		<div class="caption">
			<a class="btn btn-danger btn-xs" href="{{ url('image/delete/' . $image->id) }}">Delete</a>
		</div>
	</div>
	@endforeach
	
	<div class="col-md-12 col-sm-12">
		@if(Auth::user())
			@if($post->ownedByAuth())
				<a class="btn btn-info" href="{{ url('edit/post/' . $post->id) }}">Edit Post</a>
			@endif
		@endif
		<a class="btn btn-warning" href="{{ URL::previous() }}">Back</a>
	</div>
	
@endsection

