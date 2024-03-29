<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CardTableSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TermsAndConditionsSeeder::class);
        $this->call(WilayahSeeder::class);
    }
}
