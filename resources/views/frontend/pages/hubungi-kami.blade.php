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
            <li class="active"><a href="#">Hubungi kami</a></li>
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
      <div class="col-md-12 text-judul">
        Hubungi Kami
      </div>
      <div class="col-md-12 mt-5">
        <span>Anda bisa menghubungi kami melalui form dibawah ini atau melalui email di <strong>{{ $setting->email }}</strong> dan telp <strong>{{ $setting->phone }}</strong></span>
      </div>

      <div class="col-md-12 mt-4">
        <span class="label-form-kontak">Form kontak</span>
      </div>

      <div class="container padding-contact-us">
        {{ Form::open(['url' => route('contact-us'), 'method' => 'POST']) }}
        <div class="col-md-12 mt-3">
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-1 col-form-label"><sup class="text-danger">*</sup>Nama</label>
            <div class="col-sm-10">
              {{ Form::text('name',null,['class' => 'form-control form-label', 'placeholder' => 'Nama']) }}
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-3">
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-1 col-form-label"><sup class="text-danger">*</sup>Email</label>
            <div class="col-sm-10">
              {{ Form::email('email',null,['class' => 'form-control form-label', 'placeholder' => 'Email']) }}
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-3">
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-1 col-form-label"><sup class="text-danger">*</sup>Telpon</label>
            <div class="col-sm-10">
              {{ Form::text('phone',null,['class' => 'form-control form-label', 'placeholder' => 'No Telpon']) }}
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-3">
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-1 col-form-label"><sup class="text-danger">*</sup>Pesan</label>
            <div class="col-sm-10">
              {{ Form::textarea('message',null,['class' => 'form-control form-label','rows' => 5, 'placeholder' => 'Pesan']) }}
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-3">
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-1 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn" style="float: right;background: #F7941D;border-radius: 20px;">SUBMIT</button>
            </div>
          </div>
        </div>   
        {{ Form::close() }}    
      </div>
      

    </div>
  </div>
</section>

@endsection