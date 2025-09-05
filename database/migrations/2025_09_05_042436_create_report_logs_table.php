<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('report_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->foreignId('report_id')->constrained('reports')->onDelete('cascade');
            $table->string('incident_type');
            $table->text('resolution_details')->nullable();
            $table->enum('status', ['pending', 'under review', 'resolved'])->default('pending');
            $table->foreignId('handled_by')->nullable()->constrained('users')->onDelete('set null'); // IT personnel
            $table->timestamp('log_timestamp')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('report_logs');
    }
};
