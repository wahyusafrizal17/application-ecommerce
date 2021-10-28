<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{ Form::open(['url' => route('laporan.export'), 'method' => 'GET']) }}
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Dari tanggal</label>
                    {{ Form::text('from',null,['class' => 'form-control','id' => 'datepicker','required']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Sampai tanggal</label>
                    {{ Form::text('to',null,['class' => 'form-control','id' => 'datepicker2','required']) }}
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm">export</button>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>