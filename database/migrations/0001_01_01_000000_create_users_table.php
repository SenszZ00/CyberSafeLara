<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // 🔹 Users table (modified for CyberSafe)
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // userID
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password', 255); // hashed password
            $table->string('user_type'); // Admin, IT, Student, Faculty, Staff

            // 🔹 College/Department ENUM values
            $table->enum('college_department', [
                'CARS', // College of Agriculture and Related Sciences
                'CAS',  // College of Arts and Sciences
                'CBA',  // College of Business Administration
                'CDM',  // College of Development Management
                'CED',  // College of Education
                'CTET', // College of Teacher Education and Technology
                'CE',   // College of Engineering
                'CT',   // College of Technology
                'CIC',  // College of Information and Computing
                'CAE',  // College of Applied Economics
                'SL',   // School of Law
                'OUR',  // Office of the University Registrar
                'OSAS', // Office of Student Affairs & Services
                'ADO',  // Admissions Office
                'AO',   // Accounting Office
                'HRMO', // Human Resource Management Office
                'PO'    // Procurement Office
            ])->nullable();

            $table->timestamp('date_joined')->useCurrent();
            $table->rememberToken(); // keep for Laravel auth
            $table->timestamps();
        });

        // 🔹 Password resets (keep for Laravel Auth)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 🔹 Sessions (keep for Laravel Auth)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
