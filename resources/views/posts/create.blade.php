@extends('layouts.master')

@section('title', 'Create a post')

@section('content')

	<h1>Create a post</h1>
	
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	{!! Form::open(array('url' => 'create/post', 'files' => true)) !!}
	<div class="form-group">
		{!! Form::label('title', 'Title'); !!} 
		{!! Form::text('title', '', ['placeholder' => 'Your Title', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content', 'Content'); !!} 
		{!! Form::textarea('content', '', ['placeholder' => 'Your Content', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Upload Image') !!}
		{!! Form::file('image') !!}
	</div>
	{!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}

@endsection