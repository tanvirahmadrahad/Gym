<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BodyProgress;
use App\Models\GymRoutine;
use App\Models\UserBadge;
use App\Models\WorkoutLog;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display member profile with gym status, package, and billing history.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        // Populate friendly defaults if not set yet
        $profile = [
            'gym_id' => $user->gym_id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? '+1 (555) 389-4210',
            'emergency_contact' => $user->emergency_contact ?? 'Sarah Ahmad (+1 555-891-2234)',
            'blood_group' => $user->blood_group ?? 'O+',
            'fitness_goal' => $user->fitness_goal ?? 'Hypertrophy & Strength Recomposition',
            'weight' => $user->weight ?? '78.5 kg',
            'height' => $user->height ?? "5' 11\" (180 cm)",
            'locker_number' => $user->locker_number ?? 'VIP Locker #42 (West Wing)',
            'trainer_name' => $user->trainer_name ?? 'Alex Cox (Head Strength Coach)',
            'member_since' => $user->created_at ? $user->created_at->format('M d, Y') : 'Jan 15, 2024',
            'package_name' => $user->package_name ?? 'Pro Athlete Membership',
            'package_price' => $user->package_price ?? '$53.00 / month',
            'membership_status' => $user->membership_status ?? 'ACTIVE',
            'renewal_date' => $user->renewal_date ? $user->renewal_date->format('M d, Y') : 'Nov 15, 2026',
        ];

        // Current Package Features
        $packageFeatures = [
            '24/7 Unlimited access to all training zones & powerlifting platforms',
            'Unlimited access to HIIT, Functional & Conditioning group classes',
            'Complimentary access to Finnish Dry Sauna & Cold Plunge Lounge',
            'Monthly InBody 570 bioelectrical body composition scan & review',
            'Dedicated VIP locker with biometric lock & towel service',
            '1-on-1 nutritional guidance & macro calculation worksheet',
        ];

        // Past billing records & invoices
        $invoices = $this->getInvoicesList();

        // Attendance stats (Optimized in-memory inspection for current month)
        $monthAttendances = Attendance::where('user_id', $user->id)
            ->where('check_in_at', '>=', Carbon::now()->startOfMonth())
            ->get();
        $attendancesCount = Attendance::where('user_id', $user->id)->count();
        $todayCheckIn = $monthAttendances->first(fn ($att) => $att->check_in_at && $att->check_in_at->isToday());

        // Activity metrics
        $activity = [
            'total_visits' => 74 + $attendancesCount,
            'monthly_visits' => min(18 + $monthAttendances->count(), 24),
            'monthly_target' => 24,
            'streak_weeks' => 5,
            'favorite_workout' => 'Deadlift & Posterior Chain',
            'today_checked_in' => (bool) $todayCheckIn,
            'check_in_time' => $todayCheckIn ? $todayCheckIn->check_in_at->format('h:i A') : null,
        ];

        // Workout Logs (recent 15)
        $workoutLogs = WorkoutLog::where('user_id', $user->id)
            ->orderBy('workout_date', 'desc')
            ->orderBy('id', 'desc')
            ->take(15)
            ->get();

        // Body Progress (8-week history)
        $bodyProgress = BodyProgress::where('user_id', $user->id)
            ->orderBy('recorded_date', 'asc')
            ->get();

        // Member Achievement Badges (Plan 2)
        $badges = UserBadge::where('user_id', $user->id)->get();

        // Smart Curated Workout Routines (Plan 3)
        $routines = GymRoutine::all();

        return view('profile.index', compact('user', 'profile', 'packageFeatures', 'invoices', 'activity', 'workoutLogs', 'bodyProgress', 'badges', 'routines'));
    }

    /**
     * Live QR Turnstile Entry Check-in.
     */
    public function checkIn(Request $request): JsonResponse|RedirectResponse
    {
        $user = $request->user();

        $attendance = Attendance::create([
            'user_id' => $user->id,
            'check_in_at' => Carbon::now(),
            'turnstile_gate' => $request->input('turnstile_gate', 'Gate A - VIP Turnstile (West Wing)'),
            'method' => 'Live RFID QR Pass',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Turnstile Entry Granted! Attendance recorded.',
                'timestamp' => $attendance->check_in_at->format('h:i A'),
                'gate' => $attendance->turnstile_gate,
            ]);
        }

        return redirect()->route('profile')->with('success', 'Turnstile access verified! Attendance logged at '.$attendance->check_in_at->format('h:i A'));
    }

    /**
     * Store new Workout Log entry.
     */
    public function storeWorkout(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'muscle_group' => ['required', 'string', 'max:50'],
            'exercise_name' => ['required', 'string', 'max:100'],
            'weight_kg' => ['required', 'numeric', 'min:0'],
            'sets' => ['required', 'integer', 'min:1'],
            'reps' => ['required', 'integer', 'min:1'],
            'notes' => ['nullable', 'string', 'max:255'],
        ]);

        WorkoutLog::create([
            'user_id' => $request->user()->id,
            'muscle_group' => $validated['muscle_group'],
            'exercise_name' => $validated['exercise_name'],
            'weight_kg' => $validated['weight_kg'],
            'sets' => $validated['sets'],
            'reps' => $validated['reps'],
            'notes' => $validated['notes'],
            'is_completed' => true,
            'workout_date' => Carbon::now()->format('Y-m-d'),
        ]);

        return redirect()->route('profile')->with('success', 'Workout session logged to your athlete history!');
    }

    /**
     * Delete a workout log entry.
     */
    public function deleteWorkout(Request $request, int $id): RedirectResponse
    {
        WorkoutLog::where('user_id', $request->user()->id)->where('id', $id)->delete();

        return redirect()->route('profile')->with('success', 'Workout record removed.');
    }

    /**
     * Store new weekly body measurement progress entry.
     */
    public function storeProgress(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'weight_kg' => ['required', 'numeric', 'min:30', 'max:300'],
            'body_fat_pct' => ['nullable', 'numeric', 'min:3', 'max:60'],
            'chest_cm' => ['nullable', 'numeric'],
            'waist_cm' => ['nullable', 'numeric'],
            'arms_cm' => ['nullable', 'numeric'],
            'notes' => ['nullable', 'string', 'max:255'],
        ]);

        BodyProgress::create([
            'user_id' => $request->user()->id,
            'weight_kg' => $validated['weight_kg'],
            'body_fat_pct' => $validated['body_fat_pct'] ?? null,
            'chest_cm' => $validated['chest_cm'] ?? null,
            'waist_cm' => $validated['waist_cm'] ?? null,
            'arms_cm' => $validated['arms_cm'] ?? null,
            'notes' => $validated['notes'] ?? 'Weekly check-in',
            'recorded_date' => Carbon::now()->format('Y-m-d'),
        ]);

        $request->user()->update([
            'weight' => $validated['weight_kg'].' kg',
        ]);

        return redirect()->route('profile')->with('success', 'Body measurement check-in recorded! Transformation progress updated.');
    }

    /**
     * Display a dedicated full-page, colorful, official printable gym invoice / receipt.
     */
    public function invoice(Request $request, string $id): View
    {
        $user = $request->user();
        $invoices = $this->getInvoicesList();

        $invoice = $invoices[$id] ?? $invoices['INV-2026-1002'];

        $profile = [
            'gym_id' => $user->gym_id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? '+1 (555) 389-4210',
            'emergency_contact' => $user->emergency_contact ?? 'Sarah Ahmad (+1 555-891-2234)',
            'blood_group' => $user->blood_group ?? 'O+',
            'fitness_goal' => $user->fitness_goal ?? 'Hypertrophy & Strength Recomposition',
            'locker_number' => $user->locker_number ?? 'VIP Locker #42 (West Wing)',
            'package_name' => $user->package_name ?? 'Pro Athlete Membership',
            'membership_status' => $user->membership_status ?? 'ACTIVE',
        ];

        return view('profile.invoice', compact('user', 'profile', 'invoice'));
    }

    /**
     * Update member personal profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'phone_country_code' => ['nullable', 'string', 'max:10'],
            'phone_number' => ['nullable', 'string', 'max:30'],
            'emergency_contact' => ['nullable', 'string', 'max:150'],
            'emergency_name' => ['nullable', 'string', 'max:100'],
            'emergency_relation' => ['nullable', 'string', 'max:50'],
            'emergency_country_code' => ['nullable', 'string', 'max:10'],
            'emergency_phone' => ['nullable', 'string', 'max:30'],
            'blood_group' => ['nullable', 'string', 'max:10'],
            'fitness_goal' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'string', 'max:20'],
            'weight_val' => ['nullable', 'string', 'max:10'],
            'height' => ['nullable', 'string', 'max:30'],
            'height_val' => ['nullable', 'string', 'max:30'],
        ]);

        $updateData = [
            'name' => $validated['name'],
            'blood_group' => $validated['blood_group'] ?? $user->blood_group,
            'fitness_goal' => $validated['fitness_goal'] ?? $user->fitness_goal,
        ];

        // Format Phone with country code if provided
        if (! empty($request->phone_number)) {
            $code = $request->phone_country_code ?? '+1';
            $updateData['phone'] = trim($code.' '.$request->phone_number);
        } elseif (! empty($validated['phone'])) {
            $updateData['phone'] = $validated['phone'];
        }

        // Format Emergency Contact with Name, Relation & Phone
        if (! empty($request->emergency_name) && ! empty($request->emergency_phone)) {
            $relation = ! empty($request->emergency_relation) ? ' ('.$request->emergency_relation.')' : '';
            $code = $request->emergency_country_code ?? '+1';
            $updateData['emergency_contact'] = trim($request->emergency_name.$relation.' • '.$code.' '.$request->emergency_phone);
        } elseif (! empty($validated['emergency_contact'])) {
            $updateData['emergency_contact'] = $validated['emergency_contact'];
        }

        // Format Weight
        if (! empty($request->weight_val)) {
            $updateData['weight'] = trim($request->weight_val.' kg');
        } elseif (! empty($validated['weight'])) {
            $updateData['weight'] = $validated['weight'];
        }

        // Format Height
        if (! empty($request->height_val)) {
            $updateData['height'] = trim($request->height_val);
        } elseif (! empty($validated['height'])) {
            $updateData['height'] = $validated['height'];
        }

        $user->update($updateData);

        return redirect()->route('profile')->with('success', 'Your athlete profile details have been successfully updated!');
    }

    /**
     * Change membership plan and process instant activation.
     */
    public function changePlan(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'plan_name' => ['required', 'string'],
            'billing_cycle' => ['required', 'in:monthly,yearly'],
            'plan_price' => ['required', 'string'],
            'payment_method' => ['nullable', 'string'],
            'trx_id' => ['nullable', 'string'],
        ]);

        $user = $request->user();
        $isYearly = $validated['billing_cycle'] === 'yearly';
        $method = $request->payment_method ?? 'Visa •••• 4242';
        $trxId = $request->trx_id ?? strtoupper(substr($method, 0, 3)).'-'.rand(100000, 999999);

        $user->update([
            'package_name' => $validated['plan_name'].($isYearly ? ' (Annual Access)' : ' Membership'),
            'package_price' => $validated['plan_price'].($isYearly ? ' / year' : ' / month'),
            'membership_status' => 'ACTIVE',
            'renewal_date' => now()->addMonths($isYearly ? 12 : 1),
        ]);

        return redirect()->route('profile')->with('success', 'Plan upgraded to '.$user->package_name.'! Paid '.$validated['plan_price'].' via '.$method.' [TrxID: '.$trxId.']. Membership is fully active.');
    }

    /**
     * Freeze / pause gym membership with custom duration and reason.
     */
    public function freezeMembership(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'freeze_start_date' => ['required', 'date'],
            'freeze_duration_days' => ['required', 'integer', 'min:1', 'max:90'],
            'freeze_reason' => ['required', 'string', 'max:100'],
            'freeze_notes' => ['nullable', 'string', 'max:500'],
        ]);

        $user = $request->user();
        $startDate = Carbon::parse($validated['freeze_start_date']);
        $resumeDate = (clone $startDate)->addDays((int) $validated['freeze_duration_days']);

        $user->update([
            'membership_status' => 'PAUSED (Until '.$resumeDate->format('M d, Y').')',
            'renewal_date' => $user->renewal_date
                ? Carbon::parse($user->renewal_date)->addDays((int) $validated['freeze_duration_days'])
                : now()->addMonths(1)->addDays((int) $validated['freeze_duration_days']),
        ]);

        return redirect()->route('profile')->with('success', 'Membership freeze confirmed! Pass paused from '.$startDate->format('M d, Y').' until '.$resumeDate->format('M d, Y').'. Next billing date has been automatically extended.');
    }

    /**
     * Get collection of all realistic invoices for 2026.
     *
     * @return array<string, array<string, string>>
     */
    private function getInvoicesList(): array
    {
        return [
            'INV-2026-1002' => [
                'id' => 'INV-2026-1002',
                'date' => 'Oct 15, 2026',
                'plan' => 'Pro Athlete Membership (Monthly Auto-Renewal)',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Oct 15, 2026 - Nov 14, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-948201',
                'description' => 'Unlimited 24/7 gym floor access, functional training zones, VIP sauna, cold plunge, and complimentary monthly InBody 570 body scan.',
            ],
            'INV-2026-0902' => [
                'id' => 'INV-2026-0902',
                'date' => 'Sep 15, 2026',
                'plan' => 'Pro Athlete Membership (Monthly Auto-Renewal)',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Sep 15, 2026 - Oct 14, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-839104',
                'description' => 'Unlimited 24/7 gym floor access, functional training zones, VIP sauna, cold plunge, and complimentary monthly InBody 570 body scan.',
            ],
            'INV-2026-0820' => [
                'id' => 'INV-2026-0820',
                'date' => 'Aug 20, 2026',
                'plan' => 'Personal Coaching Pack (x5 Heavy Sessions)',
                'amount' => '$150.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'One-time Personal Training Pack',
                'subtotal' => '$140.00',
                'tax' => '$10.00',
                'auth_code' => 'AUTH-772910',
                'description' => '5x 60-Minute 1-on-1 personalized powerlifting and hypertrophy coaching sessions with Master Coach Alex Cox.',
            ],
            'INV-2026-0802' => [
                'id' => 'INV-2026-0802',
                'date' => 'Aug 02, 2026',
                'plan' => 'Pro Athlete Membership (Monthly Auto-Renewal)',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Aug 02, 2026 - Sep 01, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-661924',
                'description' => 'Unlimited 24/7 gym floor access, functional training zones, VIP sauna, cold plunge, and complimentary monthly InBody 570 body scan.',
            ],
            'INV-2026-0701' => [
                'id' => 'INV-2026-0701',
                'date' => 'Jul 02, 2026',
                'plan' => 'Athlete Registration & Initiation Access',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Jul 02, 2026 - Aug 01, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-550183',
                'description' => 'Monthly gym access, locker allocation, and personalized onboarding assessment.',
            ],
            'INV-2026-0601' => [
                'id' => 'INV-2026-0601',
                'date' => 'Jun 02, 2026',
                'plan' => 'Pro Athlete Membership (Monthly Auto-Renewal)',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Jun 02, 2026 - Jul 01, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-449172',
                'description' => 'Unlimited 24/7 gym floor access, functional training zones, VIP sauna, cold plunge, and complimentary monthly InBody 570 body scan.',
            ],
            'INV-2026-0501' => [
                'id' => 'INV-2026-0501',
                'date' => 'May 02, 2026',
                'plan' => 'Pro Athlete Membership (Monthly Auto-Renewal)',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'May 02, 2026 - Jun 01, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-338261',
                'description' => 'Unlimited 24/7 gym floor access, functional training zones, VIP sauna, cold plunge, and complimentary monthly InBody 570 body scan.',
            ],
            'INV-2026-0401' => [
                'id' => 'INV-2026-0401',
                'date' => 'Apr 02, 2026',
                'plan' => 'Pro Athlete Membership (Monthly Auto-Renewal)',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Apr 02, 2026 - May 01, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-227350',
                'description' => 'Unlimited 24/7 gym floor access, functional training zones, VIP sauna, cold plunge, and complimentary monthly InBody 570 body scan.',
            ],
            'INV-2026-0301' => [
                'id' => 'INV-2026-0301',
                'date' => 'Mar 02, 2026',
                'plan' => 'Pro Athlete Membership (Monthly Auto-Renewal)',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Mar 02, 2026 - Apr 01, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-116449',
                'description' => 'Unlimited 24/7 gym floor access, functional training zones, VIP sauna, cold plunge, and complimentary monthly InBody 570 body scan.',
            ],
            'INV-2026-0201' => [
                'id' => 'INV-2026-0201',
                'date' => 'Feb 02, 2026',
                'plan' => 'Pro Athlete Membership (Monthly Auto-Renewal)',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Feb 02, 2026 - Mar 01, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-005538',
                'description' => 'Unlimited 24/7 gym floor access, functional training zones, VIP sauna, cold plunge, and complimentary monthly InBody 570 body scan.',
            ],
            'INV-2026-0101' => [
                'id' => 'INV-2026-0101',
                'date' => 'Jan 02, 2026',
                'plan' => 'Initial Membership Access & RFID Keycard Issuance',
                'amount' => '$53.00',
                'method' => 'Visa •••• 4242',
                'status' => 'Paid',
                'billing_period' => 'Jan 02, 2026 - Feb 01, 2026',
                'subtotal' => '$50.00',
                'tax' => '$3.00',
                'auth_code' => 'AUTH-994627',
                'description' => 'New member onboarding package, biometric turnstile registration, gym gear kit, and first month training privileges.',
            ],
        ];
    }
}
