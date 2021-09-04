<?php

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['name_card' => 'BCA','number_card' => '1390704051'],
            ['name_card' => 'JENIUS','number_card' => '90014643654']
        ];
        Card::insert($data);
    }
}
