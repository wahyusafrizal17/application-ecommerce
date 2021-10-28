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
            <li class="active"><a href="#">Pelacakan</a></li>
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
      <div class="myBox">
        <div class="col-12">
            <div class="alert alert-light list-order">
                <div class="row">
                    <div class="col-md-6 col-6">
                        <i class="fa fa-history"></i> Update histori terakhir : {{ date('d F Y', strtotime($track->history[0]->date)) }}, {{ substr($track->history[0]->date, 10,15) }}
                    </div>
                    <div class="col-md-6 col-6 text-right">
                        {{ $track->summary->awb }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2 col-3">
                        Tanggal pengiriman
                    </div>
                    <div class="col-md-1 col-1">
                        :
                    </div>
                    <div class="col-md-6 col-6 text-left">
                        {{ $track->summary->date }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3">
                        Nama penerima
                    </div>
                    <div class="col-md-1 col-1">
                        :
                    </div>
                    <div class="col-md-6 col-6 text-left">
                        {{ $track->detail->receiver }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3">
                        Tujuan
                    </div>
                    <div class="col-md-1 col-1">
                        :
                    </div>
                    <div class="col-md-6 col-6 text-left">
                        {{ $track->detail->destination }}
                    </div>
                </div>
             </div>
        </div>
    </div>
        
      <div class="col-12 text-center">
          <div class="myBox">
            <div class="row list-order">
              <div class="col-md-12 header-box">
                <div class="row">
                  <div class="col-md-2 col-2">
                    No
                  </div>
                  <div class="col-md-3 col-3">
                    Tanggal
                  </div>
                  <div class="col-md-2 col-2">
                    Status Pengiriman
                  </div>
                </div>
              </div>
              <?php $no = 1; ?>
                @foreach($track->history as $row)
              <div class="col-md-12 content-box">
                <div class="row">
                  <div class="col-md-1 col-1">
                    {{ $no }}
                  </div>
                  <div class="col-md-5 col-5">
                    {{ date('d F Y', strtotime($row->date)) }}, {{ substr($row->date, 10,15) }}
                  </div>
                  <div class="col-md-6 col-6">
                    {{ $row->desc }}
                  </div>
                </div>
              </div>
              <?php $no++; ?>
              @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection