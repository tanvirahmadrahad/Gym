<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GymRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_name',
        'lifter_name',
        'weight_kg',
        'reps',
        'weight_class',
        'rank_position',
        'record_date',
        'is_gym_record',
    ];

    protected function casts(): array
    {
        return [
            'weight_kg' => 'decimal:2',
            'record_date' => 'date',
            'is_gym_record' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
