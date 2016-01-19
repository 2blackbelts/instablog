@extends('layouts.master')

@section('title', 'Edit a post')

@section('content')

	<h1>Edit this post</h1>
	
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	{!! Form::open(array('url' => 'edit/post/' . $post->id, 'method' => 'PUT')) !!}

	{!! Form::label('title', 'Title'); !!} 
	<br>
	{!! Form::text('title', $post->title, ['placeholder' => 'Your Title']) !!}
	<br>

	{!! Form::label('content', 'Content'); !!} 
	<br>
	{!! Form::textarea('content', $post->content, ['placeholder' => 'Your Content']) !!}
	<br>
	{!! Form::submit('Update') !!}
	{!! Form::close() !!}

	{!! Form::open(array('url' => 'delete/post/' . $post->id, 'method' => 'DELETE')) !!}
	{!! Form::submit('Remove') !!}
	{!! Form::close() !!}

	<p><a href="{{ URL::previous() }}">Back</a></p>

@endsection