<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BodyProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'weight_kg',
        'body_fat_pct',
        'chest_cm',
        'waist_cm',
        'arms_cm',
        'recorded_date',
        'photo_before',
        'photo_after',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'recorded_date' => 'date',
            'weight_kg' => 'decimal:2',
            'body_fat_pct' => 'decimal:1',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
