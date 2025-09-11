<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportStatusesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('report_statuses')->insert([
            ['name' => 'pending'],
            ['name' => 'under review'],
            ['name' => 'resolved'],
        ]);
    }
}
