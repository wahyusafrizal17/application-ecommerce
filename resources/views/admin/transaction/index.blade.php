@extends('admin.layoutV2')
@section('title','Manage transaction')
@section('content')
<style type="text/css">
   #idspinner {
   display: block;
   position: fixed;
   /* z-index: 1031; /* High z-index so it is on top of the page */ */
   top: 50%;
   right: 50%; /* or: left: 50%; */
   margin-top: -..px; /* half of the elements height */
   margin-right: -..px; /* half of the elements widht */
   }
 </style>
<div class="main-panel">
    <div class="container">
       <div class="page-inner">
          <div class="row">
             <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                      <div class="row">
                         <div class="col-md-6">
                            <h5 class="card-title">Pesanan yang belum di kirim</h5>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                      <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                               <tr>
                                  <th style="width: 5%">No</th>
                                  <th>Nota</th>
                                  <th>Nama Pemesan</th>
                                  <th>Total</th>
                                  <th>Tanggal Pemesanan</th>
                                  <th>Resi</th>
                                  <th style="width: 10%" class="text-center">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $transaction->nota}}</td>
                                  <td>{{ $transaction->checkout->user->name}}</td>
                                  <td>@currency($transaction->total)</td>
                                  <td>{{ substr($transaction->created_at,0,10) }}</td>
                                  <td>{{ $transaction->resi }}</td>
                                  <td>
                                     <div class="form-button-action">
                                        @if($transaction->status == 'DIPROSES')
                                        <a href="{{ route('transaction.edit',['id'=>$transaction->id]) }}" data-toggle="tooltip" title="" class="btn btn-success btn-sm" data-original-title="Edit">
                                          PROSES
                                        </a>
                                        @elseif($transaction->status == 'DIKEMAS')
                                        <button class="btn btn-primary btn-sm button-resi" data-id="{{ $transaction->id }}" data-toggle="modal" data-target="#exampleModal">INPUT RESI</button>
                                        @else
                                        <a href="/lacak-order/{{ base64_encode($transaction->nota) }}" target="_blank" class="btn btn-primary btn-sm">LACAK PAKET</a>
                                        @endif
                                     </div>
                                  </td>
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

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-body">
         <div class="form-group">
            <label for="exampleInputPassword1">Resi</label>
            <input type="text" class="form-control" id="resi" placeholder="389832*****77">
          </div>

          <input type="hidden" id="id-transaction">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-success btn-sm btn-simpan-resi">Simpan</button>
       </div>
     </div>
   </div>
 </div>

 <div class="modal fade" id="run-topup-bypass-modal" tabindex="-1" aria-labelledby="run-topup-bypass-modalLabel" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog" style="position: absolute;top: 160px;right: 438px;">
     <div class="modal-content">
       <div class="modal-body text-center">
         <div id="run-topup-bypass-modal-content"></div>
       </div>
     </div>
   </div>
 </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
  
  $(".button-resi").click(function() {
    var id = $(this).data('id'); 
    $.ajax({
        url: '{{ route('send-id-transaction') }}',
        method: 'POST',
        cache: false,
        data: {
         "_token": "{{ csrf_token() }}",
         "id" :id
        },
        success: function(data){
          $("#id-transaction").val(data);
        }
    });
  });


  $(".btn-simpan-resi").click(function() {
    var id = $("#id-transaction").val();
    var resi = $("#resi").val();
    $.ajax({
        url: '{{ route('save-resi') }}',
        method: 'POST',
        cache: false,
        data: {
         "_token": "{{ csrf_token() }}",
         "id" :id,
         "resi" : resi,
        },
        beforeSend: function() {
        $('#run-topup-bypass-modal').modal('show');
        $('#run-topup-bypass-modal').find('.close').attr('disabled', true);
        $('#run-topup-bypass-modal-content').html('<p class="mt-3">Data sedang diprosess, mohon jangan tutup halaman ini.</p>');
        $("#exampleModal").modal('toggle');
         },
        success: function(data){
         $("#run-topup-bypass-modal").modal('toggle');
         swal("Success", "Resi berhasil diinput", {
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
			});
         location.href = '/administrator/transaction?status=DIKIRIM';
        }
    });
  });

});

</script>
@endpush