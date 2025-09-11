<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('article_statuses', function (Blueprint $table) {
            $table->id(); // status_id
            $table->string('name')->unique(); // e.g., pending, approved, rejected
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('article_statuses');
    }
};
