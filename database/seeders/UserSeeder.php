<?php

namespace Database\Seeders;

use App\Models\User;
use App\Supports\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Ihza Fikri Zaki Karunia',
            'email' => 'ihza2karunia@gmail.com',
            'password' => Hash::make('fikrizaki2'),
            'jenis' => Constants::JENIS_USER_ORGANIK
        ]);
        $user->assignRole(["super_admin"]);
        User::create([
            'name' => 'Najia Helmiah',
            'email' => 'najiaaahelmiah@gmail.com',
            'password' => Hash::make('najiaaahelmiah'),
            'jenis' => Constants::JENIS_USER_ORGANIK
        ]);
    }
}
