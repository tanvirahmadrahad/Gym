<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymRoutine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'split_type',
        'target_goal',
        'difficulty',
        'days_per_week',
        'description',
        'exercises_json',
    ];

    protected function casts(): array
    {
        return [
            'exercises_json' => 'array',
            'days_per_week' => 'integer',
        ];
    }
}
