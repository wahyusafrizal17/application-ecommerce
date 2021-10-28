<div class="card-body">
    
    <div class="form-group">
        <label for="exampleInputPassword1">Nama Produk</label>
        {{ Form::text('name_product',null,['class'=>'form-control','placeholder'=>'Nama produk'])}}
        @if ($errors->has('name_product')) <span class="help-block" style="color:red">{{ $errors->first('name_product') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Kategori</label>
        {!! Form::select('category_id', $categories, null,['class' => 'form-control','id' => 'basic','placeholder' => '-- pilih kategori  --']) !!}
        @if ($errors->has('category_id')) <span class="help-block" style="color:red">{{ $errors->first('category_id') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Harga beli</label>
        {{ Form::text('buy_price',null,['class'=>'form-control','placeholder'=>'Harga beli'])}}
        @if ($errors->has('buy_price')) <span class="help-block" style="color:red">{{ $errors->first('buy_price') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Harga jual</label>
        {{ Form::text('sell_price',null,['class'=>'form-control','placeholder'=>'Harga jual'])}}
        @if ($errors->has('sell_price')) <span class="help-block" style="color:red">{{ $errors->first('sell_price') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Berat</label>
        {{ Form::text('weight',null,['class'=>'form-control','placeholder'=>'Berat'])}}
        @if ($errors->has('weight')) <span class="help-block" style="color:red">{{ $errors->first('weight') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Gambar</label>
        {{ Form::file('image',['class'=>'form-control'])}}
        @if ($errors->has('image')) <span class="help-block" style="color:red">{{ $errors->first('image') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Deskripsi</label>
        {{ Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description'])}}
        @if ($errors->has('description')) <span class="help-block" style="color:red">{{ $errors->first('description') }}</span> @endif
    </div>

</div>

<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
            
        <a href="{{ route('product.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'description' );
</script>
@endpush