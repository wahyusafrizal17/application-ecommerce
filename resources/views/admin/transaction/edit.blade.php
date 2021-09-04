@extends('admin.layoutV2')
@section('title','Manage Customer')
@section('content')

<div class="main-panel">
  <div class="container">
     <div class="page-inner">
        <div class="row">
           <div class="col-md-12">
            <div class="card">
              {{ Form::model($transaction,['url'=>route('transaction.update',['id'=>$transaction->id]),'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
              <table class="table table-striped" style="background: #EBF5FB; border-color: white" border="1">
                  <tr>
                    <td colspan="3">
                      <div class="py-2 bg-primary">
                        <div class="container">
                          <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
                            <div class="col-lg-12 d-block">
                              <div class="row d-flex">
                                <div class="col-md-12 pr-4 d-flex topper align-items-center">
                                  <span class="text">PROFIL DATA ANDA</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th width="250">Nota</th>
                    <td width="50">:</td>
                    <td>{{ $transaction->nota }} </td>
                  </tr>
                  <tr>
                    <th width="250">Nama Pemesan</th>
                    <td width="50">:</td>
                    <td>{{ $transaction->checkout->user->name }}</td>
                  </tr>
                  <tr>
                    <th width="250">Nama Penerima</th>
                    <td width="50">:</td>
                    <td>{{ $transaction->checkout->name }}</td>
                  </tr>
                  <tr>
                    <th width="250">Tujuan Pengiriman</th>
                    <td width="50">:</td>
                    <td>{{ $transaction->checkout->address }}</td>
                  </tr>
                  <tr>
                      <th width="250">Total</th>
                      <td width="50">:</td>
                      <td>@currency($transaction->total)</td>
                    </tr>
                  <tr>
                      <th width="250">Pembayaran via</th>
                      <td width="50">:</td>
                      <td><sup>{{ $transaction->checkout->card->name_card }}</sup> {{ $transaction->checkout->payment }}</td>
                  </tr>
                  <tr>
                      <th width="250">Tanggal Pemesanan</th>
                      <td width="50">:</td>
                      <td>{{ $transaction->created_at }}</td>
                  </tr>
                  <tr>
                      <td colspan="3">
                        <div class="py-2 bg-primary">
                          <div class="container">
                            <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
                              <div class="col-lg-12 d-block">
                                <div class="row d-flex">
                                  <div class="col-md-12 pr-4 d-flex topper align-items-center">
                                    <span class="text">PRODUCT YANG DI PESAN</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                          <div class="row mt-3">
                            <div class="col-md-12">
                              <table class="display table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" width="15%">Gambar</th>
                                    <th scope="col" width="40%">Nama produk</th>
                                    <th scope="col" width="25%">Harga</th>
                                    <th scope="col" width="15%">Jumlah</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                      $products = product_list($transaction->checkout->cart_id);
                                  ?>
                                  <?php $no = 1; ?>
                                  @foreach($products as $product)
                                  <tr>
                                    <th scope="row">{{ $no }}</th>
                                    <td><img src="{{ asset('assets/img/product/'.$product->image)}}" style="width: 50%;"></td>
                                    <td>{{ $product->name_product }}</td>
                                    <td>@currency($product->sell_price)</td>
                                    <td>{{ $product->qty }}</td>
                                  </tr>
                                  <?php $no++; ?>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                      </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <div class="py-2 bg-primary">
                        <div class="container">
                          <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
                            <div class="col-lg-12 d-block">
                              <div class="row d-flex">
                                <div class="col-md-12 pr-4 d-flex topper align-items-center">
                                  <span class="text">BUKTI TRANSFER</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-md-3"> 
                                <img src="{{ asset('assets/img/bukti-transfer/'.$transaction->bukti_transfer)}}" width="100%">
                            </div>
                        </div>
                    </td>
                </tr>
                </table>
  
                <table class="table table-striped">
                  <tr>
                    <td colspan="3">
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <button type="submit" class="btn btn-success btn-sm">PROSES PESANAN</button>
                          <a href="{{ route('transaction.index') }}" class="btn btn-primary btn-sm">KEMBALI</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
  
              </form>
          </div>
           </div>
        </div>
     </div>
  </div>
</div>
</div>
@endsection