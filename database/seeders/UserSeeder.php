<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name'=>'Ihza Fikri Zaki Karunia',
            'email'=>'ihza2karunia@gmail.com',
            'password'=>Hash::make('fikrizaki2')
        ]);
    }
}
