@extends('admin.layoutV2')
@section('title','Manage message')
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
                            <h5 class="card-title">Pesan</h5>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                      <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                               <tr>
                                  <th style="width: 5%">No</th>
                                  <th>Nama</th>
                                  <th>Email</th>
                                  <th style="width: 10%" class="text-center">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $message->name}}</td>
                                  <td>{{ $message->email}}</td>
                                 <td>
                                     <div class="form-button-action">
                                        @if(empty($message->reply))
                                        <a href="{{ route('contact-us.show',['id'=>$message->id]) }}" data-toggle="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="Show">
                                           <i class="fa fa-eye"></i> Balas
                                        </a>
                                        @else
                                        <button data-toggle="tooltip" title="" class="btn btn-success btn-sm" data-original-title="Show">
                                          <i class="fa fa-check"></i> Sudah dibalas
                                        </button>
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
@endsection