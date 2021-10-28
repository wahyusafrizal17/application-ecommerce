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
                <td width="100">Periode</td>
                <td width="20">:</td>
                <td>{{ date('d M Y', strtotime($from)) }} sampai {{ date('d M Y', strtotime($to)) }}</td>
            </tr>
        </table>
        <hr>
    </div>

    <div>
        <table border="1" cellspacing="0" cellpadding="0" width="100%" style="text-align:center">
            <tr style="background-color:#007bff">
                <th height="25">Tanggal</th>
                <th height="25">No. Faktur</th>
                <th height="25">Nama Pelanggan</th>
                <th height="25">Ongkir</th>
                <th height="25">Jumlah</th>
                <th height="25">Total</th>
            </tr>
            <?php $total = 0; ?>
            @foreach($laporan as $row)
            <tr>
                <td>{{ substr($row->created_at,0,10) }}</td>
                <td>{{ $row->nota }}</td>
                <td>{{ $row->name }}</td>
                <td>@currency($row->ongkir)</td>
                <td>@currency($row->subtotal)</td>
                <td>@currency($row->total)</td>
            </tr>
            <?php $total += $row->total ?>
            @endforeach
            <tr style="background-color:#007bff">
                <th height="25" colspan="5">Total</th>
                <th height="25">@currency($total)</th>
            </tr>
        </table>
    </div>
</body>
</html>