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

	{!! Form::open(array('url' => 'edit/post/' . $post->id, 'files' => true, 'method' => 'PUT')) !!}
	<div class="form-group">
		{!! Form::label('title', 'Title'); !!} 
		{!! Form::text('title', $post->title, ['placeholder' => 'Your Title', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content', 'Content'); !!} 
		{!! Form::textarea('content', $post->content, ['placeholder' => 'Your Content', 'class' => 'form-control']) !!}
	</div>	

	<div class="form-group">
		{!! Form::label('image', 'Upload Another Image') !!}
		{!! Form::file('image') !!}
	</div>

	{!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}

	<!-- Remove Button -->
	{!! Form::open(array('url' => 'delete/post/' . $post->id, 'method' => 'DELETE')) !!}
	{!! Form::submit('Remove', array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}

	<a class="btn btn-warning" href="{{ URL::previous() }}">Back</a>

@endsection