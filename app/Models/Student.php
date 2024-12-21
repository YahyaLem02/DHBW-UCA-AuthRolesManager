<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'nationnality',
        'university',
        'email',
        'date_birth',
        'phone_number',
    ];

    public function internships()
    {
        return $this->belongsToMany(Internship::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function fablabs()
    {
        return $this->belongsToMany(Fablab::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, 'member');
    }
}
