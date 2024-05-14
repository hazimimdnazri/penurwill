<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Penurwill - Love Your Loved</title>
	<link rel="icon" href="{{ asset('assets/frontend/images/favicon/favicon-icon.png') }}">
	<link href="{{ asset('assets/frontend/fonts/remixicon.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Mulish:wght@500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/slick.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/cursor.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/media-query.css') }}" rel="stylesheet">
</head>
<body>
	<!-- Main Body Start -->
	<main class="site-content">
		<!-- Preloader Start -->
		<div class="preloader">
			<div class="vertical-centered-box">
				<div class="content">
					<div class="loader-circle"></div>
					<div class="loader-line-mask">
						<div class="loader-line"></div>
					</div>
					<img src="assets/frontend/images/home/preloader.png" alt="">
				</div>
			</div>
		</div>
		<!-- Preloader End -->
		@include('frontend.components.header')
		<!-- Content Start -->
		@yield('content')
		<!--Content End -->
		@include('frontend.components.footer')
		<!-- Page cursor Start -->
		<div class="cursor cursor-shadow"></div>
		<div class="cursor cursor-dot"></div>
		<!-- Page cursor End -->
		<!-- Back-to-top Start -->
		<a href="#content" class="back-to-top">
			<span class="back-to-top-text"><i class="ri-arrow-up-s-line"></i></span>
		</a>
		<!-- Back-to-top End -->
	</main>
	<!-- Main Body End -->
	<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/ScrollTrigger.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/gsap.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/TweenMax.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/splitting.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.placeholder.label.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>	
	<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/cursor.js') }}"></script>	
	<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>	
	<script src="{{ asset('assets/frontend/js/menu.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/back-to-top.js') }}"></script>	
	<script src="{{ asset('assets/frontend/js/slider-custom.js') }}"></script>	
	<script src="{{ asset('assets/frontend/js/counter.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/case-hover.js') }}"></script>
</body>
</html>

