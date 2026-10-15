<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkoutLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'muscle_group',
        'exercise_name',
        'weight_kg',
        'sets',
        'reps',
        'notes',
        'is_completed',
        'workout_date',
    ];

    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
            'workout_date' => 'date',
            'weight_kg' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
