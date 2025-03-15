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
        
        Schema::create('assignments', function (Blueprint $table) {
            $table->id('AssignmentID'); // Auto-increment primary key
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->integer('TotalPoints');
            $table->date('DueDate');
            $table->unsignedBigInteger('CreatedBy'); // Foreign key reference to staff
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('CreatedBy')->references('StaffID')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
