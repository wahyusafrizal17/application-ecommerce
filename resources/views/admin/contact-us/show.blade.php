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
                            <h5 class="card-title">Pesan dari {{ $message->name }}</h5>
                         </div>
                      </div>
                   </div>
                   {{ Form::model($message,['url'=>route('contact-us.replay',['id'=>$message->id]),'class'=>'form-horizontal','method'=>'POST'])}}
                   <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                Pesan
                            </div>
                            <div class="col-md-1">
                                :
                            </div>
                            <div class="col-md-10">
                                {{ $message->message }}
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-1">
                                Balas
                            </div>
                            <div class="col-md-1">
                                :
                            </div>
                            <div class="col-md-10">
                                {{ Form::textarea('reply',null,['class' => 'form-control', 'rows' => 5]) }}
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success btn-sm">Balas</button>
                                <a href="{{ route('contact-us.index') }}" class="btn btn-primary btn-sm"> Kembali</a>
                            </div>
                        </div>
                   </div>
                   {{ Form::close() }}
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 </div>
@endsection