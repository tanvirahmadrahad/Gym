<section id="gallery" class="py-20 lg:py-28 bg-[#0a0c10] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight mb-4">
                Our Gallery
            </h2>
            <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                We're more than just a fitness center — we're a movement built around real transformation.
            </p>
        </div>

        <!-- Bento Grid Gallery (6 authentic clean cards: b1, b2, b3, s1, s2, s3) -->
        <div class="gallery-bento-grid">
            <!-- Item 1: b1 (Row 1-2, Col 1) - Clean Barbells Athlete (NO cookie banner) -->
            <div class="gallery-item-b1 relative rounded-2xl overflow-hidden border border-white/10 group bg-[#121622] cursor-pointer" onclick="openGalleryModal('{{ asset('images/gallery-1.png') }}', 'The Day Muscle Met Mindset')">
                <img 
                    src="{{ asset('images/gallery-1.png') }}" 
                    alt="The Day Muscle Met Mindset" 
                    loading="lazy"
                    decoding="async"
                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-5 inset-x-5 z-10">
                    <span class="text-[11px] font-bold uppercase tracking-widest text-[#e2ff38] block mb-1">Determination</span>
                    <h3 class="font-heading text-xl lg:text-2xl font-bold text-white">The Day Muscle Met Mindset</h3>
                </div>
                <div class="absolute top-4 right-4 w-9 h-9 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-expand text-xs"></i>
                </div>
            </div>

            <!-- Item 2: s2 (Row 1, Col 2) - Built From Sweat and Dreams -->
            <div class="gallery-item-s2 relative rounded-2xl overflow-hidden border border-white/10 group bg-[#121622] cursor-pointer" onclick="openGalleryModal('{{ asset('images/gallery-5.png') }}', 'Built From Sweat and Dreams')">
                <img 
                    src="{{ asset('images/gallery-5.png') }}" 
                    alt="Built From Sweat and Dreams" 
                    loading="lazy"
                    decoding="async"
                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 inset-x-4 z-10">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#00d2ff] block mb-0.5">Focus</span>
                    <h3 class="font-heading text-base font-bold text-white">Built From Sweat and Dreams</h3>
                </div>
                <div class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-expand text-[10px]"></i>
                </div>
            </div>

            <!-- Item 3: b3 (Row 1-2, Col 3) - The Moment Effort Became Power -->
            <div class="gallery-item-b3 relative rounded-2xl overflow-hidden border border-white/10 group bg-[#121622] cursor-pointer" onclick="openGalleryModal('{{ asset('images/gallery-3.png') }}', 'The Moment Effort Became Power')">
                <img 
                    src="{{ asset('images/gallery-3.png') }}" 
                    alt="The Moment Effort Became Power" 
                    loading="lazy"
                    decoding="async"
                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-5 inset-x-5 z-10">
                    <span class="text-[11px] font-bold uppercase tracking-widest text-[#e2ff38] block mb-1">Peak Strength</span>
                    <h3 class="font-heading text-xl lg:text-2xl font-bold text-white">The Moment Effort Became Power</h3>
                </div>
                <div class="absolute top-4 right-4 w-9 h-9 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-expand text-xs"></i>
                </div>
            </div>

            <!-- Item 4: b2 (Row 2-3, Col 2) - When the Grind Became Glory -->
            <div class="gallery-item-b2 relative rounded-2xl overflow-hidden border border-white/10 group bg-[#121622] cursor-pointer" onclick="openGalleryModal('{{ asset('images/gallery-2.png') }}', 'When the Grind Became Glory')">
                <img 
                    src="{{ asset('images/gallery-2.png') }}" 
                    alt="When the Grind Became Glory" 
                    loading="lazy"
                    decoding="async"
                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-5 inset-x-5 z-10">
                    <span class="text-[11px] font-bold uppercase tracking-widest text-[#ff5e36] block mb-1">Resilience</span>
                    <h3 class="font-heading text-xl lg:text-2xl font-bold text-white">When the Grind Became Glory</h3>
                </div>
                <div class="absolute top-4 right-4 w-9 h-9 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-expand text-xs"></i>
                </div>
            </div>

            <!-- Item 5: s1 (Row 3, Col 1) - Born in Pain, Raised in Strength -->
            <div class="gallery-item-s1 relative rounded-2xl overflow-hidden border border-white/10 group bg-[#121622] cursor-pointer" onclick="openGalleryModal('{{ asset('images/gallery-4.png') }}', 'Born in Pain, Raised in Strength')">
                <img 
                    src="{{ asset('images/gallery-4.png') }}" 
                    alt="Born in Pain, Raised in Strength" 
                    loading="lazy"
                    decoding="async"
                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 inset-x-4 z-10">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#00d2ff] block mb-0.5">Discipline</span>
                    <h3 class="font-heading text-base font-bold text-white">Born in Pain, Raised in Strength</h3>
                </div>
                <div class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-expand text-[10px]"></i>
                </div>
            </div>

            <!-- Item 6: s3 (Row 3, Col 3) - Fuelled by Dedication & Sweat -->
            <div class="gallery-item-s3 relative rounded-2xl overflow-hidden border border-white/10 group bg-[#121622] cursor-pointer" onclick="openGalleryModal('{{ asset('images/gallery-6.png') }}', 'Fuelled by Dedication & Sweat')">
                <img 
                    src="{{ asset('images/gallery-6.png') }}" 
                    alt="Fuelled by Dedication & Sweat" 
                    loading="lazy"
                    decoding="async"
                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 inset-x-4 z-10">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#e2ff38] block mb-0.5">Pure Energy</span>
                    <h3 class="font-heading text-base font-bold text-white">Fuelled by Dedication & Sweat</h3>
                </div>
                <div class="absolute top-3 right-3 w-8 h-8 rounded-full bg-black/50 backdrop-blur-md text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-expand text-[10px]"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="gallery-modal" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4">
        <button type="button" onclick="closeGalleryModal()" class="absolute top-6 right-6 w-11 h-11 rounded-full bg-white/10 hover:bg-[#e2ff38] hover:text-black text-white flex items-center justify-center text-lg transition-colors cursor-pointer" aria-label="Close modal">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="max-w-4xl max-h-[85vh] flex flex-col items-center">
            <img id="gallery-modal-img" src="" alt="Gallery Preview" class="max-h-[75vh] w-auto max-w-full rounded-2xl object-contain border border-white/10 shadow-2xl">
            <p id="gallery-modal-title" class="font-heading text-lg sm:text-xl font-bold text-white mt-4 tracking-wide"></p>
        </div>
    </div>
