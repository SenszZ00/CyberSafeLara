<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('report_logs', function (Blueprint $table) {
            $table->id('log_id');

            // Foreign key to reports table
            $table->foreignId('report_id')->constrained('reports')->onDelete('cascade')->onUpdate('cascade');

            $table->string('incident_type');
            $table->text('resolution_details')->nullable();
            $table->enum('status', ['pending', 'under review', 'resolved'])->default('pending');

            // Foreign key to users table (IT personnel)
            $table->foreignId('it_personnel_id')->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('report_logs');
    }
};
