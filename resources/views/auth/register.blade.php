@extends('layouts.app', ['title' => 'Member Registration - FITNES'])

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-16 px-4 sm:px-6 bg-[#0a0c10] relative overflow-hidden">
    <!-- Ambient Glow Effect -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[300px] bg-[#00d2ff]/5 rounded-full blur-[120px] pointer-events-none"></div>

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
            <span class="inline-block px-3 py-1 rounded-full bg-[#00d2ff]/10 text-[#00d2ff] text-[10px] font-extrabold uppercase tracking-widest mb-2">
                Join The Movement
            </span>
            <h1 class="font-heading text-2xl sm:text-3xl font-bold text-white">
                Create Account
            </h1>
            <p class="text-xs text-gray-400 mt-1">Start your fitness transformation journey with us today.</p>
        </div>

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

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Full Name
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500 text-xs">
                        <i class="fa-regular fa-user"></i>
                    </span>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus
                        class="w-full bg-[#182030] border border-white/10 rounded-lg pl-10 pr-3.5 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38] focus:ring-1 focus:ring-[#e2ff38]"
                        placeholder="John Doe"
                    >
                </div>
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Email Address
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500 text-xs">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required 
                        class="w-full bg-[#182030] border border-white/10 rounded-lg pl-10 pr-3.5 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38] focus:ring-1 focus:ring-[#e2ff38]"
                        placeholder="you@domain.com"
                    >
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Password (Min 6 Characters)
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500 text-xs">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        class="w-full bg-[#182030] border border-white/10 rounded-lg pl-10 pr-3.5 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38] focus:ring-1 focus:ring-[#e2ff38]"
                        placeholder="••••••••"
                    >
                </div>
            </div>

            <!-- Password Confirmation -->
            <div>
                <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Confirm Password
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500 text-xs">
                        <i class="fa-solid fa-shield-halved"></i>
                    </span>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        required 
                        class="w-full bg-[#182030] border border-white/10 rounded-lg pl-10 pr-3.5 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38] focus:ring-1 focus:ring-[#e2ff38]"
                        placeholder="••••••••"
                    >
                </div>
            </div>

            <!-- Terms & Conditions Tick Mark Checkbox -->
            <div class="pt-2">
                <label for="terms" class="flex items-start gap-3 cursor-pointer group select-none">
                    <div class="relative flex items-center justify-center mt-0.5">
                        <input 
                            type="checkbox" 
                            name="terms" 
                            id="terms" 
                            value="1" 
                            required
                            {{ old('terms') ? 'checked' : '' }}
                            class="peer sr-only"
                        >
                        <!-- Custom Checkbox Box with Tick Mark -->
                        <div class="w-5 h-5 rounded border border-white/20 bg-[#182030] peer-checked:bg-[#e2ff38] peer-checked:border-[#e2ff38] flex items-center justify-center transition-all group-hover:border-[#e2ff38]/70">
                            <i class="fa-solid fa-check text-black text-xs opacity-0 peer-checked:opacity-100 transition-opacity font-black"></i>
                        </div>
                    </div>
                    <span class="text-xs text-gray-300 leading-snug">
                        I agree to the 
                        <button type="button" onclick="showTermsModal()" class="text-[#e2ff38] font-bold hover:underline cursor-pointer">Terms & Conditions</button>, 
                        Gym Safety Rules, and 
                        <button type="button" onclick="showTermsModal()" class="text-[#e2ff38] font-bold hover:underline cursor-pointer">Privacy Policy</button>.
                    </span>
                </label>
                @error('terms')
                    <p class="text-rose-400 text-[11px] mt-1.5 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3.5 rounded-lg transition-all shadow-lg shadow-[#e2ff38]/20 cursor-pointer mt-4"
            >
                Create Account & Join
            </button>
        </form>

        <!-- Footer Links -->
        <div class="mt-8 pt-6 border-t border-white/10 text-center text-xs text-gray-400">
            <span>Already have an account?</span>
            <a href="{{ route('login') }}" class="text-[#e2ff38] font-bold hover:underline ml-1">
                Log In
            </a>
        </div>
    </div>
</div>

<!-- Terms & Conditions Modal -->
<div id="terms-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/10 rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative max-h-[85vh] flex flex-col">
        <button type="button" onclick="closeTermsModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="mb-4">
            <span class="text-[10px] font-bold text-[#e2ff38] uppercase tracking-wider">FITNES Training Facility</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Gym Membership Terms & Conditions</h3>
        </div>
        <div class="overflow-y-auto space-y-3 text-xs text-gray-300 pr-2 flex-1 leading-relaxed border-t border-b border-white/10 py-4 my-2">
            <p><strong class="text-white">1. Facility Etiquette:</strong> Always re-rack barbells, dumbbells, and weight plates after completing your sets. Wipe down benches and machines after use.</p>
            <p><strong class="text-white">2. Safety & Attire:</strong> Proper athletic footwear (closed-toe gym shoes) and athletic clothing are required at all times inside training zones.</p>
            <p><strong class="text-white">3. Access & ID:</strong> Member cards or digital QR/Barcodes must be scanned at turnstiles upon every entry. Access is non-transferable.</p>
            <p><strong class="text-white">4. Health Declaration:</strong> By registering, you confirm that you are physically capable of engaging in exercise and have consulted a physician if needed.</p>
            <p><strong class="text-white">5. Cancellation & Refunds:</strong> Monthly recurring memberships can be paused or cancelled with 7 days advance notice prior to your next billing cycle.</p>
        </div>
        <div class="pt-2">
            <button type="button" onclick="acceptAndCloseTerms()" class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3 rounded-lg transition-all cursor-pointer">
                I Understand & Accept
            </button>
        </div>
    </div>
</div>

<script>
function showTermsModal() {
    const modal = document.getElementById('terms-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeTermsModal() {
    const modal = document.getElementById('terms-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function acceptAndCloseTerms() {
    const cb = document.getElementById('terms');
    if (cb) cb.checked = true;
    closeTermsModal();
}
</script>
@endsection
