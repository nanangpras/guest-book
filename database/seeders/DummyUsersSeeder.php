<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
               'name'=>'Admin',
               'email'=>'nanang@gmail.com',
                'role'=>'admin',
               'password'=> bcrypt('123123123'),
            ]
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
