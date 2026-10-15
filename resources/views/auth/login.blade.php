@extends('layouts.app', ['title' => 'Member Login - FITNES'])

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-16 px-4 sm:px-6 bg-[#0a0c10] relative overflow-hidden">
    <!-- Ambient Glow Effect -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[300px] bg-[#e2ff38]/5 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-md w-full bg-[#131722] border border-white/10 rounded-2xl p-8 sm:p-10 shadow-2xl relative z-10">
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 mb-4 group">
                <div class="flex items-center gap-[3px] h-7">
                    <span class="w-[3px] h-3 bg-[#e2ff38] rounded-full"></span>
                    <span class="w-[4px] h-6 bg-[#e2ff38] rounded-full"></span>
                    <span class="w-[4px] h-4 bg-[#e2ff38] rounded-full"></span>
                    <span class="w-[3px] h-2 bg-[#e2ff38] rounded-full"></span>
                </div>
                <span class="font-heading text-2xl font-black tracking-wider text-white">FITNES</span>
            </a>
            <span class="inline-block px-3 py-1 rounded-full bg-[#e2ff38]/10 text-[#e2ff38] text-[10px] font-extrabold uppercase tracking-widest mb-2">
                Welcome Back
            </span>
            <h1 class="font-heading text-2xl sm:text-3xl font-bold text-white">
                Member Login
            </h1>
            <p class="text-xs text-gray-400 mt-1">Enter your credentials to access your workout portal.</p>
        </div>

        <!-- Success or Error Feedback -->
        @if (session('success'))
            <div class="mb-6 p-3 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-3.5 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf

            <!-- Email / Username -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Email or Username
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500 text-xs">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input 
                        type="text" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        class="w-full bg-[#182030] border border-white/10 rounded-lg pl-10 pr-3.5 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38] focus:ring-1 focus:ring-[#e2ff38]"
                        placeholder="you@fitnes.com or username"
                    >
                </div>
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-300">
                        Password
                    </label>
                    <a href="#" onclick="openResetPasswordModal(); return false;" class="text-[11px] text-[#e2ff38] hover:underline cursor-pointer">
                        Forgot Password?
                    </a>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500 text-xs">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        value=""
                        required 
                        class="w-full bg-[#182030] border border-white/10 rounded-lg pl-10 pr-10 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38] focus:ring-1 focus:ring-[#e2ff38]"
                        placeholder="••••••••"
                    >
                    <button 
                        type="button" 
                        onclick="togglePasswordVisibility('password', this)"
                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-500 hover:text-white text-xs cursor-pointer"
                        aria-label="Toggle password visibility"
                    >
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center gap-2 pt-1">
                <input 
                    type="checkbox" 
                    name="remember" 
                    id="remember" 
                    class="w-4 h-4 rounded bg-[#182030] border-white/20 text-[#e2ff38] focus:ring-[#e2ff38] focus:ring-offset-0"
                    checked
                >
                <label for="remember" class="text-xs text-gray-400 cursor-pointer select-none">
                    Remember me on this browser
                </label>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3.5 rounded-lg transition-all shadow-lg shadow-[#e2ff38]/20 cursor-pointer mt-2"
            >
                Login to Account
            </button>
        </form>

        <!-- Footer Links -->
        <div class="mt-8 pt-6 border-t border-white/10 text-center text-xs text-gray-400">
            <span>Don't have an account yet?</span>
            <a href="{{ route('register') }}" class="text-[#e2ff38] font-bold hover:underline ml-1">
                Register Free
            </a>
        </div>
    </div>
</div>

<script>
function openResetPasswordModal() {
    const emailVal = document.getElementById('email')?.value || '';
    const modalEmail = document.getElementById('modal-email');
    if (modalEmail && emailVal) {
        modalEmail.value = emailVal;
    }
    if (typeof openLoginModal === 'function') {
        openLoginModal();
        if (typeof showResetPasswordView === 'function') {
            showResetPasswordView();
        }
    }
}

function togglePasswordVisibility(inputId, button) {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('i');
    if (!input) return;
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endsection
