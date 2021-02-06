<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'trainer_name',
        'groups',
        'fitness_education',
        'fitness_directions',
        'experience',
        'specialization',
        'directions'
    ];
}
