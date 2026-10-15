<section id="transformations" class="py-20 lg:py-28 bg-[#0b0e14] relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <!-- Section Header with Arrows -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="max-w-2xl">
                <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight mb-4">
                    Let’s See Our Members <br class="hidden sm:inline">Have Transformed
                </h2>
                <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                    We build confidence, habits, and mindset. These are the real stories of people who started just like you — and now live stronger.
                </p>
            </div>

            <!-- Top Right Navigation Arrows -->
            <div class="flex items-center gap-2 shrink-0">
                <button 
                    type="button" 
                    class="w-11 h-11 bg-[#e2ff38] text-black hover:bg-[#d0ee27] flex items-center justify-center rounded-lg transition-all text-sm font-bold shadow-md shadow-[#e2ff38]/10"
                    aria-label="Previous Transformation"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button 
                    type="button" 
                    class="w-11 h-11 bg-[#232731] hover:bg-[#e2ff38] text-gray-300 hover:text-black flex items-center justify-center rounded-lg transition-all text-sm font-bold"
                    aria-label="Next Transformation"
                >
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Transformation Showcase Card -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <!-- Left: Before / After Photo -->
            <div class="lg:col-span-6">
                <div class="relative rounded-2xl overflow-hidden border border-white/10 bg-[#13161f] shadow-2xl group">
                    <img 
                        src="{{ asset('images/member-transformation.png') }}" 
                        alt="Julian Wood Before and After Transformation" 
                        loading="lazy"
                        decoding="async"
                        class="w-full h-[400px] sm:h-[480px] object-cover object-center group-hover:scale-102 transition-transform duration-500"
                        onerror="this.onerror=null; this.src='{{ asset('images/man-dumbbell.jpg') }}';"
                    >
                    <div class="absolute bottom-4 left-4 bg-black/70 backdrop-blur-md px-3 py-1 rounded text-xs text-white border border-white/10 font-semibold">
                        Real Member Result
                    </div>
                </div>
            </div>

            <!-- Right: Transformation Details Card -->
            <div class="lg:col-span-6">
                <div class="relative bg-[#13161f] border border-white/10 rounded-2xl p-8 sm:p-10 overflow-hidden shadow-2xl">
                    <!-- Subtle Kettlebell Watermark / Background Art -->
                    <div class="absolute -right-6 -bottom-6 text-white/[0.03] text-[200px] pointer-events-none select-none">
                        <i class="fa-solid fa-dumbbell"></i>
                    </div>

                    <div class="relative z-10">
                        <h3 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">
                            Julian Wood
                        </h3>
                        <p class="text-sm text-gray-400 mb-8 font-medium">Age: 24</p>

                        <!-- Transformation Duration -->
                        <div class="mb-8">
                            <span class="font-heading text-3xl sm:text-4xl font-bold text-white block mb-1">
                                35 Weeks
                            </span>
                            <span class="text-xs uppercase tracking-wider text-[#e2ff38] font-semibold">Dedicated Routine</span>
                        </div>

                        <!-- Stats Table -->
                        <div class="border-t border-white/10 pt-6 space-y-6">
                            <!-- Weight Loss Row -->
                            <div class="flex items-center justify-between text-sm sm:text-base border-b border-white/5 pb-4">
                                <span class="text-gray-400 font-medium">Weight Loss</span>
                                <div class="flex items-center gap-6 sm:gap-10">
                                    <div class="text-right">
                                        <span class="text-xs text-gray-500 block uppercase">Before</span>
                                        <span class="text-gray-300 font-semibold">90Kg</span>
                                    </div>
                                    <div class="w-px h-8 bg-white/10"></div>
                                    <div class="text-right">
                                        <span class="text-xs text-[#e2ff38] block uppercase">After</span>
                                        <span class="text-white font-bold text-lg">65Kg</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Body Fat Row -->
                            <div class="flex items-center justify-between text-sm sm:text-base">
                                <span class="text-gray-400 font-medium">Body Fat</span>
                                <div class="flex items-center gap-6 sm:gap-10">
                                    <div class="text-right">
                                        <span class="text-xs text-gray-500 block uppercase">Before</span>
                                        <span class="text-gray-300 font-semibold">65%</span>
                                    </div>
                                    <div class="w-px h-8 bg-white/10"></div>
                                    <div class="text-right">
                                        <span class="text-xs text-[#e2ff38] block uppercase">After</span>
                                        <span class="text-white font-bold text-lg">25%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
