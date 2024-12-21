<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'title',
        'slug',
        'description',
        'university',
        'country',
        'city',
        'date_start',
        'date_end',
        'type',
        'image_workshop',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }


}
