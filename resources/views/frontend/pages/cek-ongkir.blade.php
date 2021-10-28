@extends('layouts.app')
@section('title','Manage Slider Image')
@section('content')

<style>
  .shop.checkout .nice-select{
    margin-bottom: 10px;
  }
</style>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="/">Home<i class="fa fa-arrow-right"></i></a></li>
            <li class="active"><a href="#">Cek ongkir</a></li>
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
      <div class="col-md-12 text-judul">
        Cek Ongkir
      </div>
    </div>

    {{ Form::open([ 'url'=>route('cek-harga-ongkir') ]) }}
    <div class="row mt-5">
      
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-12">
            <span class="label-form-kontak" style="font-size: 15px !important">Kota Asal</span>
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Provinsi</label>
                    {!! Form::select('province_id', $provinces,null, ['class'=>'form-control','id'=>'province','onChange'=>'loadKabupaten()']) !!}
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kabupaten</label>
                    <div id="div_kabupaten"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kota</label>
                    <div id="div_kecamatan"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-12">
            <span class="label-form-kontak" style="font-size: 15px !important">Kota Tujuan</span>
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Provinsi</label>
                    {!! Form::select('province_destination_id', $provinces,null, ['class'=>'form-control','id'=>'province_destination','onChange'=>'loadKabupatenDestination()']) !!}
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kabupaten</label>
                    <div id="div_kabupaten_destination"></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kota</label>
                    <div id="div_kecamatan_destination"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-12">
            <span class="label-form-kontak" style="font-size: 15px !important">Opsi</span>
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kurir</label>
                    {{ Form::select('courier',['jne' => 'JNE', 'pos' => 'POS INDONESIA', 'tiki' => 'TIKI'],null,['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Berat Kiriman (gram)</label>
                    {{ Form::text('weight',null,['class' => 'form-control form-height', 'placeholder' => '1000','required']) }}
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <button type="submit" class="btn" id="send-data" style="margin-top: 31px;background: #F7941D;">SUBMIT</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         
      </div>
      {{ Form::close() }}

      @if(!empty($costs))
      <div class="col-md-10 mt-5">
        <span class="label-form-kontak" style="font-size: 15px !important">Hasil Pengecekan</span>

        <div class="container mt-2">
          <div class="myBox">
          <table class="table list-ongkir">
            <thead>
              <tr>
                <th scope="col">Kurir</th>
                <th scope="col">Jenis Layanan</th>
                <th scope="col">Tarif</th>
              </tr>
            </thead>
            <tbody>
              @foreach($costs as $cost)
              <tr>
                <td>
                  @if($result[0]->code == 'jne')
                  JNE
                  @elseif($result[0]->code == 'pos')
                  POS INDONESIA
                  @else
                  TIKI
                  @endif
                  <p>{{ $result[0]->name }}</p>
                </td>
                <td>
                  {{ $cost->service }}
                  <p>{{ $cost->description }}</p>
                </td>
                <td style="padding-top: 20px !important;">
                  <span style="font-size: 20px !important;color: #F7941D;font-weight: bold;">@currency($cost->cost[0]->value)</span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
        </div>
      </div>
      @endif
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
        });
    }
 

   
    </script>


<script>
  $(document).ready(function () {
      loadKabupatenDestination();
  });

  // ---------------------- " LOAD ADMINISTRASI CREATE " ----------------------------

  function loadKabupatenDestination(regency_id) {
  // console.log("load kabupaten");
  // console.log("selected kabupaten = "+regency_id);
  var province = $("#province_destination").val();
  $(".kode_provinsi").val(province);
  $.get("/kabupaten-destination", {
      province: province,regency_id:regency_id
  }, function (data, status) {
      // console.log(data);
      $('#div_kabupaten_destination').html(data);
      loadkecamatanDestination();
  });
}

function loadkecamatanDestination() {
  // console.log("load kecamatan");
  var kabupaten = $("#kabupaten_destination").val();
  $(".kode_kabupaten").val(kabupaten);
  // console.log(kabupaten);
  $.get("/kecamatan-destination", {
      kabupaten: kabupaten
  }, function (data, status) {
      // console.log(data);
      $('#div_kecamatan_destination').html(data);
  });
}



function add_ongkirDestination(value)
{
  console.log('ok');
  console.log(value);
  $("#ongkir").text(value);
}
</script>

@endpush