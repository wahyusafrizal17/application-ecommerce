@extends('admin.layoutV2')
@section('title','Edit Product')
@section('content')
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::model($tem,['url'=>route('tem.update',['id'=>$tem->id]),'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
                    <div class="card card-with-nav">
                        <div class="card-body">
                            <div class="row mt-3 mb-1">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Text</label>
                                        {{ Form::textarea('text',null,['class' => 'form-control', 'rows' => 3]) }}
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
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('text');
</script>
@endpush