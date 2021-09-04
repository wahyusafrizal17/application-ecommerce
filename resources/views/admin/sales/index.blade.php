@extends('admin.layoutV2')
@section('title','Manage sales')
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
                            <h5 class="card-title">Data Sales</h5>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                      <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                               <tr>
                                  <th style="width: 5%">No</th>
                                  <th>Customer Name</th>
                                  <th>Date</th>
                                  <th>Courier</th>
                                  <th>Seller</th>
                                  <th>Payment</th>
                                  <th>Reseipt</th>
                                  <th style="width: 10%" class="text-center">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $sale)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $sale->user->name}}</td>
                                  <td>{{ substr($sale->created_at,0,10) }}</td>
                                  <td>{{ $sale->checkout->courier}}</td>
                                  <td>wahyusafrizal.com</td>
                                  <td>{{ $sale->checkout->payment}}</td>
                                  <td>{{ $sale->reseipt}}</td>
                                  <td>
                                     <div class="form-button-action">
                                        <a href="{{ route('sales.edit',['id'=>$sale->id]) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        {{ Form::open(['url'=>route('sales.destroy',['id'=>$sale->id]),'method'=>'delete'])}}
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