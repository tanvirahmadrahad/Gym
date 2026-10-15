<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\BodyProgress;
use App\Models\StoreProduct;
use App\Models\User;
use App\Models\WorkoutLog;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FitnessStoreSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        // 1. Seed Store Products
        $products = [
            [
                'name' => '100% Whey Gold Isolate (5 lbs)',
                'category' => 'Supplements',
                'price' => 74.99,
                'discount_price' => 64.99,
                'image' => 'https://images.unsplash.com/photo-1579722821273-0f6c7d44362f?w=600&auto=format&fit=crop&q=80',
                'rating' => 4.9,
                'reviews_count' => 128,
                'description' => 'Ultra-pure micro-filtered whey protein isolate with 27g protein and 0g sugar per scoop. Rapid muscle recovery and lean gains.',
                'badge' => 'Best Seller',
                'in_stock' => true,
            ],
            [
                'name' => 'Micronized Creatine Monohydrate (500g)',
                'category' => 'Supplements',
                'price' => 36.00,
                'discount_price' => 29.99,
                'image' => 'https://images.unsplash.com/photo-1593095948071-474c5cc2989d?w=600&auto=format&fit=crop&q=80',
                'rating' => 5.0,
                'reviews_count' => 96,
                'description' => '100% pure Creapure pharmaceutical grade micronized creatine. Boosts ATP output, maximal strength, and muscular hydration.',
                'badge' => 'Athlete Essential',
                'in_stock' => true,
            ],
            [
                'name' => 'Nitric Blast Pre-Workout (Sour Apple)',
                'category' => 'Supplements',
                'price' => 44.00,
                'discount_price' => 38.50,
                'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600&auto=format&fit=crop&q=80',
                'rating' => 4.8,
                'reviews_count' => 74,
                'description' => 'High-stim energy and skin-splitting pumps with 350mg caffeine, 6g L-Citrulline, and 3.2g Beta-Alanine for laser focus.',
                'badge' => 'High Energy',
                'in_stock' => true,
            ],
            [
                'name' => 'Heavy-Duty 10mm Leather Lever Belt',
                'category' => 'Gear',
                'price' => 89.00,
                'discount_price' => 75.00,
                'image' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=600&auto=format&fit=crop&q=80',
                'rating' => 4.9,
                'reviews_count' => 112,
                'description' => 'Competition-spec vegetable tanned genuine leather with indestructible quick-release steel lever. Unmatched intra-abdominal core brace.',
                'badge' => 'Pro Powerlifting',
                'in_stock' => true,
            ],
            [
                'name' => 'FITNES Oversized Athletic Acid-Wash Tee',
                'category' => 'Apparel',
                'price' => 34.00,
                'discount_price' => 28.00,
                'image' => 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=600&auto=format&fit=crop&q=80',
                'rating' => 4.9,
                'reviews_count' => 58,
                'description' => '240 GSM heavy combed cotton with drop-shoulder athletic drape. Breathable gym pump cover designed for heavy training sessions.',
                'badge' => 'New Drop',
                'in_stock' => true,
            ],
            [
                'name' => 'Insulated Stainless Steel Shaker (750ml)',
                'category' => 'Gear',
                'price' => 24.00,
                'discount_price' => 19.99,
                'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=600&auto=format&fit=crop&q=80',
                'rating' => 4.7,
                'reviews_count' => 43,
                'description' => 'Double-wall vacuum insulation keeps BCAA and protein shakes ice-cold for 24 hours. Leak-proof silicone seal and silent blending whisk.',
                'badge' => 'Odor Free',
                'in_stock' => true,
            ],
            [
                'name' => 'Stiff Wrist Wraps & Figure-8 Lifting Straps Combo',
                'category' => 'Gear',
                'price' => 28.00,
                'discount_price' => 22.00,
                'image' => 'https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?w=600&auto=format&fit=crop&q=80',
                'rating' => 4.8,
                'reviews_count' => 88,
                'description' => 'Heavy-gauge elastic thumb-loop wrist supports plus lock-in cotton deadlift straps for max PR pulls without grip fatigue.',
                'badge' => 'Heavy Duty',
                'in_stock' => true,
            ],
            [
                'name' => 'BCAA + Electrolyte Hydration Matrix',
                'category' => 'Supplements',
                'price' => 35.00,
                'discount_price' => 29.50,
                'image' => 'https://images.unsplash.com/photo-1550989460-0adf9ea622e2?w=600&auto=format&fit=crop&q=80',
                'rating' => 4.8,
                'reviews_count' => 61,
                'description' => '7g vegan fermented BCAAs in 2:1:1 ratio with coconut water powder and Himalayan pink salt for optimal intra-workout hydration.',
                'badge' => 'Zero Sugar',
                'in_stock' => true,
            ],
        ];

        foreach ($products as $p) {
            StoreProduct::updateOrCreate(['name' => $p['name']], $p);
        }

        if ($user) {
            // 2. Seed Initial Workout Logs
            $workouts = [
                [
                    'muscle_group' => 'Chest & Triceps',
                    'exercise_name' => 'Barbell Bench Press',
                    'weight_kg' => 85.00,
                    'sets' => 4,
                    'reps' => 8,
                    'notes' => 'RPE 8. Paused reps on chest. Felt strong.',
                    'workout_date' => Carbon::now()->format('Y-m-d'),
                ],
                [
                    'muscle_group' => 'Chest & Triceps',
                    'exercise_name' => 'Incline Dumbbell Press',
                    'weight_kg' => 32.00,
                    'sets' => 3,
                    'reps' => 10,
                    'notes' => '30 degree incline, full stretch.',
                    'workout_date' => Carbon::now()->format('Y-m-d'),
                ],
                [
                    'muscle_group' => 'Chest & Triceps',
                    'exercise_name' => 'Weighted Dips',
                    'weight_kg' => 15.00,
                    'sets' => 3,
                    'reps' => 12,
                    'notes' => 'Strict form, controlled lockout.',
                    'workout_date' => Carbon::now()->format('Y-m-d'),
                ],
                [
                    'muscle_group' => 'Back & Biceps',
                    'exercise_name' => 'Conventional Deadlift',
                    'weight_kg' => 140.00,
                    'sets' => 3,
                    'reps' => 5,
                    'notes' => 'Clean lockout, hook grip.',
                    'workout_date' => Carbon::now()->subDays(2)->format('Y-m-d'),
                ],
                [
                    'muscle_group' => 'Back & Biceps',
                    'exercise_name' => 'Chest-Supported T-Bar Row',
                    'weight_kg' => 60.00,
                    'sets' => 4,
                    'reps' => 10,
                    'notes' => 'Squeeze lats at peak contraction.',
                    'workout_date' => Carbon::now()->subDays(2)->format('Y-m-d'),
                ],
                [
                    'muscle_group' => 'Legs & Core',
                    'exercise_name' => 'Barbell Back Squats (ATG)',
                    'weight_kg' => 110.00,
                    'sets' => 4,
                    'reps' => 6,
                    'notes' => 'Below parallel depth, solid drive.',
                    'workout_date' => Carbon::now()->subDays(4)->format('Y-m-d'),
                ],
            ];

            foreach ($workouts as $w) {
                WorkoutLog::create(array_merge($w, ['user_id' => $user->id, 'is_completed' => true]));
            }

            // 3. Seed 8-week Body Progress Data (Chart.js trend)
            $progressData = [
                ['weeks_ago' => 7, 'weight' => 82.0, 'fat' => 19.5, 'chest' => 104, 'waist' => 88, 'arms' => 37.5, 'notes' => 'Starting Phase 1 cut'],
                ['weeks_ago' => 6, 'weight' => 81.3, 'fat' => 18.8, 'chest' => 104, 'waist' => 87, 'arms' => 37.5, 'notes' => 'Water weight dropped'],
                ['weeks_ago' => 5, 'weight' => 80.6, 'fat' => 18.0, 'chest' => 104.5, 'waist' => 86, 'arms' => 38.0, 'notes' => 'Consistent calories'],
                ['weeks_ago' => 4, 'weight' => 80.0, 'fat' => 17.2, 'chest' => 105, 'waist' => 85, 'arms' => 38.0, 'notes' => 'Midway progress check'],
                ['weeks_ago' => 3, 'weight' => 79.4, 'fat' => 16.5, 'chest' => 105.5, 'waist' => 84, 'arms' => 38.5, 'notes' => 'High protein deficit'],
                ['weeks_ago' => 2, 'weight' => 79.0, 'fat' => 15.8, 'chest' => 106, 'waist' => 83, 'arms' => 38.5, 'notes' => 'Vascularity improving'],
                ['weeks_ago' => 1, 'weight' => 78.7, 'fat' => 15.2, 'chest' => 106, 'waist' => 82.5, 'arms' => 39.0, 'notes' => 'Abs becoming visible'],
                ['weeks_ago' => 0, 'weight' => 78.5, 'fat' => 14.8, 'chest' => 106.5, 'waist' => 82.0, 'arms' => 39.0, 'notes' => 'Current peak athletic form'],
            ];

            foreach ($progressData as $p) {
                BodyProgress::create([
                    'user_id' => $user->id,
                    'weight_kg' => $p['weight'],
                    'body_fat_pct' => $p['fat'],
                    'chest_cm' => $p['chest'],
                    'waist_cm' => $p['waist'],
                    'arms_cm' => $p['arms'],
                    'notes' => $p['notes'],
                    'photo_before' => 'https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?w=500&auto=format&fit=crop&q=80',
                    'photo_after' => 'https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=500&auto=format&fit=crop&q=80',
                    'recorded_date' => Carbon::now()->subWeeks($p['weeks_ago'])->format('Y-m-d'),
                ]);
            }

            // 4. Seed Today's Check-in
            Attendance::create([
                'user_id' => $user->id,
                'check_in_at' => Carbon::now()->subHours(2),
                'turnstile_gate' => 'Gate A - VIP Turnstile',
                'method' => 'Digital RFID QR',
            ]);
        }
    }
}
