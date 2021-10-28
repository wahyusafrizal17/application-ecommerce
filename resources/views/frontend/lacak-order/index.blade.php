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
            <li class="active"><a href="#">Lacak Order</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <!-- Shopping Summery -->
        <div class="myBox">
            <div class="row list-order">
              <div class="col-md-12 header-box">
                <div class="row">
                  <div class="col-md-2 col-2">
                    No Faktur
                  </div>
                  <div class="col-md-3 col-3">
                    Produk
                  </div>
                  <div class="col-md-2 col-2">
                    Total Harga
                  </div>
                  <div class="col-md-2 col-2">
                    Status
                  </div>
                  <div class="col-md-3 col-3">
                    #
                  </div>
                </div>
              </div>
              @if($transactions)
             @foreach($transactions as $transaction)
              <div class="col-md-12 content-box">
                <div class="row">
                  <div class="col-md-2 col-2">
                    {{ $transaction->nota }}
                  </div>
                  <div class="col-md-3 col-3">
                    <?php
                  $products = product_list($transaction->cart_id);
                ?>
                @foreach($products as $product)
                  # {{ $product->name_product }} ({{$product->qty}})<br>
                @endforeach
                  </div>
                  <div class="col-md-2 col-2">
                    @currency($transaction->total)
                  </div>
                  <div class="col-md-2 col-2">
                    {{ $transaction->status }}
                  </div>
                  <div class="col-md-3 col-3">
                    @if($transaction->status == "DITERIMA" || $transaction->status == "DITOLAK")
                    <a href="products" class="btn-transaksi">BELI LAGI</a>
                    @elseif($transaction->status == "DIKIRIM")
                    <a href="lacak-order/{{ base64_encode($transaction->nota) }}" class="btn-transaksi cekResi" style="background: #424646">Lacak</a>
                    <a href="javascript:void(0)" data-id="{{ $transaction->id }}" type="button" class="btn-transaksi sudahSampai">Pesanan Diterima</a>
                    @elseif($transaction->status == "MENUNGGU PEMBAYARAN")
                    <a href="payment?nota={{$transaction->nota}}" class="btn-transaksi sudahSampai">BAYAR SEKARANG</a>
                    @else
                    <a href="javascript:void(0)" data-id="{{ $transaction->id }}" type="button" class="btn-transaksi" style="background: rgba(0,0,0,.26) !important" disabled>Pesanan Diterima</a>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
            @else
            <div class="col-md-12 content-box">
              Anda belum pernah melakukan transaksi
            </div>
            @endif
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@push('scripts')
<script>
$(document).ready(function() {
  
  $(".sudahSampai").click(function() {
    var id = $(this).data('id'); 
    $.ajax({
        url: '{{ route('konfirmasi-transaction') }}',
        method: 'GET',
        cache: false,
        data:"id="+id,
        success: function(data){
          location.reload();
        }
    });
  });

});

</script>
@endpush
