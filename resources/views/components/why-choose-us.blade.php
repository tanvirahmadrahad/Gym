<section id="why-us" class="py-20 lg:py-28 bg-[#0b0e15] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <!-- Left: Text & 4 Highlight Points -->
            <div class="lg:col-span-7">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight mb-6">
                    Why Choose Us?
                </h2>

                <p class="text-gray-400 text-sm sm:text-base leading-relaxed mb-10 max-w-2xl">
                    We're not just a gym — we're your partner in transformation. At FitLab, we combine smart training, real support, and a vibe that keeps you coming back. Leveling up, FitLab is where your transformation begins — and sticks.
                </p>

                <!-- 4 Highlight Features Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Feature 1 -->
                    <div class="flex items-center gap-3.5 p-4 rounded-xl bg-[#131722] border border-white/5 hover:border-[#e2ff38]/40 transition-all card-hover">
                        <div class="w-11 h-11 rounded-lg bg-[#1a2030] flex items-center justify-center text-[#e2ff38] shrink-0 text-base shadow-sm">
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                        <h4 class="font-bold text-white text-sm">Youth-Focused Programs</h4>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex items-center gap-3.5 p-4 rounded-xl bg-[#131722] border border-white/5 hover:border-[#00d2ff]/40 transition-all card-hover">
                        <div class="w-11 h-11 rounded-lg bg-[#1a2030] flex items-center justify-center text-[#00d2ff] shrink-0 text-base shadow-sm">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <h4 class="font-bold text-white text-sm">Certified Coaches Who Care</h4>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex items-center gap-3.5 p-4 rounded-xl bg-[#131722] border border-white/5 hover:border-[#ff5e36]/40 transition-all card-hover">
                        <div class="w-11 h-11 rounded-lg bg-[#1a2030] flex items-center justify-center text-[#ff5e36] shrink-0 text-base shadow-sm">
                            <i class="fa-solid fa-bolt-lightning"></i>
                        </div>
                        <h4 class="font-bold text-white text-sm">Real Results, Real Fast</h4>
                    </div>

                    <!-- Feature 4 -->
                    <div class="flex items-center gap-3.5 p-4 rounded-xl bg-[#131722] border border-white/5 hover:border-[#e2ff38]/40 transition-all card-hover">
                        <div class="w-11 h-11 rounded-lg bg-[#1a2030] flex items-center justify-center text-[#e2ff38] shrink-0 text-base shadow-sm">
                            <i class="fa-solid fa-trophy"></i>
                        </div>
                        <h4 class="font-bold text-white text-sm">Modern Smart Equipment</h4>
                    </div>
                </div>
            </div>

            <!-- Right: Muscular Athlete with Earphones curling dumbbells -->
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-2xl overflow-hidden border border-white/10 bg-[#131722] shadow-2xl group">
                    <img 
                        src="{{ asset('images/why-choose-us.png') }}" 
                        alt="Athlete doing dumbbell curls" 
                        loading="lazy"
                        decoding="async"
                        class="w-full h-[460px] lg:h-[500px] object-cover object-center group-hover:scale-105 transition-transform duration-500"
                        onerror="this.onerror=null; this.src='{{ asset('images/man-dumbbell.jpg') }}';"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-black/60 backdrop-blur-md border border-white/10 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-[#e2ff38] font-bold block uppercase tracking-wider">Join 2,000+ Members</span>
                            <span class="text-white text-sm font-semibold">Ready to start today?</span>
                        </div>
                        <a href="#pricing" class="w-9 h-9 rounded-full bg-[#e2ff38] text-black flex items-center justify-center text-xs font-bold hover:scale-110 transition-transform">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
