<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'speciality', 'nationnality', 'university',
        'email', 'phone_number', 'photo',
    ];

    public function workshops()
    {
        return $this->belongsToMany(Workshop::class);
    }
    public function internships()
    {
        return $this->belongsToMany(Internship::class, 'internship_teacher', 'teacher_id', 'internship_id');
    }
    public function user()
    {
        return $this->morphOne(User::class, 'member');
    }
}
