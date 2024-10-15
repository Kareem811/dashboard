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
            $table->string('student_name', 70);
            $table->string('student_national_id', 14)->unique();
            $table->string('student_email')->unique();
            $table->string('student_password');
            $table->string('student_mobile_number', 20);
            $table->enum('student_education', ["student", 'graduate']);
            $table->string('student_college');
            $table->string('student_university');
            $table->string('student_graduation_year');
            $table->string('student_linkedin');
            $table->string('student_college_id')->default(null);
            $table->string("student_address");
            $table->enum("student_gender", ["male", 'female']);
            $table->string('student_lead_owner');
            // $table->foreignId('course_id')->references('id')->on('courses')->cascadeOnDelete();
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
