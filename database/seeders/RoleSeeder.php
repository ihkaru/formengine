<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create([
            'name'=>'super_admin',
            'guard_name'=>'web'
        ]);
        Role::create([
            "name"=>"admin",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"admin_provinsi",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"admin_kako",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"admin_kecamatan",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"admin_desa",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"viewer",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"viewer_provinsi",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"viewer_kako",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"viewer_kecamatan",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"viewer_desa",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"pengawas",
            "guard_name"=>"web"
        ]);
        Role::create([
            "name"=>"petugas",
            "guard_name"=>"web"
        ]);
    }
}
