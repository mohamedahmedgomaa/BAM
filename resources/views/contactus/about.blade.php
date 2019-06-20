@extends('home')
@section('content')

<link rel="stylesheet" href="{{ asset('') }}css/bootstrap.min.css"> 	
 	<link rel="stylesheet" href="{{ asset('') }}css/font-awesome.min.css">

<style>
	 
		body{
			background:url('{{ asset('') }}img/swift.jpg');
			background-position: 1%;
			font-family: tahoma;
			text-align: justify;
			font-weight: bold;
			
		}
	 
		#about{
			padding-top: 98px;
			padding-bottom: 101px;
		}
	 
		#about .triangle-right{
			margin-top: 95px;
			width: 0;
			height: 0;
			border-top: 259px solid transparent;
			border-left: 470px solid #d6c6b2;
			border-bottom: 259px solid transparent;
			
			
		}
	 
		#about .triangle-right img{
			position: absolute;
			left: -1px;
			top: 81px;
			width: 74%;
		 
		}
	 
		.fa-play{
			font-size: 100px;
			
		}
		
		
		#about .p-first{
			margin-bottom: 30px;
		}
		
		
		#about h2{
			margin-bottom: 47px;
			margin-top: 12px;
			
		}
		
		
		#about .social-link-text{
			margin-top: 50px;
			margin-bottom: 25px;			
			
		}
		
		#about .about-link{
			padding-left: 0px;
		}
		
		#about .about-link li{
			display: inline-block;
		}
		
		#about .about-link li a i{
			width: 50px;
			height: 50px;
			border-radius: 50%;
			line-height: 50px;
			text-align: center;
			border: 1px solid #d6c6b2;
			margin-right: 10px;
			font-size: 22px;
			color: #d6c6b2;
			transition: all .3s;
			
		}
		
		
		#about .about-link li a i:hover{
			color: #222222;
			background: #d6c6b2;
			border-color: #d6c6b2;
			
		}
	 
		
		#about .about-img{
			position: relative;
			
		}
		
		#about .about-img{
			position: relative;
			
		}
		
		#about .about-img .man{
			position: absolute;
			bottom: 161px;
			top: 12px;
			left: -2px;
			
		}
		
		.color-3{
			color: #ffffff;
		}
		
		
		.text-white{
			color: white;
		}
		
		
		p{
			margin-bottom: 0;
			font-size: 16px;
			line-height: 24px;
			color: #d6c6b2;
		}
		
		.btn-danger{
			border-radius: 0;
			padding: 10px 20px;
			background-color: rgb(3, 95, 42);
			border: rgb(3, 95, 42);
		}
		.btn-danger:hover {
			background-color: green;
		}
		.btn-danger:active {
			background-color: green
		}	
	</style>

<section id="about">
 		
	<div class="container">
		<div class="row">
		<div class="col-md-5">
			<div class="about-img">
            <img class="shape" src="{{ asset('') }}img/about_tringle.png" alt="">
            
            <img class="man" src="{{ asset('') }}img/about_man.png" alt="">
            
			</div>
		</div>
		<br>
		<div class="col-md-7 about-right">
			
			<h2 class="color-3"><b>About our website</b>
			</h2>
			
			<p class="p-first text-white">
					Our site is build for the user comfort! No more waiting in lines to get the clothes you want,
					with BAM! shop wherever you want whenever you want with no extra fees or delivery charges! 
					What are you waiting for? You are just a few taps away from your next trendy outfit.
				</p>
				<h2 class="color-3"><b>Our team</b>
					</h2>
			<p class="p-first text-white">
					BAM! is a graduation project done with love and passion for the web development major!
					Know our team....
				</p>
			<h3 class="color-3 social-link-text">
				<button class="btn btn-danger" onclick="window.location.href='{{ route('contactus.team') }}'" ><strong>Click Here!</strong></button>
			</h3>
			
			
		 
			
		 
			
		</div>
	 
		</div>
	</div>
  
 	</section>

@endsection