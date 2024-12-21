<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'date_start', 'date_end', 'company', 'partner_id'];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'internship_teacher', 'internship_id', 'teacher_id');
    }

}
