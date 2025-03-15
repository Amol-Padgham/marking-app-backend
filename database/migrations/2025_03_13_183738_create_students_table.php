<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('SET default_storage_engine=INNODB;');
        
        // Schema::create('students', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('students', function (Blueprint $table) {
            // $table->string('StudentID')->primary();
            $table->id('StudentID'); // Auto-incrementing primary key
            $table->string('StudentNumber')->unique();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
