<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleStatusesSeeder extends Seeder {
    public function run(): void {
        DB::table('article_statuses')->insert([
            ['name' => 'pending'],
            ['name' => 'approved'],
            ['name' => 'rejected'],
        ]);
    }
}
