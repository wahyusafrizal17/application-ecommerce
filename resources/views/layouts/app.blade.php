<?php
	$pengaturan = App\Models\Setting::find(1);
	$categories = App\Models\Category::paginate(5);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>WAHYU store | Aplikasi Belanja Online</title>
	<!-- Favicon -->
	<!-- Web Font -->
	<link href="/css/swap.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="/css/themify-icons.css">
	<!-- Jquery Ui -->
    <link rel="stylesheet" href="/css/jquery-ui.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	<!-- Get Pro Button -->
    <ul class="pro-features">
		<a class="get-pro" href="https://api.whatsapp.com/send?phone=62{{ substr($pengaturan->phone, 1, 10) }}8&text=Saya%20ingin%20order." target="_blank">Chat</a>
	  </ul>
	  <!-- Header -->
	  <header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-4 col-md-12 col-12">
				<!-- Top Left -->
				<div class="top-left">
				  <ul class="list-main">
				  <li><i class="fa fa-phone"></i>  {{ $pengaturan->phone }}</li>
				  <li><i class="fa fa-envelope"></i> {{ $pengaturan->email }}</li>
				  </ul>
				</div>
				<!--/ End Top Left -->
			  </div>
			  <div class="col-lg-8 col-md-12 col-12">
				<!-- Top Right -->
				<div class="right-content">
				  <ul class="list-main">
					{{-- <li><i class="fa fa-map-pin"></i> {{ $pengaturan->address }}</li> --}}
					{{-- <li><i class="fa fa-history"></i> <a href="#">09:00 - 17:00</a></li> --}}
					<li>
						@if(Auth::check())
						<i class="fa fa-user-circle"></i><a href="/my-profile">{{ Auth::User()->name }}</a>
						<li><i class="fa fa-sign-out"></i>
						 <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</a>
						</li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
						@else
						<i class="fa fa-sign-in"></i><a href="/login">Login</a>
						@endif
					</li>
				  </ul>
				</div>
				<!-- End Top Right -->
			  </div>
			</div>
		  </div>
		</div>
			<!-- End Topbar -->
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="/"><img src="{{ asset('assets/img/setting/'.$pengaturan->logo) }}" style="width: 100%" alt=""></a>
							</div>
							<!--/ End Logo -->
							<!-- Search Form -->
							<div class="search-top">
								<div class="top-search"><a href="#0"><i class="fa fa-search"></i></a></div>
								<!-- Search Form -->
								<div class="search-top">
									<form class="search-form">
										<input type="text" placeholder="Search here..." name="search">
										<button value="search" type="submit"><i class="fa fa-search"></i></button>
									</form>
								</div>
								<!--/ End Search Form -->
							</div>
							<!--/ End Search Form -->
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-8 col-md-7 col-12">
							<div class="search-bar-top">
								<div class="search-bar">
									{{ Form::open(['url' => route('products.search'), 'method' => 'GET']) }}
										<input name="search" placeholder="Search Products Here....." type="search">
										<button class="btnn"><i class="fa fa-search"></i></button>
									{{ Form::close() }}
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
								{{-- <div class="sinlge-bar">
								  <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar">
								  <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div> --}}
								@if(Auth::check())
								<div class="sinlge-bar shopping">
								  <a href="/cart" class="single-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="cart-qty">{{ count(hitung_cart_qty()) }}</span>
								</a>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="/">Home</a></li>
													<li><a href="/products">Produk</a></li>
													<li><a href="/lacak-order">Pesanan Saya</a></li>
													<li><a href="{{ route('cek-ongkir') }}">Cek Ongkir</a></li>
													<li><a href="{{ route('syarat-dan-ketentuan') }}">Ketentuan</a></li>
													<li><a href="{{ route('hubungi-kami') }}">Hubungi Kami</a></li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
        <!--/ End Header -->
        
    @yield('content')
    	    	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="fa fa-plane"></i>
						<h4>Pengiriman Cepat</h4>
						<p>Pengiriman 100% Terjaga</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="fa fa-archive"></i>
						<h4>Produk Original</h4>
						<p>Barang 100% Original</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="fa fa-lock"></i>
						<h4>Keamanan</h4>
						<p>Keamanan 100%</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="fa fa-eye"></i>
						<h4>Pengunjung</h4>
						<p>100 Pengunjung</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Shop Newsletter  -->
	{{-- <section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Shop Newsletter -->
	
    <!-- Start Footer Area -->
    <footer class="footer">
      <!-- Footer Top -->
      <div class="footer-top section">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer about">
                <div class="logo">
					<a href="/" style="font-size: 25px; font-weight: bold"><img src="{{ asset('assets/img/setting/'.$pengaturan->logo) }}" style="width: 50%" alt=""></a>
                </div>
                <p class="text">{{ $pengaturan->description }}</p>
                <p class="call"><span><a href="https://api.whatsapp.com/send?phone=62{{ substr($pengaturan->phone, 1, 10) }}8&text=Saya%20ingin%20order." target="_blank">{{ $pengaturan->phone }}</a></span></p>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer social">
                <h4>Kategori</h4>
                <!-- Single Widget -->
                <div class="contact">
					<ul>
					  @foreach($categories as $category)
					  	<li><a href="/kategori/{{ $category->slug }}">{{ $category->name_category }}</a></li>
					  @endforeach
					</ul>
				  </div>
				  <!-- End Single Widget -->
                </div>
              <!-- End Single Widget -->
            </div>
      
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer social">
                <h4>Informasi</h4>
                <!-- Single Widget -->
                <div class="contact">
                  <ul>
                    <li>{{ $pengaturan->address }}</li>
                    <li>{{ $pengaturan->email }}</li>
                    <li>{{ $pengaturan->phone }}</li>
                  </ul>
                </div>
                <!-- End Single Widget -->
                <ul>
                  <li><a href="https://www.facebook.com/wahyusadgdfrizal.geforce"><i class="fa fa-facebook"></i></a></li>
                  <li><a target="_blank" href="https://api.whatsapp.com/send?phone=62{{ substr($pengaturan->phone, 1, 10) }}8&text=Saya%20ingin%20order."><i class="fa fa-whatsapp"></i></a></li>
                  <li><a href="https://www.instagram.com/wahyuu.sz/"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
              <!-- End Single Widget -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Footer Top -->
      <div class="copyright">
        <div class="container">
          <div class="inner">
            <div class="row">
              <div class="col-lg-6 col-12">
                <div class="left">
                  <p>Copyright © {{ date('Y') }} {{ $pengaturan->name }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- /End Footer Area -->
     <!-- Jquery -->
	 <script src="/js/jquery.min.js"></script>
	 <script src="/js/jquery-migrate-3.0.0.js"></script>
	 <script src="/js/jquery-ui.min.js"></script>
	 <!-- Popper JS -->
	 <script src="/js/popper.min.js"></script>
	 <!-- Bootstrap JS -->
	 <script src="/js/bootstrap.min.js"></script>
	 <!-- Color JS -->
	 {{-- <script src="/js/colors.js"></script> --}}
	 <!-- Slicknav JS -->
	 <script src="/js/slicknav.min.js"></script>
	 <!-- Owl Carousel JS -->
	 <script src="/js/owl-carousel.js"></script>
	 <!-- Magnific Popup JS -->
	 <script src="/js/magnific-popup.js"></script>
	 <!-- Fancybox JS -->
	 <script src="/js/facnybox.min.js"></script>
	 <!-- Waypoints JS -->
	 <script src="/js/waypoints.min.js"></script>
	 <!-- Countdown JS -->
	 <script src="/js/finalcountdown.min.js"></script>
	 <!-- Nice Select JS -->
	 <script src="/js/nicesellect.js"></script>
	 <!-- Ytplayer JS -->
	 <script src="/js/ytplayer.min.js"></script>
	 <!-- Flex Slider JS -->
	 <script src="/js/flex-slider.js"></script>
	 <!-- ScrollUp JS -->
	 <script src="/js/scrollup.js"></script>
	 <!-- Onepage Nav JS -->
	 <script src="/js/onepage-nav.min.js"></script>
	 <!-- Easing JS -->
	 <script src="/js/easing.js"></script>
	 <!-- Active JS -->
	 <script src="/js/active.js"></script>
	 <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
	 <script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>
	@stack('scripts')
	@include('sweet::alert')
  </body>
</html>