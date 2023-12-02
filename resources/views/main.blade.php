<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Laravel Blog Test @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8CyqfZZGnNmAW+9Dpo8cONFPTPZl/F5WPCa5ez6ziGFN3kAtz7orVbha84Qz2y" crossorigin="anonymous">

		@yield('show-style');
		@yield('form-style');
		@yield('posts-index');


	</head>

	<body class="is-preload homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

							<nav id="nav">
								<ul>
									<li class="@yield('hActive')"><a href="\">Home</a></li>
									<li class="@yield('aActive')"><a href="\about">About</a></li>
									<li class="@yield('cActive')"><a href="\contact">Contact</a></li>

                                    <li>
                                        <a href="#">My Account</a>
                                        <ul>
                                            <li><a href="#">Sign Up</a></li>
                                            <li><a href="#">Login</a></li>
                                            
                                        </ul>
                                    </li>

									<li class="@yield('vActive')"><a href="{{ route('posts.index')}}">View Posts</a></li>
									 
								</ul>
							</nav>
							
					</header>
					
					
				</div>
				<hr>
				

				

			
			<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
						
						@if(Session::has('success'))
							<div class="flash-message alert alert-success alert-dismissible fade show" role="alert">
								{{ Session::get('success') }}
							</div>
						@endif

						@if(count($errors) > 0)
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Errors:</strong>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</div>
						@endif

                        @yield('content')

					</div>
				</div>

			<!-- Main -->
				
			

			</div>

		<!-- Scripts -->

		<footer class="footer">
			<div class="container">
				<div class="footer-content">
					<p>&copy; 2023 Ammar Alsiyabi</p>
					<p>Contact: alsiyabiomn@gmail.com</p>
				</div>
			</div>
		</footer>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
        <script src="{{ asset('assets/js/browser.min.js') }}"></script>
        <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/util.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-RXIvwoeuvAAMZLkUdQaiu9eSlMFjXBYo1Y2HZ1Zlo9ltT6O6AKq4RDU3SLZh7KEi" crossorigin="anonymous"></script>

		

	</body>

	
</html>