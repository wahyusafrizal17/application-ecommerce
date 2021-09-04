<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('password');

        $data = [
            ['name'=>'Wahyu Safrizal','email'=>'wahyusafrizal174@gmail.com','password'=> $password, 'level' => 'admin'],
            ['name'=>'Wahyu Safrizal','email'=>'wahyusafrizal170402@gmail.com','password'=> $password, 'level' => 'customer']
        ];

        User::insert($data);
    }
}
