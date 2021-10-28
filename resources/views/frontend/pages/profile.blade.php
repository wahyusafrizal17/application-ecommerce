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
            <li class="active"><a href="#">Profil</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->
<!-- Product Style -->
<section class="shop checkout section">
    {{ Form::model($user,['url'=>route('profile.update',['id'=>$user->id]),'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}

  <div class="container">

    <div class="row">
      <div class="col-md-4">
        <div style="background-image: url({{$image}});width: 80%;height: 220px;border-radius: 10px;background-size: cover;object-fit: cover;color: transparent;">.</div>
        <div class="my-2" style="width: 80%;">
            {{ Form::file('image', ['class'=>'form-control']) }}

            <hr>
            <div class="my-3">
                <div class="my-1">
                    <label>{{ $user->name }}</label>
                </div>
                <div class="my-1">
                  <label>{{ $phone }}</label>
              </div>
                <div class="my-1">
                    <label>{{ $user->email }}</label>
                </div>
                <div class="my-1">
                    <label>{{ $address }}</label>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group">
            <label for="">Nama</label>
            {{ Form::text('name', null, ['class' => 'form-control form-height', 'placeholder' => 'Nama Lengkap']) }}
        </div>
        <div class="form-group">
            <label for="">Email</label>
            {{ Form::email('email', null, ['class' => 'form-control form-height', 'placeholder' => 'Email']) }}
        </div>
        <div class="form-group">
          <label for="">No Telpon</label>
          {{ Form::text('phone', $phone, ['class' => 'form-control form-height', 'placeholder' => 'No Telpon']) }}
      </div>
        <div class="form-group">
            <label for="">Ubah password</label>
            <input type="password" name="password" class="form-control form-height" placeholder="******">
            <small sty>kosongkan jika tidak ingin mengubah password</small>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            {{ Form::textarea('address', $address, ['class' => 'form-control', 'placeholder' => 'Alamat Lengkap', 'rows' => 4]) }}
        </div>
    </div>

    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary btn-sm">Simpan perubahan</button>
    </div>
    </div>
    {{ Form::close() }}
  </div>
</section>
@endsection