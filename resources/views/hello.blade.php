<!DOCTYPE html>
<html>
<head>
	<title>Hello Page</title>
</head>
<body>
	<h1>Hello this is the Hello Page!</h1>
	<p>
		{{ $message }}
	</p>

	@foreach ($posts as $post)
    	<p>{{ $post->title }} :: {{ $post->content }}</p>
	@endforeach

</body>
</html>