<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Instablog | @yield('title')</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Blog Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/blog.css') }}">
	<!-- My Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

</head>
<body>
	<div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item {{ Request::is('hello') ? 'active' : null }}" href="/hello">Home</a>

          @if(Auth::user())
            <a class="blog-nav-item {{ Request::is('create/post') ? 'active' : null }}" href="/create/post">Create</a>
          @endif
          
          <a class="blog-nav-item" href="#">Press</a>
          <a class="blog-nav-item" href="#">New hires</a>

          @if (Auth::guest())
            <a class="blog-nav-item navbar-right {{ Request::is('login') ? 'active' : null }}" href="{{ url('/login') }}">Login</a>
            <a class="blog-nav-item navbar-right {{ Request::is('register') ? 'active' : null }}" href="{{ url('/register') }}">Register</a>
          @else
            <li class="dropdown blog-nav-item navbar-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ url('user/' . Auth::id()) }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
          @endif

        </nav>
      </div>
    </div>
    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
          {{ Session::get('success') }}
      </div>
    @elseif(Session::has('warning'))
      <div class="alert alert-danger" role="alert">
          {{ Session::get('warning') }}
      </div>
    @endif
    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Instablog</h1>
        <p class="lead blog-description">The best thing since sliced bread.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          @yield('content')

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Instablog was founded early 2016 in the quiet TAFE offices of Broken Hill. It has since become home to a single test user with a handful of posts. Watch this space as Instablog rocks the likes of Silicon Valley. </p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>All code and content generated for Instablog are for educational purposes only.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

	

</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</html>