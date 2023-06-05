<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<?php 
$checkout = App\Models\Checkout::where('id', $checkout_id)->first();
$pengaturan = App\Models\Setting::find(1);
?>
<body style="font-family: Helvetica,arial,sans-serif;font-size: 20px;">
    <div>
      <div style="text-align:center;background: #2979ff;padding: 18px;text-transform: uppercase">
        PESANAN BARU DARI {{ $checkout->user->name }}
      </div>
      <div style="font-size: 15px;border: 2px solid black;padding: 25px;border-style: dashed;">
        <p>Hai {{ $pengaturan->name }},</p>
        <p>Pesananan baru dari {{ $checkout->user->name }} dipesan pada {{ $tanggal }}.</p>
        
        <div style="padding-top: 20px;">
          <p style="font-weight: bold;">RINCIAN PESANAN :</p>

          <div style="padding: 15px">
            <table border="1" width="100%" cellspacing="0">
              <tr style="background: #2979ff;">
                <th style="padding: 10px;">NO</th>
                <th style="padding: 10px;">Produk</th>
                <th style="padding: 10px;">Harga</th>
                <th style="padding: 10px;">Jumlah</th>
              </tr>
              <?php 
              $products = product_list($checkout->cart_id);
              $total = 0;
              $no = 1;
               ?>

              @foreach($products as $row)
              <tr align="center">
                <td style="padding: 10px;">{{ $no }}</td>
                <td style="padding: 10px;">{{ $row->name_product }}</td>
                <td style="padding: 10px;">@currency($row->sell_price)</td>
                <td style="padding: 10px;">{{ $row->qty }}</td>
              </tr>
              <?php 
              $total += $row->qty*$row->sell_price;
              $no++;
               ?>
              @endforeach
              <tr>
                <td style="padding: 10px;font-weight: bold;" colspan="3">ONGKIR</td>
                <td style="padding: 10px;" align="center">@currency($checkout->ongkir)</td>
              </tr>
              <tr>
                  <td style="padding: 10px;font-weight: bold;" colspan="3">TOTAL</td>
                  <td style="padding: 10px;" align="center">@currency($total + $checkout->ongkir)</td>
              </tr>
            </table>
          </div>
        </div>

        <div style="padding-top: 10px">
          <p style="font-weight: bold;">DETAIL PESANAN :</p>

          <div style="padding: 15px;">
          <table>
            <tr>
              <td style="font-weight: bold;width: 100px;padding-bottom: 5px;">Nama</td>
              <td style="width: 15px;padding-bottom: 5px;">:</td>
              <td style="padding-bottom: 5px;">{{ $checkout->name }}</td>
            </tr>
            <tr>
              <td style="font-weight: bold;width: 100px;">Telpon</td>
              <td style="width: 15px;">:</td>
              <td>{{ $checkout->phone }}</td>
            </tr>
          </table>

          <table style="padding-top: 30px;">
            <tr>
              <td style="font-weight: bold;width: 100px;">Alamat</td>
              <td style="width: 15px;">:</td>
              <td>{{ $checkout->address }}</td>
            </tr>
          </table>
        </div>
        </div>
      </div>
    </div>
</body>
</html>