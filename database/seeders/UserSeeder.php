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
            'fname' => 'Brigetrust',
            'lname' => 'Finance',
            'email' => 'admin@bridgetrustfinance.co.zm',
            'password' => bcrypt('bridge.@2023'),
        ])->assignRole('admin');
    }
}
