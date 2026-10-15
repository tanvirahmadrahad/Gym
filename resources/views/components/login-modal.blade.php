<!-- Login Modal (Accessible from any page/header) -->
<div id="login-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/10 rounded-2xl max-w-md w-full p-6 sm:p-8 shadow-2xl relative transition-all duration-300">
        <!-- Close Button -->
        <button type="button" onclick="closeLoginModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white transition-colors text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <!-- VIEW 1: Standard Credentials Login -->
        <div id="login-credentials-view">
            <!-- Brand Header -->
            <div class="text-center mb-6">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <div class="flex items-center gap-[2px] h-5">
                        <span class="w-[3px] h-3 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[3px] h-5 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[3px] h-3 bg-[#e2ff38] rounded-full"></span>
                    </div>
                    <span class="font-heading text-xl font-black text-white">FITNES</span>
                </div>
                <h3 class="font-heading text-2xl font-bold text-white">Member Login</h3>
                <p class="text-xs text-gray-400 mt-1">Sign in to your athlete profile</p>
            </div>

            <!-- Error Feedback Area -->
            <div id="login-modal-error" class="hidden mb-4 p-3 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span id="login-modal-error-text"></span>
            </div>

            <!-- Form -->
            <form id="login-modal-form" method="POST" action="{{ route('login.post') }}" class="space-y-4">
                @csrf

                <!-- Email / Username -->
                <div>
                    <label for="modal-email" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1.5">
                        Email or Username
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500 text-xs">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input 
                            type="text" 
                            name="email" 
                            id="modal-email" 
                            value="{{ old('email') }}" 
                            required 
                            class="w-full bg-[#182030] border border-white/10 rounded-lg pl-9 pr-3 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38]"
                            placeholder="you@fitnes.com"
                        >
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="modal-password" class="block text-xs font-semibold uppercase tracking-wider text-gray-300">
                            Password
                        </label>
                        <button type="button" onclick="showResetPasswordView()" class="text-[11px] text-[#e2ff38] hover:underline cursor-pointer font-medium">
                            Forgot?
                        </button>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500 text-xs">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input 
                            type="password" 
                            name="password" 
                            id="modal-password" 
                            value="" 
                            required 
                            class="w-full bg-[#182030] border border-white/10 rounded-lg pl-9 pr-9 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38]"
                            placeholder="••••••••"
                        >
                        <button 
                            type="button" 
                            onclick="togglePasswordVisibility('modal-password', this)"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-white text-xs cursor-pointer"
                        >
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        id="modal-remember" 
                        checked 
                        class="w-3.5 h-3.5 rounded bg-[#182030] border-white/20 text-[#e2ff38] focus:ring-[#e2ff38]"
                    >
                    <label for="modal-remember" class="text-xs text-gray-400 cursor-pointer select-none">
                        Remember me
                    </label>
                </div>

                <!-- Submit -->
                <button 
                    id="login-modal-submit-btn"
                    type="submit" 
                    class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3 rounded-lg transition-all shadow-md shadow-[#e2ff38]/20 cursor-pointer flex items-center justify-center gap-2"
                >
                    <span>Login to Account</span>
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-5 pt-4 border-t border-white/10 text-center text-xs text-gray-400">
                <span>New athlete?</span>
                <a href="{{ route('register') }}" class="text-[#e2ff38] font-bold hover:underline ml-1">
                    Register Free
                </a>
                <span class="mx-1">•</span>
                <a href="{{ route('login') }}" class="text-gray-400 hover:text-white">Full Page</a>
            </div>
        </div>

        <!-- VIEW 2: Reset Password Form -->
        <div id="login-reset-view" class="hidden">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-[#e2ff38]/10 border border-[#e2ff38]/30 flex items-center justify-center text-[#e2ff38] mb-3 shadow-lg shadow-[#e2ff38]/10">
                    <i class="fa-solid fa-key text-xl"></i>
                </div>
                <h3 class="font-heading text-2xl font-bold text-white">Reset Password</h3>
                <p class="text-xs text-gray-400 mt-1 max-w-xs mx-auto leading-relaxed">
                    Enter your athlete account email. We'll send you a secure verification link to recover access.
                </p>
            </div>

            <!-- Error / Status Box -->
            <div id="login-reset-error" class="hidden mb-4 p-3 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span id="login-reset-error-text"></span>
            </div>

            <!-- Form -->
            <form id="login-reset-form" onsubmit="submitPasswordReset(event)" class="space-y-4">
                @csrf
                <div>
                    <label for="reset-email" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1.5">
                        Registered Email
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500 text-xs">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input 
                            type="email" 
                            id="reset-email" 
                            name="email" 
                            required 
                            class="w-full bg-[#182030] border border-white/10 rounded-lg pl-9 pr-3 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38]"
                            placeholder="athlete@fitnes.com"
                        >
                    </div>
                </div>

                <button 
                    id="reset-submit-btn" 
                    type="submit" 
                    class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3 rounded-lg transition-all shadow-md shadow-[#e2ff38]/20 cursor-pointer flex items-center justify-center gap-2"
                >
                    <i class="fa-solid fa-paper-plane text-[11px]"></i>
                    <span>Send Recovery Link</span>
                </button>
            </form>

            <div class="mt-5 pt-4 border-t border-white/10 text-center">
                <button type="button" onclick="showLoginView()" class="text-xs text-gray-400 hover:text-white transition-colors inline-flex items-center gap-1.5 cursor-pointer">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i>
                    <span>Back to Member Login</span>
                </button>
            </div>
        </div>

        <!-- VIEW 3: Reset Success Confirmation -->
        <div id="login-reset-success-view" class="hidden text-center py-2">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 mb-4 shadow-lg shadow-emerald-500/10">
                <i class="fa-solid fa-circle-check text-2xl"></i>
            </div>
            <h3 class="font-heading text-2xl font-bold text-white mb-2">Recovery Dispatched</h3>
            <p class="text-xs text-gray-300 leading-relaxed mb-4 max-w-sm mx-auto">
                We've dispatched a temporary recovery token to <strong id="reset-success-email" class="text-[#e2ff38] break-all"></strong>. Check your inbox to set a new password.
            </p>

            <div class="bg-white/5 border border-white/10 rounded-xl p-3 text-[11px] text-gray-400 text-left space-y-2 mb-5">
                <div class="flex items-start gap-2">
                    <i class="fa-solid fa-shield-halved text-[#e2ff38] mt-0.5"></i>
                    <span>The recovery token is valid for 60 minutes.</span>
                </div>
                <div class="flex items-start gap-2">
                    <i class="fa-solid fa-circle-info text-gray-400 mt-0.5"></i>
                    <span>If you don't see it in 1-2 minutes, please inspect your spam or promotions tab.</span>
                </div>
            </div>

            <button 
                type="button" 
                onclick="showLoginView()" 
                class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3 rounded-lg transition-all shadow-md shadow-[#e2ff38]/20 cursor-pointer mb-3"
            >
                Return to Member Login
            </button>

            <div>
                <button 
                    type="button" 
                    id="reset-resend-btn" 
                    onclick="resendResetEmail()" 
                    class="text-[11px] text-gray-400 hover:text-white transition-colors cursor-pointer"
                >
                    Didn't receive email? <span class="text-[#e2ff38] font-semibold underline">Resend (<span id="reset-timer">60</span>s)</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let resetCooldownTimer = null;
let resetSecondsLeft = 60;

function openLoginModal() {
    const modal = document.getElementById('login-modal');
    if (!modal) return;
    showLoginView();
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeLoginModal() {
    const modal = document.getElementById('login-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

function showLoginView() {
    const credsView = document.getElementById('login-credentials-view');
    const resetView = document.getElementById('login-reset-view');
    const successView = document.getElementById('login-reset-success-view');
    const errorBox = document.getElementById('login-modal-error');
    if (credsView) credsView.classList.remove('hidden');
    if (resetView) resetView.classList.add('hidden');
    if (successView) successView.classList.add('hidden');
    if (errorBox) errorBox.classList.add('hidden');
}

function showResetPasswordView() {
    const credsView = document.getElementById('login-credentials-view');
    const resetView = document.getElementById('login-reset-view');
    const successView = document.getElementById('login-reset-success-view');
    const modalEmail = document.getElementById('modal-email');
    const resetEmail = document.getElementById('reset-email');
    const resetError = document.getElementById('login-reset-error');

    if (resetEmail && modalEmail && modalEmail.value) {
        resetEmail.value = modalEmail.value;
    }

    if (credsView) credsView.classList.add('hidden');
    if (successView) successView.classList.add('hidden');
    if (resetView) resetView.classList.remove('hidden');
    if (resetError) resetError.classList.add('hidden');

    if (resetEmail) {
        setTimeout(() => resetEmail.focus(), 50);
    }
}

async function submitPasswordReset(e) {
    if (e) e.preventDefault();
    const resetEmail = document.getElementById('reset-email');
    const submitBtn = document.getElementById('reset-submit-btn');
    const errorBox = document.getElementById('login-reset-error');
    const errorText = document.getElementById('login-reset-error-text');
    const successView = document.getElementById('login-reset-success-view');
    const resetView = document.getElementById('login-reset-view');
    const successEmailEl = document.getElementById('reset-success-email');

    if (!resetEmail || !resetEmail.value) return;

    errorBox.classList.add('hidden');
    const originalBtnHtml = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin text-[11px]"></i> <span>Dispatching Link...</span>';
    submitBtn.disabled = true;

    try {
        const response = await fetch("{{ route('password.email') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: resetEmail.value })
        });

        const data = await response.json();

        if (response.ok && data.success) {
            if (successEmailEl) successEmailEl.textContent = data.email || resetEmail.value;
            resetView.classList.add('hidden');
            successView.classList.remove('hidden');
            startResetCooldown();
        } else {
            errorText.textContent = data.message || 'Unable to send recovery instructions. Please try again.';
            errorBox.classList.remove('hidden');
        }
    } catch (err) {
        errorText.textContent = 'Network error. Please try again.';
        errorBox.classList.remove('hidden');
    } finally {
        submitBtn.innerHTML = originalBtnHtml;
        submitBtn.disabled = false;
    }
}

function startResetCooldown() {
    clearInterval(resetCooldownTimer);
    resetSecondsLeft = 60;
    const resendBtn = document.getElementById('reset-resend-btn');
    const timerSpan = document.getElementById('reset-timer');
    if (!resendBtn || !timerSpan) return;

    resendBtn.disabled = true;
    resendBtn.classList.add('opacity-50', 'cursor-not-allowed');

    resetCooldownTimer = setInterval(() => {
        resetSecondsLeft--;
        timerSpan.textContent = resetSecondsLeft;
        if (resetSecondsLeft <= 0) {
            clearInterval(resetCooldownTimer);
            resendBtn.disabled = false;
            resendBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            resendBtn.innerHTML = 'Didn\'t receive email? <span class="text-[#e2ff38] font-semibold underline">Resend Now</span>';
        }
    }, 1000);
}

function resendResetEmail() {
    if (resetSecondsLeft > 0) return;
    const resetView = document.getElementById('login-reset-view');
    const successView = document.getElementById('login-reset-success-view');
    if (successView) successView.classList.add('hidden');
    if (resetView) resetView.classList.remove('hidden');
    submitPasswordReset();
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('login-modal-form');
    const errorBox = document.getElementById('login-modal-error');
    const errorText = document.getElementById('login-modal-error-text');
    const submitBtn = document.getElementById('login-modal-submit-btn');

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            errorBox.classList.add('hidden');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Logging in...</span>';
            submitBtn.disabled = true;

            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    window.location.reload();
                } else {
                    errorText.textContent = data.message || 'Login failed. Please check credentials.';
                    errorBox.classList.remove('hidden');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            } catch (err) {
                form.submit();
            }
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLoginModal();
    });
});
</script>