</section>

<style>
.gallery-bento-grid {
    display: grid;
    gap: 16px;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    grid-template-rows: 220px 220px 220px;
    grid-template-areas:
        "b1 s2 b3"
        "b1 b2 b3"
        "s1 b2 s3";
}
.gallery-item-b1 { grid-area: b1; }
.gallery-item-b2 { grid-area: b2; }
.gallery-item-b3 { grid-area: b3; }
.gallery-item-s1 { grid-area: s1; }
.gallery-item-s2 { grid-area: s2; }
.gallery-item-s3 { grid-area: s3; }

@media (max-width: 1024px) {
    .gallery-bento-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        grid-template-rows: auto;
        grid-template-areas:
            "b1 b1"
            "s2 b2"
            "s1 b2"
            "b3 b3"
            "s3 s3";
    }
    .gallery-item-b1, .gallery-item-b3 { min-height: 340px; }
    .gallery-item-b2 { min-height: 380px; }
    .gallery-item-s1, .gallery-item-s2, .gallery-item-s3 { min-height: 200px; }
}

@media (max-width: 640px) {
    .gallery-bento-grid {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .gallery-item-b1, .gallery-item-b2, .gallery-item-b3,
    .gallery-item-s1, .gallery-item-s2, .gallery-item-s3 {
        min-height: 260px;
    }
}
</style>

<script>
function openGalleryModal(src, title) {
    const modal = document.getElementById('gallery-modal');
    const modalImg = document.getElementById('gallery-modal-img');
    const modalTitle = document.getElementById('gallery-modal-title');
    if (!modal || !modalImg) return;
    modalImg.src = src;
    modalTitle.textContent = title;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeGalleryModal() {
    const modal = document.getElementById('gallery-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeGalleryModal();
});
</script>
