@extends('admin.layoutV2')
@section('title','Manage message')
@section('content')
<div class="main-panel py-lg-4">
   <div class="container container-full">
      <div class="container">
         <div class="page-inner bg-white">
            <div class="row">
               <div class="col-md-12">
                  <div class="d-flex justify-content-between">
                     <div class="d-md-inline-block">
                        <h3>Pengaduan dari user</h3>
                     </div>
                  </div>

                  <section class="card mt-4">
                     <div class="list-group list-group-messages list-group-flush">
                        @foreach($messages as $row)
                        <div class="list-group-item unread">
                           <div class="list-group-item-figure">
                              <span class="rating-sm mr-3">
                                 <label for="star1">
                                    @if(!empty($row->reply))
                                    <span class="fa fa-star" style="color:#FFC600 !important"></span>
                                    @else
                                    <span class="fa fa-star" style="color:#a9acb0 !important"></span>                              
                                    @endif
                                 </label>
                              </span>
                                 <div class="avatar avatar-online">
                                    <div class="avatar-img rounded-circle badge bg-primary" style="color: white;font-size: 16px;font-weight: bold;padding-top: 15px;">
                                       {{ substr($row->name, 0,1) }}
                                    </div>
                                 </div>
                              
                           </div>
                           <div class="list-group-item-body pl-3 pl-md-4">
                              <div class="row">
                                 <div class="col-12 col-lg-10">
                                    <h4 class="list-group-item-title">
                                       {{ $row->name }}
                                    </h4>
                                    <p class="list-group-item-text text-truncate"> {{ $row->message }} </p>
                                 </div>
                                 <div class="col-12 col-lg-2 text-lg-right">
                                    <p class="list-group-item-text"> {{ cek_minute($row->created_at) }} menit yang lalu </p>
                                 </div>
                              </div>
                           </div>
                           <div class="list-group-item-figure">
                              <div class="dropdown">
                                 <button class="btn-dropdown" data-toggle="dropdown">
                                    <i class="icon-options-vertical"></i>
                                 </button>
                                 <div class="dropdown-arrow"></div>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('contact-us.show',['id'=>$row->id]) }}" class="dropdown-item">Balas</a>
                                    <button type="button" class="dropdown-item button-delete" data-id="{{ $row->id }}">Hapus</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </section>

                  <div class="mt-1 mb-2">
                     <div class="justify-content-center mb-5 mb-sm-0">
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@push('scripts')

<script>
   $(".button-delete").click(function() {
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
               url: '{{ route('contact-us.delete') }}',
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