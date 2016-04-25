@extends('layouts.master')

@section('title', 'All Users')

@section('content')

<h2>All Users</h2>

	@foreach ($users as $user)
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-md-3">
        <img class="img-circle" src="http://loremflickr.com/100/100/portrait" alt="Dummy image">
      </div>

      <div class="col-md-9">
    		<div class="blog-post">
            <h2 class="blog-post-title">
            	<a href="{{ url('user/' . $user->id) }}">{{ $user->name }}</a>
            </h2>
            <p class="blog-post-meta">{{ $user->created_at->diffForHumans() }}</p>

    		</div><!-- /.blog-post -->
      </div>
    </div>
  </div>
	@endforeach

@endsection



