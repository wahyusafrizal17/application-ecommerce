@extends('admin.layoutV2')
@section('title','Manage Card')
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
                            <h5 class="card-title">Data Rekening</h5>
                         </div>
                         <div class="col-md-6 text-right">
                            <a href="{{ route('card.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah Rekening
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
                                  <th>Rekening</th>
                                  <th>Nomor Rekening</th>
                                  <th style="width: 10%" class="text-center">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach($cards as $card)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $card->name_card}}</td>
                                  <td>{{ $card->number_card}}</td>
                                  <td>
                                     <div class="form-button-action">
                                        <a href="{{ route('card.edit',['id'=>$card->id]) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        {{ Form::open(['url'=>route('card.destroy',['id'=>$card->id]),'method'=>'delete'])}}
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