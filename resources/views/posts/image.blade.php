@extends('layouts.master')

@section('title', 'Delete Image')

@section('content')

<div class="row">
	<h2>Would you like to delete this image?</h2>

	{!! Form::open(['url' => 'image/delete/' . $image->id, 'method' => 'DELETE']) !!}

	<div class="col-xs-12">
		<div class="thumbnail">
			<img src="/uploads/images/{{ $image->path }}" class="img-thumbnail">
		</div>
	</div>

	<div class="xs-12">
		{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
		{!! Form::close() !!}
	</div>
</div>

	
@endsection

