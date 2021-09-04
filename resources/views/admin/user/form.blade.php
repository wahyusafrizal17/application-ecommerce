<div class="card-body">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name & Role</label>
        <div class="col-sm-7">
           {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Full Name'])}}
        </div>
        <div class="col-sm-3">
            {{ Form::select('role',['administrator'=>'Administrator','trainer'=>'Trainer','member'=>'Member'],null,['class'=>'form-control'])}}
         </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email & Password</label>
        <div class="col-sm-5">
            {{ Form::email('email',null,['class'=>'form-control','placeholder'=>'User Email'])}}
         </div>
        <div class="col-sm-5">
           {{ Form::password('password',['class'=>'form-control','placeholder'=>'User Password'])}}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
           {{ Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description'])}}
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-10">
           {{ Form::file('user_photo',null,['class'=>'form-control'])}}
        </div>
    </div>
</div>

<div class="card-footer">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save Data</button>
            
            <a href="{{ route('administrator.user.index') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Back</a>
        </div>
    </div>
</div>