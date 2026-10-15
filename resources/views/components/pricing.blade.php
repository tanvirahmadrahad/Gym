<section id="pricing" class="py-20 lg:py-28 bg-[#0a0d13] relative overflow-hidden">
    <!-- Subtle Ambient Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] bg-[#e2ff38]/5 rounded-full blur-[140px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight mb-4">
                Our Pricing Plans
            </h2>
            <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                Discover our pricing plans, choose your perfect match and start your journey today.
            </p>

            <!-- Monthly / Yearly Billing Toggle -->
            <div class="flex items-center justify-center gap-3 mt-8">
                <span id="label-monthly" class="text-xs font-semibold uppercase tracking-wider text-[#e2ff38] transition-colors">Monthly</span>
                <button 
                    id="pricing-toggle" 
                    type="button" 
                    class="w-14 h-7 bg-[#1c2230] rounded-full p-1 relative transition-colors border border-white/10 focus:outline-none"
                    aria-label="Toggle billing duration"
                >
                    <span id="pricing-toggle-ball" class="block w-5 h-5 rounded-full bg-[#e2ff38] shadow-md transition-transform translate-x-0"></span>
                </button>
                <span id="label-yearly" class="text-xs font-semibold uppercase tracking-wider text-gray-400 transition-colors">
                    Yearly <span class="text-[10px] bg-[#e2ff38]/20 text-[#e2ff38] px-1.5 py-0.5 rounded-full font-bold ml-1">SAVE 20%</span>
                </span>
            </div>
        </div>

        <!-- 3 Pricing Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch max-w-6xl mx-auto">
            <!-- Plan 1: Basic Plan -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl p-8 flex flex-col justify-between card-hover">
                <div>
                    <h3 class="font-heading text-2xl font-bold text-white mb-2">Basic Plan</h3>
                    <p class="text-xs text-gray-400 mb-6">For beginners starting their fitness.</p>

                    <div class="mb-8">
                        <span class="font-heading text-5xl font-extrabold text-white price-amount" data-monthly="$29" data-yearly="$260">$29</span>
                        <span class="text-xs text-gray-400 font-medium price-period">/month</span>
                    </div>

                    <a 
                        href="#contact" 
                        class="block w-full text-center py-3 px-4 rounded-lg border border-white/20 hover:border-[#e2ff38] hover:bg-[#e2ff38] text-white hover:text-black font-semibold text-xs uppercase tracking-wider transition-all mb-8"
                    >
                        Get Started
                    </a>

                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-300 uppercase tracking-wider block mb-4">What you get</span>
                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Standard gym access at off-peak hours</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>1 free fitness assessment session</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Locker & shower facilities</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 2: Pro Plan (Featured) -->
            <div class="bg-gradient-to-b from-[#181e2e] to-[#121622] border-2 border-[#e2ff38] rounded-2xl p-8 flex flex-col justify-between card-hover relative shadow-2xl shadow-[#e2ff38]/10 transform lg:-translate-y-2">
                <!-- Most Popular Tag -->
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#e2ff38] text-black text-[10px] font-black uppercase tracking-widest px-3.5 py-1 rounded-full shadow-md">
                    Most Popular
                </div>

                <div>
                    <h3 class="font-heading text-2xl font-bold text-white mb-2">Pro Plan</h3>
                    <p class="text-xs text-gray-400 mb-6">For regular gym-goers aiming to level up.</p>

                    <div class="mb-8">
                        <span class="font-heading text-5xl font-extrabold text-[#e2ff38] price-amount" data-monthly="$53" data-yearly="$490">$53</span>
                        <span class="text-xs text-gray-400 font-medium price-period">/month</span>
                    </div>

                    <a 
                        href="#contact" 
                        class="block w-full text-center py-3.5 px-4 rounded-lg bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-bold text-xs uppercase tracking-wider transition-all mb-8 shadow-lg shadow-[#e2ff38]/25"
                    >
                        Get Started
                    </a>

                    <div class="space-y-3">
                        <span class="text-xs font-bold text-white uppercase tracking-wider block mb-4">What you get</span>
                        <div class="flex items-center gap-2.5 text-xs text-white">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Unlimited 24/7 gym access</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-white">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Access to all HIIT & group classes</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-white">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Personalized nutrition guide</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-white">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Free monthly guest pass</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 3: Elite Membership -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl p-8 flex flex-col justify-between card-hover">
                <div>
                    <h3 class="font-heading text-2xl font-bold text-white mb-2">Elite Membership</h3>
                    <p class="text-xs text-gray-400 mb-6">All-in access for serious transformations.</p>

                    <div class="mb-8">
                        <span class="font-heading text-5xl font-extrabold text-white price-amount" data-monthly="$99" data-yearly="$890">$99</span>
                        <span class="text-xs text-gray-400 font-medium price-period">/month</span>
                    </div>

                    <a 
                        href="#contact" 
                        class="block w-full text-center py-3 px-4 rounded-lg border border-white/20 hover:border-[#e2ff38] hover:bg-[#e2ff38] text-white hover:text-black font-semibold text-xs uppercase tracking-wider transition-all mb-8"
                    >
                        Get Started
                    </a>

                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-300 uppercase tracking-wider block mb-4">What you get</span>
                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Everything in Pro Plan</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>1-on-1 dedicated coach sessions</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Sauna & hydrotherapy lounge access</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                            <span>Custom biomarker & body fat tracking</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('pricing-toggle');
    const toggleBall = document.getElementById('pricing-toggle-ball');
    const labelMonthly = document.getElementById('label-monthly');
    const labelYearly = document.getElementById('label-yearly');
    const priceAmounts = document.querySelectorAll('.price-amount');
    const pricePeriods = document.querySelectorAll('.price-period');

    if (!toggle) return;

    let isYearly = false;

    toggle.addEventListener('click', () => {
        isYearly = !isYearly;
        if (isYearly) {
            toggleBall.classList.remove('translate-x-0');
            toggleBall.classList.add('translate-x-7');
            labelMonthly.classList.replace('text-[#e2ff38]', 'text-gray-400');
            labelYearly.classList.replace('text-gray-400', 'text-[#e2ff38]');

            priceAmounts.forEach(el => el.textContent = el.getAttribute('data-yearly'));
            pricePeriods.forEach(el => el.textContent = '/year');
        } else {
            toggleBall.classList.remove('translate-x-7');
            toggleBall.classList.add('translate-x-0');
            labelMonthly.classList.replace('text-gray-400', 'text-[#e2ff38]');
            labelYearly.classList.replace('text-[#e2ff38]', 'text-gray-400');

            priceAmounts.forEach(el => el.textContent = el.getAttribute('data-monthly'));
            pricePeriods.forEach(el => el.textContent = '/month');
        }
    });
});
</script>
