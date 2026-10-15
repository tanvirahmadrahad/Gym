<div class="bg-[#0e121a] border-b border-white/10 text-xs text-gray-400 py-2.5 px-4 sm:px-8 relative z-50">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
        <!-- Left: Welcome text -->
        <div class="flex items-center gap-2">
            <span>Welcome to Fitnes</span>
        </div>

        <!-- Right: Email, Language, Currency, Login -->
        <div class="flex items-center flex-wrap gap-4 sm:gap-6 divide-x divide-white/10">
            <div class="flex items-center gap-2 hover:text-[#e2ff38] transition-colors cursor-pointer text-gray-300">
                <i class="fa-regular fa-envelope text-[13px]"></i>
                <a href="mailto:fitness@mail.com">fitness@mail.com</a>
            </div>

            <div class="pl-4 sm:pl-6 flex items-center gap-4 sm:gap-6">
                <!-- Language Selector (Click & Hover safe) -->
                <div class="relative dropdown-parent cursor-pointer text-gray-300 hover:text-white transition-colors">
                    <button type="button" onclick="toggleTopDropdown('lang-menu', event)" class="flex items-center gap-1.5 cursor-pointer text-xs focus:outline-none py-1">
                        <span id="current-lang-label">English</span>
                        <i class="fa-solid fa-chevron-down text-[10px] text-gray-400 transition-transform"></i>
                    </button>
                    <!-- Floating Dropdown Menu with zero gap hover bridge -->
                    <div id="lang-menu" class="dropdown-popover absolute right-0 top-full pt-1.5 hidden z-50">
                        <div class="bg-[#161a24] border border-white/20 rounded-xl py-1.5 px-1.5 w-32 shadow-2xl backdrop-blur-xl">
                            <button type="button" onclick="changeLanguage('en', 'English')" class="w-full text-left py-2 px-2.5 hover:bg-white/10 hover:text-[#e2ff38] rounded-lg text-xs transition-colors flex items-center justify-between cursor-pointer">
                                <span class="font-medium">English</span>
                                <span class="text-[9px] text-gray-400 font-mono">EN</span>
                            </button>
                            <button type="button" onclick="changeLanguage('bn', 'বাংলা')" class="w-full text-left py-2 px-2.5 hover:bg-white/10 hover:text-[#e2ff38] rounded-lg text-xs transition-colors flex items-center justify-between cursor-pointer">
                                <span class="font-medium">বাংলা</span>
                                <span class="text-[9px] text-[#e2ff38] font-mono font-bold">BN</span>
                            </button>
                            <button type="button" onclick="changeLanguage('es', 'Español')" class="w-full text-left py-2 px-2.5 hover:bg-white/10 hover:text-[#e2ff38] rounded-lg text-xs transition-colors flex items-center justify-between cursor-pointer">
                                <span class="font-medium">Español</span>
                                <span class="text-[9px] text-gray-400 font-mono">ES</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Currency Selector (Click & Hover safe) -->
                <div class="relative dropdown-parent cursor-pointer text-gray-300 hover:text-white transition-colors">
                    <button type="button" onclick="toggleTopDropdown('curr-menu', event)" class="flex items-center gap-1.5 cursor-pointer text-xs focus:outline-none py-1">
                        <span id="current-currency-label">$-USD</span>
                        <i class="fa-solid fa-chevron-down text-[10px] text-gray-400 transition-transform"></i>
                    </button>
                    <!-- Floating Dropdown Menu with zero gap hover bridge -->
                    <div id="curr-menu" class="dropdown-popover absolute right-0 top-full pt-1.5 hidden z-50">
                        <div class="bg-[#161a24] border border-white/20 rounded-xl py-1.5 px-1.5 w-28 shadow-2xl backdrop-blur-xl">
                            <button type="button" onclick="changeCurrency('$', 'USD')" class="w-full text-left py-2 px-2.5 hover:bg-white/10 hover:text-[#e2ff38] rounded-lg text-xs transition-colors flex items-center justify-between cursor-pointer">
                                <span class="font-medium">$-USD</span>
                                <span class="text-[9px] text-gray-400 font-mono">USD</span>
                            </button>
                            <button type="button" onclick="changeCurrency('€', 'EUR')" class="w-full text-left py-2 px-2.5 hover:bg-white/10 hover:text-[#e2ff38] rounded-lg text-xs transition-colors flex items-center justify-between cursor-pointer">
                                <span class="font-medium">€-EUR</span>
                                <span class="text-[9px] text-gray-400 font-mono">EUR</span>
                            </button>
                            <button type="button" onclick="changeCurrency('৳', 'BDT')" class="w-full text-left py-2 px-2.5 hover:bg-white/10 hover:text-[#e2ff38] rounded-lg text-xs transition-colors flex items-center justify-between cursor-pointer">
                                <span class="font-medium">৳-BDT</span>
                                <span class="text-[9px] text-[#e2ff38] font-mono font-bold">BDT</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Login / User Profile -->
                @auth
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1.5 text-white font-medium">
                            <span>Hi, <strong class="text-white">{{ Auth::user()->name }}</strong></span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-gray-400 hover:text-[#ff5e36] transition-colors cursor-pointer ml-1 flex items-center gap-1" title="Logout">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                    </div>
                @else
                    <button type="button" onclick="openLoginModal()" class="flex items-center gap-1.5 hover:text-[#e2ff38] transition-colors font-medium text-gray-300 cursor-pointer">
                        <i class="fa-regular fa-user text-[13px]"></i>
                        <span>Login</span>
                    </button>
                @endauth
            </div>
        </div>
    </div>
</div>
