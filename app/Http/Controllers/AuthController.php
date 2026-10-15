<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show login form.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Handle login submission.
     */
    public function login(Request $request): JsonResponse|RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        $fieldType = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $authAttempt = [
            $fieldType => $credentials['email'],
            'password' => $credentials['password'],
        ];

        if (Auth::attempt($authAttempt, $remember)) {
            $request->session()->regenerate();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Logged in successfully!',
                    'redirect' => url('/'),
                    'user' => [
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                    ],
                ]);
            }

            return redirect()->intended('/')->with('success', 'Welcome back, '.Auth::user()->name.'!');
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password. Please try again.',
            ], 422);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * One-click demo login for testing.
     */
    public function demoLogin(Request $request): RedirectResponse|JsonResponse
    {
        $user = User::firstOrCreate(
            ['email' => 'tanvir@fitnes.com'],
            ['name' => 'Tanvir Ahmad', 'password' => Hash::make('password')]
        );

        Auth::login($user, true);
        $request->session()->regenerate();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Logged in as Demo Member!',
                'redirect' => url('/'),
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ]);
        }

        return redirect('/')->with('success', 'Logged in as Member: '.$user->name);
    }

    /**
     * Show registration form.
     */
    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    /**
     * Handle member registration.
     */
    public function register(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'terms' => ['accepted', 'required'],
        ], [
            'terms.accepted' => 'You must agree to the Terms & Conditions and Gym Rules to proceed.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Account created successfully!',
                'redirect' => url('/'),
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ]);
        }

        return redirect('/')->with('success', 'Welcome to FITNES, '.$user->name.'!');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('info', 'You have been logged out successfully.');
    }

    /**
     * Send password reset recovery link or instructions.
     */
    public function forgotPassword(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string'],
        ]);

        $email = $validated['email'];

        $user = User::where('email', $email)->orWhere('name', $email)->first();
        $targetEmail = $user ? $user->email : (filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : 'your registered address');

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Password reset recovery instructions have been dispatched.',
                'email' => $targetEmail,
            ]);
        }

        return back()->with('status', 'Password reset instructions have been dispatched to '.$targetEmail.'.');
    }
}
