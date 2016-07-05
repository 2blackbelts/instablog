@extends('layouts.master')

@section('title', 'Create a post')

@section('styles')
@parent
	<!-- WYSIWYG editor -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/ui/trumbowyg.css') }}">
@endsection

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
		{!! Form::textarea('content', '', ['placeholder' => 'Your Content', 'class' => 'form-control', 'id' => 'trumbowyg-demo']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Upload Image') !!}
		{!! Form::file('image') !!}
	</div>
	{!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}

@endsection

@section('scripts')
@parent
	<!-- WYSIWYG JS  -->
	<script src="{{ URL::asset('dist/trumbowyg.min.js') }}"></script>
	<script src="{{ URL::asset('js/trumbowyg-init.js') }}"></script>
	
@endsection