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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('admission_number')->unique();
            $table->string('name');
            $table->string('gender');
            $table->date('date_of_birth')->nullable();
            $table->string('class_name');
            $table->string('section');
            $table->string('phone')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_phone');
            $table->text('address')->nullable();

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
