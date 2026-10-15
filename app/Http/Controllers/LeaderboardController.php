<?php

namespace App\Http\Controllers;

use App\Models\GymRecord;
use App\Models\GymRoutine;
use App\Models\User;
use App\Models\UserBadge;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeaderboardController extends Controller
{
    /**
     * Display the Gym Leaderboard & PR Wall.
     */
    public function index(Request $request): View
    {
        $currentUser = $request->user();

        // 1. Monthly Consistency Top 10 Athletes
        $leaderboard = [
            [
                'rank' => 1,
                'name' => 'Marcus Vance',
                'gym_id' => 'FIT-010425',
                'tier' => 'ELITE ATHLETE',
                'days_attended' => 28,
                'streak_weeks' => 12,
                'favorite_zone' => 'Powerlifting & Heavy Compound',
                'avatar_color' => '#e2ff38',
                'is_current_user' => false,
            ],
            [
                'rank' => 2,
                'name' => 'Elena Rostova',
                'gym_id' => 'FIT-010488',
                'tier' => 'PRO ATHLETE',
                'days_attended' => 27,
                'streak_weeks' => 9,
                'favorite_zone' => 'Olympic Weightlifting & Mobility',
                'avatar_color' => '#38bdf8',
                'is_current_user' => false,
            ],
            [
                'rank' => 3,
                'name' => 'Alex Cox',
                'gym_id' => 'FIT-010412',
                'tier' => 'MASTER TRAINER',
                'days_attended' => 26,
                'streak_weeks' => 15,
                'favorite_zone' => 'Deadlift & Posterior Chain',
                'avatar_color' => '#f59e0b',
                'is_current_user' => false,
            ],
            [
                'rank' => 4,
                'name' => $currentUser ? $currentUser->name : 'Tanvir Ahmad',
                'gym_id' => $currentUser ? $currentUser->gym_id : 'FIT-010420',
                'tier' => 'PRO ATHLETE',
                'days_attended' => 24,
                'streak_weeks' => 5,
                'favorite_zone' => 'Hypertrophy & Strength Recomp',
                'avatar_color' => '#10b981',
                'is_current_user' => true,
            ],
            [
                'rank' => 5,
                'name' => 'David Miller',
                'gym_id' => 'FIT-010530',
                'tier' => 'PRO ATHLETE',
                'days_attended' => 23,
                'streak_weeks' => 7,
                'favorite_zone' => 'Chest & Shoulder Specialization',
                'avatar_color' => '#a855f7',
                'is_current_user' => false,
            ],
            [
                'rank' => 6,
                'name' => 'Sarah Ahmad',
                'gym_id' => 'FIT-010542',
                'tier' => 'STANDARD ATHLETE',
                'days_attended' => 22,
                'streak_weeks' => 4,
                'favorite_zone' => 'HIIT Functional Conditioning',
                'avatar_color' => '#ec4899',
                'is_current_user' => false,
            ],
            [
                'rank' => 7,
                'name' => 'James Wilson',
                'gym_id' => 'FIT-010601',
                'tier' => 'PRO ATHLETE',
                'days_attended' => 21,
                'streak_weeks' => 6,
                'favorite_zone' => 'Leg Hypertrophy & Calves',
                'avatar_color' => '#6366f1',
                'is_current_user' => false,
            ],
            [
                'rank' => 8,
                'name' => 'Jessica Brown',
                'gym_id' => 'FIT-010619',
                'tier' => 'STANDARD ATHLETE',
                'days_attended' => 20,
                'streak_weeks' => 3,
                'favorite_zone' => 'Core Strength & Pilates Reformer',
                'avatar_color' => '#14b8a6',
                'is_current_user' => false,
            ],
            [
                'rank' => 9,
                'name' => 'Tariq Rahman',
                'gym_id' => 'FIT-010644',
                'tier' => 'PRO ATHLETE',
                'days_attended' => 19,
                'streak_weeks' => 4,
                'favorite_zone' => 'Back Thickness & Lat Pulldown',
                'avatar_color' => '#f97316',
                'is_current_user' => false,
            ],
            [
                'rank' => 10,
                'name' => 'Liam Chen',
                'gym_id' => 'FIT-010688',
                'tier' => 'STANDARD ATHLETE',
                'days_attended' => 19,
                'streak_weeks' => 2,
                'favorite_zone' => 'Cardio Shred & Boxing Bag',
                'avatar_color' => '#84cc16',
                'is_current_user' => false,
            ],
        ];

        // 2. Heavy Lifter PR Wall (Optimized to single consolidated query)
        $allRecords = GymRecord::whereIn('exercise_name', ['Bench Press', 'Barbell Squat', 'Deadlift'])
            ->orderBy('rank_position')
            ->get()
            ->groupBy('exercise_name');

        $benchRecords = $allRecords->get('Bench Press', collect());
        $squatRecords = $allRecords->get('Barbell Squat', collect());
        $deadliftRecords = $allRecords->get('Deadlift', collect());

        // 3. User Badges if authenticated
        $userBadges = $currentUser ? UserBadge::where('user_id', $currentUser->id)->get() : collect();

        // 4. Curated Routines for quick preview
        $routines = GymRoutine::all();

        return view('leaderboard.index', compact(
            'leaderboard',
            'benchRecords',
            'squatRecords',
            'deadliftRecords',
            'userBadges',
            'routines',
            'currentUser'
        ));
    }
}
