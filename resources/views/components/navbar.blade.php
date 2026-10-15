<!-- Main Navbar (Distinct Slate Background: #131722 - Clearly distinguishable from #0a0c10) -->
<header class="bg-[#131722] border-b border-white/10 sticky top-0 z-40 shadow-lg shadow-black/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 py-4 flex items-center justify-between">
        <!-- Brand Logo (Authentic Gym Branding) -->
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <div class="flex items-center gap-[3px] h-8">
                <span class="w-[4px] h-4 bg-[#e2ff38] rounded-full group-hover:scale-y-110 transition-transform"></span>
                <span class="w-[5px] h-7 bg-[#e2ff38] rounded-full group-hover:scale-y-125 transition-transform"></span>
                <span class="w-[5px] h-5 bg-[#e2ff38] rounded-full group-hover:scale-y-110 transition-transform"></span>
                <span class="w-[4px] h-3 bg-[#e2ff38] rounded-full group-hover:scale-y-125 transition-transform"></span>
            </div>
            <div class="flex flex-col leading-none">
                <span class="font-heading text-2xl font-black tracking-wider text-white">FITNES</span>
                <span class="text-[9px] tracking-[0.25em] text-[#e2ff38] font-bold uppercase">TRAINING</span>
            </div>
        </a>

        <!-- Desktop Navigation: Home is a DIRECT link (NO dropdown), smooth landing page navigation -->
        <nav class="hidden md:flex items-center gap-6 lg:gap-8 text-sm font-semibold">
            <!-- Home: Single landing page link without dropdown -->
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#e2ff38]' : 'text-gray-300' }} hover:text-[#e2ff38] transition-colors py-1">Home</a>
            <a href="{{ route('home') }}#about" class="text-gray-300 hover:text-[#e2ff38] transition-colors py-1">About Us</a>
            <a href="{{ route('home') }}#pricing" class="text-gray-300 hover:text-[#e2ff38] transition-colors py-1">Pricing</a>
            <a href="{{ route('home') }}#programs" class="text-gray-300 hover:text-[#e2ff38] transition-colors py-1">Programs</a>
            <a href="{{ route('home') }}#schedule" class="text-gray-300 hover:text-[#e2ff38] transition-colors py-1">Schedule</a>
            <a href="{{ route('home') }}#gallery" class="text-gray-300 hover:text-[#e2ff38] transition-colors py-1">Gallery</a>
            <a href="{{ route('home') }}#trainers" class="text-gray-300 hover:text-[#e2ff38] transition-colors py-1">Trainers</a>
            <a href="{{ route('home') }}#blog" class="text-gray-300 hover:text-[#e2ff38] transition-colors py-1">Blog</a>
        </nav>

        <!-- Right Side: User Status & Hamburger Button -->
        <div class="flex items-center gap-2.5 sm:gap-3">
            @auth
                <!-- Notification Bell with Membership Alert -->
                <div class="relative">
                    <button 
                        id="notification-bell-btn"
                        type="button" 
                        onclick="toggleNotificationMenu(event)" 
                        class="w-10 h-10 rounded-lg bg-white/5 hover:bg-white/10 border border-white/15 text-gray-300 hover:text-[#e2ff38] flex items-center justify-center transition-all cursor-pointer relative"
                        title="Membership Renewal Alerts & Notifications"
                        aria-label="Notifications"
                    >
                        <i class="fa-regular fa-bell text-sm"></i>
                        <span id="notification-bell-badge" class="absolute -top-1 -right-1 w-4 h-4 bg-[#ff5e36] text-white text-[9px] font-extrabold rounded-full flex items-center justify-center ring-2 ring-[#131722] animate-pulse">
                            1
                        </span>
                    </button>

                    <!-- Notification Dropdown Popover -->
                    <div id="notification-popover" class="hidden absolute right-0 top-full mt-2 w-80 sm:w-96 bg-[#161a24] border border-white/20 rounded-2xl shadow-2xl p-4 z-50 backdrop-blur-xl">
                        <div class="flex items-center justify-between pb-3 border-b border-white/10 gap-2">
                            <div class="flex items-center gap-2">
                                <span class="font-heading text-xs font-bold text-white uppercase tracking-wider flex items-center gap-1.5">
                                    <i class="fa-solid fa-bell text-[#e2ff38]"></i>
                                    <span>Gym Alerts</span>
                                </span>
                                <span id="notification-badge-count" class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-[#ff5e36]/15 text-[#ff5e36] border border-[#ff5e36]/30 shrink-0">
                                    1 Urgent
                                </span>
                            </div>
                            <button 
                                type="button" 
                                id="mark-all-read-btn"
                                onclick="markAllNotificationsAsRead()" 
                                class="text-[10px] text-gray-400 hover:text-[#e2ff38] font-bold transition-colors flex items-center gap-1 cursor-pointer shrink-0"
                                title="Mark all alerts as read"
                            >
                                <i class="fa-solid fa-check-double text-[#e2ff38]"></i>
                                <span>Mark all as read</span>
                            </button>
                        </div>

                        <!-- Alert Card: 3-Day Expiry Notice -->
                        <div id="notification-urgent-card" class="my-3 p-3.5 rounded-xl bg-gradient-to-br from-amber-500/10 via-[#1c2230] to-rose-500/10 border border-amber-500/30 space-y-2.5 transition-all">
                            <div class="flex items-start gap-2.5">
                                <div id="notification-urgent-icon" class="w-7 h-7 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fa-solid fa-triangle-exclamation text-xs"></i>
                                </div>
                                <div>
                                    <div class="flex items-center justify-between gap-2">
                                        <h5 class="text-xs font-bold text-white">Membership Expiring in 3 Days!</h5>
                                        <span id="notification-read-tag" class="hidden text-[9px] text-emerald-400 font-extrabold uppercase">Read</span>
                                    </div>
                                    <p class="text-[11px] text-gray-300 mt-0.5 leading-relaxed">
                                        Your <strong class="text-[#e2ff38]">Pro Athlete Membership</strong> renews on <strong class="text-white">Nov 15, 2026</strong> ($53.00). Please renew to avoid turnstile interruption.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 pt-2 border-t border-white/10">
                                <a 
                                    href="{{ route('profile') }}" 
                                    onclick="if (typeof openChangePlanModal === 'function') { openChangePlanModal(); return false; }"
                                    class="flex-1 text-center py-2 px-2.5 rounded-lg bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[11px] font-extrabold uppercase tracking-wider transition-all shadow-sm"
                                >
                                    Quick Pay (bKash/Card)
                                </a>
                                <button 
                                    type="button" 
                                    onclick="openSmsPreviewModal()"
                                    class="py-2 px-2.5 rounded-lg bg-white/10 hover:bg-white/15 text-white text-[11px] font-bold border border-white/15 transition-all flex items-center gap-1.5 cursor-pointer"
                                    title="Preview Mobile SMS"
                                >
                                    <i class="fa-solid fa-mobile-screen text-[#00d2ff]"></i>
                                    <span>SMS</span>
                                </button>
                            </div>
                        </div>

                        <!-- Routine Notice -->
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-start gap-2.5 text-xs text-gray-300">
                            <i class="fa-solid fa-bullhorn text-[#e2ff38] text-xs mt-0.5"></i>
                            <div class="space-y-0.5">
                                <span class="font-bold text-white block text-[11px]">Zone A Upgraded</span>
                                <p class="text-[10px] text-gray-400">New competition Olympic bumper plates and calibrated barbells are live.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:flex items-center gap-2">
                    <!-- Profile Icon Button (Replaces user text name) -->
                    <a 
                        href="{{ route('profile') }}" 
                        class="w-10 h-10 rounded-lg bg-white/5 hover:bg-[#e2ff38] border border-white/15 hover:border-[#e2ff38] text-white hover:text-black flex items-center justify-center transition-all group cursor-pointer {{ request()->routeIs('profile') ? 'border-[#e2ff38] bg-[#e2ff38]/15 text-[#e2ff38]' : '' }}" 
                        title="Athlete Profile ({{ Auth::user()->name }})"
                        aria-label="View Athlete Profile"
                    >
                        <i class="fa-solid fa-user text-sm"></i>
                    </a>
                </div>
            @else
                <button 
                    type="button" 
                    onclick="openLoginModal()" 
                    class="hidden sm:inline-flex items-center gap-1.5 bg-white/5 hover:bg-[#e2ff38] hover:text-black border border-white/10 hover:border-[#e2ff38] text-white text-xs font-bold uppercase tracking-wider px-3.5 py-2 rounded-lg transition-all cursor-pointer"
                >
                    <i class="fa-regular fa-user text-xs"></i>
                    <span>Login</span>
                </button>
            @endauth

            <button 
                id="menu-open-btn"
                type="button" 
                class="w-10 h-10 border border-white/20 bg-[#1a202e] hover:bg-[#e2ff38] hover:border-[#e2ff38] rounded-lg flex flex-col items-center justify-center gap-1.5 transition-all text-white hover:text-black group cursor-pointer"
                aria-label="Open Sidebar Menu"
            >
                <span class="w-5 h-[2px] bg-white group-hover:bg-black transition-colors"></span>
                <span class="w-4 h-[2px] bg-white group-hover:bg-black self-end mr-2.5 transition-colors"></span>
                <span class="w-5 h-[2px] bg-white group-hover:bg-black transition-colors"></span>
            </button>
        </div>
    </div>
</header>

<!-- Offcanvas Sidebar Menu (Works on BOTH Desktop & Mobile) -->
<div id="offcanvas-backdrop" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300"></div>

<aside 
    id="offcanvas-drawer" 
    class="fixed top-0 right-0 h-full w-80 sm:w-96 bg-[#131722] border-l border-white/10 z-50 p-6 flex flex-col justify-between transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl"
    aria-label="Navigation Drawer"
>
    <!-- Drawer Header -->
    <div>
        <div class="flex items-center justify-between pb-6 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-[3px] h-7">
                    <span class="w-[3px] h-3 bg-[#e2ff38] rounded-full"></span>
                    <span class="w-[4px] h-6 bg-[#e2ff38] rounded-full"></span>
                    <span class="w-[4px] h-4 bg-[#e2ff38] rounded-full"></span>
                    <span class="w-[3px] h-2 bg-[#e2ff38] rounded-full"></span>
                </div>
                <div class="flex flex-col leading-none">
                    <span class="font-heading text-xl font-bold tracking-wider text-white">FITNES</span>
                    <span class="text-[8px] tracking-[0.2em] text-[#e2ff38] font-bold uppercase">TRAINING</span>
                </div>
            </div>
            <!-- Close Button -->
            <button 
                id="menu-close-btn"
                type="button" 
                class="w-9 h-9 rounded-lg border border-white/15 bg-white/5 hover:bg-[#e2ff38] hover:text-black text-gray-300 flex items-center justify-center transition-colors text-sm"
                aria-label="Close menu"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Drawer Links -->
        <nav class="py-6 flex flex-col gap-2 font-medium text-sm">
            @auth
                <div class="mb-3 p-3.5 rounded-xl bg-white/5 border border-white/10 space-y-2.5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-[#e2ff38]/10 border border-[#e2ff38]/30 flex items-center justify-center text-[#e2ff38] text-xs">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div>
                                <span class="text-white text-xs font-bold block">{{ Auth::user()->name }}</span>
                                <span class="text-[9px] text-[#e2ff38] font-mono uppercase tracking-wider">PRO ATHLETE</span>
                            </div>
                        </div>
                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 font-bold">
                            Active
                        </span>
                    </div>

                    <a href="{{ route('profile') }}" class="drawer-link block w-full py-2 px-3 rounded-lg bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider text-center shadow-md shadow-[#e2ff38]/20 transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-id-badge text-sm"></i>
                        <span>My Gym Profile</span>
                    </a>
                </div>
            @else
                <button type="button" onclick="closeDrawer(); openLoginModal();" class="w-full text-left py-2.5 px-3 rounded-lg bg-[#e2ff38] text-black font-extrabold uppercase text-xs flex items-center justify-between mb-3 cursor-pointer shadow-md shadow-[#e2ff38]/20">
                    <span class="flex items-center gap-2">
                        <i class="fa-regular fa-user"></i>
                        <span>Member Login</span>
                    </span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </button>
            @endauth

            <!-- FITNES Store (Moved to 3-Line Menu as requested) -->
            <a href="{{ route('store.index') }}" class="drawer-link block p-3 rounded-xl bg-gradient-to-r from-[#e2ff38]/15 via-[#1a2233] to-[#131722] border border-[#e2ff38]/40 hover:border-[#e2ff38] text-white hover:text-[#e2ff38] transition-all flex items-center justify-between shadow-md mb-2 group">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-[#e2ff38] text-black flex items-center justify-center text-xs font-bold shadow-md shadow-[#e2ff38]/20 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div>
                        <div class="font-heading text-xs font-bold uppercase tracking-wider text-white group-hover:text-[#e2ff38] transition-colors">FITNES Store</div>
                        <div class="text-[10px] text-gray-400">Supplements, Gear & Apparel</div>
                    </div>
                </div>
                <span class="text-[9px] bg-[#e2ff38] text-black font-extrabold px-2 py-0.5 rounded uppercase tracking-wider">Shop</span>
            </a>

            <a href="{{ route('home') }}" class="drawer-link block py-2 px-3 rounded-lg bg-[#e2ff38]/10 text-[#e2ff38] font-bold">Home</a>
            <a href="{{ route('home') }}#about" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">About Us</a>
            <a href="{{ route('home') }}#why-us" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">Why Choose Us</a>
            <a href="{{ route('home') }}#pricing" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">Pricing Plans</a>
            <a href="{{ route('home') }}#programs" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">Programs</a>
            <a href="{{ route('home') }}#schedule" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">Class Schedule</a>
            <a href="{{ route('home') }}#transformations" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">Member Stories</a>
            <a href="{{ route('home') }}#gallery" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">Gallery</a>
            <a href="{{ route('leaderboard') }}" class="drawer-link block py-2 px-3 rounded-lg {{ request()->routeIs('leaderboard') ? 'bg-[#e2ff38]/15 text-[#e2ff38] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#e2ff38]' }} transition-colors flex items-center justify-between">
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-trophy text-[#e2ff38] text-xs"></i>
                    <span>Leaderboard & PR Wall</span>
                </span>
                <span class="text-[9px] bg-amber-400/20 text-amber-400 font-extrabold px-1.5 py-0.2 rounded uppercase">Top 10</span>
            </a>
            <a href="{{ route('home') }}#trainers" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">Our Trainers</a>
            <a href="{{ route('home') }}#blog" class="drawer-link block py-2 px-3 rounded-lg text-gray-300 hover:bg-white/5 hover:text-[#e2ff38] transition-colors">Latest Insights</a>

            @auth
                <!-- Logout Option inside 3-Line Menu as requested -->
                <div class="pt-3 mt-2 border-t border-white/10">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full py-2.5 px-3 rounded-xl bg-rose-500/10 hover:bg-rose-500/20 border border-rose-500/30 hover:border-rose-500/50 text-rose-400 hover:text-rose-300 font-extrabold text-xs uppercase tracking-wider flex items-center justify-center gap-2 transition-all cursor-pointer">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span>Logout Account</span>
                        </button>
                    </form>
                </div>
            @endauth
        </nav>
    </div>

    <!-- Drawer Footer Information -->
    <div class="border-t border-white/10 pt-6 text-xs text-gray-400 space-y-3">
        <div class="flex items-center gap-2.5 text-gray-300">
            <i class="fa-solid fa-location-dot text-[#e2ff38]"></i>
            <span>123 Fitness Ave, Workout City</span>
        </div>
        <div class="flex items-center gap-2.5 text-gray-300">
            <i class="fa-solid fa-phone text-[#e2ff38]"></i>
            <span>+1 (234) 567-890</span>
        </div>
        <div class="flex items-center gap-2.5 text-gray-300">
            <i class="fa-solid fa-clock text-[#e2ff38]"></i>
            <span>Mon - Fri: 6:00 AM - 10:00 PM</span>
        </div>
        <div class="flex items-center gap-3 pt-2">
            <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#e2ff38] hover:text-black flex items-center justify-center text-xs transition-colors"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#e2ff38] hover:text-black flex items-center justify-center text-xs transition-colors"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-[#e2ff38] hover:text-black flex items-center justify-center text-xs transition-colors"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
    </div>
</aside>

<!-- Modal: Authentic Smartphone SMS Alert Simulator -->
<div id="sms-preview-modal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="relative w-full max-w-sm">
        <!-- Close Button -->
        <button type="button" onclick="closeSmsPreviewModal()" class="absolute -top-12 right-0 text-white/80 hover:text-white text-lg bg-white/10 hover:bg-white/20 w-9 h-9 rounded-full flex items-center justify-center cursor-pointer transition-colors">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <!-- Smartphone Frame Mockup -->
        <div class="bg-[#1c1d22] border-4 border-[#333842] rounded-[42px] p-3 shadow-2xl overflow-hidden ring-1 ring-white/10">
            <!-- Dynamic Island / Speaker Notch -->
            <div class="w-full flex justify-center pb-2">
                <div class="w-24 h-4 bg-black rounded-full flex items-center justify-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#111]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#202535]"></span>
                </div>
            </div>

            <!-- Phone Screen -->
            <div class="bg-[#0b0e14] rounded-[32px] overflow-hidden text-white flex flex-col h-[520px] border border-white/5">
                <!-- Status Bar -->
                <div class="flex items-center justify-between px-5 py-2 text-[11px] font-semibold text-gray-300">
                    <span>9:41</span>
                    <div class="flex items-center gap-1.5 text-xs">
                        <i class="fa-solid fa-signal text-[10px]"></i>
                        <span class="text-[10px] font-bold">5G</span>
                        <i class="fa-solid fa-battery-full text-emerald-400"></i>
                    </div>
                </div>

                <!-- Messages Header -->
                <div class="bg-[#121620] px-4 py-3 border-b border-white/10 flex items-center gap-3">
                    <button type="button" onclick="closeSmsPreviewModal()" class="text-[#00d2ff] text-xs flex items-center gap-1">
                        <i class="fa-solid fa-chevron-left text-[11px]"></i>
                    </button>
                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#e2ff38] to-[#00d2ff] flex items-center justify-center text-black font-black text-xs font-heading">
                        FIT
                    </div>
                    <div class="flex-1 leading-tight">
                        <div class="flex items-center gap-1">
                            <span class="text-xs font-bold text-white">FITNES-GYM</span>
                            <i class="fa-solid fa-circle-check text-sky-400 text-[10px]"></i>
                        </div>
                        <span class="text-[9px] text-gray-400">Verified Business SMS</span>
                    </div>
                </div>

                <!-- Message Thread Area -->
                <div class="flex-1 p-4 space-y-3 overflow-y-auto text-xs">
                    <div class="text-center">
                        <span class="text-[9px] uppercase tracking-wider text-gray-500 font-mono bg-white/5 px-2 py-0.5 rounded-full">Today 9:30 AM</span>
                    </div>

                    <!-- SMS Bubble -->
                    <div class="bg-[#1c2438] border border-white/10 rounded-2xl rounded-tl-sm p-3.5 space-y-2 max-w-[92%] shadow-lg">
                        <div class="flex items-center justify-between text-[10px] text-amber-400 font-bold uppercase tracking-wider">
                            <span><i class="fa-solid fa-bell mr-1"></i> Membership Notice</span>
                            <span class="font-mono text-gray-400">FIT-011688</span>
                        </div>
                        <p class="text-xs text-gray-200 leading-relaxed">
                            Dear <strong class="text-white">MD TANVIR AHMAD</strong>, your FITNES Pro Athlete Plan expires in <span class="text-[#e2ff38] font-bold">3 DAYS (Nov 15, 2026)</span>.
                        </p>
                        <p class="text-[11px] text-gray-300 leading-relaxed">
                            Amount: <strong>$53.00 (৳5,830)</strong>. Please renew via bKash, Nagad or Visa at reception to avoid turnstile RFID deactivation.
                        </p>
                        <div class="pt-1.5 border-t border-white/10 flex items-center justify-between text-[10px] text-gray-400">
                            <span>Promo: <strong class="text-[#00d2ff]">FITRENEW</strong> (5% Store Off)</span>
                            <span class="font-mono">09:30</span>
                        </div>
                    </div>
                </div>

                <!-- Phone Bottom Action -->
                <div class="p-3 bg-[#121620] border-t border-white/10 space-y-2">
                    <a 
                        href="{{ route('profile') }}" 
                        onclick="closeSmsPreviewModal(); if (typeof openChangePlanModal === 'function') openChangePlanModal();"
                        class="block w-full py-2.5 rounded-xl bg-[#e2136e] hover:bg-[#c90f5f] text-white font-extrabold text-xs uppercase tracking-wider text-center shadow-lg shadow-[#e2136e]/20 transition-all flex items-center justify-center gap-1.5"
                    >
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <span>Pay via bKash / Card Now</span>
                    </a>
                    <div class="w-28 h-1 bg-white/20 rounded-full mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offcanvas & Notification Script -->
<script>
function toggleNotificationMenu(event) {
    if (event) event.stopPropagation();
    const popover = document.getElementById('notification-popover');
    if (!popover) return;
    popover.classList.toggle('hidden');
}

function openSmsPreviewModal() {
    const popover = document.getElementById('notification-popover');
    if (popover) popover.classList.add('hidden');
    const modal = document.getElementById('sms-preview-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeSmsPreviewModal() {
    const modal = document.getElementById('sms-preview-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function markAllNotificationsAsRead() {
    const badge = document.getElementById('notification-bell-badge');
    const countTag = document.getElementById('notification-badge-count');
    const markBtn = document.getElementById('mark-all-read-btn');
    const urgentCard = document.getElementById('notification-urgent-card');
    const readTag = document.getElementById('notification-read-tag');
    const urgentIcon = document.getElementById('notification-urgent-icon');

    if (badge) badge.classList.add('hidden');
    if (countTag) {
        countTag.className = 'text-[9px] font-bold px-2 py-0.5 rounded-full bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 shrink-0';
        countTag.textContent = '0 Unread';
    }
    if (markBtn) {
        markBtn.innerHTML = '<i class="fa-solid fa-check text-emerald-400"></i> <span class="text-emerald-400">All Read</span>';
        markBtn.classList.add('pointer-events-none', 'opacity-80');
    }
    if (readTag) {
        readTag.classList.remove('hidden');
    }
    if (urgentCard) {
        urgentCard.classList.remove('border-amber-500/30', 'from-amber-500/10');
        urgentCard.classList.add('border-white/10', 'bg-white/5', 'opacity-75');
    }
    if (urgentIcon) {
        urgentIcon.className = 'w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 mt-0.5';
        urgentIcon.innerHTML = '<i class="fa-solid fa-check text-xs"></i>';
    }
    localStorage.setItem('gym_notifications_read', 'true');
}

function applySavedNotificationReadState() {
    if (localStorage.getItem('gym_notifications_read') === 'true') {
        const badge = document.getElementById('notification-bell-badge');
        const countTag = document.getElementById('notification-badge-count');
        const markBtn = document.getElementById('mark-all-read-btn');
        const urgentCard = document.getElementById('notification-urgent-card');
        const readTag = document.getElementById('notification-read-tag');
        const urgentIcon = document.getElementById('notification-urgent-icon');

        if (badge) badge.classList.add('hidden');
        if (countTag) {
            countTag.className = 'text-[9px] font-bold px-2 py-0.5 rounded-full bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 shrink-0';
            countTag.textContent = '0 Unread';
        }
        if (markBtn) {
            markBtn.innerHTML = '<i class="fa-solid fa-check text-emerald-400"></i> <span class="text-emerald-400">All Read</span>';
            markBtn.classList.add('pointer-events-none', 'opacity-80');
        }
        if (readTag) {
            readTag.classList.remove('hidden');
        }
        if (urgentCard) {
            urgentCard.classList.remove('border-amber-500/30', 'from-amber-500/10');
            urgentCard.classList.add('border-white/10', 'bg-white/5', 'opacity-75');
        }
        if (urgentIcon) {
            urgentIcon.className = 'w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 mt-0.5';
            urgentIcon.innerHTML = '<i class="fa-solid fa-check text-xs"></i>';
        }
    }
}

// Click outside to close notification popover
document.addEventListener('click', (e) => {
    const popover = document.getElementById('notification-popover');
    const bellBtn = document.getElementById('notification-bell-btn');
    if (popover && !popover.classList.contains('hidden')) {
        if (!popover.contains(e.target) && (!bellBtn || !bellBtn.contains(e.target))) {
            popover.classList.add('hidden');
        }
    }
});

document.addEventListener('DOMContentLoaded', () => {
    applySavedNotificationReadState();
    const openBtn = document.getElementById('menu-open-btn');
    const closeBtn = document.getElementById('menu-close-btn');
    const drawer = document.getElementById('offcanvas-drawer');
    const backdrop = document.getElementById('offcanvas-backdrop');
    const drawerLinks = document.querySelectorAll('.drawer-link');

    function openDrawer() {
        if (!drawer || !backdrop) return;
        backdrop.classList.remove('hidden');
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            drawer.classList.remove('translate-x-full');
            drawer.classList.add('translate-x-0');
        }, 10);
    }

    function closeDrawer() {
        if (!drawer || !backdrop) return;
        drawer.classList.remove('translate-x-0');
        drawer.classList.add('translate-x-full');
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        setTimeout(() => {
            backdrop.classList.add('hidden');
        }, 300);
    }

    if (openBtn) openBtn.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (backdrop) backdrop.addEventListener('click', closeDrawer);

    drawerLinks.forEach(link => {
        link.addEventListener('click', closeDrawer);
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeDrawer();
            closeSmsPreviewModal();
        }
    });
});
</script>
