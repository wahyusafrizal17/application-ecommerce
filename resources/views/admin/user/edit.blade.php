@extends('admin.layoutV2')
@section('title',$user->name)
@section('content')
<section class="content">
    <div class="container-fluid">
        @include('admin.user.tab')
        <div class="card">
            <div class="card-body">
            {{ Form::model($user,['url'=>route('administrator.user.update',['id'=>$user->id]),'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
            @include('validation')
            @include('admin.user.form')
            </form>
            </div>
        </div>
    </div>
</section>
@endsection