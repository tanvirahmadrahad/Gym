<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Gym Heavy Lifter PR Wall & Records
        Schema::create('gym_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('exercise_name'); // Bench Press, Barbell Squat, Deadlift, Overhead Press
            $table->string('lifter_name');
            $table->decimal('weight_kg', 6, 2);
            $table->integer('reps')->default(1);
            $table->string('weight_class')->default('Open Category');
            $table->integer('rank_position')->default(1);
            $table->date('record_date');
            $table->boolean('is_gym_record')->default(true);
            $table->timestamps();
        });

        // 2. Curated Smart Workout Routines
        Schema::create('gym_routines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('split_type'); // PPL, Upper/Lower, Full Body
            $table->string('target_goal')->default('Hypertrophy');
            $table->string('difficulty')->default('Intermediate');
            $table->integer('days_per_week')->default(4);
            $table->text('description');
            $table->json('exercises_json'); // array of exercise objects
            $table->timestamps();
        });

        // 3. Member Achievement Badges
        Schema::create('user_badges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('badge_key'); // century_club, iron_warrior, early_bird, consistency_king
            $table->string('title');
            $table->string('description');
            $table->string('icon')->default('fa-medal');
            $table->string('badge_color')->default('#e2ff38');
            $table->dateTime('unlocked_at')->nullable();
            $table->integer('progress_pct')->default(0);
            $table->integer('current_val')->default(0);
            $table->integer('target_val')->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_badges');
        Schema::dropIfExists('gym_routines');
        Schema::dropIfExists('gym_records');
    }
};
