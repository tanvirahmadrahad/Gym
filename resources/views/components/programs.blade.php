<section id="programs" class="py-20 lg:py-28 bg-[#0b0e14] relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <!-- Section Header & Top Program Card Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start mb-8">
            <!-- Left: Header info -->
            <div class="max-w-xl flex flex-col justify-between h-full">
                <div>
                    <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight mb-4">
                        Programs That Deliver Real Results
                    </h2>
                    <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                        Personalized, trackable programs built to push limits and redefine what your body can do.
                    </p>
                </div>

                <!-- Highlight Card to balance layout and fill empty space -->
                <div class="mt-6 p-4 rounded-xl bg-[#13161f] border border-white/10 flex items-center justify-between gap-4 card-hover">
                    <div class="flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-lg bg-[#e2ff38]/15 text-[#e2ff38] flex items-center justify-center text-base shrink-0">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <div>
                            <span class="text-white text-sm font-bold block">100% Results Guaranteed</span>
                            <span class="text-xs text-gray-400">Scientific workout plans designed by certified fitness coaches.</span>
                        </div>
                    </div>
                    <a href="#pricing" class="inline-flex items-center gap-1.5 bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-bold text-xs uppercase px-3.5 py-2 rounded-lg shrink-0 transition-all">
                        <span>Join</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- Program 1: Transformation Programs (Top Right) -->
            <div id="transformation-programs" class="scroll-mt-28 bg-[#13161f] border border-white/10 rounded-2xl p-6 hover:border-[#e2ff38]/40 transition-all flex flex-col sm:flex-row gap-5 items-center group">
                <div class="w-full sm:w-48 h-48 sm:h-full min-h-[170px] rounded-xl overflow-hidden shrink-0 relative">
                    <img 
                        src="{{ asset('images/program-transformation.png') }}" 
                        alt="Transformation Programs" 
                        loading="lazy"
                        decoding="async"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        onerror="this.onerror=null; this.src='{{ asset('images/man-dumbbell.jpg') }}';"
                    >
                    <span class="absolute top-2.5 left-2.5 bg-[#e2ff38] text-black text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded shadow">
                        12-Week Course
                    </span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between gap-2 mb-1.5">
                        <h3 class="font-heading text-xl font-bold text-white group-hover:text-[#e2ff38] transition-colors">Transformation Programs</h3>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed mb-4">
                        Structured, high-impact body recomposition periodization designed to drop body fat while packing on lean, defined muscle mass.
                    </p>
                    <ul class="space-y-1.5 text-xs text-gray-300 mb-4">
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#e2ff38] text-[11px]"></i>
                            <span>12-week progressive hypertrophy periodization</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#e2ff38] text-[11px]"></i>
                            <span>Bi-weekly DEXA body scans & caliper testing</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#e2ff38] text-[11px]"></i>
                            <span>Weekly 1-on-1 coach check-ins & accountability</span>
                        </li>
                    </ul>
                    <a href="#pricing" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#e2ff38] hover:text-white transition-colors uppercase tracking-wider">
                        <span>View Plans & Pricing</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Grid: Program 2 & Program 3 -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Program 2: Personal Training -->
            <div id="personal-training" class="scroll-mt-28 bg-[#13161f] border border-white/10 rounded-2xl p-6 hover:border-[#00d2ff]/40 transition-all flex flex-col sm:flex-row gap-5 items-center group">
                <div class="w-full sm:w-48 h-48 sm:h-full min-h-[170px] rounded-xl overflow-hidden shrink-0 relative">
                    <img 
                        src="{{ asset('images/program-personal.png') }}" 
                        alt="Personal Training" 
                        loading="lazy"
                        decoding="async"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        onerror="this.onerror=null; this.src='{{ asset('images/trainer-man.jpg') }}';"
                    >
                    <span class="absolute top-2.5 left-2.5 bg-[#00d2ff] text-black text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded shadow">
                        1-on-1 Coaching
                    </span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between gap-2 mb-1.5">
                        <h3 class="font-heading text-xl font-bold text-white group-hover:text-[#00d2ff] transition-colors">Personal Training</h3>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed mb-4">
                        Elite 1-on-1 private coaching tailored to your individual biomechanics, strength baseline, athletic movement quality, and injury prevention.
                    </p>
                    <ul class="space-y-1.5 text-xs text-gray-300 mb-4">
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#00d2ff] text-[11px]"></i>
                            <span>Comprehensive movement & mobility assessment</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#00d2ff] text-[11px]"></i>
                            <span>Real-time biomechanical feedback & form correction</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#00d2ff] text-[11px]"></i>
                            <span>Dedicated VIP training rack & flexible schedule</span>
                        </li>
                    </ul>
                    <a href="#trainers" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#00d2ff] hover:text-white transition-colors uppercase tracking-wider">
                        <span>Meet Our Coaches</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- Program 3: Nutrition Coaching -->
            <div id="nutrition-coaching" class="scroll-mt-28 bg-[#13161f] border border-white/10 rounded-2xl p-6 hover:border-[#ff5e36]/40 transition-all flex flex-col sm:flex-row gap-5 items-center group">
                <div class="w-full sm:w-48 h-48 sm:h-full min-h-[170px] rounded-xl overflow-hidden shrink-0 relative">
                    <img 
                        src="{{ asset('images/program-nutrition.png') }}" 
                        alt="Nutrition Coaching" 
                        loading="lazy"
                        decoding="async"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        onerror="this.onerror=null; this.src='{{ asset('images/nutrition-food.jpg') }}';"
                    >
                    <span class="absolute top-2.5 left-2.5 bg-[#ff5e36] text-white text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded shadow">
                        Nutrition Pro
                    </span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between gap-2 mb-1.5">
                        <h3 class="font-heading text-xl font-bold text-white group-hover:text-[#ff5e36] transition-colors">Nutrition Coaching</h3>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed mb-4">
                        Evidence-based nutrition planning designed for your metabolism. Fuel heavy sessions, accelerate recovery, and attain lasting body composition without starvation.
                    </p>
                    <ul class="space-y-1.5 text-xs text-gray-300 mb-4">
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#ff5e36] text-[11px]"></i>
                            <span>Personalized daily calorie & macronutrient targets</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#ff5e36] text-[11px]"></i>
                            <span>Weekly grocery shopping guides & easy recipes</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-[#ff5e36] text-[11px]"></i>
                            <span>Metabolic adaptation adjustments & daily logging</span>
                        </li>
                    </ul>
                    <a href="#pricing" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#ff5e36] hover:text-white transition-colors uppercase tracking-wider">
                        <span>Get Nutrition Plan</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
#transformation-programs:target {
    border-color: #e2ff38;
    box-shadow: 0 0 35px rgba(226, 255, 56, 0.25);
    background-color: #171d2b;
}
#personal-training:target {
    border-color: #00d2ff;
    box-shadow: 0 0 35px rgba(0, 210, 255, 0.25);
    background-color: #171d2b;
}
#nutrition-coaching:target {
    border-color: #ff5e36;
    box-shadow: 0 0 35px rgba(255, 94, 54, 0.25);
    background-color: #171d2b;
}
</style>
