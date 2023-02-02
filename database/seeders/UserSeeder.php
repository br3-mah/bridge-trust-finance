<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'I am',
            'lname' => 'Admin',
            // 'email' => 'admin@bridgetrustfinance.co.zm',
            'email' => 'roadoc404@gmail.com',
            'password' => bcrypt('bridge4u'),
        ])->assignRole('admin');

        User::factory(2)->create();
    }
}
