@extends('layouts.app')
@section('title','Manage Slider Image')
@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="/">Home<i class="fa fa-arrow-right"></i></a></li>
            <li class="active"><a href="#">Produk</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->
<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-12">
        <div class="shop-sidebar">
            <!-- Single Widget -->
            <div class="single-widget category">
              <h3 class="title">Kategori</h3>
              <ul class="categor-list">
                @foreach($categories as $category)
                <li><a href="/kategori/{{ $category->slug }}">{{ $category->name_category }}</a></li>
                @endforeach
              </ul>
            </div>
            <!--/ End Single Widget -->
            
            <!-- Single Widget -->
            <div class="single-widget recent-post">
              <h3 class="title">Product Terlaris</h3>
              <!-- Single Post -->
  
              @foreach($terlaris as $row)
              @if(!empty(hitung_stok_product($row->id)[0]->qty)) 
              <div class="single-post first">
                <div class="image">
                  <img src="{{ asset('assets/img/product/'.$row->image)}}" alt="#">
                </div>
                <div class="content">
                  <h5><a href="/products/{{ $row->slug }}">{{ $row->name_product }}</a></h5>
                  <p class="price">@currency($row->sell_price)</p>
                  <span style="font-size: 10px;">Terjual : {{ (!empty(hitung_stok_product_keluar($row->id)[0]->qty)) ? hitung_stok_product_keluar($row->id)[0]->qty : 0 }}</span>
                  {{-- <ul class="reviews">
                    <li class="yellow"><i class="fa fa-star"></i></li>
                    <li class="yellow"><i class="fa fa-star"></i></li>
                    <li class="yellow"><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  </ul> --}}
                </div>
              </div>
              @endif
              @endforeach
              <!-- End Single Post -->
            </div>
            <!--/ End Single Widget -->
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-12">
        <div class="row">
          <div class="col-12">
            <!-- Shop Top -->
            <div class="shop-top">
              <div class="shop-shorter">
                <div class="single-shorter">
                  <label>Sort By :</label>
                  <select>
                    <option selected="selected">Name</option>
                    <option>Price</option>
                    <option>Size</option>
                  </select>
                </div>
              </div>
            </div>
            <!--/ End Shop Top -->
          </div>
        </div>
        <div class="row">

          @foreach($all as $row)
          @if(!empty(hitung_stok_product($row->id)[0]->qty)) 
          <div class="col-lg-4 col-md-6 col-12" align="center">
            <div class="single-product">
              <div class="product-img" style="border-radius: 10px 10px 0px 0px;">
                <a href="products/{{ $row->slug }}">
                  <img class="default-img" src="{{ asset('assets/img/product/'.$row->image)}}" alt="#">
                  <img class="hover-img" src="{{ asset('assets/img/product/'.$row->image)}}" style="width: 95%" alt="#">
                </a>
                <div class="button-head">
                  <div class="product-action-2" style="padding-left: 15px">
                    <a title="Add to cart" href="products/{{ $row->slug }}">View Product</a>
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
          @endforeach
          
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Product Style 1  -->
@endsection