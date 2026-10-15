<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'phone',
    'emergency_contact',
    'blood_group',
    'fitness_goal',
    'weight',
    'height',
    'locker_number',
    'trainer_name',
    'package_name',
    'package_price',
    'membership_status',
    'renewal_date',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'renewal_date' => 'date',
        ];
    }

    /**
     * Get formatted Gym Member ID.
     */
    public function getGymIdAttribute(): string
    {
        return 'FIT-'.str_pad((string) ($this->id * 317 + 10420), 6, '0', STR_PAD_LEFT);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function workoutLogs(): HasMany
    {
        return $this->hasMany(WorkoutLog::class);
    }

    public function bodyProgress(): HasMany
    {
        return $this->hasMany(BodyProgress::class);
    }

    public function badges(): HasMany
    {
        return $this->hasMany(UserBadge::class);
    }
}
