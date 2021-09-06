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
			@if(!empty($utama))
			  <div class="carousel-item active">
				<img class="d-block w-100" src="{{ asset('assets/img/slider/'.$utama->image ) }}" alt="First slide" style="height: 550px">
			  </div>
			  @endif
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
	
	<div class="product-area section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>PRODUK TERBARU</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="product-info">
						
						<div class="tab-content" id="myTabContent">
							<!-- Start Single Tab -->
							<div class="tab-pane fade show active">
								<div class="tab-single">
									<div class="row">
										@foreach($product as $row)
										@if(hitung_stok_product($row->id)[0]->qty - hitung_stok_product_keluar($row->id)[0]->qty > 0)
										@if(!empty(hitung_stok_product($row->id)[0]->qty))
										<div class="col-xl-3 col-lg-4 col-md-4 col-12" align="center">
											<div class="single-product">
												<div class="product-img">
													<a href="products/{{ $row->slug }}">
														<img class="default-img" src="{{ asset('assets/img/product/'.$row->image)}}" alt="#">
														<img class="hover-img" src="{{ asset('assets/img/product/'.$row->image)}}" alt="#">
													</a>
													<div class="button-head">
														<div class="product-action-2" style="padding-left: 15px">
														  <a title="Add to cart" href="products/{{ $row->slug }}">Lihat</a>
														</div>
														<div style="float: right;padding-right: 15px;">
														  <span>@currency($row->sell_price)</span>
														</div>
													  </div>
												</div>
												<div class="product-content">
													<h3><a href="products/{{ $row->slug }}" class="text-white">{{ $row->name_product }}</a></h3>
													{{-- <div class="product-price">
													  <span>@currency($row->price)</span>
													</div> --}}
												  </div>
											</div>
										</div>
										@endif
										@endif
										@endforeach

										<div class="col-md-12 text-center mt-5">
											<a href="/products" class="btn" style="background: #F7941D;color: white">LIHAT SEMUA PRODUK</a>
										  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
@endsection