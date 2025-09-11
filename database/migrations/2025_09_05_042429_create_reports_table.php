<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_id');

            // Reporter (user who submitted the report)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');

            // Assigned IT personnel
            $table->foreignId('it_personnel_id')->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');

            $table->boolean('anonymous_flag')->default(false);
            $table->string('incident_type');
            $table->text('description');

            // File attachment metadata (instead of BLOB)
            $table->string('attachment_mime', 100)->nullable();
            $table->string('attachment_name', 255)->nullable();
            $table->string('attachment_path', 500)->nullable();

            $table->foreignId('report_status_id')
                  ->constrained('report_statuses')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('reports');
    }
};
