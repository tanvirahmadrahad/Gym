<?php

namespace Tests\Feature;

use App\Models\StoreProduct;
use App\Models\User;
use App\Models\WorkoutLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FitnessTrackingAndStoreTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'name' => 'MD Tanvir Ahmad',
            'email' => 'tanvir@fitnes.com',
            'weight' => '78.5 kg',
            'height' => "5' 11\" (180 cm)",
            'package_name' => 'Pro Athlete Membership',
            'package_price' => '$53.00 / month',
            'membership_status' => 'ACTIVE',
        ]);

        StoreProduct::create([
            'name' => '100% Whey Gold Isolate (5 lbs)',
            'category' => 'Supplements',
            'price' => 74.99,
            'discount_price' => 64.99,
            'image' => 'https://images.unsplash.com/photo-1579722821273-0f6c7d44362f?w=600&auto=format&fit=crop&q=80',
            'rating' => 4.9,
            'reviews_count' => 128,
            'description' => 'Ultra-pure micro-filtered whey protein isolate.',
            'badge' => 'Best Seller',
            'in_stock' => true,
        ]);
    }

    public function test_store_catalog_page_loads_successfully(): void
    {
        $response = $this->get(route('store.index'));
        $response->assertStatus(200);
        $response->assertSee('OFFICIAL ATHLETE PRO SHOP');
        $response->assertSee('Fuel Your');
    }

    /**
     * Test store checkout creates order.
     */
    public function test_store_checkout_creates_order(): void
    {
        $user = $this->user;

        $response = $this->actingAs($user)->postJson(route('store.checkout'), [
            'customer_name' => 'MD Tanvir Ahmad',
            'customer_phone' => '01712345678',
            'delivery_address' => 'House 12, Road 4, Dhanmondi, Dhaka',
            'payment_method' => 'bKash Mobile Banking',
            'trx_id' => 'BK9XTEST123',
            'items' => [
                [
                    'id' => 1,
                    'name' => '100% Whey Gold Isolate (5 lbs)',
                    'price' => 64.99,
                    'quantity' => 1,
                ],
            ],
            'subtotal' => 64.99,
            'discount' => 9.75,
            'total_amount' => 55.24,
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    /**
     * Test member profile page loads with tracking sections.
     */
    public function test_member_profile_page_loads_with_fitness_tracking(): void
    {
        $user = $this->user;

        $response = $this->actingAs($user)->get(route('profile'));
        $response->assertStatus(200);
        $response->assertSee('Daily Workout');
        $response->assertSee('Set Tracker');
        $response->assertSee('Athlete Transformation');
        $response->assertSee('SCIENTIFIC MACRO ENGINE');
        $response->assertSee('SECURE-PASS');
        $response->assertSee('Smart Workout Routine Generator');
        $response->assertSee('Athlete Badges');
        $response->assertSee('Iron Warrior');
        $response->assertSee('Consistency King');
    }

    /**
     * Test leaderboard page loads successfully with rankings and PR records.
     */
    public function test_leaderboard_page_loads_with_rankings_and_pr_wall(): void
    {
        $response = $this->get(route('leaderboard'));
        $response->assertStatus(200);
        $response->assertSee('Gym Leaderboard');
        $response->assertSee('PR Wall');
        $response->assertSee('Monthly Consistency Top 10 Athletes');
        $response->assertSee('Bench Press');
        $response->assertSee('Barbell Squat');
        $response->assertSee('Deadlift');
    }

    /**
     * Test turnstile pass check-in logs attendance.
     */
    public function test_turnstile_check_in_logs_attendance(): void
    {
        $user = $this->user;

        $response = $this->actingAs($user)->postJson(route('profile.check-in'), [
            'turnstile_gate' => 'Gate A - VIP Turnstile (West Wing)',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'gate' => 'Gate A - VIP Turnstile (West Wing)',
        ]);
    }

    /**
     * Test workout log creation and deletion.
     */
    public function test_workout_log_creation_and_deletion(): void
    {
        $user = $this->user;

        $response = $this->actingAs($user)->post(route('profile.workouts.store'), [
            'muscle_group' => 'Chest',
            'exercise_name' => 'Incline Dumbbell Press',
            'weight_kg' => 34.0,
            'sets' => 4,
            'reps' => 10,
            'notes' => 'Felt strong, progressive overload',
        ]);

        $response->assertRedirect(route('profile'));

        $log = WorkoutLog::where('user_id', $user->id)
            ->where('exercise_name', 'Incline Dumbbell Press')
            ->latest('id')
            ->first();

        $this->assertNotNull($log);

        $deleteResponse = $this->actingAs($user)->delete(route('profile.workouts.delete', $log->id));
        $deleteResponse->assertRedirect(route('profile'));
    }

    /**
     * Test body progress weigh-in submission.
     */
    public function test_body_progress_weigh_in_submission(): void
    {
        $user = $this->user;

        $response = $this->actingAs($user)->post(route('profile.progress.store'), [
            'weight_kg' => 78.2,
            'body_fat_pct' => 14.6,
            'waist_cm' => 81.5,
            'notes' => 'New weekly PR weigh-in',
        ]);

        $response->assertRedirect(route('profile'));
        $user->refresh();
        $this->assertEquals('78.2 kg', $user->weight);
    }

    /**
     * Test password reset endpoint validates email and returns JSON response.
     */
    public function test_password_reset_endpoint_handles_json_submission(): void
    {
        $response = $this->postJson(route('password.email'), [
            'email' => 'tanvir@fitnes.com',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'email' => 'tanvir@fitnes.com',
        ]);
    }

    /**
     * Test password reset requires an email.
     */
    public function test_password_reset_requires_email(): void
    {
        $response = $this->postJson(route('password.email'), [
            'email' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }

    /**
     * Test gym leaderboard page loads with PR wall records.
     */
    public function test_leaderboard_page_loads_with_pr_wall(): void
    {
        $response = $this->get(route('leaderboard'));
        $response->assertStatus(200);
        $response->assertSee('Gym Leaderboard');
        $response->assertSee('PR Wall');
        $response->assertSee('Official Gym Rankings');
    }
}
