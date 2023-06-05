<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Setting;
        $user->create(
            ['name'=>'WAYYY STORE',
            'email'=>'wahyusafrizal174@gmail.com',
            'phone'=>'082127338708',
            'link_instagram' => 'https://www.instagram.com/wahyuu.sz/',
            'link_facebook' => 'https://www.facebook.com/wahyusafrizal74',
            'apikey_rajaongkir' => 'a1186ee2155f6135dd10f3ea42f3cddf',
            'apikey_cekresi' => 'b0ed238649de4fce157d7540377b5a419258262a73e561af2238aaabc5a9e83e',
            'province_id' => 9,
            'city_id' => 107,
            'district_id' => 1471,
            'address' => 'Bandung', 
            'description' => 'sample', 
            'logo' => 'sample.png'
            ]
        );
    }
}
