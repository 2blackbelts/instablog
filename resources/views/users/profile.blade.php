@extends('layouts.master')

@section('title', 'User Profile')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
        	@if($user->id == Auth::id())
        		Your Profile
        	@else
        		{{ $user->name }}'s Profile
        	@endif
        </div>

        <div class="panel-body">
            <p><strong>Username: </strong>{{ $user->name }}</p>
            <p><strong>Member Since: </strong>{{ $user->created_at->format('jS \\of F Y') }}</p>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Posts from {{ $user->name }}</div>

        <div class="panel-body">

            @foreach($user->posts as $post)

	            <h3><a href="{{ url('post/' . $post->id) }}">{{ $post->title }}</a></h3>
	            <p>{{ str_limit($post->content, $limit = 100, $end = '...') }}</p>
	            <p><a class="btn btn-info btn-sm" href="{{ url('post/' . $post->id) }}"> Read More</a></p>
	            <hr />

            @endforeach

        </div>
    </div>

@endsection