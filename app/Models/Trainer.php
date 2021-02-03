<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'groups',
        'fitness_education',
        'fitness_direction',
        'experience',
        'specialization',
        'directions'
    ];
}
