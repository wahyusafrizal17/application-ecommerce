@extends('admin.layoutV2')
@section('title','Create User')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Horizontal Form</h3>
            </div>
            {{ Form::open(['url'=>route('administrator.user.store'),'class'=>'form-horizontal','files'=>true])}}
            @include('validation')
            @include('admin.user.form')
            </form>
        </div>
    </div>
</section>
@endsection