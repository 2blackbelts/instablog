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

            @if($user->id == Auth::id())

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(array('url' => 'update/user/' . $user->id, 'method' => 'PUT')) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Title'); !!} 
                    {!! Form::text('name', $user->name, ['placeholder' => 'Your Name', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email'); !!} 
                    {!! Form::email('email', $user->email, ['placeholder' => 'Your Email', 'class' => 'form-control']) !!}
                </div>  

                <div class="form-group">
                    {!! Form::label('password', 'New Password'); !!} 
                    {!! Form::password('password', ['placeholder' => 'New Password', 'class' => 'form-control']) !!}
                </div> 

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirm New Password'); !!} 
                    {!! Form::password('password_confirmation', ['placeholder' => 'Confirm New Password', 'class' => 'form-control']) !!}
                </div> 

                {!! Form::submit('Update', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}

            @endif
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