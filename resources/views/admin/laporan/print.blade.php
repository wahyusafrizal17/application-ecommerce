<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>

    <style>
        body{
            font-family:Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height:20px
        }
    </style>

</head>
<body>
    <div>
        <table>
            <tr>
                <td width="100">Nama Toko</td>
                <td width="20">:</td>
                <td>{{ $setting->name }}</td>
            </tr>
            <tr>
                <td width="100">Nama Laporan</td>
                <td width="20">:</td>
                <td>Laporan Penjualan</td>
            </tr>
            <tr>
                <td width="100">Nama Pelanggan</td>
                <td width="20">:</td>
                <td>{{ $laporan[0]->name }}</td>
            </tr>
        </table>
        <hr>
    </div>

    <div>
        <table border="1" width="100%" cellspacing="0">
            <tr style="background: #007bff;">
              <th height="25">NO</th>
              <th height="25">Produk</th>
              <th height="25">Harga</th>
              <th height="25">Jumlah</th>
            </tr>
            <?php 
            $products = product_list($laporan[0]->cart_id);
            $total = 0;
            $no = 1;
             ?>

            @foreach($products as $row)
            <tr align="center">
              <td>{{ $no }}</td>
              <td>{{ $row->name_product }}</td>
              <td>@currency($row->sell_price)</td>
              <td>{{ $row->qty }}</td>
            </tr>
            <?php 
            $total += $row->qty*$row->sell_price;
            $no++;
             ?>
            @endforeach
            <tr>
              <th height="25" colspan="3">ONGKIR</th>
              <td height="25" align="center">@currency($laporan[0]->ongkir)</td>
            </tr>
            <tr>
                <th height="25" colspan="3">TOTAL</th>
                <td height="25" align="center">@currency($total + $laporan[0]->ongkir)</td>
            </tr>
          </table>
    </div>

    <div>
        
    </div>
</body>
</html>