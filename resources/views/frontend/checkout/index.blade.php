

@extends('layouts.app')
@section('title','Manage Slider Image')
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="index1.html">Home<i class="fa fa-arrow-right"></i></a></li>
            <li class="active"><a href="blog-single.html">Checkout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="shop checkout section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="checkout-form">
          <table class="table table-bordered">
            <tr style="background-color: #F7941D;color: white">
              <th>Produk</th>
              <th>Nama produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
            </tr>

            <?php $total = 0; ?>
            @foreach($cart as $row)

            <tr>
              <td><img src="{{ asset('assets/img/product/'.$row->product->image)}}" alt="#" width="50"></td>
              <td>{{ $row->product->name_product }}</td>
              <td>{{ $row->qty }}</td>
              <td>@currency($row->product->sell_price)</td>
            </tr>

            <?php $total += $row->qty*$row->product->sell_price; ?>
            @endforeach

          </table>
          <div class="order-details">
            <div class="single-widget">
              <div class="container">
              <div class="row">
                <div class="col-md-12">
                   <span class="title-card">Alamat Pengiriman</span>
                   <hr>
                </div>
                <div class="col-md-12">
                  <strong>Nama :</strong> {{ $checkout->name }}<br>
                  <strong>No Telp :</strong> {{ $checkout->phone }} <br><br>
                  <strong>Provinsi :</strong> {{ $address[0]->province_name }} <br>
                  <strong>Kabupaten :</strong> {{ $address[0]->city_name }} <br>
                  <strong>Kecamatan :</strong> {{ $address[0]->subdistrict_name }} <br><br>

                  <strong>Alamat :</strong> {{ $checkout->address }}<br>
                  
                </div>
                <div class="col-md-12 mt-5 text-right">
                  
                    <!-- Button trigger modal -->
                    {{-- <a style="color: white" href="/update-shipping/{{ $checkout->id }}" class="btn btn-primary">
                    Update Pembelian
                    </a> --}}

                    <button data-id="{{ $checkout->id }}" type="button" class="btn batal">UBAH PEMBELIAN</button>
                  
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <form action="/proses-transaction" method="get">
          {{ Form::hidden('checkout_id', $checkout->id) }}
          {{ Form::hidden('total', $total + $checkout->ongkir) }}
          {{ Form::hidden('user_id', $checkout->user_id) }}
          <div class="order-details">
            <div class="single-widget">
              <h2>TOTAL</h2>
              <div class="content">
                <ul>
                  <li>Sub Total<span>@currency($total)</span></li>
                  <li>Ongkir<span>@currency($checkout->ongkir)</span></li>
                  <li class="last">Total<span>@currency($total + $checkout->ongkir)</span></li>
                </ul>
              </div>
            </div>
            <div class="single-widget">
              <h2>Pembayaran</h2>
              <div class="content">

                <ul>
                  <li>Rekening<span>{{ $checkout->card->name_card }}</span></li>
                  <li>No Rekening<span>{{ $checkout->payment }}</span></li>
                </ul>

              </div>
            </div>
            <div class="single-widget payement">
              <div class="content">
                <img src="https://wpthemesgrid.com/themes/free/eshop/images/payment-method.png" alt="#">
              </div>
            </div>
            <div class="single-widget get-button">
              <div class="content">
                <div class="button">
                  @if($transaction)
                  <a href="/payment" class="btn">Bayar Sekarang</a>
                  @else
                  <button type="submit" class="btn">Bayar Sekarang</button>
                  @endif
                  
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
  
  $(".batal").click(function() {
    var id = $(this).data('id'); 
    $.ajax({
        url: '{{ route('update-shipping') }}',
        method: 'GET',
        cache: false,
        data:"id="+id,
        success: function(data){
          window.location.href = '/cart';
        }
    });
  });

});

</script>
@endpush