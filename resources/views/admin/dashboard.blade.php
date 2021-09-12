@extends('admin.layoutV2')
@section('title','Dashboard')
@section('content')

<div class="main-panel">
  <div class="container">
    <div class="page-inner">
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-secondary mr-3">
                <i class="fa fa-dollar-sign"></i>
              </span>
              <div>
                <h5 class="mb-1"><b><a href="#">Produk</a></b></h5>
                <small class="text-muted">{{ count($product) }}</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-success mr-3">
                <i class="fa fa-shopping-cart"></i>
              </span>
              <div>
                <h5 class="mb-1"><b><a href="#">Pesanan</a></b></h5>
                <small class="text-muted">{{ count($transaction) }}</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-danger mr-3">
                <i class="fa fa-users"></i>
              </span>
              <div>
                <h5 class="mb-1"><b><a href="#">Pengeluaran</a></b></h5>
                <small class="text-muted">@currency($pemasukan[0]->total)</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-warning mr-3">
                <i class="fa fa-comment-alt"></i>
              </span>
              <div>
                <h5 class="mb-1"><b><a href="#">Pemasukan</a></b></h5>
                <small class="text-muted">@currency($pengeluaran[0]->total)</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Grafik keuntungan penjualan</div>
            </div>
            <div class="card-body">
              <div class="chart-container" style="min-height: 375px">
                <canvas id="statisticsChart"></canvas>
              </div>
              <div id="myChartLegend"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection