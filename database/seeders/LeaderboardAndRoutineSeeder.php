<?php

namespace Database\Seeders;

use App\Models\GymRecord;
use App\Models\GymRoutine;
use App\Models\User;
use App\Models\UserBadge;
use Illuminate\Database\Seeder;

class LeaderboardAndRoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tanvir = User::where('email', 'tanvir@fitnes.com')->first();
        if (! $tanvir) {
            $tanvir = User::first();
        }

        // 1. Heavy Lifter PR Wall & Gym Records
        GymRecord::truncate();
        $records = [
            // Bench Press
            ['exercise_name' => 'Bench Press', 'lifter_name' => 'David Miller', 'weight_kg' => 165.0, 'reps' => 1, 'weight_class' => '90kg+ Heavyweight', 'rank_position' => 1, 'record_date' => '2026-08-12', 'is_gym_record' => true, 'user_id' => null],
            ['exercise_name' => 'Bench Press', 'lifter_name' => 'Marcus Vance', 'weight_kg' => 150.0, 'reps' => 1, 'weight_class' => '85kg Middleweight', 'rank_position' => 2, 'record_date' => '2026-09-04', 'is_gym_record' => false, 'user_id' => null],
            ['exercise_name' => 'Bench Press', 'lifter_name' => $tanvir ? $tanvir->name : 'Tanvir Ahmad', 'weight_kg' => 130.0, 'reps' => 1, 'weight_class' => '80kg Division', 'rank_position' => 3, 'record_date' => '2026-10-02', 'is_gym_record' => false, 'user_id' => $tanvir?->id],
            ['exercise_name' => 'Bench Press', 'lifter_name' => 'Alex Cox', 'weight_kg' => 125.0, 'reps' => 2, 'weight_class' => '75kg Division', 'rank_position' => 4, 'record_date' => '2026-09-18', 'is_gym_record' => false, 'user_id' => null],

            // Barbell Back Squat
            ['exercise_name' => 'Barbell Squat', 'lifter_name' => 'Marcus Vance', 'weight_kg' => 225.0, 'reps' => 1, 'weight_class' => '85kg Middleweight', 'rank_position' => 1, 'record_date' => '2026-07-20', 'is_gym_record' => true, 'user_id' => null],
            ['exercise_name' => 'Barbell Squat', 'lifter_name' => 'Alex Cox', 'weight_kg' => 210.0, 'reps' => 1, 'weight_class' => '80kg Division', 'rank_position' => 2, 'record_date' => '2026-08-30', 'is_gym_record' => false, 'user_id' => null],
            ['exercise_name' => 'Barbell Squat', 'lifter_name' => $tanvir ? $tanvir->name : 'Tanvir Ahmad', 'weight_kg' => 180.0, 'reps' => 2, 'weight_class' => '80kg Division', 'rank_position' => 3, 'record_date' => '2026-09-25', 'is_gym_record' => false, 'user_id' => $tanvir?->id],
            ['exercise_name' => 'Barbell Squat', 'lifter_name' => 'Elena Rostova', 'weight_kg' => 160.0, 'reps' => 1, 'weight_class' => 'Women Open', 'rank_position' => 4, 'record_date' => '2026-10-05', 'is_gym_record' => false, 'user_id' => null],

            // Deadlift
            ['exercise_name' => 'Deadlift', 'lifter_name' => 'Alex Cox', 'weight_kg' => 265.0, 'reps' => 1, 'weight_class' => '85kg Division', 'rank_position' => 1, 'record_date' => '2026-08-15', 'is_gym_record' => true, 'user_id' => null],
            ['exercise_name' => 'Deadlift', 'lifter_name' => 'Marcus Vance', 'weight_kg' => 240.0, 'reps' => 1, 'weight_class' => '85kg Middleweight', 'rank_position' => 2, 'record_date' => '2026-09-10', 'is_gym_record' => false, 'user_id' => null],
            ['exercise_name' => 'Deadlift', 'lifter_name' => $tanvir ? $tanvir->name : 'Tanvir Ahmad', 'weight_kg' => 210.0, 'reps' => 1, 'weight_class' => '80kg Division', 'rank_position' => 3, 'record_date' => '2026-10-08', 'is_gym_record' => false, 'user_id' => $tanvir?->id],
            ['exercise_name' => 'Deadlift', 'lifter_name' => 'James Wilson', 'weight_kg' => 195.0, 'reps' => 2, 'weight_class' => '75kg Division', 'rank_position' => 4, 'record_date' => '2026-09-22', 'is_gym_record' => false, 'user_id' => null],
        ];

        foreach ($records as $item) {
            GymRecord::create($item);
        }

        // 2. Curated Workout Routines (Plan 3)
        GymRoutine::truncate();
        $routines = [
            [
                'name' => 'PPL: Hypertrophy Push Day',
                'split_type' => 'PPL',
                'target_goal' => 'Muscle Hypertrophy',
                'difficulty' => 'Intermediate',
                'days_per_week' => 6,
                'description' => 'Targeted upper body push routine focusing on chest thickness, 3D delts, and horseshoe triceps.',
                'exercises_json' => [
                    ['name' => 'Barbell Bench Press', 'muscle_group' => 'Chest', 'sets' => 4, 'reps' => 8, 'weight_kg' => 80.0, 'rest_seconds' => 90, 'tips' => 'Keep shoulder blades retracted and drive feet through floor.'],
                    ['name' => 'Incline Dumbbell Press', 'muscle_group' => 'Chest', 'sets' => 3, 'reps' => 10, 'weight_kg' => 26.0, 'rest_seconds' => 75, 'tips' => 'Set bench to 30 degrees for clavicular head emphasis.'],
                    ['name' => 'Standing Overhead Dumbbell Press', 'muscle_group' => 'Shoulders', 'sets' => 3, 'reps' => 10, 'weight_kg' => 20.0, 'rest_seconds' => 75, 'tips' => 'Engage core tight to avoid excessive lower back arching.'],
                    ['name' => 'Cable Lateral Raise', 'muscle_group' => 'Shoulders', 'sets' => 4, 'reps' => 15, 'weight_kg' => 10.0, 'rest_seconds' => 60, 'tips' => 'Keep continuous tension at the bottom, lead with elbows.'],
                    ['name' => 'Triceps Rope Pushdown', 'muscle_group' => 'Arms', 'sets' => 3, 'reps' => 12, 'weight_kg' => 25.0, 'rest_seconds' => 60, 'tips' => 'Spread rope wide at the lockout for maximum lateral head contraction.'],
                ],
            ],
            [
                'name' => 'PPL: Power Pull Day',
                'split_type' => 'PPL',
                'target_goal' => 'Strength & Hypertrophy',
                'difficulty' => 'Intermediate',
                'days_per_week' => 6,
                'description' => 'Heavy posterior chain training to build back thickness, lat width, and arm peak.',
                'exercises_json' => [
                    ['name' => 'Conventional Deadlift', 'muscle_group' => 'Back', 'sets' => 4, 'reps' => 5, 'weight_kg' => 120.0, 'rest_seconds' => 120, 'tips' => 'Pull slack out of bar before breaking off floor.'],
                    ['name' => 'Wide-Grip Lat Pulldown', 'muscle_group' => 'Back', 'sets' => 4, 'reps' => 10, 'weight_kg' => 60.0, 'rest_seconds' => 75, 'tips' => 'Pull toward upper chest, feel stretch at full arm extension.'],
                    ['name' => 'Barbell Bent-Over Row', 'muscle_group' => 'Back', 'sets' => 3, 'reps' => 8, 'weight_kg' => 70.0, 'rest_seconds' => 90, 'tips' => 'Hinge hips back at 45 degrees, pull bar to navel.'],
                    ['name' => 'Cable Face Pulls', 'muscle_group' => 'Shoulders', 'sets' => 4, 'reps' => 15, 'weight_kg' => 20.0, 'rest_seconds' => 60, 'tips' => 'Rotate wrists back toward ears, excellent rear delt builder.'],
                    ['name' => 'Incline Dumbbell Bicep Curl', 'muscle_group' => 'Arms', 'sets' => 3, 'reps' => 12, 'weight_kg' => 14.0, 'rest_seconds' => 60, 'tips' => 'Strict form on incline bench for full long-head stretch.'],
                ],
            ],
            [
                'name' => 'PPL: Leg Destroyer Day',
                'split_type' => 'PPL',
                'target_goal' => 'Max Strength & Mass',
                'difficulty' => 'Advanced',
                'days_per_week' => 6,
                'description' => 'Comprehensive lower body split targeting quads, hamstrings, glutes, and calves.',
                'exercises_json' => [
                    ['name' => 'Barbell Back Squat', 'muscle_group' => 'Legs', 'sets' => 4, 'reps' => 8, 'weight_kg' => 100.0, 'rest_seconds' => 120, 'tips' => 'Hit parallel depth, drive knees outward on ascent.'],
                    ['name' => 'Romanian Deadlift (RDL)', 'muscle_group' => 'Legs', 'sets' => 3, 'reps' => 10, 'weight_kg' => 80.0, 'rest_seconds' => 90, 'tips' => 'Hinge at the hips until intense stretch in hamstrings.'],
                    ['name' => 'Seated Leg Press', 'muscle_group' => 'Legs', 'sets' => 4, 'reps' => 12, 'weight_kg' => 160.0, 'rest_seconds' => 90, 'tips' => 'Control negative tempo, do not lock out knees completely.'],
                    ['name' => 'Standing Calf Raise', 'muscle_group' => 'Legs', 'sets' => 4, 'reps' => 15, 'weight_kg' => 65.0, 'rest_seconds' => 45, 'tips' => 'Pause 2 seconds at the top contraction and bottom stretch.'],
                    ['name' => 'Hanging Knee Raises', 'muscle_group' => 'Core', 'sets' => 3, 'reps' => 15, 'weight_kg' => 0.0, 'rest_seconds' => 60, 'tips' => 'Curl pelvis upward to engage lower rectus abdominis.'],
                ],
            ],
            [
                'name' => 'Upper / Lower: Strength Split',
                'split_type' => 'Upper/Lower',
                'target_goal' => 'Power & Athleticism',
                'difficulty' => 'Intermediate',
                'days_per_week' => 4,
                'description' => 'Balanced 4-day compound split optimal for busy lifters wanting maximum strength gains.',
                'exercises_json' => [
                    ['name' => 'Incline Barbell Bench Press', 'muscle_group' => 'Chest', 'sets' => 4, 'reps' => 6, 'weight_kg' => 75.0, 'rest_seconds' => 90, 'tips' => 'Touch upper chest with controlled descent.'],
                    ['name' => 'Weighted Pull-Ups', 'muscle_group' => 'Back', 'sets' => 4, 'reps' => 6, 'weight_kg' => 15.0, 'rest_seconds' => 90, 'tips' => 'Full dead-hang at bottom to chin over bar.'],
                    ['name' => 'Seated Cable Row', 'muscle_group' => 'Back', 'sets' => 3, 'reps' => 10, 'weight_kg' => 65.0, 'rest_seconds' => 75, 'tips' => 'Squeeze rhomboids and middle traps for 1 second.'],
                    ['name' => 'Standing Barbell Overhead Press', 'muscle_group' => 'Shoulders', 'sets' => 3, 'reps' => 8, 'weight_kg' => 50.0, 'rest_seconds' => 90, 'tips' => 'Lock out overhead with head through window.'],
                    ['name' => 'Barbell Skull Crushers', 'muscle_group' => 'Arms', 'sets' => 3, 'reps' => 10, 'weight_kg' => 32.5, 'rest_seconds' => 60, 'tips' => 'Lower bar to hairline with steady elbows.'],
                ],
            ],
            [
                'name' => 'Full Body: Conditioning & Shred',
                'split_type' => 'Full Body',
                'target_goal' => 'Fat Loss & Endurance',
                'difficulty' => 'All Levels',
                'days_per_week' => 3,
                'description' => 'High-energy full-body compound routine maximizing caloric burn, metabolic rate, and athletic stamina.',
                'exercises_json' => [
                    ['name' => 'Kettlebell Goblet Squats', 'muscle_group' => 'Legs', 'sets' => 4, 'reps' => 15, 'weight_kg' => 24.0, 'rest_seconds' => 60, 'tips' => 'Maintain upright torso and strong core.'],
                    ['name' => 'Explosive Push-Ups', 'muscle_group' => 'Chest', 'sets' => 4, 'reps' => 18, 'weight_kg' => 0.0, 'rest_seconds' => 45, 'tips' => 'Rapid concentric push for fast-twitch muscle activation.'],
                    ['name' => 'Dumbbell Renegade Rows', 'muscle_group' => 'Back', 'sets' => 3, 'reps' => 12, 'weight_kg' => 16.0, 'rest_seconds' => 60, 'tips' => 'Anti-rotational core stability while rowing dumbbell.'],
                    ['name' => 'Dumbbell Thrusters (Squat to Press)', 'muscle_group' => 'Shoulders', 'sets' => 3, 'reps' => 12, 'weight_kg' => 14.0, 'rest_seconds' => 60, 'tips' => 'Drive out of squat directly into overhead press.'],
                    ['name' => 'Weighted Plank Hold', 'muscle_group' => 'Core', 'sets' => 3, 'reps' => 60, 'weight_kg' => 15.0, 'rest_seconds' => 60, 'tips' => 'Place 15kg plate on back, hold strict neutral spine.'],
                ],
            ],
        ];

        foreach ($routines as $routine) {
            GymRoutine::create($routine);
        }

        // 3. User Badges (Plan 2)
        if ($tanvir) {
            UserBadge::where('user_id', $tanvir->id)->delete();
            $badges = [
                [
                    'user_id' => $tanvir->id,
                    'badge_key' => 'iron_warrior',
                    'title' => 'Iron Warrior',
                    'description' => 'Lifted 100+ kg in a registered gym PR lift (Bench/Squat/Deadlift)',
                    'icon' => 'fa-dumbbell',
                    'badge_color' => '#e2ff38',
                    'unlocked_at' => now()->subDays(13),
                    'progress_pct' => 100,
                    'current_val' => 130,
                    'target_val' => 100,
                ],
                [
                    'user_id' => $tanvir->id,
                    'badge_key' => 'consistency_king',
                    'title' => 'Consistency King',
                    'description' => 'Maintained 4 consecutive weeks of uninterrupted gym visits',
                    'icon' => 'fa-fire-flame-curved',
                    'badge_color' => '#ff5e36',
                    'unlocked_at' => now()->subDays(5),
                    'progress_pct' => 100,
                    'current_val' => 4,
                    'target_val' => 4,
                ],
                [
                    'user_id' => $tanvir->id,
                    'badge_key' => 'century_club',
                    'title' => 'Century Club',
                    'description' => 'Log 100 verified turnstile gym visits throughout your membership',
                    'icon' => 'fa-crown',
                    'badge_color' => '#f59e0b',
                    'unlocked_at' => null,
                    'progress_pct' => 68,
                    'current_val' => 68,
                    'target_val' => 100,
                ],
                [
                    'user_id' => $tanvir->id,
                    'badge_key' => 'early_bird',
                    'title' => 'Early Bird Striker',
                    'description' => 'Complete 20 early morning workout sessions before 7:00 AM',
                    'icon' => 'fa-sun',
                    'badge_color' => '#38bdf8',
                    'unlocked_at' => null,
                    'progress_pct' => 85,
                    'current_val' => 17,
                    'target_val' => 20,
                ],
            ];

            foreach ($badges as $badge) {
                UserBadge::create($badge);
            }
        }
    }
}
