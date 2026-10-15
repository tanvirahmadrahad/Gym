<section id="stats" class="py-16 bg-[#0a0c10] relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            <!-- Stat 1: 160+ -->
            <div class="relative h-64 sm:h-72 rounded-2xl overflow-hidden border border-white/10 group flex items-end p-8 bg-[#13161f]">
                <!-- Background Image -->
                <img 
                    src="{{ asset('images/stat-card-1.png') }}" 
                    alt="Expert Trainers" 
                    loading="lazy"
                    decoding="async"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 filter brightness-[0.55]"
                    onerror="this.onerror=null; this.src='{{ asset('images/man-dumbbell.jpg') }}';"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                
                <!-- Stat Number -->
                <div class="relative z-10">
                    <span class="font-heading text-6xl sm:text-7xl font-black text-[#e2ff38] tracking-tight block drop-shadow-md">
                        160+
                    </span>
                    <span class="text-xs uppercase tracking-widest text-gray-300 font-semibold">Expert Trainers</span>
                </div>
            </div>

            <!-- Stat 2: 2,000+ -->
            <div class="relative h-64 sm:h-72 rounded-2xl overflow-hidden border border-white/10 group flex items-end p-8 bg-[#13161f]">
                <!-- Background Image -->
                <img 
                    src="{{ asset('images/stat-card-2.png') }}" 
                    alt="Active Members" 
                    loading="lazy"
                    decoding="async"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 filter brightness-[0.55]"
                    onerror="this.onerror=null; this.src='{{ asset('images/trainer-man.jpg') }}';"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                
                <!-- Stat Number -->
                <div class="relative z-10">
                    <span class="font-heading text-6xl sm:text-7xl font-black text-[#e2ff38] tracking-tight block drop-shadow-md">
                        2,000+
                    </span>
                    <span class="text-xs uppercase tracking-widest text-gray-300 font-semibold">Happy Members</span>
                </div>
            </div>

            <!-- Stat 3: 92+ -->
            <div class="relative h-64 sm:h-72 rounded-2xl overflow-hidden border border-white/10 group flex items-end p-8 bg-[#13161f]">
                <!-- Background Image -->
                <img 
                    src="{{ asset('images/stat-card-3.png') }}" 
                    alt="Fitness Programs" 
                    loading="lazy"
                    decoding="async"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 filter brightness-[0.55]"
                    onerror="this.onerror=null; this.src='{{ asset('images/gym-hero.jpg') }}';"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                
                <!-- Stat Number -->
                <div class="relative z-10">
                    <span class="font-heading text-6xl sm:text-7xl font-black text-[#e2ff38] tracking-tight block drop-shadow-md">
                        92+
                    </span>
                    <span class="text-xs uppercase tracking-widest text-gray-300 font-semibold">Fitness Programs</span>
                </div>
            </div>
        </div>
    </div>
</section>
