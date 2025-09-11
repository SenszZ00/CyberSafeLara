<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegeDepartmentsSeeder extends Seeder {
    public function run(): void {
        DB::table('college_departments')->insert([
            ['code' => 'CARS', 'name' => 'College of Agriculture and Related Sciences'],
            ['code' => 'CAS', 'name' => 'College of Arts and Sciences'],
            ['code' => 'CBA', 'name' => 'College of Business Administration'],
            ['code' => 'CDM', 'name' => 'College of Development Management'],
            ['code' => 'CED', 'name' => 'College of Education'],
            ['code' => 'CTET', 'name' => 'College of Teacher Education and Technology'],
            ['code' => 'CE', 'name' => 'College of Engineering'],
            ['code' => 'CT', 'name' => 'College of Technology'],
            ['code' => 'CIC', 'name' => 'College of Information and Computing'],
            ['code' => 'CAE', 'name' => 'College of Applied Economics'],
            ['code' => 'SL', 'name' => 'School of Law'],
            ['code' => 'OUR', 'name' => 'Office of the University Registrar'],
            ['code' => 'OSAS', 'name' => 'Office of Student Affairs & Services'],
            ['code' => 'ADO', 'name' => 'Admissions Office'],
            ['code' => 'AO', 'name' => 'Accounting Office'],
            ['code' => 'HRMO', 'name' => 'Human Resource Management Office'],
            ['code' => 'PO', 'name' => 'Procurement Office'],
        ]);
    }
}
