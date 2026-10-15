<section id="blog" class="py-20 lg:py-28 bg-[#080a0e] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight mb-4">
                Explore Our Insights
            </h2>
            <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                Get the information you need to build confidence on the road. Our insights keep you prepared, informed, and ready for every training session.
            </p>
        </div>

        <!-- 3 Blog Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Blog 1 -->
            <article class="bg-[#121622] border border-white/10 rounded-2xl overflow-hidden card-hover group flex flex-col justify-between">
                <div>
                    <a href="{{ route('blog.show', 'maximize-muscle-recovery-after-intense-session') }}" class="block h-52 overflow-hidden relative">
                        <img 
                            src="{{ asset('images/blog-1.png') }}" 
                            alt="Muscle recovery after intense workout" 
                            loading="lazy"
                            decoding="async"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.src='{{ asset('images/man-dumbbell.jpg') }}';"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-[#121622] via-transparent to-transparent"></div>
                    </a>

                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs mb-3">
                            <span class="px-2.5 py-0.5 rounded-full bg-[#e2ff38] text-black font-bold uppercase text-[10px]">
                                Tips
                            </span>
                            <span class="text-gray-400 flex items-center gap-1.5 text-xs">
                                <i class="fa-regular fa-calendar text-[#e2ff38]"></i>
                                25 November 2025
                            </span>
                        </div>

                        <h3 class="font-heading text-xl font-bold text-white group-hover:text-[#e2ff38] transition-colors leading-snug">
                            <a href="{{ route('blog.show', 'maximize-muscle-recovery-after-intense-session') }}">
                                How to Maximize Muscle Recovery After an Intense Session
                            </a>
                        </h3>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-gray-400">5 min read</span>
                    <a href="{{ route('blog.show', 'maximize-muscle-recovery-after-intense-session') }}" class="text-[#e2ff38] hover:text-white font-bold flex items-center gap-1.5 group-hover:translate-x-1 transition-all">
                        <span>Read More</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

            <!-- Blog 2 -->
            <article class="bg-[#121622] border border-white/10 rounded-2xl overflow-hidden card-hover group flex flex-col justify-between">
                <div>
                    <a href="{{ route('blog.show', 'how-to-stay-consistent-with-your-fitness-routine') }}" class="block h-52 overflow-hidden relative">
                        <img 
                            src="{{ asset('images/blog-2.png') }}" 
                            alt="Fitness routine consistency" 
                            loading="lazy"
                            decoding="async"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.src='{{ asset('images/trainer-man.jpg') }}';"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-[#121622] via-transparent to-transparent"></div>
                    </a>

                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs mb-3">
                            <span class="px-2.5 py-0.5 rounded-full bg-[#00d2ff] text-black font-bold uppercase text-[10px]">
                                Routine
                            </span>
                            <span class="text-gray-400 flex items-center gap-1.5 text-xs">
                                <i class="fa-regular fa-calendar text-[#00d2ff]"></i>
                                25 November 2025
                            </span>
                        </div>

                        <h3 class="font-heading text-xl font-bold text-white group-hover:text-[#00d2ff] transition-colors leading-snug">
                            <a href="{{ route('blog.show', 'how-to-stay-consistent-with-your-fitness-routine') }}">
                                How to Stay Consistent with Your Fitness Routine
                            </a>
                        </h3>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-gray-400">4 min read</span>
                    <a href="{{ route('blog.show', 'how-to-stay-consistent-with-your-fitness-routine') }}" class="text-[#00d2ff] hover:text-white font-bold flex items-center gap-1.5 group-hover:translate-x-1 transition-all">
                        <span>Read More</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>

            <!-- Blog 3 -->
            <article class="bg-[#121622] border border-white/10 rounded-2xl overflow-hidden card-hover group flex flex-col justify-between">
                <div>
                    <a href="{{ route('blog.show', 'strength-vs-cardio-which-should-you-prioritize') }}" class="block h-52 overflow-hidden relative">
                        <img 
                            src="{{ asset('images/blog-3.png') }}" 
                            alt="Strength vs cardio workout" 
                            loading="lazy"
                            decoding="async"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.src='{{ asset('images/gallery-crossfit.jpg') }}';"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-[#121622] via-transparent to-transparent"></div>
                    </a>

                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs mb-3">
                            <span class="px-2.5 py-0.5 rounded-full bg-[#ff5e36] text-white font-bold uppercase text-[10px]">
                                Guide
                            </span>
                            <span class="text-gray-400 flex items-center gap-1.5 text-xs">
                                <i class="fa-regular fa-calendar text-[#ff5e36]"></i>
                                25 November 2025
                            </span>
                        </div>

                        <h3 class="font-heading text-xl font-bold text-white group-hover:text-[#ff5e36] transition-colors leading-snug">
                            <a href="{{ route('blog.show', 'strength-vs-cardio-which-should-you-prioritize') }}">
                                Strength vs. Cardio: Which Should You Prioritize?
                            </a>
                        </h3>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between text-xs">
                    <span class="text-gray-400">6 min read</span>
                    <a href="{{ route('blog.show', 'strength-vs-cardio-which-should-you-prioritize') }}" class="text-[#ff5e36] hover:text-white font-bold flex items-center gap-1.5 group-hover:translate-x-1 transition-all">
                        <span>Read More</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>
