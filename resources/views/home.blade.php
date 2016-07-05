@extends('layouts.master')

@section('title', 'Home')

@section('content')

@if(Auth::user())
    <p>
        {{ $message }} <a class="btn btn-primary btn-sm" href="/create/post">Create a post</a>
    </p>
@endif

    @foreach ($posts as $post)
        <div class="blog-post">
            <h2 class="blog-post-title">
                <a href="{{ url('post/' . $post->id) }}">{{ $post->title }}</a>
            </h2>
            <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by <a href="{{ url('user/' . $post->author->id) }}">
              {{ $post->author->name }}</a></p>
            <p>{!! $post->content !!}</p>
        </div><!-- /.blog-post -->
    @endforeach
          <nav>
            <ul class="pager">
              <li><a href="{{ $posts->previousPageUrl() }}">Previous</a></li>
              <li><a href="{{ $posts->nextPageUrl() }}">Next</a></li>
            </ul>
          </nav>

@endsection



