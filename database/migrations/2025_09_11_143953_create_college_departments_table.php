<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('college_departments', function (Blueprint $table) {
            $table->id(); // departmentID
            $table->string('code')->unique(); // e.g., CARS, CAS, etc.
            $table->string('name'); // full descriptive name
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('college_departments');
    }
};
