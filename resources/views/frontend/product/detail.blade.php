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
  <input type="text" style="position: absolute;left: -350px;" value="{{url('product/'.$product->slug)}}" id="myUrl" readonly>
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
                        <h3 style="color: #2979ff">@currency($product->sell_price)</h3>
						<div class="quickview-peragraph">
                        <span style="font-weight: bold;">Deskripsi :</span>
                        <div class="mt-3" style="padding-left: 12px;margin-top: -15px;">
                            <span>{!! $product->description !!}</span>
                        </div>
                        </div>
                        
                        <div class="size">
                            <div class="quantity">
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]" disabled="disabled">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="100" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Input Order -->
                                {{-- <div class="input-group">
        
                                    <input type="number" style="width: 100%;height: 45px;" name="qty" class="form-control" placeholder="QTY...." required>
                   
                                </div> --}}
                                <!--/ End Input Order -->
                            </div>
                            <div class="add-to-cart">
                                <button type="submit" class="btn">Tambah Ke Keranjang</button>
                            </div>
                            <div class="default-social">
                                <h4 class="share-now">Share:</h4>
                                <ul>
                                    <li><a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('product/'.$product->slug)}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="youtube" target="_blank" href="whatsapp://send?text={{url('product/'.$product->slug)}}"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><button type="button" class="twitter" onclick="myFunction()"><i class="fas fa-copy"></i></button></li>
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


@push('scripts')
<script>
    function myFunction() {
    var copyText = document.getElementById("myUrl");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("Link Berhasil Dicopy");
}
</script>

@endpush