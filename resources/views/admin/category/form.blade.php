<div class="card-body">

  <div class="form-group">
      <label for="exampleInputPassword1">Nama Kategori</label>
      {{ Form::text('name_category',null,['class'=>'form-control','placeholder'=>'Nama Kategori'])}}
  </div>

</div>

<div class="card-footer">
  <div class="form-group">
      <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
          
      <a href="{{ route('category.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
  </div>
</div>