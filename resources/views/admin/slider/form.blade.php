<div class="card-body">
    
    <div class="form-group">
        <label for="exampleInputPassword1">Nama Slider</label>
        {{ Form::text('title',null,['class'=>'form-control','placeholder'=>'Nama slider'])}}
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Gambar</label>
        {{ Form::file('image',['class'=>'form-control'])}}
    </div>

</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
            
        <a href="{{ route('slider.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
    </div>
</div>