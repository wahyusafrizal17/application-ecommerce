@extends('admin.layoutV2')
@section('title','Manage ')
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
                            <h5 class="card-title">Data User</h5>
                         </div>
                         <div class="col-md-6 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah User
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
                                  <th>Nama</th>
                                  <th>Email</th>
                                  <th style="width: 10%" class="text-center">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $user->name}}</td>
                                  <td>{{ $user->email}}</td>
                                  <td>
                                     <div class="form-button-action">
                                        <a href="{{ route('user.edit',['id'=>$user->id]) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        {{ Form::open(['url'=>route('user.destroy',['id'=>$user->id]),'method'=>'delete'])}}
                                         <button  data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete" type="submit">
                                           <i class="fa fa-times"></i>
                                         </button>
                                        {!! Form::close() !!}
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