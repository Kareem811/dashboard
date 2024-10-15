<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable = [
        'instructor_name',
        'instructor_national_id',
        'instructor_email',
        'instructor_password',
        'instructor_phone',
        'instructor_age',
        'instructor_role',
        'instructor_status',
        "instructor_address",
        "instructor_gender",
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    protected $hidden = [
        'instructor_password',
    ];
    protected $casts = [
        'instructor_password' => 'hashed'
    ];
}
