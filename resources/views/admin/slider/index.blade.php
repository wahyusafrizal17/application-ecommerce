@extends('admin.layoutV2')
@section('title','Manage slider')
@section('content')

<style>
.box-slider{
   border: 1px solid black;
   padding: 80px;
   text-align: center;
}
span{
   color: white
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
                            <h5 class="card-title">Slider</h5>
                         </div>
                         <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                              <i class="fa fa-plus"></i> Tambah slider
                            </button>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                     @if(empty($utama))
                        <div align="center">
                           data slider masih kosong
                        </div>
                     @endif
                         <div class="row">
                           @if(!empty($utama))
                           <div class="col-md-4" style="padding-bottom: 10px">
                              <div class="box-slider" style="background-image: url('/assets/img/slider/{{$utama->image}}');background-size: cover;">
                                 <span>slider utama</span>
                              </div>
                           </div>
                           @endif
                           @foreach($sliders as $row)
                           <div class="col-md-4" style="padding-bottom: 10px">
                              <div class="box-slider sliderAction" data-id="{{ $row->id }}" style="background-image: url('/assets/img/slider/{{$row->image}}');background-size: cover;">
                                 <span>slider {{ $loop->iteration }}</span>
                              </div>
                           </div>
                           @endforeach
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Tambah slider</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       {{ Form::open(['url' => route('add.slider'), 'method' => 'POST','files'=>true]) }}
       <div class="modal-body">
         <div class="form-group">
            <label for="exampleFormControlInput1">Gambar</label>
            {{ Form::file('image',['class' => 'form-control','required']) }}
          </div>

          <div class="form-group">
            <label class="form-label">Apakah ini slider utama ?</label>
            <div class="selectgroup w-100">
               <label class="selectgroup-item">
                  <input type="radio" name="status" value="1" class="selectgroup-input" checked="">
                  <span class="selectgroup-button">YA</span>
               </label>
               <label class="selectgroup-item">
                  <input type="radio" name="status" value="0" class="selectgroup-input">
                  <span class="selectgroup-button">TIDAK</span>
               </label>
            </div>
         </div>
       </div>
       <div class="modal-footer">
         <button type="submit" class="btn btn-success btn-sm">Submit</button>
       </div>
       {{ Form::close() }}
     </div>
   </div>
 </div>
@endsection

@push('scripts')

<script>
   $(".sliderAction").click(function() {
      var id = $(this).data('id');
      swal({
         title: 'Apakah kamu yakin ?',
         text: "Data akan dihapus secara permanen!",
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
               url: '{{ route('delete.slider') }}',
               method: 'POST',
               cache: false,
               data: {
                  "_token": "{{ csrf_token() }}",
                  "id" :id
               },
               success: function(data){
                  location.reload();
               }
            });
         } else {
            swal.close();
         }
      });
   });
</script>

@endpush