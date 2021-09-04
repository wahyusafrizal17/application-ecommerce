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
    <div class="row">
      <div class="col-12">
        <!-- Shopping Summery -->
        <table class="table shopping-summery">
          <thead>
            <tr class="main-hading">
              <th>Produk</th>
              <th>NAMA PENERIMA</th>
              <th>TOTAL HARGA</th> 
              <th>STATUS</th> 
              <th>#</th> 
            </tr>
          </thead>
          <tbody>
            @if($transactions)
            @foreach($transactions as $transaction)
            <tr align="center">
              <td class="image" data-title="No">
                <?php
                  $products = product_list($transaction->cart_id);
                ?>
                @foreach($products as $product)
                  # {{ $product->name_product }} ({{$product->qty}})<br>
                @endforeach
              </td>
              <td class="product-des" data-title="Description"><span>{{ $transaction->name }}</span></td>
              <td class="total-amount" data-title="Total"><span>@currency($transaction->total)</span></td>
              <td class="total-amount" data-title="Total"><span> SEDANG {{ $transaction->status }}</span></td>
              @if($transaction->status == "DITERIMA")
              <td class="total-amount" data-title="Total">
                <a href="products" class="btn-transaksi">BELI LAGI</a>
              </td>
              @else
            <td class="total-amount" data-title="Total">
              {{-- <a href="konfirmasi-transaction/{{ $transaction->id }}" class="btn" style="width: 100%; color: white; text-align: center">Barang Sudah Sampai</a> --}}
              @if($transaction->status == "DIKIRIM")
              <a href="lacak-order/{{ base64_encode($transaction->nota) }}" class="btn-transaksi cekResi" style="background: #424646">Lacak Pesanan</a>
              <a href="javascript:void(0)" data-id="{{ $transaction->id }}" type="button" class="btn-transaksi sudahSampai">Pesanan Diterima</a>
              @elseif($transaction->status == "MENUNGGU PEMBAYARAN")
              <a href="payment?nota={{$transaction->nota}}" class="btn-transaksi sudahSampai">BAYAR SEKARANG</a>
              @else
              <a href="javascript:void(0)" data-id="{{ $transaction->id }}" type="button" class="btn-transaksi sudahSampai" style="background: rgba(0,0,0,.26) !important" disabled>Pesanan Diterima</a>
              @endif
            </td>
            @endif
          </tr>
          @endforeach
            @else
            <td colspan="5" align="center">Anda belum pernah melakukan transaksi</td>
            @endif
          </tbody>
        </table>
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
