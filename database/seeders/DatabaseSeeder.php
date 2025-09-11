<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Order matters
        $this->call([
            CollegeDepartmentsSeeder::class,
            ReportStatusesSeeder::class,
            ArticleStatusesSeeder::class,
            UserSeeder::class,
        ]);
    }
}
