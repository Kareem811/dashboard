<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'student_national_id',
        'student_email',
        'student_password',
        'student_mobile_number',
        'student_education',
        'student_college',
        'student_university',
        'student_graduation_year',
        'student_linkedin',
        'student_college_id',
        "student_address",
        "student_gender",
        "student_lead_owner"
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    protected $hidden = [
        'student_password',
    ];
    protected $casts = [
        'student_password' => 'hashed'
    ];
}
