@extends('admin.layoutV2')
@section('title','Manage slider')
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
                            <h5 class="card-title">Data slider</h5>
                         </div>
                         <div class="col-md-6 text-right">
                            <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah slider
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
                                  <th>Nama Slider</th>
                                  <th class="text-center">Gambar</th>
                                  <th style="width: 10%" class="text-center">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                               @foreach($sliders as $slider)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $slider->title}}</td>
                                  <td class="text-center"><img src="{{ asset('assets/img/slider/'.$slider->image)}}" style="width: 35%;"></td>
                                  <td>
                                     <div class="form-button-action">
                                        <a href="{{ route('slider.edit',['id'=>$slider->id]) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        {{ Form::open(['url'=>route('slider.destroy',['id'=>$slider->id]),'method'=>'delete'])}}
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