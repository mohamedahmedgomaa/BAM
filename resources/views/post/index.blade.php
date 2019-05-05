<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Simple Like Dislike System</title>
	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="{{ url('/') }}/design/adminlte/bower_components/font-awesome/css/font-awesome.min.css"></head>
<body>
	
	<div class="container">
		<div class="blog-header">
			<h2>Like & Dislike System</h2>
			<p>Laravel 5.5 Like And Dislike System using Ajax</p>
			<hr>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="blog-post">
					@foreach ($posts as $post)
						<div class="post" data-postid="{{ $post->id }}">
							<a href="#"><h3>{{ $post->title }}</h3></a>
							<h6>Posted on {{ $post->created_at }} by {{ $post->user->name }}</h6>
							<p>{{ $post->body }}</p>
							<div class="interaction">
								<a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like' }}</a> | 						
								<a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You dont like this post' : 'Dislike' : 'Dislike' }}</a> 
								<hr>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="{{ asset('/js/like.js') }}"></script>
	<script type="text/javascript">
		var token = '{{ Session::token() }}';
		var urlLike = '{{ route('like') }}';
	</script>
</body>
</html>