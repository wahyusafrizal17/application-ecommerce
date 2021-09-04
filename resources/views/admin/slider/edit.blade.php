@extends('admin.layoutV2')
@section('title','Edit slider')
@section('content')

<div class="main-panel">
    <div class="container">
       <div class="page-inner">
          <div class="row">
            <div class="col-md-2">
 
            </div>
             <div class="col-md-8">
                <div class="card">
                   <div class="card-body">
                    {{ Form::model($slider,['url'=>route('slider.update',['id'=>$slider->id]),'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
                    
                    @include('admin.slider.form')  
           
                     {!! Form::close() !!}  
                   </div>
                </div>
             </div>
             <div class="col-md-2">
 
             </div>
          </div>
       </div>
    </div>
 </div>
 </div>
@endsection