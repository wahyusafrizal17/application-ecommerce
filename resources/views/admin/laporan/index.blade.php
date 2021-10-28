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
                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm">
                            <i class="fas fa-file-pdf"></i> export laporan
                            </button>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                      <div class="table-responsive">
                         <table id="basic-datatables" class="table table-striped table-hover">
                           <thead>
                              <tr>
                                 <th>Aksi</th>
                                 <th style="width: 15%">Tanggal</th>
                                 <th style="width: 16%">No. Faktur</th>
                                 <th style="width: 20%">Nama Pelanggan</th>
                                 <th style="width: 100px">Ongkir</th>
                                 <th style="width: 100px">Jumlah</th>
                                 <th style="width: 20%">Total</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($model as $row)
                              <tr>
                                 <td>
                                    <a href="{{ route('laporan.print', ['id' => $row->id]) }}" class="btn btn-outline-primary btn-sm">
                                       <i class="fa fa-print"></i> print
                                    </a>
                                 </th>
                                 <td>{{ substr($row->created_at,0,10) }}</td>
                                 <td>{{ $row->nota }}</td>
                                 <td>{{ $row->name }}</td>
                                 <td>@currency($row->ongkir)</td>
                                 <td>@currency($row->subtotal)</td>
                                 <td>@currency($row->total)</td>
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

 @include('admin.laporan._modal-filter')

 <div class="modal fade" id="run-topup-bypass-modal" tabindex="-1" aria-labelledby="run-topup-bypass-modalLabel" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog" style="position: absolute;top: 160px;right: 438px;">
      <div class="modal-content" style="width: 415px;border: none;background: transparent">
         <div class="modal-body text-center" style="padding-top: 20px; background: transparent">
           <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="">
         </div>
       </div>
   </div>
 </div>
@endsection

@push('scripts')

<script>

$(document).ready(function () {
   $("#export").click(function() {
    $.ajax({
        url: '{{ route('laporan.export') }}',
        method: 'GET',
        cache: false,
        beforeSend: function() {
        $('#run-topup-bypass-modal').modal('show');
        $('#run-topup-bypass-modal').find('.close').attr('disabled', true);
        $("#exampleModal").modal('toggle');
         },
        success: function(data){
        $("#run-topup-bypass-modal").modal('toggle');
         window.location = '{{ route('laporan.export') }}';
        }
    });
  });            
 });

</script>

@endpush