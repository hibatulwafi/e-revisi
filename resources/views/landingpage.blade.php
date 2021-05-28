<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Softnio">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="XIOM is a modern and elegant template, created for Software, WebApp & SaaS Product related website.">
	<!-- Fav Icon  -->
	<link rel="shortcut icon" href="{{ asset('images/fav-icon.png')}}">
	<!-- Site Title  -->
	<title>Revline - Revisi Online</title>
	<!-- Vendor Bundle CSS -->
	<link rel="stylesheet" href="{{ asset('/css/vendor.bundle.css?ver=100')}}">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="{{ asset('/css/style.css?ver=100')}}">
	<link rel="stylesheet" href="{{ asset('/css/theme.css?ver=100')}}">
</head>

<body data-spy="scroll" data-target="#mainnav" data-offset="80" class="aster aster-alter">

	<!-- HEADER AREA STARTS -->

	<div class="header-area-s2" id="home">
	<header class="site-header is-sticky">

		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light is-transparent" id="mainnav">
			<div class="container">
				<a class="navbar-brand" href="index-aster-v2.html">
					<img class="logo logo-dark" alt="logo" src="{{ asset('adminassets') }}/assets/images/logos-white.png">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-icon">
						<i class="fas fa-bars"></i>
					</span>
				</button>

				<div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
				
					<ul class="navbar-nav">
					<!-- 	<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Home <span class="sr-only">(current)</span></a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" href="index-aster-v1.html">Aster default</a>
								</li>
								<li>
									<a class="dropdown-item" href="index-aster-v2.html">Aster Alter</a>
								</li>
								<li>
									<a class="dropdown-item" href="index-hosta-v1.html">Hosta Default</a>
								</li>
								<li>
									<a class="dropdown-item" href="index-hosta-v2.html">Hosta Alter</a>
								</li>
							</ul> 
						</li>  
						
						<li class="nav-item">
							<a class="nav-link" href="about-aster.html">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="feature-aster.html">Feature</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="pricing-aster-v1.html">Pricing</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact-aster.html">Contact</a>
						</li> -->
						<li class="nav-item">
							<a class="btn-menu btn-menu-2" href="{{route('login')}}">Login</a>
						</li>
					</ul>

				</div>
			</div> <!-- Container --> 
		</nav>  
		<!-- End Navbar -->

	</header>

		<div class="header-content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="header-text-s2 text-center">
							<h1 class="sec-title-xxl">REVISI TUGAS AKHIR LEBIH MUDAH</h1>
							<p class="lead">Politeknik Sukabumi - Generasi Pasti</br>
							Jl. Babakan Sirna No.25, Benteng, Kec. Warudoyong, Kota Sukabumi</p>
							<a href="#" class="btn-lg btn-s2">Login</a>
						</div>
					</div> <!-- col -->
				</div>

				<div class="row align-items-center justify-content-center">
					<div class="col-lg-6">
						<div class="header-img-s2 sec-img">
							<img src="{{ asset('images/graduation.svg')}}" class="img-fluid" alt="header-img">
						</div>
					</div> <!-- col -->
				</div>
			</div>
		</div>

	</div>

	<!-- HEADER AREA ENDS -->

	<!--   WHY THIS STARTS  -->

	<div class="why-this section-pad nopb" id="about">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="sec-heading">
						<h2 class="sec-title-lg">Bagaimana Cara Kerjanya?</h2>
						<p class="lead">Aplikasi ini mempermudah dari sisi mahasiswa dan juga dosen dalam pelaksanaan revisi tugas akhir</p>
					</div>
				</div> <!-- col -->
			</div> <!-- row -->

			<div class="pt-sm"></div>
			<div class="row justify-content-center no-gutters text-center">

				<div class="col-lg-4 col-md-6">
					<div class="why-box why-box-sm box-border box-border-tn box-border-rn box-border-ln">
						<div class="why-img">
							<img src="{{ asset('images/why-icon-a.png')}}" alt="why-us">
						</div>
						<h2>Revisi Dimana Saja</h2>
						<p>Mahasiswa dapat revisi kapan saja, tanpa terhalang jarak dan waktu</p>
					</div>
				</div> <!-- col -->

				<!-- <div class="col-lg-4 col-md-6">
					<div class="why-box why-box-sm box-border box-border-tn">
						<div class="why-img">
							<img src="{{ asset('images/why-icon-b.png')}}" alt="why-us">
						</div>
						<h2>Fast & optimized</h2>
						<p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
				</div>  --><!-- col -->

				<div class="col-lg-4 col-md-6">
					<div class="why-box why-box-sm box-border box-border-tn box-border-rn box-border-ln">
						<div class="why-img">
							<img src="{{ asset('images/why-icon-c.png')}}" alt="why-us">
						</div>
						<h2>Selalu Terhubung</h2>
						<p>Selalu terhubung dengan dosen pemnguji</p>
					</div>
				</div> <!-- col -->

				<!-- <div class="col-lg-4 col-md-6">
					<div class="why-box why-box-sm">
						<div class="why-img">
							<img src="{{ asset('images/why-icon-d.png')}}" alt="why-us">
						</div>
						<h2>Full responsive</h2>
						<p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
				</div> --> <!-- col -->

				<div class="col-lg-4 col-md-6">
					<div class="why-box why-box-sm box-border box-border-tn box-border-rn box-border-ln">
						<div class="why-img">
							<img src="{{ asset('images/why-icon-e.png')}}" alt="why-us">
						</div>
						<h2>Upload File</h2>
						<p>File revisi tersimpan pada database, tanpa harus khawatir kehilangan file</p>
					</div>
				</div> <!-- col -->

				<!-- <div class="col-lg-4 col-md-6">
					<div class="why-box why-box-sm">
						<div class="why-img">
							<img src="{{ asset('images/why-icon-f.png')}}" alt="why-us">
						</div>
						<h2>fully optimized</h2>
						<p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
				</div>  --><!-- col -->

			</div> <!-- row -->
		</div> <!-- Container -->
	</div>
	<!--   WHY THIS ENDS  -->

	
	<!--  FEATURE STARTS -->

	<div class="feature feature-s2 section-pad-lg section-pad nopb" id="feature">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="sec-heading">
						<h2 class="sec-title-lg">Apa saja fiturnya?</h2>
					</div>
				</div> <!-- col -->
			</div> <!-- row -->

			<div class="feature-content">
				<div class="row mtn-x2">
					
					<div class="col-md-6 col-lg-3">
						<div class="feature-item">
							<img src="{{ asset('images/feature-icon-a.png')}}" alt="feature-icon">
							<h2>Penyimpanan</h2>
							<p>Berkas File Revisi akan tersimpan pada database</p>
						</div>
					</div> <!-- col -->

					<div class="col-md-6 col-lg-3">
						<div class="feature-item">
							<img src="{{ asset('images/feature-icon-b.png')}}" alt="feature-icon">
							<h2>Fleksible</h2>
							<p>Waktu dan tempat melakukan revisi lebih fleksible</p>
						</div>
					</div> <!-- col -->


					<div class="col-md-6 col-lg-3">
						<div class="feature-item">
							<img src="{{ asset('images/feature-icon-d.png')}}" alt="feature-icon">
							<h2>Always Connect</h2>
							<p>Tidak bisa menemui dosen bukan alasan</p>
						</div>
					</div> <!-- col -->


					<div class="col-md-6 col-lg-3">
						<div class="feature-item">
							<img src="{{ asset('images/feature-icon-g.png')}}" alt="feature-icon">
							<h2>Progress</h2>
							<p>Dapat melihat progress revisi mahasiswa</p>
						</div>
					</div> <!-- col -->

					

				</div> <!-- row -->
			</div> <!-- feature-content -->

		</div> <!-- Container -->
	</div>
	<!--  FEATURE ENDS -->

	
	
	<!--  FOOTER STARTS -->

	<div class="footer-area footer-area-s2 nopd" id="contact">
		<div class="container">
			
			<div class="footer-text text-center">
				<p>© 2021 Revline, All rights reserved by Softnio.</p>
			</div>
		</div> <!-- Container -->
	</div>
	<!--  FOOTER ENDS -->

	<!-- JavaScript (include all script here) -->
	<script src="assets/js/jquery.bundle.js?ver=100"></script>
	<script src="assets/js/script.js?ver=100"></script>
</body>
</html>