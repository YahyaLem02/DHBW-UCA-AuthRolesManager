<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'teacher_id', 'title', 'slug', 'description', 'NB_hours', 'course', 'image_program', 'type',
    ];

    /**
     * Get the teacher associated with the program.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
