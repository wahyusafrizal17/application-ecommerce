@extends('admin.layoutV2')
@section('title','Manage Product')
@section('content')

<div class="main-panel">
    <div class="container">
       <div class="page-inner">
          <div class="row">
             <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                      <div class="row">
                         <div class="col-md-6">
                            <h5 class="card-title">Laporan penjualan</h5>
                         </div>
                         <div class="col-md-6 text-right">
                            <a href="#" class="btn btn-success btn-sm">
                            <i class="fa fa-file"></i> Export excel
                            </a>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                      <div class="table-responsive">
                         <table id="basic-datatables" class="table table-striped table-hover">
                            <thead>
                               <tr>
                                  <th style="width: 25%">Nama produk</th>
                                  <th style="width: 20%">Harga beli</th>
                                  <th style="width: 20%">Harga jual</th>
                                  {{-- <th style="width: 10%">Stok</th>
                                  <th style="width: 10%">Terjual</th> --}}
                                  <th style="width: 20%">Pengeluaran</th>
                                  <th style="width: 20%">Pemasukan</th>
                                  <th>Keuntungan</th>
                               </tr>
                            </thead>
                            <tbody>
                               @foreach($model as $row)
                               <tr>
                                  <td>{{ $row->name_product }}</td>
                                  <td>@currency($row->buy_price)</td>
                                  <td>@currency($row->sell_price)</td>
                                  {{-- <td>{{ hitung_stok_product($row->id)[0]->qty - hitung_stok_product_keluar($row->id)[0]->qty }}</td>
                                  <td>{{ hitung_stok_product_keluar($row->id)[0]->qty }}</td> --}}
                                  <td>@currency(total_perhitungan_keuangan_pemasukan($row->id)[0]->total)</td>
                                  <td>@currency(total_perhitungan_keuangan_pengeluaran($row->id)[0]->total)</td>
                                  <td>@currency(total_keuntungan_penjualan($row->id)[0]->total)</td>
                               </tr>
                               @endforeach
                            </tbody>
                         </table>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 </div>
@endsection