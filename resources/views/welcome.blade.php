@extends('layouts.app')
@section('title','Manage Slider Image')
@section('content')
	
	<!-- Slider Area -->
	<section class="hero-slider">
		<!-- Single Slider -->
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			{{-- <ol class="carousel-indicators">
			  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol> --}}
			<div class="carousel-inner">
			  <div class="carousel-item active">
				<img class="d-block w-100" src="/img/banner.jpg" alt="First slide" style="height: 550px">
			  </div>
			  @foreach($sliders as $slider)
			  <div class="carousel-item">
				<img class="d-block w-100" src="{{ asset('assets/img/slider/'.$slider->image ) }}" alt="Second slide" style="height: 550px">
			  </div>
			  @endforeach
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->
	<!-- Button trigger modal -->
	<!-- Start Small Banner  -->
	<section class="small-banner section" style="padding-bottom: 5em">
		<div class="container-fluid">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="/img/mini-banner1.jpg" alt="#">
						<div class="content">
							<p>Man's Collectons</p>
							<h3>Summer travel <br> collection</h3>
							<a href="#">Discover Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="/img/mini-banner2.jpg" alt="#">
						<div class="content">
							<p>Bag Collectons</p>
							<h3>Awesome Bag <br> 2020</h3>
							<a href="#">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-4 col-12">
					<div class="single-banner tab-height">
						<img src="/img/mini-banner3.jpg" alt="#">
						<div class="content">
							<p>Flash Sale</p>
							<h3>Mid Season <br> Up to <span>40%</span> Off</h3>
							<a href="#">Discover Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Small Banner -->
@endsection