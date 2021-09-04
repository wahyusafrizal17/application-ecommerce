<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['name_product' => 'Jersey Barcelona'   , 'slug' => 'jersey-barcelona'   , 'category_id' => 1 , 'buy_price' => 100000 , 'weight' => 1000 , 'sell_price' => 120000 , 'description' => 'sample' , 'image' => 'barcelona.jpg'],
            ['name_product' => 'Jersey Real Madrid' , 'slug' => 'jersey-real-madrid' , 'category_id' => 1 , 'buy_price' => 100000 , 'weight' => 1000 , 'sell_price' => 120000 , 'description' => 'sample' , 'image' => 'real-madrid.jpg'],
            ['name_product' => 'Jersey PSG'         , 'slug' => 'jersey-psg'         , 'category_id' => 1 , 'buy_price' => 100000 , 'weight' => 1000 , 'sell_price' => 120000 , 'description' => 'sample' , 'image' => 'psg.jpg']
        ];
        Product::insert($data);
    }
}
