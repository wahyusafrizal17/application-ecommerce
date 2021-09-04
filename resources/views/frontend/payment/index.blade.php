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
            <li class="active"><a href="#">Payment</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->
<!-- Product Style -->
<section class="shop checkout section">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-12">
        <div class="checkout-form">
          <div class="order-details">
            <!-- Order Widget -->
            <div class="single-widget">
              <h2>INFORMASI PEMBAYARAN</h2>
              <div class="content">
                <ul>
                  <li>Rekening Tujuan<span><sub>{{ $checkout->card->name_card }}</sub> | {{ $checkout->payment }}</span></li>
                  <li>Total Pembayaran<span>@currency($transaction->total)</span></li>
                  <li class="last"></li>
                </ul>
              </div>
            </div>
            <!--/ End Order Widget -->
            <!-- Order Widget -->
            <div class="single-widget">
              <h2>ALAMAT PENERIMA</h2>
              <div class="content">
                <ul>
                  <li><strong>Nama :</strong> {{ $checkout->name }}</li>
                  <li><strong>No Telp :</strong> {{ $checkout->phone }}</li><br>
                  <li><strong>Provinsi :</strong> {{ $address[0]->province_name }}</li>
                  <li><strong>Kabupaten :</strong> {{ $address[0]->city_name }}</li>
                  <li><strong>Kecamatan :</strong> {{ $address[0]->subdistrict_name }}</li><br>
                  <li><strong>Alamat :</strong> {{ $checkout->address }}</li>
                </ul>
                <hr>
              </div>
            </div>
            @if(!empty($transaction->bukti_transfer))
            <div class="single-widget">
              <div class="content">
                <div class="container">
                  <div class="alert alert-info">
                    <ol>
                    <li>Pesanan Anda Sedang Di Proses</li>
                    <li>Lacak Pesanan Anda Di <a href="/lacak-order">SINI</a></li>
                    </ol>
                  </div>
                </div>
                <hr>
              </div>
            </div>
            @else
            <div class="single-widget get-button">
              <div class="content">
                {{ Form::open(['url'=>route('upload-bukti-transfer.upload'),'class'=>'form-horizontal','files'=>true])}}
                {{ Form::hidden('checkout_id', $checkout->id) }}
                {{ Form::hidden('id', $transaction->id) }}
                <div class="button" align="left">
                  <label>Upload Bukti Transfer<sup style="color: red">*</sup></label>
                  <input type="file" name="bukti_transfer" class="form-control" required><br>
                  <button type="submit" class="btn">UPLOAD BUKTI TRANSFER</button>
                </div>
                </form>
              </div>
            </div>
            <div class="single-widget">
              <div class="content">
                <hr>
              </div>
            </div>
            @endif

            <!--/ End Button Widget -->
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-12">
        <form action="/proses-transaction" method="get">
          <div class="order-details">
            <!-- Order Widget -->
            <div class="single-widget">
              <h2>CARA KONFIRMASI</h2>
              <div class="content">
                <ul>
                  <li>1. Melakukan pembayaran dengan jumlah @currency($transaction->total + $checkout->price).</li>
                  <li>2. Melakukan transfer ke no rekening 1390704051.</li>
                  <li>3. Klik konfirmasi jika anda sudah melakukan pembayaran.</li>
                  <li>4. Anda akan menerima konfirmasi dari kami jika sudah berhasil.</li>
                  <li>5. konfirmasi kami akan di kirim lewat Email anda.</li>
                </ul>
              </div>
            </div>
            <!--/ End Order Widget -->
            <div class="single-widget get-button">
              <div class="content">
                <div class="button">
                  <button data-id="{{ $transaction->id }}" type="button" class="btn cancel">BATAL TRANSAKSI</button>
                  {{-- <a href="/cancel-transaction/{{ $transaction->id }}" class="btn">BATAL TRANSAKSI</a> --}}
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
  
  $(".cancel").click(function() {
    var id = $(this).data('id'); 
    $.ajax({
        url: '{{ route('cancel-transaction') }}',
        method: 'GET',
        cache: false,
        data:"id="+id,
        success: function(data){
          window.location.href = '/checkout';
        }
    });
  });

});

</script>
@endpush

