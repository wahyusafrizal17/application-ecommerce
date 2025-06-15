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
                            <h5 class="card-title">Data Product</h5>
                         </div>
                         <div class="col-md-6 text-right">
                            <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah Product
                            </a>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                      <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                               <tr>
                                  <th style="width: 5%">No</th>
                                  <th style="width: 25%">Nama product</th>
                                  <th style="width: 15%">Kategori</th>
                                  <th style="width: 15%">Harga beli</th>
                                  <th style="width: 15%">Harga jual</th>
                                  <th style="width: 15%">Stok</th>
                                  {{-- <th class="text-center">Gambar</th> --}}
                                  <th style="width: 10%" class="text-center">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                               @foreach($products as $product)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $product->name_product}}</td>
                                  <td>{{ $product->category->name_category}}</td>
                                  <td>@currency($product->buy_price)</td>
                                  <td>@currency($product->sell_price)</td>
                                  @if(!empty(hitung_stok_product($product->id)[0]->qty))
                                  <td>{{ hitung_stok_product($product->id)[0]->qty - hitung_stok_product_keluar($product->id)[0]->qty }}</td>
                                  @else
                                  <td>0</td>
                                  @endif
                                  {{-- <td class="text-center"><img src="{{ asset('assets/img/product/'.$product->image)}}" style="width: 35%;"></td> --}}
                                  <td>
                                     <div class="form-button-action">
                                       <button class="btn btn-link btn-primary tambah-stok" data-id="{{ $product->id }}" type="button" data-toggle="modal" data-target="#exampleModal">
                                          <i class="fa fa-plus"></i>
                                        </button>
                                        <a href="{{ route('product.edit',$product->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lsm" data-original-title="Edit">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-link btn-danger delete" data-id="{{ $product->id }}">
                                          <i class="fa fa-times"></i>
                                       </button>
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
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Tambah stok produk</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="form-group">
            <label>Jumlah stok</label>
            <input type="text" class="form-control" id="qty-stock" placeholder="jumlah stok">
            <input type="hidden" id="id-product">
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary btn-sm btn-simpan-stok">Submit</button>
       </div>
     </div>
   </div>
 </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
  
  $(".tambah-stok").click(function() {
    var id = $(this).data('id'); 
    $.ajax({
        url: '{{ route('send-id-product') }}',
        method: 'POST',
        cache: false,
        data: {
         "_token": "{{ csrf_token() }}",
         "id" :id
        },
        success: function(data){
          $("#id-product").val(data);
        }
    });
  });


  $(".btn-simpan-stok").click(function() {
    var id = $("#id-product").val();
    var qty = $("#qty-stock").val();
    $.ajax({
        url: '{{ route('save-product') }}',
        method: 'POST',
        cache: false,
        data: {
         "_token": "{{ csrf_token() }}",
         "product_id" :id,
         "qty" : qty,
        },
        success: function(data){
         swal("Success", "Resi berhasil diinput", {
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
			});
         location.reload();
        }
    });
  });


   $('.delete').click(function(e) {
      var id = $(this).data('id'); 
      swal({
         title: 'Apakah kamu yakin ?',
         text: "Produk akan terhapus secara permanen !",
         type: 'warning',
         buttons:{
            confirm: {
               text : 'Ya, saya yakin!',
               className : 'btn btn-success'
            },
            cancel: {
               visible: true,
               className: 'btn btn-danger'
            }
         }
      }).then((Delete) => {
         if (Delete) {
            $.ajax({
               url: '{{ route('product.delete') }}',
               method: 'post',
               cache: false,
               data: {
                  "_token": "{{ csrf_token() }}",
                  "id" :id
               },
               success: function(data){
                  swal("Good job!", "You clicked the button!", {
                     icon : "success",
                     buttons: {        			
                        confirm: {
                           className : 'btn btn-success'
                        }
                     },
                  });
                  location.reload();
               }
            });
         } else {
            swal.close();
         }
      });
   });

});

</script>
@endpush