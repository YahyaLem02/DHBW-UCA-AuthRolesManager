<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fablab extends Model
{
    use HasFactory;
    protected $fillable = ['title_fablab', 'description_fablab', 'image_fablab','slug'];


    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}
