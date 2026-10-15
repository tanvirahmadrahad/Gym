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
        // 1. Gym Turnstile Attendances
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->dateTime('check_in_at');
            $table->string('turnstile_gate')->default('Gate A - West Turnstile');
            $table->string('method')->default('QR Digital Pass');
            $table->timestamps();
        });

        // 2. Workout and Set Logs
        Schema::create('workout_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('muscle_group'); // Chest, Back, Legs, Shoulders, Arms, Core
            $table->string('exercise_name');
            $table->decimal('weight_kg', 6, 2)->default(0);
            $table->integer('sets')->default(3);
            $table->integer('reps')->default(10);
            $table->text('notes')->nullable();
            $table->boolean('is_completed')->default(true);
            $table->date('workout_date');
            $table->timestamps();
        });

        // 3. Body Progress & Measurements Tracking
        Schema::create('body_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->decimal('weight_kg', 5, 2);
            $table->decimal('body_fat_pct', 4, 1)->nullable();
            $table->decimal('chest_cm', 5, 1)->nullable();
            $table->decimal('waist_cm', 5, 1)->nullable();
            $table->decimal('arms_cm', 5, 1)->nullable();
            $table->date('recorded_date');
            $table->string('photo_before')->nullable();
            $table->string('photo_after')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });

        // 4. Gym Supplement & Merch Store Products
        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // Supplements, Gear, Apparel, Recovery
            $table->decimal('price', 8, 2);
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->decimal('rating', 2, 1)->default(4.9);
            $table->integer('reviews_count')->default(48);
            $table->text('description')->nullable();
            $table->string('badge')->nullable(); // e.g. "Best Seller", "15% Member Perk"
            $table->boolean('in_stock')->default(true);
            $table->timestamps();
        });

        // 5. Store Orders
        Schema::create('store_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('order_code')->unique();
            $table->decimal('total_amount', 8, 2);
            $table->string('payment_method'); // bKash, Nagad, Visa/Mastercard, Gym Counter
            $table->string('trx_id')->nullable();
            $table->json('items_json');
            $table->string('status')->default('PAID & READY FOR PICKUP');
            $table->string('shipping_address')->default('Pick up at Gym Front Reception Desk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_orders');
        Schema::dropIfExists('store_products');
        Schema::dropIfExists('body_progress');
        Schema::dropIfExists('workout_logs');
        Schema::dropIfExists('attendances');
    }
};
