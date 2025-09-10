<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'user_type' => 'Admin',
            'college_department' => null,
            'date_joined' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 17 IT personnel
        for ($i = 1; $i <= 17; $i++) {
            DB::table('users')->insert([
                'username' => "it_personnel_$i",
                'email' => "itp$i@gmail.com",
                'password' => Hash::make('itp123'),
                'user_type' => 'IT_Personnel',
                'college_department' => null,
                'date_joined' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
