@extends('admin.layoutV2')
@section('title','Edit Product')
@section('content')
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8">
                    {{ Form::model($pengaturan,['url'=>route('setting.update', $pengaturan->id),'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
                    <div class="card card-with-nav">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Nama</label>
                                        {{ Form::text('name',null,['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        {{ Form::email('email',null,['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Logo</label>
                                        <input type="file" class="form-control" name="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Telpon / WA</label>
                                        {{ Form::text('phone',null,['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Link instagram</label>
                                        {{ Form::text('link_instagram',null,['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Link facebook</label>
                                        {{ Form::text('link_facebook',null,['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>APIKEY RAJA-ONGKIR</label>
                                        {{ Form::text('apikey_rajaongkir',null,['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>APIKEY CEK-RESI</label>
                                        {{ Form::text('apikey_cekresi',null,['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Provinsi</label>
                                        {!! Form::select('province_id', $provinces,null, ['class'=>'form-control','id'=>'province','onChange'=>'loadKabupaten()']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Kabupaten</label>
                                        <div id="div_kabupaten"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Kecamatan</label>
                                        <div id="div_kecamatan"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-1">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Alamat</label>
                                        {{ Form::textarea('address',null,['class' => 'form-control' , 'rows' => 3]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-1">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Deskripsi</label>
                                        {{ Form::textarea('description',null,['class' => 'form-control' , 'rows' => 3]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3 mb-3">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-header" style="background-image: url('../assets/img/setting/{{ $pengaturan->logo }}');background-size: cover;width: 30%;margin-left: 115px;">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    {{-- <img src="{{ asset('assets/img/setting/'.$pengaturan->logo) }}" alt="..." class="avatar-img rounded-circle"> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name">{{ $pengaturan->name }}</div>
                                <div class="job">{{ $pengaturan->email }}</div>
                                <div class="desc">{{ $pengaturan->address }}</div>
                                <div class="desc">{{ $pengaturan->description }}</div>
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

@push('scripts')
<script>
    $(document).ready(function () {
        loadKabupaten({{ $pengaturan->city_id }});
    });

    // ---------------------- " LOAD ADMINISTRASI CREATE " ----------------------------

    function loadKabupaten(regency_id) {
    // console.log("load kabupaten");
    // console.log("selected kabupaten = "+regency_id);
    var province = $("#province").val();
    $(".kode_provinsi").val(province);
    $.get("/kabupaten", {
        province: province,regency_id:regency_id
    }, function (data, status) {
        // console.log(data);
        $('#div_kabupaten').html(data);
        loadkecamatan({{ $pengaturan->district_id }});
    });
}

function loadkecamatan(district_id) {
    // console.log("load kecamatan");
    var kabupaten = $("#kabupaten").val();
    $(".kode_kabupaten").val(kabupaten);
    // console.log(kabupaten);
    $.get("/kecamatan", {
        kabupaten: kabupaten, district_id:district_id
    }, function (data, status) {
        // console.log(data);
        $('#div_kecamatan').html(data);
    });
}



</script>
@endpush