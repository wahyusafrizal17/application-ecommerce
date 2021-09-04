@extends('admin.layoutV2')
@section('title','Manage Customer')
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
                            <h5 class="card-title">Data Customer</h5>
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
                                  <th>Gambar</th>
                               </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $customer->name}}</td>
                                  <td>{{ $customer->email}}</td>
                                  <td></td>
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