@extends('admin.layoutV2')
@section('title','Manage Sales')
@section('content')
<section class="content">
    <div class="container-fluid">
        {{ Form::model($transaction,['url'=>route('sales.update',['id'=>$transaction->id]),'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
            @include('validation')
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td colspan="2">Detail Buyer</td>
                          </tr>
                          <tr>
                              <td width="130">Customer Data</td>
                              <td>
                                  {{ $transaction->user->name }}<br>
                                  08516283748<br>
                                  {{ $transaction->checkout->address }}
                              </td>
                            <input type="hidden" name="nota" value="{{ $transaction->nota }}">
                              <input type="hidden" name="user_id" value="{{ $transaction->user_id }}">
                              <input type="hidden" name="total" value="{{ $transaction->total }}">
                              <input type="hidden" name="status" value="{{ $transaction->status }}">
                          </tr>
                          <tr>
                            <td width="130">Seller</td>
                            <td>wahyusafrizal.com</td>
                        </tr>
                        <tr>
                            <td width="130">Courier</td>
                            <td>{{ $transaction->checkout->courier }}</td>
                        </tr>
                        <tr>
                            <td width="130">Payment</td>
                            <td>{{ $transaction->checkout->payment }}</td>
                        </tr>
                        <tr>
                            <td width="130">Ongkir</td>
                            <td>@currency($transaction->checkout->price)</td>
                        </tr>
                        <tr>
                            <td width="130">Recepit</td>
                            <td><input type="text" name="reseipt" class="form-control" placeholder="resi"></td>
                        </tr>
                        <input type="hidden" name="status" value="DALAM PERJALANAN">
                        <tr>
                            <td width="130"></td>
                            <td>
                                <button type="submit" class="btn btn-danger"><li class="fa fa-save"></li> Save</button>
                                <a href="" class="btn btn-danger"><li class="fa fa-backward"></li> Back</a>
                                <a href="" class="btn btn-danger"><li class="fa fa-print"></li> Print</a>
                            </td>
                        </tr>
                        </tbody>
                      </table>
            
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="5">Detail Order Item</td>
                            </tr>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Cover Product</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total = 0;    
                            ?>
                            @foreach($products as $product)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td width="150"><img src="{{ asset('Product/'.$product->product->image)}}" width="100%"></td>
                            <td>{{ $product->product->name_product }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>@currency($product->product->price)</td>
                          </tr>
                           <?php $total += $product->qty*$product->product->price; ?>
                          @endforeach
                          <tr>
                            <td colspan="4">Ongkir</td>
                            <td>@currency($transaction->checkout->price)</td>
                          </tr>
                          <tr>
                            <td colspan="4">Total</td>
                            <td>@currency($total + $transaction->checkout->price)</td>
                          </tr>
                        </tbody>
                      </table>
            
                </div>
            </div>
        

            </form>
        </div>
    </div>
</section>
@endsection