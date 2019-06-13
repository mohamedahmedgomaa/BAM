<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Error 404</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/error404.css') }}">
	<body>
	<div class="container">
		<div class="error">
			<p class="p">4</p>
			<span class="dracula">
					<div class="con">
						<div class="hair"></div>
						<div class="hair-r"></div>
						<div class="head"></div>
					<div class="eye"></div>
					<div class="eye eye-r"></div>
					<div class="mouth"></div>
					<div class="blod"></div>
					<div class="blod blod2"></div>
					</div>
				</span>
			<p class="p">4</p>

			<div class="page-ms">
				<p class="page-msg"> Oops, the page you're looking for Disappeared </p>
				<button class="go-back"><a href="{{route('index')}}">Go Back Home</a></button>
			</div>
		</div>
	</div>

	<iframe style="width:0;height:0;border:0; border:none;" scrolling="no" frameborder="no" allow="autoplay"
			src="https://instaud.io/_/2Vvu.mp3"></iframe>
	</body>
</html>