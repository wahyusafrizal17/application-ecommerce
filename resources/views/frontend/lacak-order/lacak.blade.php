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
        <div class="col-12">
            <div class="alert alert-light">
                <div class="row">
                    <div class="col-md-6">
                        <i class="fa fa-history"></i> Update histori terakhir : {{ date('d F Y', strtotime($track->history[0]->date)) }}, {{ substr($track->history[0]->date, 10,15) }}
                    </div>
                    <div class="col-md-6 text-right">
                        {{ $track->summary->awb }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        Tanggal pengiriman
                    </div>
                    <div class="col-md-1">
                        :
                    </div>
                    <div class="col-md-6 text-left">
                        {{ $track->summary->date }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Nama penerima
                    </div>
                    <div class="col-md-1">
                        :
                    </div>
                    <div class="col-md-6 text-left">
                        {{ $track->detail->receiver }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Tujuan
                    </div>
                    <div class="col-md-1">
                        :
                    </div>
                    <div class="col-md-6 text-left">
                        {{ $track->detail->destination }}
                    </div>
                </div>
             </div>
        </div>
      <div class="col-12">

        <table class="table shopping-summery">
            <thead>
              <tr class="main-hading">
                <th width="5%">#</th>
                <th>TANGGAL</th>
                <th>STATUS PENGIRIMAN</th> 
              </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach($track->history as $row)
                    <tr class="text-center">
                        <td>{{ $no }}</td>
                        <td>{{ date('d F Y', strtotime($row->date)) }}, {{ substr($row->date, 10,15) }}</td>
                        <td>{{ $row->desc }}</td>
                    </tr>
                <?php $no++; ?>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

@endsection