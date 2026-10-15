<!-- Footer with Distinct Slate Background (#131722 - Clearly distinguishable from #0a0c10) -->
<footer id="footer" class="bg-[#131722] border-t border-white/10 pt-16 pb-8 text-gray-300 text-sm shadow-2xl relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-white/10">
            <!-- Col 1: Brand Info (2 cols wide on desktop) -->
            <div class="lg:col-span-2 space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="flex items-center gap-[3px] h-8">
                        <span class="w-[4px] h-4 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[5px] h-7 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[5px] h-5 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[4px] h-3 bg-[#e2ff38] rounded-full"></span>
                    </div>
                    <div class="flex flex-col leading-none">
                        <span class="font-heading text-2xl font-black tracking-wider text-white">FITNES</span>
                        <span class="text-[9px] tracking-[0.25em] text-[#e2ff38] font-bold uppercase">TRAINING</span>
                    </div>
                </a>
                <p class="text-xs text-gray-400 leading-relaxed max-w-sm">
                    We're more than just a fitness center — we're a movement built around real transformation, science-backed coaching, and community support.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-[#e2ff38] hover:text-black text-gray-300 flex items-center justify-center text-sm transition-all border border-white/10"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-[#e2ff38] hover:text-black text-gray-300 flex items-center justify-center text-sm transition-all border border-white/10"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-[#e2ff38] hover:text-black text-gray-300 flex items-center justify-center text-sm transition-all border border-white/10"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-[#e2ff38] hover:text-black text-gray-300 flex items-center justify-center text-sm transition-all border border-white/10"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div>
                <h4 class="font-heading text-base font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#e2ff38] pl-2.5">
                    Quick Links
                </h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('home') }}#about" class="hover:text-[#e2ff38] transition-colors">About Us</a></li>
                    <li><a href="{{ route('home') }}#why-us" class="hover:text-[#e2ff38] transition-colors">Why Choose Us</a></li>
                    <li><a href="{{ route('home') }}#programs" class="hover:text-[#e2ff38] transition-colors">Our Programs</a></li>
                    <li><a href="{{ route('home') }}#schedule" class="hover:text-[#e2ff38] transition-colors">Class Schedule</a></li>
                    <li><a href="{{ route('home') }}#pricing" class="hover:text-[#e2ff38] transition-colors">Pricing Plans</a></li>
                </ul>
            </div>

            <!-- Col 3: Programs -->
            <div>
                <h4 class="font-heading text-base font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#e2ff38] pl-2.5">
                    Programs
                </h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('home') }}#programs" class="hover:text-[#e2ff38] transition-colors flex items-center gap-1.5"><span class="w-1 h-1 rounded-full bg-[#e2ff38]"></span>Transformation Programs</a></li>
                    <li><a href="{{ route('home') }}#pricing" class="hover:text-[#e2ff38] transition-colors flex items-center gap-1.5"><span class="w-1 h-1 rounded-full bg-[#00d2ff]"></span>Personal Training</a></li>
                    <li><a href="{{ route('home') }}#programs" class="hover:text-[#e2ff38] transition-colors flex items-center gap-1.5"><span class="w-1 h-1 rounded-full bg-[#ff5e36]"></span>Nutrition Coaching</a></li>
                    <li><a href="{{ route('home') }}#gallery" class="hover:text-[#e2ff38] transition-colors flex items-center gap-1.5"><span class="w-1 h-1 rounded-full bg-white/40"></span>Training Gallery</a></li>
                    <li><a href="{{ route('home') }}#trainers" class="hover:text-[#e2ff38] transition-colors flex items-center gap-1.5"><span class="w-1 h-1 rounded-full bg-white/40"></span>Certified Trainers</a></li>
                </ul>
            </div>

            <!-- Col 4: Newsletter -->
            <div>
                <h4 class="font-heading text-base font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#e2ff38] pl-2.5">
                    Join Newsletter
                </h4>
                <p class="text-xs text-gray-400 mb-3">Subscribe for exclusive workout tips, free passes, and health guides.</p>
                <form class="space-y-2" onsubmit="event.preventDefault(); showNoticeModal('Newsletter Subscribed', 'Thank you for subscribing! Your weekly training insights will arrive in your inbox shortly.');">
                    <input 
                        type="email" 
                        placeholder="Your email address" 
                        required 
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38]"
                    >
                    <button 
                        type="submit" 
                        class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-bold text-xs py-2.5 rounded-lg transition-all uppercase tracking-wider shadow-md cursor-pointer"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-400">
            <p>© {{ date('Y') }} <span class="text-[#e2ff38] font-bold">FITNES</span> Training. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <button type="button" onclick="showNoticeModal('Privacy Policy', 'We value your privacy. All your physical assessment data, biometric metrics, and personal records remain strictly confidential and encrypted.')" class="hover:text-white transition-colors cursor-pointer">Privacy Policy</button>
                <button type="button" onclick="showNoticeModal('Terms of Service', 'Membership rules: Respect the equipment, rack your weights after use, adhere to scheduled class times, and support your fellow athletes in the gym.')" class="hover:text-white transition-colors cursor-pointer">Terms of Service</button>
                <button type="button" onclick="showNoticeModal('Member Support', 'Need assistance with your plan, schedules, or lockers? Contact support directly via email at fitness@mail.com or call +1 (234) 567-890.')" class="hover:text-white transition-colors cursor-pointer">Support</button>
            </div>
        </div>
    </div>

    <!-- Notice Modal -->
    <div id="notice-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-[#141924] border border-white/10 rounded-2xl max-w-md w-full p-6 shadow-2xl relative">
            <button type="button" onclick="closeNoticeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-lg cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h3 id="notice-modal-title" class="font-heading text-xl font-bold text-white mb-3"></h3>
            <p id="notice-modal-body" class="text-xs text-gray-300 leading-relaxed mb-6"></p>
            <button type="button" onclick="closeNoticeModal()" class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-bold text-xs py-2.5 rounded-lg transition-all uppercase tracking-wider cursor-pointer">
                Close
            </button>
        </div>
    </div>
</footer>

<script>
function showNoticeModal(title, body) {
    const modal = document.getElementById('notice-modal');
    const titleEl = document.getElementById('notice-modal-title');
    const bodyEl = document.getElementById('notice-modal-body');
    if (!modal) return;
    titleEl.textContent = title;
    bodyEl.textContent = body;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeNoticeModal() {
    const modal = document.getElementById('notice-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
