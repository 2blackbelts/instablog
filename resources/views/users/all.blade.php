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
            <p class="blog-post-meta">{{ $user->created_at->diffForHumans() }}
              <br>
              Posts: #{{ $user->posts->count() }}
            </p>

            <p>
              <a class="btn btn-info" href="{{ url('user/' . $user->id) }}">
                <i class="fa fa-pencil"></i> Edit
              </a>
              <a class="btn btn-warning" href="{{ url('admin/user/' . $user->id) }}">
                <i class="fa fa-gear"></i> Modify
              </a>
            </p>

    		</div><!-- /.blog-post -->
      </div>
    </div>
  </div>
	@endforeach

@endsection



