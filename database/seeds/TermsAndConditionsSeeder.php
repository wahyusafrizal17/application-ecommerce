<?php

use Illuminate\Database\Seeder;
use App\Models\TermsAndConditions;

class TermsAndConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['text' => 'sample']
        ];
        TermsAndConditions::insert($data);
    }
}
