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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('fitness_goal')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('locker_number')->nullable()->default('VIP Locker #42');
            $table->string('trainer_name')->nullable()->default('Alex Cox (Head Strength Coach)');
            $table->string('package_name')->nullable()->default('Pro Athlete Membership');
            $table->string('package_price')->nullable()->default('$53.00 / month');
            $table->string('membership_status')->nullable()->default('ACTIVE');
            $table->date('renewal_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
