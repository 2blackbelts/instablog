@extends('layouts.master')

@section('title', 'Modify User')

@section('content')

<h2>Modify User</h2>


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

            {!! Form::open(array('url' => 'admin/user/update/' . $user->id, 'method' => 'PUT')) !!}

                <div class="form-group">
                    @foreach($roles as $role)
                      <div class="radio">
                        <label>
                          <input type="radio" name="role" id="{{$role->id}}" value="{{$role->id}}" 
                          <?php if($user->hasRole($role->name)){print "checked";}?> >
                          {{$role->name}}
                        </label>
                      </div>
                    @endforeach

                    <div class="radio">
                        <label>
                          <input type="radio" name="role" id="0" value="0" 
                          <?php if($user->roles()->count() == 0){print "checked";} ?> >
                          None
                        </label>
                      </div>

                </div>

            {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
            <a class="btn btn-default" href="{{ URL::previous() }}">Back</a>
            {!! Form::close() !!}

    		</div><!-- /.blog-post -->
      </div>
    </div>
  </div>

  @endsection