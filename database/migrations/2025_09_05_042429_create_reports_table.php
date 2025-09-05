<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_id');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // nullable if anonymous
            $table->foreignId('it_personnel_id')->nullable()->constrained('users')->onDelete('set null');
            $table->boolean('anonymous_flag')->default(false);
            $table->string('incident_type');
            $table->text('description');
            $table->binary('attachments')->nullable(); // matches longblob
            // $table->timestamp('submission_timestamp')->useCurrent();
            $table->enum('status', ['pending', 'under review', 'resolved'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('reports');
    }
};
