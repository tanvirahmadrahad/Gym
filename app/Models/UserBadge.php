<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBadge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'badge_key',
        'title',
        'description',
        'icon',
        'badge_color',
        'unlocked_at',
        'progress_pct',
        'current_val',
        'target_val',
    ];

    protected function casts(): array
    {
        return [
            'unlocked_at' => 'datetime',
            'progress_pct' => 'integer',
            'current_val' => 'integer',
            'target_val' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
