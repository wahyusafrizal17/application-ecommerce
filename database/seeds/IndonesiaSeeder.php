<?php

use Illuminate\Database\Seeder;

class IndonesiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents('database/seeds/wilayah.sql'));
    }
}
