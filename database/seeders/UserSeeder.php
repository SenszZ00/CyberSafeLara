<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 Admin
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'user_type' => 'Admin',
            'college_department_id' => null, // no department
            'date_joined' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🔹 IT Personnel (one per college_department)
        $departments = DB::table('college_departments')->get();

        foreach ($departments as $index => $dept) {
            DB::table('users')->insert([
                'username' => "it_personnel_" . ($index + 1),
                'email' => "itp" . ($index + 1) . "@gmail.com",
                'password' => Hash::make('itp123'),
                'user_type' => 'IT_Personnel',
                'college_department_id' => $dept->id, // link to department
                'date_joined' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
