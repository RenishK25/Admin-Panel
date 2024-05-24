<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('admins')->truncate();
        $data = [
        [   "name" => 'admin',
            "email" => 'admin@gmail.com',
            "role" => 'admin',
            "password" => Crypt::encrypt('Admin123#'),
        ],["name" => 'super_admin',
            "email" => 'superadmin@gmail.com',
            "role" => 'super_admin',
            "password" => Crypt::encrypt('Superadmin123#'),]    
        ];

        Admin::insert($data);
    }
}
