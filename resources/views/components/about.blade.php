<section id="about" class="py-20 lg:py-28 bg-[#0a0c10] relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <!-- Left: Athletic Workout Image -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none rounded-2xl overflow-hidden border border-white/10 shadow-2xl group">
                    <img 
                        src="{{ asset('images/about-man.png') }}" 
                        alt="Bodybuilder doing bicep curls" 
                        loading="lazy"
                        decoding="async"
                        class="w-full h-[450px] lg:h-[520px] object-cover object-center group-hover:scale-105 transition-transform duration-500"
                        onerror="this.onerror=null; this.src='{{ asset('images/man-dumbbell.jpg') }}';"
                    >
                    <!-- Subtle Glow Border effect -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                </div>

                <!-- Decorative accent dot/badge -->
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#e2ff38]/10 rounded-full blur-2xl pointer-events-none"></div>
            </div>

            <!-- Right: Content & Features -->
            <div class="lg:col-span-7 flex flex-col justify-center">
                <!-- Heading -->
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight mb-6">
                    Begin Your Fitness Story <br class="hidden sm:inline">with Us
                </h2>

                <!-- Description -->
                <p class="text-gray-400 text-sm sm:text-base leading-relaxed mb-8 max-w-2xl">
                    We're more than just a fitness center — we're a movement built around real transformation. Our mission is simple help people become stronger, healthier, and more confident every single day.
                </p>

                <!-- Two Key Features Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">
                    <!-- Feature 1: Nutrition Guidance -->
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-[#13161f] border border-white/5 hover:border-[#e2ff38]/30 transition-all">
                        <div class="w-12 h-12 rounded-lg bg-[#1a1e29] flex items-center justify-center shrink-0 text-[#e2ff38] text-lg">
                            <i class="fa-solid fa-fire"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white text-base mb-1">Nutrition Guidance</h3>
                            <p class="text-xs text-gray-400 leading-relaxed">
                                We measure progress, not just promises — and we deliver.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2: Goal-Focused Coaching -->
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-[#13161f] border border-white/5 hover:border-[#e2ff38]/30 transition-all">
                        <div class="w-12 h-12 rounded-lg bg-[#1a1e29] flex items-center justify-center shrink-0 text-[#e2ff38] text-lg">
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white text-base mb-1">Goal-Focused Coaching</h3>
                            <p class="text-xs text-gray-400 leading-relaxed">
                                We measure progress, not just promises — and we deliver.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div>
                    <a 
                        href="#trainers" 
                        class="inline-flex items-center gap-2 bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-semibold text-sm px-7 py-3 rounded-md transition-all shadow-md shadow-[#e2ff38]/10"
                    >
                        <span>Meet Our Trainers</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
