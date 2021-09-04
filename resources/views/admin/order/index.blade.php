@extends('admin.layoutV2')
@section('title','Orders History')
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="card">
          
          <div class="card-body">
              @include('alert')

              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="10"></th>
                          <th>Invoice Number</th>
                          <th>Member Name</th>
                          <th>Payment To</th>
                          <th>Created At</th>
                          <th>Total</th>
                          <th>Payment Status</th>
                          <th width="10">#</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($orders as $order)
                      <tr>
                          <td># {{ $loop->iteration}}</td>
                          <td>{{ $order->invoice}}</td>
                          <td>{{ $order->user->name}}</td>
                          <td>{{ $order->accountNumber->bank_name}} {{ $order->bank_name}}</td>
                          <td>{{ $order->created_at}}</td>
                          <td>{{ $order->total}}</td>
                          <td>{{ $order->payment_status}}</td>
                          <td><a href="{{ route('administrator.order.show',['id'=>$order->invoice]) }}" class="btn btn-danger btn-sm"><i class="far fa-eye"></i></a></td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>#</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th></th>
                          <th></th>
                      </tr>
                  </tfoot>
              </table>
          </div>
      </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
@endpush