@extends('admin.layoutV2')
@section('title','ORDER '.$order->invoice)
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="card">
          <div class="card-body">

            {!! Form::open(['url'=>route('administrator.order.update',['id'=>$order->invoice]),'class'=>'form-horizontal','method'=>'PUT']) !!}
            <table class="table table-bordered">
                <tr>
                    <td width="150">Invoice</td>
                    <td width="350">{{ $order->invoice}}</td>
                    <td>Payment To</td>
                    <td>{{ $order->accountNumber->bank_name}} {{ $order->accountNumber->account_name}}</td>
                </tr>
                <tr>
                    <td>Order Date</td>
                    <td>{{ $order->created_at}}</td>
                    <td>Payment Status</td>
                    <td>
                        {{ Form::hidden('user_email',$order->user->email)}}
                        {{ Form::select('payment_status',['pending'=>'Pending','success'=>'Success','cancel'=>'Cancel'],$order->payment_status,['class'=>'form-control'])}}</td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td>{{ $order->user->name}}</td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-danger">Change Payment Status</button>
                    </td>
                </tr>
            </table>
            {{ Form::close()}}
            <hr>

              @include('alert')

              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="10">No</th>
                          <th>Course Title</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($order->orderDetails as $item)
                      <tr>
                          <td>{{ $loop->iteration}}</td>
                          <td>{{ $item->product->name}}</td>
                          <td>{{ $item->price}}</td>
                          <td>{{ $item->qty}}</td>
                          <td>{{ $item->qty * $item->price }}</td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>#</th>
                          <th>Course Title</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                      </tr>
                  </tfoot>
              </table>
          </div>
      </div>
  </div>
</section>
@endsection