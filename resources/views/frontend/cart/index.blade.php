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
            <li><a href="index1.html">Home<i class="fa fa-arrow-right"></i></a></li>
            <li class="active"><a href="blog-single.html">Checkout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->
<!-- Start Checkout -->
<section class="shop checkout section">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-12">
        <div class="checkout-form">
          
            <table class="table table-bordered">
              <tr align="center">
                <th>Product</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                @if(!$checkout)
                <th>
                  <li class="fa fa-close"></li>
                </th>
                @endif
              </tr>
              <?php $total = 0; ?>
              @foreach($cart as $row)
              {{ Form::hidden('user_id', $row->user_id) }}
              <tr align="center">
                <td><img src="{{ asset('assets/img/product/'.$row->product->image)}}" alt="#" width="50"></td>
                <td>{{ $row->product->name_product }}</td>
                <td>{{ $row->qty }}</td>
                <td>@currency($row->product->sell_price)</td>
                @if(!$checkout)
                <td>
                  <a href="/cart/{{ $row->id }}/delete">
                    <li class="fa fa-close"></li>
                  </a>
                </td>
                @endif
              </tr>
              <?php $total += $row->qty*$row->product->sell_price; ?>
              @endforeach
              <tr>
                <td colspan="3">Total</td>
                <td class="text-center">@currency($total)</td>
              </tr>
              <tr>
                <td colspan="5">
                  @if($checkout)
                  <a href="/checkout" class="btn"  style="color: white; width: 100%; text-align: center"> SELESAIKAN TRANSAKSI </a>
                  @else
                  <a href="/products" class="btn" style="width: 100%; color: white; text-align: center">TAMBAH KERANJANG</a>
                  @endif
                </td>
              </tr>
            </table>
            @if(!$checkout)
          <div class="order-details">
            <div class="single-widget">
                {{ Form::open(['url'=>route('checkout.save'),'class'=>'form-horizontal'])}}
                {{ Form::hidden('user_id', Auth::user()->id) }}
                {{ Form::hidden('subtotal', $total) }}
                <div class="row">
                  <div class="container">
                   <div class="col-md-12">

                    <div class="form-group">
                      <label for="exampleInputPassword1">Provinsi</label>
                      {!! Form::select('province_id', $provinces,null, ['class'=>'form-control','id'=>'province','onChange'=>'loadKabupaten()']) !!}
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Kabupaten</label>
                      <div id="div_kabupaten"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Kecamatan</label>
                      <div id="div_kecamatan"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Jenis Pengiriman</label>
                      <select id="courier" name="courier" class="form-control" onchange="shipping_costs()">
                        <option value="jne" selected>JNE</option>
                        <option value="pos">POS Indonesia</option>
                        <option value="tiki">TIKI</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Ongkir</label>
                      <div id="cost"></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Jenis Pembayaran</label>
                      {{ Form::select('payment',$card,null,['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Penerima</label>
                      {{ Form::text('name', Auth::user()->name ,['class'=>'form-control form-height','placeholder'=>'Nama Penerima'])}}
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">No Telpon/Wa</label>
                      {{ Form::text('phone',null,['class'=>'form-control form-height','placeholder'=>'No Telpon', 'required'])}}
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      {{ Form::textarea('address',null,['class'=>'form-control','rows'=>3,'placeholder'=>'Alamat lengkap', 'required'])}}
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn">Proses</button>
                    </div>
                    
                  </div>
                </div>
                </div>
              {{ Form::close() }}
            </div>
          </div>
          @endif
        </div>
      </div>
      <div class="col-lg-3 col-12">
        <div class="order-details">
          <!-- Order Widget -->
          <div class="single-widget">
            <h2>Product Terbaru</h2>
            
          </div>
          <!--/ End Order Widget -->
          <div class="single-widget" style="margin-top: -5em; text-align: center">
            <h2 class="bg-none">
              @foreach($all as $row)
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
                  </div>
                </div>
                
                <div class="product-content">
                  <h3><a href="products/{{ $row->slug }}" class="text-white">{{ $row->name_product }}</a></h3>
                  <div class="product-price">
                    <span>@currency($row->sell_price)</span>
                  </div>
                </div>
              </div>
                @endforeach
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
        $(document).ready(function () {
            loadKabupaten();
        });

        // ---------------------- " LOAD ADMINISTRASI CREATE " ----------------------------

        function loadKabupaten(regency_id) {
        // console.log("load kabupaten");
        // console.log("selected kabupaten = "+regency_id);
        var province = $("#province").val();
        $(".kode_provinsi").val(province);
        $.get("/kabupaten", {
            province: province,regency_id:regency_id
        }, function (data, status) {
            // console.log(data);
            $('#div_kabupaten').html(data);
            loadkecamatan();
        });
    }

    function loadkecamatan() {
        // console.log("load kecamatan");
        var kabupaten = $("#kabupaten").val();
        $(".kode_kabupaten").val(kabupaten);
        // console.log(kabupaten);
        $.get("/kecamatan", {
            kabupaten: kabupaten
        }, function (data, status) {
            // console.log(data);
            $('#div_kecamatan').html(data);
            shipping_costs();
        });
    }
 

    function shipping_costs()
    {
        // menghitung ongkir berdasarkan tujuan pengiriman dan expedisi yang dipilih
        var destination = $("#kabupaten").val();
        var courier = $("#courier").val();
    
        $.ajax({
            url: "/cost",
            cache: false,
            data:"destination="+destination+"&weight=1000&courier="+courier,
            success: function(html){
                $("#cost").html(html);
            }
            });
    }
    
    function add_ongkir(value)
    {
        console.log('ok');
        console.log(value);
        $("#ongkir").text(value);
        //$(10000).appendTo('#ongkir');
    }
    </script>
@endpush