<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
	@include('includes.bootstrap')
  	<title>idam.lk - Home</title>
  	<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
</head>

<body>
	<div class="text-white">
		<div class="container">
			<div class="row pt-2">
				<div class="col-md-12 text-right text-top-links quick-links">
					@if(Auth::check())
                        <a href="/profile" class="text-capitalize text-dark">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} | </a> <a href="{{ URL::route('logout') }}"> Logout </a>
                    @else
					    <a href="{{ URL::route('login') }}">Login</a> <span class="text-dark">|</span> <a href="{{ URL::route('showRegister') }}">Register</a>
				    @endif
                </div>
			</div>
			<div class="row">
				<div class="col-md-6 text-md-left text-center align-self-center my-5">
					<div id="c_btn-group-outline" class="btn-group pb-4">
						<a href="#" class="btn btn-round btn-round btn-outline-secondary text-dark">සිංහල</a>
						<a href="#" class="btn btn-round btn-outline-primary text-dark">English</a>
					</div>
					<div class="float-md-center align-self-center">
						<a href="/">
							<img class="float-center" src="{{ URL::asset('images/logo.png') }}" style="width:auto; height:60px;">
							<div class="slogan-text text-center text-md-left site-text-bg">Buy and Sell properties in Sri Lanka</div>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 text-md-center order-md-6 text-center align-self-center my-5">
					<div class="btn-group quick-links">
						<a href="#" class="m-2">
							<img src="{{ URL::asset('images/services.png') }}">Services</a>
                        @if(!Auth::check())
						<a href="{{ URL::route('login') }}" class="m-2">
							<img src="{{ URL::asset('images/login.png') }}">Login</a>
                        @endif
						<a href="#" class="m-2">
							<img src="{{ URL::asset('images/inquiry.png') }}">Inquiry</a>
					</div>
					<div class="btn-desc site-text-bg mt-5">do you have a property to sell or rent ?</div>
					<a href="#" class="btn btn-lg btn-primary link-btn">Post Your Property</a>
					<div class="btn-desc site-text-bg mt-5">do you want to buy or rent property ?</div>
					<a href="/ads/all" class="btn btn-lg btn-secondary text-white link-btn">Search Property</a>
					<br>
					<div class="site-links mt-3">
						<a href="#">? Help</a>
					</div>
					<div class="row"> </div>
				</div>
				<div class="col-md-6 text-md-left text-center align-text-top right-shaded">
					<h2 class="site-text-bg pt-2">Districts</h2>
					<div class="row">
						<div class="col-md-6 text-md-left site-links">
							<a href="#">Colombo</a>
							<br>
							<a href="#">Colombo</a>
							<br>
							<a href="#">Colombo</a>
							<br>
							<a href="#">Colombo</a>
							<br>
							<a href="#">Colombo</a>
							<br> </div>
						<div class="col-md-6 text-md-left site-links">
							<a href="#">Colombo</a>
							<br>
							<a href="#">Colombo</a>
							<br>
							<a href="#">Colombo</a>
							<br>
							<a href="#">Colombo</a>
							<br> </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center text-site h5 pt-5 pb-5"> fastest land selling website in sri lanka </div>
			</div>
		</div>
	</div>
	@include('includes.footer')
	
</body>

</html>
