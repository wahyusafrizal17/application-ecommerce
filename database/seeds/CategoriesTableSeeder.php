<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name_category' => 'Jersey Bola'  , 'slug' => 'jsersey-bola'],
            ['name_category' => 'Kaos Pria'    , 'slug' => 'kaos-pria'],
            ['name_category' => 'Kaos Wanita'  , 'slug' => 'kaos-wanita'],
        	['name_category' => 'Elektronik'   , 'slug' => 'elektronik'],
        ];
        Category::insert($data);
    }
}
