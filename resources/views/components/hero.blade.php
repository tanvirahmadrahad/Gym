<section id="hero" class="relative min-h-[580px] lg:min-h-[680px] flex items-center overflow-hidden bg-[#0a0c10]">
    <!-- SLIDES CONTAINER -->
    <div id="hero-slider" class="absolute inset-0 w-full h-full">
        <!-- SLIDE 1: Original Design from First User Screenshot -->
        <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-100 z-10" data-index="0">
            <!-- Background Image (ABSOLUTE positioned so content stays visible) -->
            <img 
                src="{{ asset('images/gym-hero.jpg') }}" 
                alt="Gym Training Interior" 
                class="absolute inset-0 w-full h-full object-cover object-center filter brightness-[0.45] contrast-[1.15]"
            >
            <!-- Atmospheric Dark Vignette Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/50"></div>

            <!-- Slide 1 Content -->
            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-8 w-full h-full flex items-center">
                <div class="max-w-2xl py-24 lg:py-32">
                    <h1 class="font-heading text-5xl sm:text-7xl lg:text-8xl font-black text-white uppercase tracking-tight leading-[0.95] mb-8">
                        WE HELP TO GROW<br>
                        <span class="text-white">YOUR FITNESS</span>
                    </h1>

                    <!-- Neon Yellow WhatsApp CTA Button (Exact match to reference) -->
                    <div class="flex items-center flex-wrap gap-4">
                        <a 
                            href="https://wa.me/#" 
                            target="_blank"
                            class="inline-flex items-center gap-3 bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-bold text-sm sm:text-base px-7 py-3.5 rounded-sm transition-all shadow-lg shadow-[#e2ff38]/20"
                        >
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            <span>Talk To A Specialist</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDE 2: High Energy Power Workout -->
        <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0" data-index="1">
            <img 
                src="{{ asset('images/gym-slide-2.jpg') }}" 
                alt="Heavy Barbell Workout" 
                class="absolute inset-0 w-full h-full object-cover object-center filter brightness-[0.45] contrast-[1.15]"
            >
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/50"></div>

            <!-- Slide 2 Content -->
            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-8 w-full h-full flex items-center">
                <div class="max-w-2xl py-24 lg:py-32">
                    <h1 class="font-heading text-5xl sm:text-7xl lg:text-8xl font-black text-white uppercase tracking-tight leading-[0.95] mb-8">
                        UNLEASH YOUR<br>
                        <span class="text-[#e2ff38]">INNER STRENGTH</span>
                    </h1>

                    <div class="flex items-center flex-wrap gap-4">
                        <a 
                            href="#programs" 
                            class="inline-flex items-center gap-2 bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-bold text-sm sm:text-base px-7 py-3.5 rounded-sm transition-all shadow-lg shadow-[#e2ff38]/20"
                        >
                            <span>Explore Programs</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDE 3: Athletic Transformation -->
        <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0" data-index="2">
            <img 
                src="{{ asset('images/gym-slide-3.jpg') }}" 
                alt="Athletic Body Performance" 
                class="absolute inset-0 w-full h-full object-cover object-center filter brightness-[0.45] contrast-[1.15]"
            >
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/50"></div>

            <!-- Slide 3 Content -->
            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-8 w-full h-full flex items-center">
                <div class="max-w-2xl py-24 lg:py-32">
                    <h1 class="font-heading text-5xl sm:text-7xl lg:text-8xl font-black text-white uppercase tracking-tight leading-[0.95] mb-8">
                        REDEFINE WHAT<br>
                        <span class="text-[#e2ff38]">YOUR BODY CAN DO</span>
                    </h1>

                    <div class="flex items-center flex-wrap gap-4">
                        <a 
                            href="#trainers" 
                            class="inline-flex items-center gap-2 bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-bold text-sm sm:text-base px-7 py-3.5 rounded-sm transition-all shadow-lg shadow-[#e2ff38]/20"
                        >
                            <span>Meet Our Trainers</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM CONTROLS: Indicators (Left) & Arrow Buttons (Right) -->
    <div class="absolute bottom-8 inset-x-0 z-30 max-w-7xl mx-auto px-4 sm:px-8 flex items-center justify-between pointer-events-none">
        <!-- Slide Indicators -->
        <div class="flex items-center gap-2 pointer-events-auto">
            <button class="slide-indicator w-8 h-1.5 rounded-full bg-[#e2ff38] transition-all duration-300" data-slide="0" aria-label="Slide 1"></button>
            <button class="slide-indicator w-3 h-1.5 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300" data-slide="1" aria-label="Slide 2"></button>
            <button class="slide-indicator w-3 h-1.5 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300" data-slide="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Arrows (< and > matching user reference) -->
        <div class="flex items-center gap-2 pointer-events-auto">
            <button 
                id="hero-prev" 
                type="button" 
                class="w-10 h-10 border border-white/20 hover:border-[#e2ff38] bg-black/40 hover:bg-[#e2ff38] text-white hover:text-black flex items-center justify-center rounded-sm transition-all text-xs cursor-pointer"
                aria-label="Previous Slide"
            >
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button 
                id="hero-next" 
                type="button" 
                class="w-10 h-10 border border-[#e2ff38] bg-[#e2ff38] text-black flex items-center justify-center rounded-sm transition-all text-xs hover:bg-[#d0ee27] cursor-pointer"
                aria-label="Next Slide"
            >
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Auto Slider JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.slide-indicator');
    const prevBtn = document.getElementById('hero-prev');
    const nextBtn = document.getElementById('hero-next');
    const heroSection = document.getElementById('hero');

    if (!slides.length) return;

    let current = 0;
    const total = slides.length;
    let timer = null;
    const intervalTime = 5000;

    function goToSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('opacity-0', 'pointer-events-none');
                slide.classList.add('opacity-100', 'z-10');
            } else {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        indicators.forEach((dot, i) => {
            if (i === index) {
                dot.className = 'slide-indicator w-8 h-1.5 rounded-full bg-[#e2ff38] transition-all duration-300';
            } else {
                dot.className = 'slide-indicator w-3 h-1.5 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300';
            }
        });

        current = index;
    }

    function next() {
        goToSlide((current + 1) % total);
    }

    function prev() {
        goToSlide((current - 1 + total) % total);
    }

    function startTimer() {
        stopTimer();
        timer = setInterval(next, intervalTime);
    }

    function stopTimer() {
        if (timer) clearInterval(timer);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            next();
            startTimer();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            prev();
            startTimer();
        });
    }

    indicators.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            goToSlide(i);
            startTimer();
        });
    });

    if (heroSection) {
        heroSection.addEventListener('mouseenter', stopTimer);
        heroSection.addEventListener('mouseleave', startTimer);
    }

    startTimer();
});
</script>
