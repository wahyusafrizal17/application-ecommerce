<div class="card-body">

    <div class="form-group">
        <label for="exampleInputPassword1">Rekening</label>
        {{ Form::text('name_card',null,['class'=>'form-control','placeholder'=>'Rekening'])}}
        @if ($errors->has('name_card')) <span class="help-block" style="color:red">{{ $errors->first('name_card') }}</span> @endif
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Nomor Rekening</label>
        {{ Form::text('number_card',null,['class'=>'form-control','placeholder'=>'Nomor Rekening'])}}
        @if ($errors->has('number_card')) <span class="help-block" style="color:red">{{ $errors->first('number_card') }}</span> @endif
    </div>


</div>
<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
            
        <a href="{{ route('card.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backward"></i> Kembali</a>
    </div>
  </div>

