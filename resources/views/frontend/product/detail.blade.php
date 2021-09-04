@extends('layouts.app')
@section('title','Manage Slider Image')
@section('content')

<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="bread-inner">
            <ul class="bread-list">
              <li><a href="/">Home<i class="fa fa-arrow-right"></i></a></li>
              <li class="active"><a href="#">{{ $product->name_product }} </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

{{ Form::open(['url'=>route('cart.save'),'class'=>'form-horizontal',])}}
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <section class="product-area shop-sidebar shop section">
  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/img/product/'.$product->image)}}" alt="#">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="quickview-content" style="padding-top: 0;">
                    <h2>{{ $product->name_product }}</h2>
                        <div class="quickview-ratting-review">
                            {{-- <div class="quickview-ratting-wrap">
                                <div class="quickview-ratting">
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="#"> (1 customer review)</a>
                            </div> --}}
                            <div class="quickview-ratting-review">
                                <span>stok tersisa : {{ (!empty(hitung_stok_product($product->id)[0]->qty)) ? hitung_stok_product($product->id)[0]->qty - hitung_stok_product_keluar($product->id)[0]->qty : 0 }}</span>
                            </div>
                        </div>
                        <span>terjual : {{ (!empty(hitung_stok_product_keluar($product->id)[0]->qty)) ? hitung_stok_product_keluar($product->id)[0]->qty : 0 }}</span>
                        <br>
                        <h3 style="color: #F7941D">@currency($product->sell_price)</h3>
						<div class="quickview-peragraph">
                        <span style="font-weight: bold;">Deskripsi :</span>
                        <div class="mt-3" style="padding-left: 12px;margin-top: -15px;">
                            <span>{!! $product->description !!}</span>
                        </div>
                        </div>
                        
                        <div class="size">
                            <div class="quantity">
                                <!-- Input Order -->
                                <div class="input-group">
        
                                    <input type="number" style="width: 100%;height: 45px;" name="qty" class="form-control" placeholder="QTY...." required>
                   
                                </div>
                                <!--/ End Input Order -->
                            </div>
                            <div class="add-to-cart">
                                <button type="submit" class="btn">Tambah Ke Keranjang</button>
                            </div>
                            <div class="default-social">
                                <h4 class="share-now">Share:</h4>
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="fa fa-whatsapp"></i></a></li>
                                    <li><a class="dribbble" href="#"><i class="fa fa-copy"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  </section>
{{ Form::close() }}
@endsection