<?php

function product_list($list)
{
    $data =  unserialize($list);
    $products = \DB::select('select * 
    from carts as c
    JOIN products as p ON c.product_id=p.id
    WHERE c.id IN ('.implode(',', $data).')');

    return $products;
}

function count_order()
{
    $data = App\Models\Transaction::all();

    return $data;
}

function count_order_by_status($status)
{
    $data = App\Models\Transaction::where('status', $status)->get();

    return $data;
}

function cek_minute($date)
{
    $waktu_awal        =strtotime($date);
    $waktu_akhir       =strtotime(now());

    //menghitung selisih dengan hasil detik
    $diff    =$waktu_akhir - $waktu_awal;

    //membagi detik menjadi jam
    $jam    =floor($diff / (60 * 60));
    
    //membagi sisa detik setelah dikurangi $jam menjadi menit
    $menit    =$diff - $jam * (60 * 60);

    return floor( $menit / 60 );
}

function count_messages(){
    $data = App\Models\ContactUs::where('reply', '')->get();

    return $data;
}

function hitung_stok_product($id)
{
    $data = \DB::SELECT("select sum(qty) as qty from stocks where product_id = ".$id." and status = 'PEMASUKAN'");

    return $data;
}

function hitung_stok_product_keluar($id)
{
    $data = \DB::SELECT("select sum(qty) as qty from stocks where product_id = ".$id." and status = 'PENGELUARAN'");

    return $data;
}

function hitung_cart_qty()
{
    $data = App\Models\Cart::where('user_id', Auth::user()->id)->where('is_active', 1)->get();

    return $data;
}

function total_perhitungan_keuangan_pengeluaran($id)
{
    $data = \DB::SELECT('select SUM(p.sell_price * s.qty) as total
    from stocks as s
    join products as p ON s.product_id = p.id
    where s.product_id = '.$id.' and s.status = "PENGELUARAN"');

    return $data;
}

function total_perhitungan_keuangan_pemasukan($id)
{
    $data = \DB::SELECT('select SUM(p.buy_price * s.qty) as total
    from stocks as s
    join products as p ON s.product_id = p.id
    where s.product_id = '.$id.' and s.status = "PEMASUKAN"');

    return $data;
}

function total_keuntungan_penjualan($id)
{
    $data = \DB::SELECT('select SUM((p.sell_price - p.buy_price) * s.qty)  as total
    from products as p
    join stocks as s ON p.id = s.product_id
    where p.id = '.$id.' and s.status = "PENGELUARAN"');

    return $data;
}

function total_keuntungan_penjualan_keseluruhan()
{
    $data = \DB::SELECT('select SUM((p.sell_price - p.buy_price) * s.qty)  as total
    from products as p
    join stocks as s ON p.id = s.product_id
    where s.status = "PENGELUARAN"');

    return $data;
}

function cekongkir($apikey,$origin,$destination,$weight,$courier)
{
    $client = new GuzzleHttp\Client(); //GuzzleHttp\Client

    $request = $client->post('https://api.rajaongkir.com/starter/cost', [
        'form_params' => [
            'key'         => $apikey,
            'origin'      => $origin,
            'destination' => $destination,
            'weight'      => $weight,
            'courier'     => $courier
        ]
    ]);

    $data = json_decode($request->getBody()->getContents());

    return $data;
}

function cekresi($apikey,$courier,$awb)
{
    $client = new GuzzleHttp\Client(); //GuzzleHttp\Client

        $request = $client->get('https://api.binderbyte.com/v1/track', [
            'query' => [
                'api_key'     => $apikey,
                'courier'     => $courier,
                'awb'         => $awb
            ]
        ]);

        $data = json_decode($request->getBody()->getContents());

        return $data;
}

function hitung_pengeluaran($from_date, $to_date)
{
    $data = \DB::select("select SUM(p.buy_price * s.qty) as total
    from stocks as s
    join products as p ON s.product_id = p.id
    where s.status = 'PEMASUKAN' and s.created_at >= '$from_date' and s.created_at <= '$to_date'");

    if(empty($data[0]->total))
    {
        $total = 0;
    }else{
        $total = $data[0]->total;
    }

    return $total;
}

function hitung_pemasukan($from_date, $to_date)
{
    $data = \DB::select("select SUM(p.sell_price * s.qty) as total
    from stocks as s
    join products as p ON s.product_id = p.id
    where s.status = 'PENGELUARAN' and s.created_at >= '$from_date' and s.created_at <= '$to_date'");

    if(empty($data[0]->total))
    {
        $total = 0;
    }else{
        $total = $data[0]->total;
    }

    return $total;
}

?>