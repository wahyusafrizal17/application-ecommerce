
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
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="https://wpthemesgrid.com/themes/free/eshop/images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0//css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
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
	{{-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> --}}
	<!-- End Preloader -->
	
	<!-- Get Pro Button -->
    <ul class="pro-features">
		<a class="get-pro" href="https://api.whatsapp.com/send?phone=085216283748&text=Saya%20tertarik%20untuk%20membeli%20produk%20ini%20segera."><img src="https://pluspng.com/img-png/whatsapp-png-whatsapp-logo-png-1000.png" width="40"></a>
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
				  <li><i class="fa fa-phone"></i> {{ $contact->phone }}</li>
				  <li><i class="fa fa-envelope"></i> {{ $contact->email }}</li>
				  </ul>
				</div>
				<!--/ End Top Left -->
			  </div>
			  <div class="col-lg-8 col-md-12 col-12">
				<!-- Top Right -->
				<div class="right-content">
				  <ul class="list-main">
					<li><i class="fa fa-map-pin"></i> Bandung</li>
					<li><i class="fa fa-history"></i> <a href="#">09:00 - 17:00</a></li>
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
								<a href="index.html"><img src="https://wpthemesgrid.com/themes/free/eshop/images/logo.png" alt="logo"></a>
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
									<select>
										<option selected="selected">All Category</option>
										<option>watch</option>
										<option>mobile</option>
										<option>kid’s item</option>
									</select>
									<form>
										<input name="search" placeholder="Search Products Here....." type="search">
										<button class="btnn"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
								<div class="sinlge-bar">
								  <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar">
								  <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar shopping">
								  <a href="#" class="single-icon"><i class="fa fa-shopping-cart"></i> <span class="total-count">2</span></a>
								  <!-- Shopping Item -->
									<div class="shopping-item">
										<div class="dropdown-cart-header">
											<span>2 Items</span>
											<a href="#">View Cart</a>
										</div>
										<ul class="shopping-list">
											<li>
												<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
												<a class="cart-img" href="#"><img src="https://wpthemesgrid.com/themes/free/eshop/images/product-1.jpg" alt="#"></a>
												<h4><a href="#">Woman Ring</a></h4>
												<p class="quantity">1x - <span class="amount">$99.00</span></p>
											</li>
											<li>
												<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
												<a class="cart-img" href="#"><img src="https://wpthemesgrid.com/themes/free/eshop/images/product-2.jpg" alt="#"></a>
												<h4><a href="#">Woman Necklace</a></h4>
												<p class="quantity">1x - <span class="amount">$35.00</span></p>
											</li>
										</ul>
										<div class="bottom">
											<div class="total">
												<span>Total</span>
												<span class="total-amount">$134.00</span>
											</div>
											<a href="/checkout" class="btn animate">Checkout</a>
										</div>
									</div>
									<!--/ End Shopping Item -->
								</div>
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
													<li><a href="/products">Product</a></li>												
													<li><a href="/cart">Cart</a></li>							
													<li><a href="#">Blog<i class="fa fa-caret-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="/contact">Contact Us</a></li>
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
						<h4>Fast Delivery</h4>
						<p>Pengiriman 100% Terjaga</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="fa fa-archive"></i>
						<h4>Product Original</h4>
						<p>Barang 100% Original</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="fa fa-lock"></i>
						<h4>Secirity</h4>
						<p>Keamanan 100%</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="fa fa-eye"></i>
						<h4>Visitor</h4>
						<p>100 Pengunjung</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
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
	</section>
	<!-- End Shop Newsletter -->
	
    <!-- Start Footer Area -->
    <footer class="footer">
      <!-- Footer Top -->
      <div class="footer-top section">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer about">
                <div class="logo">
                  <a href="/"><img src="https://wpthemesgrid.com/themes/free/eshop/images/logo.png" alt="#"></a>
                </div>
                <p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
                <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">{{ $contact->phone }}</a></span></p>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer links">
                <h4>Subcribe Channel Kami :</h4>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/fytcYPKDgMA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              <!-- End Single Widget -->
            </div>
      
            <div class="col-lg-3 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer social">
                <h4>Get In Tuch</h4>
                <!-- Single Widget -->
                <div class="contact">
                  <ul>
                    <li>{{ $contact->address }}</li>
                    <li>{{ $contact->email }}</li>
                    <li>{{ $contact->phone }}</li>
                  </ul>
                </div>
                <!-- End Single Widget -->
                <ul>
                  <li><a href="https://www.facebook.com/wahyusadgdfrizal.geforce"><i class="fa fa-facebook"></i></a></li>
                  <li><a target="_blank" href="https://api.whatsapp.com/send?phone=085216283748&text=Saya%20tertarik%20untuk%20membeli%20produk%20ini%20segera."><i class="fa fa-whatsapp"></i></a></li>
                  <li><a href="https://www.youtube.com/channel/UCRxm7Kvh3a8DocNUz-5AL8w?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>
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
                  <p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="right">
                  <img src="https://wpthemesgrid.com/themes/free/eshop/images/payments.png" alt="#">
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
	@stack('scripts')
  </body>
</html>