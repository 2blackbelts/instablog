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

	{!! Form::open(array('url' => 'create/post')) !!}

	{!! Form::label('title', 'Title'); !!} 
	<br>
	{!! Form::text('title', '', ['placeholder' => 'Your Title']) !!}
	<br>

	{!! Form::label('content', 'Content'); !!} 
	<br>
	{!! Form::textarea('content', '', ['placeholder' => 'Your Content']) !!}
	<br>
	{!! Form::submit('Create') !!}
	{!! Form::close() !!}

@endsection