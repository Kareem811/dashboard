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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_name', 70);
            $table->string('instructor_email')->unique();
            $table->string('instructor_password');
            $table->string('instructor_national_id');
            $table->enum('instructor_gender', ['male', 'female']);
            $table->string('instructor_address');
            $table->string('instructor_phone', 20);
            $table->integer('instructor_age');
            $table->enum('instructor_role', ['part', 'full']);
            $table->enum('instructor_status', ['active', 'pending', 'banned']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
