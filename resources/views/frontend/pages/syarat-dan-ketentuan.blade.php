@extends('layouts.app')
@section('title','Manage Slider Image')
@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bread-inner">
          <ul class="bread-list">
            <li><a href="/">Home<i class="fa fa-arrow-right"></i></a></li>
            <li class="active"><a href="#">Syarat dan Ketentuan</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->
<!-- Product Style -->
<section class="shop checkout section">
  <div class="container">
    <div class="row">
      <div class="col-md-12"  style="font-size: 2.25em; text-align: center; text-transform: uppercase;letter-spacing: 0.1em; color: #69727b; ">
        Syarat dan Ketentuan
      </div>
      
      <div class="col-md-12 mt-5">
        {!! $tem->text !!}
      </div>

    </div>
  </div>
</section>

@endsection