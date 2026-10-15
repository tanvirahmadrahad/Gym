@extends('layouts.app', ['title' => 'Athlete Profile & Membership - FITNES'])

@section('content')
<div class="min-h-screen bg-[#0a0c10] text-[#f3f4f6] py-10 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Ambient Background Glows -->
    <div class="absolute top-12 left-1/4 w-96 h-96 bg-[#e2ff38]/5 rounded-full blur-[140px] pointer-events-none"></div>
    <div class="absolute bottom-12 right-1/4 w-96 h-96 bg-[#00d2ff]/5 rounded-full blur-[140px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto space-y-8 relative z-10">

        <!-- Top Profile Header Bar -->
        <div class="bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 shadow-xl">
            <div class="flex items-center gap-4 sm:gap-5">
                <!-- Avatar with Status Ring -->
                <div class="relative">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br from-[#1e2638] to-[#121620] border-2 border-[#e2ff38] flex items-center justify-center text-2xl sm:text-3xl font-heading font-black text-[#e2ff38] shadow-lg shadow-[#e2ff38]/10">
                        {{ strtoupper(substr($profile['name'], 0, 2)) }}
                    </div>
                    <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-[#131722] rounded-full animate-pulse" title="Status: Online & Active Member"></span>
                </div>

                <!-- Athlete Name & ID -->
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1">
                        <h1 class="font-heading text-2xl sm:text-3xl font-black text-white tracking-wide">
                            {{ $profile['name'] }}
                        </h1>
                        <span class="px-2.5 py-0.5 rounded-full bg-[#e2ff38]/15 border border-[#e2ff38]/40 text-[#e2ff38] text-[10px] font-black uppercase tracking-wider">
                            <i class="fa-solid fa-circle-check text-[9px] mr-1"></i> {{ $profile['membership_status'] }}
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full bg-white/5 border border-white/10 text-gray-300 text-[10px] font-semibold">
                            VIP ATHLETE
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 flex items-center gap-2 flex-wrap">
                        <span><i class="fa-regular fa-envelope text-gray-500 mr-1"></i> {{ $profile['email'] }}</span>
                        <span class="text-white/20">•</span>
                        <span><i class="fa-regular fa-id-badge text-[#e2ff38] mr-1"></i> Gym ID: <strong class="text-white font-mono">{{ $profile['gym_id'] }}</strong></span>
                        <span class="text-white/20">•</span>
                        <span><i class="fa-regular fa-calendar-check text-gray-500 mr-1"></i> Member Since: {{ $profile['member_since'] }}</span>
                    </p>
                </div>
            </div>

            <!-- Header Quick Actions -->
            <div class="flex items-center gap-3 w-full md:w-auto justify-end">
                <button 
                    type="button" 
                    onclick="openEditProfileModal()" 
                    class="flex items-center gap-2 bg-white/5 hover:bg-white/10 text-white text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-xl border border-white/10 transition-all cursor-pointer"
                >
                    <i class="fa-solid fa-user-pen text-[#e2ff38]"></i>
                    <span>Edit Profile</span>
                </button>
                <a 
                    href="{{ route('home') }}" 
                    class="flex items-center gap-2 bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-xs font-black uppercase tracking-wider px-4 py-2.5 rounded-xl transition-all shadow-md shadow-[#e2ff38]/20"
                >
                    <i class="fa-solid fa-house"></i>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>

        <!-- Success Feedback Banner -->
        @if (session('success'))
            <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-400/60 hover:text-emerald-400">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <!-- Grid 1: Digital Member Pass & Athlete Bio -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Digital Gym Card (1 Col) -->
            <div class="lg:col-span-1 space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-id-card text-[#e2ff38]"></i>
                        <span>Digital Gym Pass</span>
                    </h2>
                    <span class="text-[10px] text-gray-400 uppercase tracking-widest font-mono">SCAN READY</span>
                </div>

                <!-- Authentic Digital RFID Member Card -->
                <div class="relative rounded-2xl p-6 bg-gradient-to-tr from-[#0e121a] via-[#161d2d] to-[#1a2337] border-2 border-[#e2ff38]/40 shadow-2xl overflow-hidden group">
                    <!-- Subtle Gym Glow Background -->
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-[#e2ff38]/10 rounded-full blur-2xl group-hover:scale-125 transition-transform duration-700"></div>

                    <!-- Top Card Row: Logo & RFID Symbol -->
                    <div class="flex items-center justify-between relative z-10 pb-4">
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-[2px] h-6">
                                <span class="w-[3px] h-3 bg-[#e2ff38] rounded-full"></span>
                                <span class="w-[4px] h-5 bg-[#e2ff38] rounded-full"></span>
                                <span class="w-[4px] h-4 bg-[#e2ff38] rounded-full"></span>
                                <span class="w-[3px] h-2 bg-[#e2ff38] rounded-full"></span>
                            </div>
                            <div>
                                <span class="font-heading text-base font-black tracking-wider text-white">FITNES</span>
                                <span class="text-[7px] block tracking-[0.2em] text-[#e2ff38] font-bold">ALL-ACCESS</span>
                            </div>
                        </div>

                        <!-- RFID Chip & Contactless waves -->
                        <div class="flex items-center gap-1.5 text-gray-400">
                            <i class="fa-solid fa-wifi rotate-90 text-[#e2ff38] text-xs"></i>
                            <span class="text-[9px] uppercase font-bold tracking-wider text-gray-400">RFID</span>
                        </div>
                    </div>

                    <!-- EMV Golden Chip Graphic -->
                    <div class="w-11 h-8 rounded-md bg-gradient-to-tr from-amber-600 via-amber-400 to-amber-200 border border-amber-300 shadow-md relative z-10 mb-4 flex items-center justify-center overflow-hidden">
                        <div class="w-full h-[1px] bg-amber-800/40 absolute top-2"></div>
                        <div class="w-full h-[1px] bg-amber-800/40 absolute bottom-2"></div>
                        <div class="h-full w-[1px] bg-amber-800/40 absolute left-3"></div>
                        <div class="h-full w-[1px] bg-amber-800/40 absolute right-3"></div>
                        <div class="w-3 h-3 rounded-full border border-amber-800/50"></div>
                    </div>

                    <!-- Gym ID Code -->
                    <div class="relative z-10 mb-4">
                        <span class="text-[9px] text-gray-400 uppercase tracking-widest font-semibold block">Member ID Number</span>
                        <span class="font-mono text-xl sm:text-2xl font-black text-white tracking-widest drop-shadow">
                            {{ $profile['gym_id'] }}
                        </span>
                    </div>

                    <!-- Member Name & Package Tier -->
                    <div class="flex items-end justify-between relative z-10 pt-2 border-t border-white/10">
                        <div>
                            <span class="text-[9px] text-gray-400 uppercase tracking-widest block font-medium">Athlete Name</span>
                            <span class="font-heading text-sm font-bold text-white uppercase tracking-wider">
                                {{ $profile['name'] }}
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-[9px] text-gray-400 uppercase tracking-widest block font-medium">Access Tier</span>
                            <span class="text-xs font-black text-[#e2ff38] uppercase">
                                PRO ATHLETE
                            </span>
                        </div>
                    </div>

                    <!-- Simulated Barcode at bottom -->
                    <div class="mt-5 pt-3 border-t border-dashed border-white/10 flex flex-col items-center justify-center">
                        <div class="h-8 w-full flex items-center justify-between px-2 opacity-80 group-hover:opacity-100 transition-opacity">
                            @for ($i = 0; $i < 38; $i++)
                                <span class="bg-white h-full {{ $i % 4 == 0 ? 'w-[3px]' : ($i % 3 == 0 ? 'w-[1.5px]' : 'w-[1px]') }}"></span>
                            @endfor
                        </div>
                        <span class="text-[8px] font-mono text-gray-500 tracking-[0.3em] mt-1">{{ $profile['gym_id'] }}-SECURE-PASS</span>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-white/5 border border-white/10 text-xs text-gray-400 flex items-center gap-3">
                    <i class="fa-solid fa-turnstile text-base text-[#e2ff38]"></i>
                    <p class="leading-relaxed">
                        Present this digital pass or mention your Gym ID <strong class="text-white">{{ $profile['gym_id'] }}</strong> at the front reception turnstiles for instant entry.
                    </p>
                </div>
            </div>

            <!-- Member Details & Athletic Bio (2 Cols) -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-clipboard-user text-[#e2ff38]"></i>
                        <span>Athlete Profile Information</span>
                    </h2>
                    <button 
                        type="button" 
                        onclick="openEditProfileModal()" 
                        class="text-xs text-[#e2ff38] font-bold hover:underline cursor-pointer"
                    >
                        Update Info
                    </button>
                </div>

                <div class="bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Full Name -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Full Name
                            </span>
                            <span class="font-heading text-base font-bold text-white flex items-center gap-2">
                                <i class="fa-regular fa-user text-[#e2ff38] text-sm"></i>
                                {{ $profile['name'] }}
                            </span>
                        </div>

                        <!-- Email -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Email Address
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2 truncate">
                                <i class="fa-regular fa-envelope text-[#e2ff38] text-sm"></i>
                                {{ $profile['email'] }}
                            </span>
                        </div>

                        <!-- Phone -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Phone Number
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2">
                                <i class="fa-solid fa-phone text-[#e2ff38] text-sm"></i>
                                {{ $profile['phone'] }}
                            </span>
                        </div>

                        <!-- Emergency Contact -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Emergency Contact
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2 truncate">
                                <i class="fa-solid fa-heart-pulse text-rose-400 text-sm"></i>
                                {{ $profile['emergency_contact'] }}
                            </span>
                        </div>

                        <!-- Blood Group -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Blood Group
                            </span>
                            <span class="text-xs font-bold text-[#e2ff38] flex items-center gap-2">
                                <i class="fa-solid fa-droplet text-rose-500 text-sm"></i>
                                {{ $profile['blood_group'] }}
                            </span>
                        </div>

                        <!-- Assigned Locker -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Assigned Locker
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2">
                                <i class="fa-solid fa-key text-[#e2ff38] text-sm"></i>
                                {{ $profile['locker_number'] }}
                            </span>
                        </div>

                        <!-- Body Stats: Weight & Height -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Body Measurements
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-3">
                                <span><i class="fa-solid fa-weight-scale text-cyan-400 mr-1"></i> {{ $profile['weight'] }}</span>
                                <span><i class="fa-solid fa-ruler-vertical text-cyan-400 mr-1"></i> {{ $profile['height'] }}</span>
                            </span>
                        </div>

                        <!-- Assigned Coach -->
                        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">
                                Assigned Coach / Trainer
                            </span>
                            <span class="text-xs font-semibold text-white flex items-center gap-2">
                                <i class="fa-solid fa-dumbbell text-[#e2ff38] text-sm"></i>
                                {{ $profile['trainer_name'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Fitness Goals Banner -->
                    <div class="mt-5 p-4 rounded-xl bg-gradient-to-r from-[#182030] to-[#141a24] border border-[#e2ff38]/20 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <div>
                            <span class="text-[10px] font-bold text-[#e2ff38] uppercase tracking-wider block">
                                Primary Athletic Objective
                            </span>
                            <p class="font-heading text-sm font-bold text-white mt-0.5">
                                {{ $profile['fitness_goal'] }}
                            </p>
                        </div>
                        <span class="px-3 py-1 rounded-lg bg-[#e2ff38]/10 text-[#e2ff38] text-xs font-bold border border-[#e2ff38]/30 shrink-0">
                            On Track (Phase 2)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid 2: Current Membership Status & Package -->
        <div class="space-y-4">
            <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-cubes text-[#e2ff38]"></i>
                <span>Current Gym Membership & Active Package</span>
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Package Summary Card (1 Col) -->
                <div class="bg-gradient-to-b from-[#161c28] to-[#10141e] border-2 border-[#e2ff38]/30 rounded-2xl p-6 sm:p-7 shadow-xl flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 right-0 transform translate-x-4 -translate-y-2">
                        <span class="text-6xl text-white/5 font-black font-heading select-none pointer-events-none">PRO</span>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-3 py-1 rounded-full bg-[#e2ff38] text-black font-extrabold text-[10px] uppercase tracking-widest">
                                CURRENT ACTIVE PLAN
                            </span>
                            <span class="flex items-center gap-1.5 text-xs text-emerald-400 font-bold">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                Auto-Renew
                            </span>
                        </div>

                        <h3 class="font-heading text-2xl font-black text-white mt-2">
                            {{ $profile['package_name'] }}
                        </h3>
                        <div class="flex items-baseline gap-1 my-3">
                            <span class="font-heading text-3xl font-black text-[#e2ff38]">{{ $profile['package_price'] }}</span>
                        </div>

                        <div class="space-y-2 pt-2 border-t border-white/10 text-xs text-gray-300">
                            <div class="flex items-center justify-between py-1">
                                <span class="text-gray-400">Status:</span>
                                <span class="font-bold text-emerald-400 uppercase">{{ $profile['membership_status'] }}</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="text-gray-400">Next Billing Date:</span>
                                <span class="font-bold text-white">{{ $profile['renewal_date'] }}</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <span class="text-gray-400">Payment Card:</span>
                                <span class="font-bold text-white flex items-center gap-1">
                                    <i class="fa-brands fa-cc-visa text-blue-400"></i> Visa •••• 4242
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-white/10 flex flex-col sm:flex-row gap-2">
                        <button 
                            type="button" 
                            onclick="openChangePlanModal()"
                            class="flex-1 bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-2.5 rounded-lg transition-all text-center cursor-pointer shadow-md shadow-[#e2ff38]/20 flex items-center justify-center gap-1.5"
                        >
                            <i class="fa-solid fa-arrows-rotate text-xs"></i>
                            <span>Change Plan</span>
                        </button>
                        <button 
                            type="button" 
                            onclick="openFreezeModal()"
                            class="flex-1 bg-white/5 hover:bg-white/10 text-gray-300 hover:text-white font-bold text-xs uppercase tracking-wider py-2.5 rounded-lg border border-white/10 transition-all text-center cursor-pointer flex items-center justify-center gap-1.5"
                        >
                            <i class="fa-solid fa-pause text-xs text-[#e2ff38]"></i>
                            <span>Freeze / Pause</span>
                        </button>
                    </div>
                </div>

                <!-- Included Privileges & Workout Attendance Progress (2 Cols) -->
                <div class="lg:col-span-2 bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl flex flex-col justify-between">
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#e2ff38] pl-2.5">
                            Included Privileges & Gym Access
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                            @foreach ($packageFeatures as $feature)
                                <div class="flex items-start gap-2.5 text-xs text-gray-300 p-2.5 rounded-lg bg-[#182030] border border-white/5">
                                    <i class="fa-solid fa-circle-check text-[#e2ff38] text-sm mt-0.5 shrink-0"></i>
                                    <span class="leading-relaxed">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Attendance & Workout Consistency Progress -->
                    <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                        <div class="flex flex-wrap items-center justify-between gap-2 text-xs">
                            <span class="font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-fire text-[#ff5e36]"></i>
                                Monthly Workout Consistency (October 2026)
                            </span>
                            <span class="text-[#e2ff38] font-bold">
                                {{ $activity['monthly_visits'] }} of {{ $activity['monthly_target'] }} Sessions ({{ round(($activity['monthly_visits'] / $activity['monthly_target']) * 100) }}%)
                            </span>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full bg-black/40 rounded-full h-3 overflow-hidden p-0.5 border border-white/10">
                            <div class="bg-gradient-to-r from-[#e2ff38] to-emerald-400 h-full rounded-full transition-all duration-1000" style="width: {{ ($activity['monthly_visits'] / $activity['monthly_target']) * 100 }}%"></div>
                        </div>

                        <div class="grid grid-cols-3 gap-2 text-center pt-1 text-[11px] text-gray-400">
                            <div>Total Lifetime Visits: <strong class="text-white">{{ $activity['total_visits'] }}</strong></div>
                            <div>Active Streak: <strong class="text-[#ff5e36]">{{ $activity['streak_weeks'] }} Weeks 🔥</strong></div>
                            <div>Top Focus: <strong class="text-white">{{ $activity['favorite_workout'] }}</strong></div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Section: Athlete Achievement Badges & Leaderboard Link (Plan 2) -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-medal text-[#e2ff38]"></i>
                        <span>Athlete Badges & Achievements</span>
                    </h2>
                    <p class="text-xs text-gray-400">Track unlocked powerlifting PRs, consistency streaks, and turnstile milestones.</p>
                </div>
                <a 
                    href="{{ route('leaderboard') }}" 
                    class="text-xs text-[#e2ff38] font-bold hover:underline flex items-center gap-1.5 bg-[#e2ff38]/10 hover:bg-[#e2ff38]/20 border border-[#e2ff38]/30 px-3 py-1.5 rounded-full transition-all"
                >
                    <i class="fa-solid fa-trophy text-xs"></i>
                    <span>View Gym Leaderboard (#4 Ranked)</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Badge 1: Iron Warrior -->
                <div class="p-4 rounded-2xl bg-gradient-to-b from-[#e2ff38]/10 to-[#131722] border-2 border-[#e2ff38]/50 shadow-lg space-y-2 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-[#e2ff38] text-black flex items-center justify-center text-lg font-bold shadow-md shadow-[#e2ff38]/30">
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                        <span class="px-2 py-0.5 rounded-full bg-[#e2ff38] text-black text-[9px] font-black uppercase">
                            UNLOCKED
                        </span>
                    </div>
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wide">Iron Warrior</h4>
                        <p class="text-[11px] text-gray-400 mt-0.5">100+ kg lift verified (Current: 130 kg PR).</p>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-[#e2ff38] h-full rounded-full w-full"></div>
                    </div>
                </div>

                <!-- Badge 2: Consistency King -->
                <div class="p-4 rounded-2xl bg-gradient-to-b from-orange-500/10 to-[#131722] border-2 border-orange-500/50 shadow-lg space-y-2 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center text-lg font-bold shadow-md shadow-orange-500/30">
                            <i class="fa-solid fa-fire-flame-curved"></i>
                        </div>
                        <span class="px-2 py-0.5 rounded-full bg-orange-500 text-white text-[9px] font-black uppercase">
                            UNLOCKED
                        </span>
                    </div>
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wide">Consistency King</h4>
                        <p class="text-[11px] text-gray-400 mt-0.5">4+ week streak active (5 weeks logged).</p>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-orange-500 h-full rounded-full w-full"></div>
                    </div>
                </div>

                <!-- Badge 3: Century Club -->
                <div class="p-4 rounded-2xl bg-[#131722] border border-white/10 shadow-lg space-y-2 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/15 border border-amber-500/30 text-amber-400 flex items-center justify-center text-lg font-bold">
                            <i class="fa-solid fa-crown"></i>
                        </div>
                        <span class="px-2 py-0.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-400 text-[9px] font-extrabold uppercase">
                            68% Done
                        </span>
                    </div>
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wide">Century Club</h4>
                        <p class="text-[11px] text-gray-400 mt-0.5">100 check-in sessions (68/100 visits).</p>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-amber-400 h-full rounded-full" style="width: 68%;"></div>
                    </div>
                </div>

                <!-- Badge 4: Early Bird Striker -->
                <div class="p-4 rounded-2xl bg-[#131722] border border-white/10 shadow-lg space-y-2 relative overflow-hidden">
                    <div class="flex items-center justify-between">
                        <div class="w-10 h-10 rounded-xl bg-sky-500/15 border border-sky-500/30 text-sky-400 flex items-center justify-center text-lg font-bold">
                            <i class="fa-solid fa-sun"></i>
                        </div>
                        <span class="px-2 py-0.5 rounded-full bg-sky-500/15 border border-sky-500/30 text-sky-400 text-[9px] font-extrabold uppercase">
                            85% Done
                        </span>
                    </div>
                    <div>
                        <h4 class="font-heading text-sm font-bold text-white uppercase tracking-wide">Early Bird Striker</h4>
                        <p class="text-[11px] text-gray-400 mt-0.5">20 workouts before 7:00 AM (17/20).</p>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-1.5 overflow-hidden">
                        <div class="bg-sky-400 h-full rounded-full" style="width: 85%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Smart Workout Routine Generator (Plan 3) -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-wand-magic-sparkles text-[#e2ff38]"></i>
                        <span>Smart Workout Routine Generator</span>
                    </h2>
                    <p class="text-xs text-gray-400">Curated splits designed for maximum hypertrophy & strength. Tap any exercise to auto-load directly into your logger below.</p>
                </div>
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="switchRoutineTab('ppl')" id="tab-btn-ppl" class="routine-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold uppercase transition-all bg-[#e2ff38] text-black cursor-pointer">PPL (Push/Pull/Legs)</button>
                    <button type="button" onclick="switchRoutineTab('upper_lower')" id="tab-btn-upper_lower" class="routine-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold uppercase transition-all bg-[#182030] text-gray-300 hover:text-white border border-white/5 cursor-pointer">Upper / Lower</button>
                    <button type="button" onclick="switchRoutineTab('full_body')" id="tab-btn-full_body" class="routine-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold uppercase transition-all bg-[#182030] text-gray-300 hover:text-white border border-white/5 cursor-pointer">Full Body Shred</button>
                </div>
            </div>

            <!-- Routine Tab Content Container -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl p-6 shadow-xl space-y-4">
                <!-- PPL Tab -->
                <div id="routine-panel-ppl" class="routine-panel space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-white/10">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-heading text-base font-bold text-white uppercase tracking-wider">Push / Pull / Legs (PPL Hypertrophy Split)</h3>
                                <span class="px-2 py-0.5 rounded-md bg-[#e2ff38]/15 text-[#e2ff38] border border-[#e2ff38]/30 text-[10px] font-black uppercase">6 Days / Wk</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-0.5">Optimal compound volume for rapid muscle hypertrophy and progressive overload.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Push Day Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                    <i class="fa-solid fa-shield-halved text-[#e2ff38]"></i> Day 1: Push Focus
                                </span>
                                <span class="text-[9px] text-gray-400 font-mono">5 Exercises</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Barbell Bench Press</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 8 reps • 80 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Barbell Bench Press', 'Chest', 80.0, 4, 8)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Incline DB Press</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 10 reps • 26 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Incline Dumbbell Press', 'Chest', 26.0, 3, 10)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Overhead DB Press</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 10 reps • 20 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Overhead Dumbbell Press', 'Shoulders', 20.0, 3, 10)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Cable Lateral Raise</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 15 reps • 10 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Cable Lateral Raise', 'Shoulders', 10.0, 4, 15)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Triceps Rope Pushdown</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 12 reps • 25 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Triceps Rope Pushdown', 'Arms', 25.0, 3, 12)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Pull Day Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                    <i class="fa-solid fa-child text-sky-400"></i> Day 2: Pull Focus
                                </span>
                                <span class="text-[9px] text-gray-400 font-mono">5 Exercises</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Conventional Deadlift</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 5 reps • 120 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Conventional Deadlift', 'Back', 120.0, 4, 5)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Lat Pulldown</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 10 reps • 60 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Lat Pulldown', 'Back', 60.0, 4, 10)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Barbell Row</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 8 reps • 70 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Barbell Row', 'Back', 70.0, 3, 8)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Cable Face Pulls</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 15 reps • 20 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Cable Face Pulls', 'Shoulders', 20.0, 4, 15)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Incline DB Curl</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 12 reps • 14 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Incline DB Curl', 'Arms', 14.0, 3, 12)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Leg Day Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                    <i class="fa-solid fa-person-running text-amber-400"></i> Day 3: Legs Focus
                                </span>
                                <span class="text-[9px] text-gray-400 font-mono">5 Exercises</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Barbell Back Squat</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 8 reps • 100 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Barbell Back Squat', 'Legs', 100.0, 4, 8)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Romanian Deadlift (RDL)</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 10 reps • 80 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Romanian Deadlift (RDL)', 'Legs', 80.0, 3, 10)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Seated Leg Press</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 12 reps • 160 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Seated Leg Press', 'Legs', 160.0, 4, 12)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Standing Calf Raise</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 15 reps • 65 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Standing Calf Raise', 'Legs', 65.0, 4, 15)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Hanging Knee Raises</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 15 reps • Bodyweight</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Hanging Knee Raises', 'Core', 0.0, 3, 15)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">
                                        ⚡ Load
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upper / Lower Tab -->
                <div id="routine-panel-upper_lower" class="routine-panel space-y-4 hidden">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-white/10">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-heading text-base font-bold text-white uppercase tracking-wider">Upper / Lower Strength Split</h3>
                                <span class="px-2 py-0.5 rounded-md bg-amber-500/15 text-amber-400 border border-amber-500/30 text-[10px] font-black uppercase">4 Days / Wk</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-0.5">Heavy compound focus designed for strength milestones and athletic power.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Upper Power Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                <i class="fa-solid fa-arrows-up-down text-[#e2ff38]"></i> Day 1: Upper Power
                            </span>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Incline Barbell Bench</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 6 reps • 75 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Incline Barbell Bench', 'Chest', 75.0, 4, 6)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Weighted Pull-Ups</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 6 reps • +15 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Weighted Pull-Ups', 'Back', 15.0, 4, 6)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Standing Overhead Press</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 8 reps • 50 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Standing Overhead Press', 'Shoulders', 50.0, 3, 8)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                            </div>
                        </div>

                        <!-- Lower Power Card -->
                        <div class="p-4 rounded-xl bg-[#182030] border border-white/5 space-y-3">
                            <span class="font-bold text-white text-xs flex items-center gap-1.5 uppercase">
                                <i class="fa-solid fa-person-running text-amber-400"></i> Day 2: Lower Power
                            </span>
                            <div class="space-y-2 text-xs">
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Front Squat</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 6 reps • 85 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Front Squat', 'Legs', 85.0, 4, 6)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Romanian Deadlift (RDL)</div>
                                        <div class="text-[10px] text-gray-400">4 sets &times; 8 reps • 85 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Romanian Deadlift (RDL)', 'Legs', 85.0, 4, 8)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                                <div class="p-2.5 rounded-lg bg-black/30 border border-white/5 flex items-center justify-between">
                                    <div>
                                        <div class="font-bold text-white">Cable Rope Crunch</div>
                                        <div class="text-[10px] text-gray-400">3 sets &times; 20 reps • 30 kg</div>
                                    </div>
                                    <button type="button" onclick="loadExerciseIntoForm('Cable Rope Crunch', 'Core', 30.0, 3, 20)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full Body Tab -->
                <div id="routine-panel-full_body" class="routine-panel space-y-4 hidden">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-3 border-b border-white/10">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-heading text-base font-bold text-white uppercase tracking-wider">Full Body Fat Burn & Conditioning Shred</h3>
                                <span class="px-2 py-0.5 rounded-md bg-emerald-500/15 text-emerald-400 border border-emerald-500/30 text-[10px] font-black uppercase">3 Days / Wk</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-0.5">High-energy metabolic circuits designed for lean fat loss and stamina.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">KB Goblet Squats</div>
                                <div class="text-[10px] text-gray-400">4 sets &times; 15 reps • 24 kg</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('Kettlebell Goblet Squat', 'Legs', 24.0, 4, 15)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">Explosive Push-Ups</div>
                                <div class="text-[10px] text-gray-400">4 sets &times; 18 reps • Bodyweight</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('Explosive Push-Ups', 'Chest', 0.0, 4, 18)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">Dumbbell Renegade Row</div>
                                <div class="text-[10px] text-gray-400">3 sets &times; 12 reps • 16 kg</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('Dumbbell Renegade Row', 'Back', 16.0, 3, 12)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">DB Squat to Press</div>
                                <div class="text-[10px] text-gray-400">3 sets &times; 12 reps • 14 kg</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('DB Squat to Press', 'Shoulders', 14.0, 3, 12)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                        <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                            <div>
                                <div class="font-bold text-white">Weighted Plank Hold</div>
                                <div class="text-[10px] text-gray-400">3 sets &times; 60s • 15 kg</div>
                            </div>
                            <button type="button" onclick="loadExerciseIntoForm('Weighted Plank Hold', 'Core', 15.0, 3, 60)" class="px-2.5 py-1 rounded bg-[#e2ff38] hover:bg-[#d0ee27] text-black text-[10px] font-black uppercase transition-all shadow-sm cursor-pointer">⚡ Load</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Daily Workout & Set Tracker -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-dumbbell text-[#e2ff38]"></i>
                        <span>Daily Workout & Set Tracker</span>
                    </h2>
                    <p class="text-xs text-gray-400">Log muscle groups, sets, reps and progressive overload weights.</p>
                </div>
                <span class="text-xs text-[#e2ff38] font-bold bg-[#e2ff38]/10 px-3 py-1 rounded-full border border-[#e2ff38]/20 flex items-center gap-1.5">
                    <i class="fa-solid fa-fire text-[#ff5e36]"></i>
                    <span>{{ count($workoutLogs) }} Sessions Logged</span>
                </span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Log Workout Form (1 Col) -->
                <div id="workout-logger-form-card" class="bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl transition-all">
                    <h3 class="font-heading text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#e2ff38] pl-2.5">
                        Log Today's Exercise
                    </h3>

                    <form method="POST" action="{{ route('profile.workouts.store') }}" class="space-y-4">
                        @csrf

                        <!-- Muscle Group Selector -->
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-2">
                                Muscle Group Focus
                            </label>
                            <input type="hidden" name="muscle_group" id="selected_muscle_group" value="Chest">
                            <div class="grid grid-cols-3 sm:grid-cols-4 gap-1.5" id="muscle-group-pills">
                                @php
                                    $muscleGroups = [
                                        ['name' => 'Chest', 'icon' => 'fa-shield-halved'],
                                        ['name' => 'Back', 'icon' => 'fa-child'],
                                        ['name' => 'Legs', 'icon' => 'fa-person-running'],
                                        ['name' => 'Shoulders', 'icon' => 'fa-arrows-up-down'],
                                        ['name' => 'Arms', 'icon' => 'fa-hand-fist'],
                                        ['name' => 'Core', 'icon' => 'fa-bullseye'],
                                        ['name' => 'Cardio', 'icon' => 'fa-heart-pulse'],
                                    ];
                                @endphp
                                @foreach ($muscleGroups as $mg)
                                    <button 
                                        type="button" 
                                        onclick="selectMuscleGroup('{{ $mg['name'] }}')"
                                        class="muscle-pill py-2 px-1 text-center rounded-lg text-[10px] font-bold uppercase border transition-all cursor-pointer {{ $loop->first ? 'bg-[#e2ff38] text-black border-[#e2ff38]' : 'bg-[#182030] text-gray-300 border-white/5 hover:border-white/20' }}"
                                        data-group="{{ $mg['name'] }}"
                                    >
                                        <i class="fa-solid {{ $mg['icon'] }} block text-xs mb-0.5"></i>
                                        <span>{{ $mg['name'] }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Exercise Name -->
                        <div>
                            <label for="workout_exercise_name" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                Exercise Name
                            </label>
                            <input 
                                type="text" 
                                name="exercise_name" 
                                id="workout_exercise_name" 
                                placeholder="e.g. Incline Dumbbell Press" 
                                required
                                class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                            >
                            <!-- Quick Chips -->
                            <div class="flex flex-wrap gap-1 mt-1.5">
                                <button type="button" onclick="setExerciseName('Bench Press')" class="text-[9px] px-2 py-0.5 rounded bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white cursor-pointer">+ Bench</button>
                                <button type="button" onclick="setExerciseName('Barbell Squat')" class="text-[9px] px-2 py-0.5 rounded bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white cursor-pointer">+ Squat</button>
                                <button type="button" onclick="setExerciseName('Deadlift')" class="text-[9px] px-2 py-0.5 rounded bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white cursor-pointer">+ Deadlift</button>
                                <button type="button" onclick="setExerciseName('Overhead Press')" class="text-[9px] px-2 py-0.5 rounded bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white cursor-pointer">+ OHP</button>
                            </div>
                        </div>

                        <!-- Sets, Reps & Weight Grid -->
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <label for="workout_weight" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                    Weight (kg)
                                </label>
                                <input 
                                    type="number" 
                                    step="0.5" 
                                    name="weight_kg" 
                                    id="workout_weight" 
                                    value="80.0" 
                                    required
                                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                                >
                            </div>
                            <div>
                                <label for="workout_sets" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                    Sets
                                </label>
                                <input 
                                    type="number" 
                                    name="sets" 
                                    id="workout_sets" 
                                    value="4" 
                                    min="1" 
                                    required
                                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                                >
                            </div>
                            <div>
                                <label for="workout_reps" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                    Reps
                                </label>
                                <input 
                                    type="number" 
                                    name="reps" 
                                    id="workout_reps" 
                                    value="10" 
                                    min="1" 
                                    required
                                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                                >
                            </div>
                        </div>

                        <!-- Notes / RPE -->
                        <div>
                            <label for="workout_notes" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                                Notes & RPE Intensity
                            </label>
                            <input 
                                type="text" 
                                name="notes" 
                                id="workout_notes" 
                                placeholder="RPE 8.5 • Felt explosive, good lockout"
                                class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                            >
                        </div>

                        <button 
                            type="submit" 
                            class="w-full py-2.5 rounded-xl bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider transition-all cursor-pointer shadow-md shadow-[#e2ff38]/20 flex items-center justify-center gap-1.5"
                        >
                            <i class="fa-solid fa-plus text-xs"></i>
                            <span>Log Workout Set</span>
                        </button>
                    </form>
                </div>

                <!-- Completed Workout History Table (2 Cols) -->
                <div class="lg:col-span-2 bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-heading text-sm font-bold text-white uppercase tracking-wider border-l-2 border-[#e2ff38] pl-2.5">
                                Recent Completed Workouts & Sets
                            </h3>
                            <span class="text-[10px] font-mono text-gray-400">LAST 15 ENTRIES</span>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs border-collapse">
                                <thead>
                                    <tr class="bg-[#182030] text-gray-400 uppercase text-[10px] tracking-wider border-b border-white/10">
                                        <th class="py-2.5 px-3 font-bold">Focus</th>
                                        <th class="py-2.5 px-3 font-bold">Exercise</th>
                                        <th class="py-2.5 px-3 font-bold">Sets &times; Reps</th>
                                        <th class="py-2.5 px-3 font-bold">Weight</th>
                                        <th class="py-2.5 px-3 font-bold">Notes</th>
                                        <th class="py-2.5 px-3 font-bold text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5 text-gray-300">
                                    @forelse ($workoutLogs as $log)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <td class="py-3 px-3">
                                                <span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-white/5 border border-white/10 text-[#e2ff38]">
                                                    {{ $log->muscle_group }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-3 font-bold text-white">
                                                {{ $log->exercise_name }}
                                                <span class="block text-[10px] text-gray-500 font-normal">{{ $log->workout_date ? \Carbon\Carbon::parse($log->workout_date)->format('M d') : 'Today' }}</span>
                                            </td>
                                            <td class="py-3 px-3 font-mono text-white">
                                                {{ $log->sets }} &times; {{ $log->reps }}
                                            </td>
                                            <td class="py-3 px-3 font-heading font-black text-[#e2ff38]">
                                                {{ $log->weight_kg }} kg
                                            </td>
                                            <td class="py-3 px-3 text-gray-400 text-[11px] max-w-[150px] truncate" title="{{ $log->notes }}">
                                                {{ $log->notes ?: '—' }}
                                            </td>
                                            <td class="py-3 px-3 text-right">
                                                <form method="POST" action="{{ route('profile.workouts.delete', $log->id) }}" onsubmit="return confirm('Remove this workout record?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-7 h-7 rounded bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/20 flex items-center justify-center text-xs transition-colors cursor-pointer" title="Delete Log">
                                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-8 text-gray-500 text-xs">
                                                No workout sets logged yet today. Use the form on the left to start your log!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Athlete Transformation & Body Progress -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-chart-line text-[#e2ff38]"></i>
                        <span>Athlete Transformation & Body Progress</span>
                    </h2>
                    <p class="text-xs text-gray-400">8-Week body composition trajectory, weight decline, and physical evolution.</p>
                </div>
                <button 
                    type="button" 
                    onclick="openWeighInModal()"
                    class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-[#e2ff38] text-white hover:text-black border border-white/10 hover:border-[#e2ff38] text-xs font-bold uppercase tracking-wider transition-all cursor-pointer flex items-center gap-1.5 shadow-sm"
                >
                    <i class="fa-solid fa-weight-scale text-xs"></i>
                    <span>Log New Weigh-In</span>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- 8-Week Progress Chart (2 Cols) -->
                <div class="lg:col-span-2 bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 shadow-xl space-y-5">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-1.5 text-xs">
                                <span class="w-3 h-3 rounded-full bg-[#e2ff38]"></span>
                                <span class="text-gray-300 font-bold">Weight (kg)</span>
                            </div>
                            <div class="flex items-center gap-1.5 text-xs">
                                <span class="w-3 h-3 rounded-full bg-[#00d2ff]"></span>
                                <span class="text-gray-300 font-bold">Body Fat (%)</span>
                            </div>
                        </div>
                        <span class="text-[10px] uppercase font-mono text-emerald-400 bg-emerald-500/10 px-2.5 py-0.5 rounded-full border border-emerald-500/20 font-bold">
                            -5.5 kg Total Cut &bull; -7.7% Fat
                        </span>
                    </div>

                    <!-- Canvas -->
                    <div class="relative w-full h-64">
                        <canvas id="bodyProgressChart"></canvas>
                    </div>

                    <!-- Key Transformation Metrics Row -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-3 border-t border-white/10 text-center">
                        <div class="p-2.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[9px] text-gray-400 uppercase font-bold block">Starting (Wk 1)</span>
                            <span class="font-heading text-sm font-black text-white">84.0 kg <span class="text-[10px] text-gray-400 font-normal">(22.5%)</span></span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[9px] text-gray-400 uppercase font-bold block">Current (Wk 8)</span>
                            <span class="font-heading text-sm font-black text-[#e2ff38]">{{ $profile['weight'] }} <span class="text-[10px] text-cyan-400 font-normal">(14.8%)</span></span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[9px] text-gray-400 uppercase font-bold block">Waistline Cut</span>
                            <span class="font-heading text-sm font-black text-white">-6.0 cm <span class="text-[10px] text-emerald-400 font-normal">Lean</span></span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-[#182030] border border-white/5">
                            <span class="text-[9px] text-gray-400 uppercase font-bold block">Lean Mass</span>
                            <span class="font-heading text-sm font-black text-emerald-400">+1.2 kg <span class="text-[10px] text-gray-400 font-normal">Muscle</span></span>
                        </div>
                    </div>
                </div>

                <!-- Before vs After Transformation Card (1 Col) -->
                <div class="bg-gradient-to-b from-[#161c28] to-[#10141e] border-2 border-[#e2ff38]/30 rounded-2xl p-6 shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[10px] font-black uppercase tracking-widest text-[#e2ff38] bg-[#e2ff38]/10 px-2.5 py-0.5 rounded-full border border-[#e2ff38]/20">
                                8-WEEK RECOMPOSITION
                            </span>
                            <span class="text-xs font-bold text-emerald-400">Phase 2</span>
                        </div>

                        <h4 class="font-heading text-lg font-black text-white uppercase">
                            Visual Transformation
                        </h4>
                        <p class="text-[11px] text-gray-400 mt-1 mb-4 leading-relaxed">
                            Consistent caloric deficit coupled with progressive resistance overload resulted in distinct muscle definition.
                        </p>

                        <!-- Side by Side Silhouette / Photos -->
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <!-- Before -->
                            <div class="bg-[#182030] p-2.5 rounded-xl border border-white/10 text-center space-y-1.5">
                                <span class="text-[9px] font-bold uppercase tracking-wider text-gray-400 block">BEFORE (WK 1)</span>
                                <div class="h-32 rounded-lg bg-gradient-to-t from-gray-900 via-gray-800 to-gray-700 flex flex-col items-center justify-center p-2 relative overflow-hidden">
                                    <i class="fa-solid fa-person text-4xl text-gray-400/80"></i>
                                    <span class="text-[9px] text-gray-300 font-mono mt-1 font-bold">84.0 kg &bull; 22.5%</span>
                                </div>
                                <span class="text-[10px] text-gray-400 block font-medium">Bulking Baseline</span>
                            </div>

                            <!-- After -->
                            <div class="bg-[#182030] p-2.5 rounded-xl border border-[#e2ff38]/40 text-center space-y-1.5 relative">
                                <span class="text-[9px] font-bold uppercase tracking-wider text-[#e2ff38] block">CURRENT (WK 8)</span>
                                <div class="h-32 rounded-lg bg-gradient-to-t from-emerald-950 via-[#16202e] to-[#1e2a3a] border border-[#e2ff38]/30 flex flex-col items-center justify-center p-2 relative overflow-hidden">
                                    <i class="fa-solid fa-person text-4xl text-[#e2ff38]"></i>
                                    <span class="text-[9px] text-[#e2ff38] font-mono mt-1 font-black">78.5 kg &bull; 14.8%</span>
                                    <span class="absolute top-1 right-1 text-[8px] bg-[#e2ff38] text-black font-extrabold px-1 rounded">HOT</span>
                                </div>
                                <span class="text-[10px] text-emerald-400 block font-bold">V-Taper Defined</span>
                            </div>
                        </div>

                        <!-- Milestones -->
                        <div class="space-y-1.5 text-[11px] text-gray-300">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Abdominal separation clearly visible</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Full bench & squat strength maintained</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Resting metabolic output elevated</span>
                            </div>
                        </div>
                    </div>

                    <button 
                        type="button" 
                        onclick="openWeighInModal()"
                        class="w-full mt-5 py-2.5 rounded-xl bg-white/5 hover:bg-[#e2ff38] text-white hover:text-black border border-white/10 hover:border-[#e2ff38] text-xs font-bold uppercase tracking-wider transition-all cursor-pointer text-center"
                    >
                        Update Measurements
                    </button>
                </div>
            </div>
        </div>

        <!-- Section: Nutrition & Macro Calculator Component -->
        @include('components.nutrition-calculator')

        <!-- Section 3: Old Billing Info & Invoices -->
        <div class="space-y-4">
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div>
                    <h2 class="font-heading text-lg font-bold text-white uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-receipt text-[#e2ff38]"></i>
                        <span>Past Billing Records & Payment History</span>
                    </h2>
                    <p class="text-xs text-gray-400">All transaction history, past monthly dues, and downloadable gym receipts.</p>
                </div>
                <div class="text-xs text-gray-400">
                    Auto-billed via <span class="text-white font-semibold">Visa ending in •••• 4242</span>
                </div>
            </div>

            <!-- Invoices Table Container -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead>
                            <tr class="bg-[#182030] text-gray-400 uppercase text-[10px] tracking-wider border-b border-white/10">
                                <th class="py-3.5 px-5 font-bold">Invoice ID</th>
                                <th class="py-3.5 px-5 font-bold">Billing Date</th>
                                <th class="py-3.5 px-5 font-bold">Plan / Service Description</th>
                                <th class="py-3.5 px-5 font-bold">Amount</th>
                                <th class="py-3.5 px-5 font-bold">Payment Method</th>
                                <th class="py-3.5 px-5 font-bold">Status</th>
                                <th class="py-3.5 px-5 font-bold text-right">Receipt</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-gray-300">
                            @foreach ($invoices as $invoice)
                                <tr class="hover:bg-white/5 transition-colors">
                                    <!-- Invoice ID -->
                                    <td class="py-3.5 px-5 font-mono font-bold text-white">
                                        {{ $invoice['id'] }}
                                    </td>
                                    <!-- Date -->
                                    <td class="py-3.5 px-5 text-gray-300">
                                        {{ $invoice['date'] }}
                                    </td>
                                    <!-- Description -->
                                    <td class="py-3.5 px-5 text-white font-medium">
                                        {{ $invoice['plan'] }}
                                    </td>
                                    <!-- Amount -->
                                    <td class="py-3.5 px-5 font-heading text-sm font-bold text-[#e2ff38]">
                                        {{ $invoice['amount'] }}
                                    </td>
                                    <!-- Method -->
                                    <td class="py-3.5 px-5 text-gray-400">
                                        <i class="fa-regular fa-credit-card mr-1 text-gray-500"></i>
                                        {{ $invoice['method'] }}
                                    </td>
                                    <!-- Status -->
                                    <td class="py-3.5 px-5">
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                            <i class="fa-solid fa-check text-[9px]"></i>
                                            {{ $invoice['status'] }}
                                        </span>
                                    </td>
                                    <!-- Receipt Actions -->
                                    <td class="py-3.5 px-5 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a 
                                                href="{{ route('profile.invoice', $invoice['id']) }}" 
                                                target="_blank"
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-[#e2ff38]/10 hover:bg-[#e2ff38] text-[#e2ff38] hover:text-black text-[11px] font-bold border border-[#e2ff38]/30 transition-all cursor-pointer"
                                                title="Open Full Page Official Tax Invoice (A4)"
                                            >
                                                <i class="fa-solid fa-print"></i>
                                                <span class="hidden sm:inline">Tax Invoice</span>
                                            </a>
                                            <button 
                                                type="button" 
                                                onclick="openReceiptModal('{{ $invoice['id'] }}', '{{ $invoice['date'] }}', '{{ $invoice['plan'] }}', '{{ $invoice['amount'] }}', '{{ $invoice['subtotal'] }}', '{{ $invoice['tax'] }}', '{{ $invoice['method'] }}')"
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-white/5 hover:bg-white/15 text-gray-300 text-[11px] font-bold border border-white/10 transition-all cursor-pointer"
                                            >
                                                <i class="fa-solid fa-receipt"></i>
                                                <span>Receipt</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer Summary -->
                <div class="p-4 bg-[#182030]/60 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-gray-400">
                    <span>Showing all {{ count($invoices) }} past invoices &bull; All membership payments are current & verified</span>
                    <a href="{{ route('profile.invoice', 'INV-2026-1002') }}" target="_blank" class="text-[#e2ff38] hover:underline font-bold flex items-center gap-1.5 cursor-pointer">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span>Print Latest Official Tax Invoice</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal 1: Edit Profile Information (Enhanced with Country Codes, Relations, Blood Group, Measurements) -->
<div id="edit-profile-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/10 rounded-2xl max-w-xl w-full p-6 sm:p-8 shadow-2xl relative max-h-[90vh] overflow-y-auto">
        <button type="button" onclick="closeEditProfileModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="mb-6">
            <span class="text-[10px] font-bold text-[#e2ff38] uppercase tracking-wider">FITNES Athlete Portal</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Update Athlete Information</h3>
            <p class="text-xs text-gray-400">Keep your biometric details, contact numbers, and emergency profile verified.</p>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf

            <!-- Athlete Name -->
            <div>
                <label for="edit-name" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Athlete Full Name
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="edit-name" 
                    value="{{ old('name', $profile['name']) }}" 
                    required 
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                >
            </div>

            <!-- Phone Number with Country Code Select -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Phone Number & Country Code
                </label>
                <div class="flex gap-2">
                    <select 
                        name="phone_country_code" 
                        class="bg-[#182030] border border-white/10 rounded-lg px-3 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38] shrink-0"
                    >
                        <option value="+880">🇧🇩 BD (+880)</option>
                        <option value="+1" selected>🇺🇸 US/CA (+1)</option>
                        <option value="+44">🇬🇧 UK (+44)</option>
                        <option value="+971">🇦🇪 UAE (+971)</option>
                        <option value="+966">🇸🇦 SA (+966)</option>
                        <option value="+91">🇮🇳 IN (+91)</option>
                        <option value="+61">🇦🇺 AU (+61)</option>
                        <option value="+49">🇩🇪 DE (+49)</option>
                    </select>
                    <input 
                        type="text" 
                        name="phone_number" 
                        id="edit-phone-number" 
                        value="{{ old('phone_number', preg_replace('/^\+\d+\s*/', '', $profile['phone'])) }}" 
                        placeholder="(555) 389-4210 or 1712-345678"
                        class="flex-1 bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                </div>
            </div>

            <!-- Blood Group & Bodyweight -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="edit-blood-group" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Blood Group
                    </label>
                    <select 
                        name="blood_group" 
                        id="edit-blood-group"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                        <option value="O+" {{ old('blood_group', $profile['blood_group']) === 'O+' ? 'selected' : '' }}>O Positive (O+)</option>
                        <option value="O-" {{ old('blood_group', $profile['blood_group']) === 'O-' ? 'selected' : '' }}>O Negative (O-)</option>
                        <option value="A+" {{ old('blood_group', $profile['blood_group']) === 'A+' ? 'selected' : '' }}>A Positive (A+)</option>
                        <option value="A-" {{ old('blood_group', $profile['blood_group']) === 'A-' ? 'selected' : '' }}>A Negative (A-)</option>
                        <option value="B+" {{ old('blood_group', $profile['blood_group']) === 'B+' ? 'selected' : '' }}>B Positive (B+)</option>
                        <option value="B-" {{ old('blood_group', $profile['blood_group']) === 'B-' ? 'selected' : '' }}>B Negative (B-)</option>
                        <option value="AB+" {{ old('blood_group', $profile['blood_group']) === 'AB+' ? 'selected' : '' }}>AB Positive (AB+)</option>
                        <option value="AB-" {{ old('blood_group', $profile['blood_group']) === 'AB-' ? 'selected' : '' }}>AB Negative (AB-)</option>
                    </select>
                </div>

                <div>
                    <label for="edit-weight-val" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Bodyweight (kg)
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            name="weight_val" 
                            id="edit-weight-val" 
                            value="{{ old('weight_val', preg_replace('/[^0-9.]/', '', $profile['weight']) ?: '78.5') }}" 
                            placeholder="78.5"
                            class="w-full bg-[#182030] border border-white/10 rounded-lg pl-3.5 pr-10 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                        >
                        <span class="absolute right-3 top-2.5 text-xs font-bold text-gray-400">kg</span>
                    </div>
                </div>
            </div>

            <!-- Height & Fitness Goal -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="edit-height-val" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Height (Feet / Inches / cm)
                    </label>
                    <input 
                        type="text" 
                        name="height_val" 
                        id="edit-height-val" 
                        value="{{ old('height_val', $profile['height']) }}" 
                        placeholder="5' 11\" (180 cm)"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                </div>

                <div>
                    <label for="edit-goal" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Primary Athletic Objective
                    </label>
                    <input 
                        type="text" 
                        name="fitness_goal" 
                        id="edit-goal" 
                        value="{{ old('fitness_goal', $profile['fitness_goal']) }}" 
                        placeholder="Hypertrophy & Strength Recomposition"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                </div>
            </div>

            <!-- Emergency Contact Structured Section -->
            <div class="p-4 rounded-xl bg-[#182030] border border-white/10 space-y-3">
                <span class="text-[11px] font-bold uppercase tracking-wider text-[#e2ff38] flex items-center gap-1.5">
                    <i class="fa-solid fa-heart-pulse text-rose-500"></i>
                    <span>Emergency Contact & Relationship</span>
                </span>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold uppercase text-gray-400 mb-1">
                            Contact Person Name
                        </label>
                        <input 
                            type="text" 
                            name="emergency_name" 
                            value="Sarah Ahmad"
                            placeholder="Full Name"
                            class="w-full bg-[#131722] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                        >
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase text-gray-400 mb-1">
                            Relationship to Athlete
                        </label>
                        <select 
                            name="emergency_relation" 
                            class="w-full bg-[#131722] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                        >
                            <option value="Spouse" selected>Spouse / Partner</option>
                            <option value="Parent">Parent (Father / Mother)</option>
                            <option value="Sibling">Sibling (Brother / Sister)</option>
                            <option value="Child">Child (Son / Daughter)</option>
                            <option value="Friend">Close Friend</option>
                            <option value="Colleague">Colleague / Coach</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase text-gray-400 mb-1">
                        Emergency Phone Number & Country Code
                    </label>
                    <div class="flex gap-2">
                        <select 
                            name="emergency_country_code" 
                            class="bg-[#131722] border border-white/10 rounded-lg px-2.5 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38] shrink-0"
                        >
                            <option value="+1" selected>🇺🇸 +1</option>
                            <option value="+880">🇧🇩 +880</option>
                            <option value="+44">🇬🇧 +44</option>
                            <option value="+971">🇦🇪 +971</option>
                            <option value="+966">🇸🇦 +966</option>
                            <option value="+91">🇮🇳 +91</option>
                        </select>
                        <input 
                            type="text" 
                            name="emergency_phone" 
                            value="555-891-2234"
                            placeholder="(555) 891-2234 or 1712-XXXXXX"
                            class="flex-1 bg-[#131722] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                        >
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-3 flex items-center justify-end gap-3">
                <button 
                    type="button" 
                    onclick="closeEditProfileModal()" 
                    class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg border border-white/10 cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider px-6 py-2.5 rounded-lg transition-all cursor-pointer shadow-md shadow-[#e2ff38]/20"
                >
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal 2: Change Plan & Payment Modal (Matching Image 2) -->
<div id="change-plan-modal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden items-center justify-center p-3 sm:p-4">
    <div class="bg-[#0e121a] border border-white/15 rounded-3xl max-w-5xl w-full p-6 sm:p-10 shadow-2xl relative max-h-[92vh] overflow-y-auto">
        <button type="button" onclick="closeChangePlanModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-9 h-9 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <!-- STEP 1: Plan Selection Screen -->
        <div id="change-plan-step-select">
            <div class="text-center max-w-xl mx-auto mb-8">
                <span class="text-[10px] font-extrabold text-[#e2ff38] uppercase tracking-widest bg-[#e2ff38]/10 px-3 py-1 rounded-full border border-[#e2ff38]/30 inline-block mb-2">
                    GYM MEMBERSHIP UPGRADE
                </span>
                <h3 class="font-heading text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Choose Your Athletic Plan
                </h3>
                <p class="text-xs sm:text-sm text-gray-400 mt-2">
                    Select the ideal training package for your fitness objectives. Switch or cancel anytime.
                </p>

                <!-- Monthly / Yearly Duration Toggle -->
                <div class="flex items-center justify-center gap-3 mt-6">
                    <span id="plan-modal-monthly-label" class="text-xs font-bold uppercase tracking-wider text-[#e2ff38] transition-colors">Monthly</span>
                    <button 
                        id="plan-modal-toggle" 
                        type="button" 
                        onclick="togglePlanModalDuration()"
                        class="w-14 h-7 bg-[#1c2230] rounded-full p-1 relative transition-colors border border-white/15 focus:outline-none cursor-pointer"
                        aria-label="Toggle duration"
                    >
                        <span id="plan-modal-toggle-ball" class="block w-5 h-5 rounded-full bg-[#e2ff38] shadow-md transition-transform translate-x-0"></span>
                    </button>
                    <span id="plan-modal-yearly-label" class="text-xs font-bold uppercase tracking-wider text-gray-400 transition-colors">
                        Yearly <span class="text-[10px] bg-[#e2ff38]/20 text-[#e2ff38] px-2 py-0.5 rounded-full font-extrabold ml-1">SAVE 20%</span>
                    </span>
                </div>
            </div>

            <!-- 3 Pricing Cards Grid (Exact replica of Image 2) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
                <!-- Card 1: Basic Plan -->
                <div class="bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 flex flex-col justify-between hover:border-white/20 transition-all">
                    <div>
                        <h4 class="font-heading text-2xl font-bold text-white mb-1">Basic Plan</h4>
                        <p class="text-xs text-gray-400 mb-6">For beginners starting their fitness.</p>

                        <div class="mb-6">
                            <span class="font-heading text-4xl sm:text-5xl font-black text-white plan-modal-price" data-monthly="$29" data-yearly="$260">$29</span>
                            <span class="text-xs text-gray-400 font-medium plan-modal-period">/month</span>
                        </div>

                        <button 
                            type="button" 
                            onclick="selectPlanToPay('Basic Plan', '$29', '$260')"
                            class="w-full text-center py-3 px-4 rounded-xl border border-white/20 hover:border-[#e2ff38] hover:bg-[#e2ff38] text-white hover:text-black font-extrabold text-xs uppercase tracking-wider transition-all mb-6 cursor-pointer"
                        >
                            Select Basic Plan
                        </button>

                        <div class="space-y-3 pt-2">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">What you get</span>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Standard gym access at off-peak hours</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>1 free fitness assessment session</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Locker & shower facilities</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Pro Plan (Highlighted Most Popular) -->
                <div class="bg-[#131722] border-2 border-[#e2ff38] rounded-2xl p-6 sm:p-7 flex flex-col justify-between relative shadow-xl shadow-[#e2ff38]/10 transform md:-translate-y-2">
                    <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#e2ff38] text-black font-black text-[10px] uppercase tracking-widest px-4 py-1 rounded-full shadow-md">
                        MOST POPULAR
                    </div>

                    <div>
                        <h4 class="font-heading text-2xl font-bold text-white mb-1">Pro Plan</h4>
                        <p class="text-xs text-gray-400 mb-6">For regular gym-goers aiming to level up.</p>

                        <div class="mb-6">
                            <span class="font-heading text-4xl sm:text-5xl font-black text-[#e2ff38] plan-modal-price" data-monthly="$53" data-yearly="$480">$53</span>
                            <span class="text-xs text-gray-400 font-medium plan-modal-period">/month</span>
                        </div>

                        <button 
                            type="button" 
                            onclick="selectPlanToPay('Pro Plan', '$53', '$480')"
                            class="w-full text-center py-3 px-4 rounded-xl bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider transition-all mb-6 cursor-pointer shadow-lg shadow-[#e2ff38]/20"
                        >
                            Select Pro Plan
                        </button>

                        <div class="space-y-3 pt-2">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">What you get</span>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Unlimited 24/7 gym access</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Access to all HIIT & group classes</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Personalized nutrition guide</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Free monthly guest pass</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Elite Membership -->
                <div class="bg-[#131722] border border-white/10 rounded-2xl p-6 sm:p-7 flex flex-col justify-between hover:border-white/20 transition-all">
                    <div>
                        <h4 class="font-heading text-2xl font-bold text-white mb-1">Elite Membership</h4>
                        <p class="text-xs text-gray-400 mb-6">All-in access for serious transformations.</p>

                        <div class="mb-6">
                            <span class="font-heading text-4xl sm:text-5xl font-black text-white plan-modal-price" data-monthly="$99" data-yearly="$890">$99</span>
                            <span class="text-xs text-gray-400 font-medium plan-modal-period">/month</span>
                        </div>

                        <button 
                            type="button" 
                            onclick="selectPlanToPay('Elite Membership', '$99', '$890')"
                            class="w-full text-center py-3 px-4 rounded-xl border border-white/20 hover:border-[#e2ff38] hover:bg-[#e2ff38] text-white hover:text-black font-extrabold text-xs uppercase tracking-wider transition-all mb-6 cursor-pointer"
                        >
                            Select Elite Membership
                        </button>

                        <div class="space-y-3 pt-2">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">What you get</span>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Everything in Pro Plan</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>1-on-1 dedicated coach sessions</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Sauna & hydrotherapy lounge access</span>
                            </div>
                            <div class="flex items-center gap-2.5 text-xs text-gray-300">
                                <i class="fa-solid fa-circle-check text-[#e2ff38]"></i>
                                <span>Custom biomarker & body fat tracking</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 2: Checkout & Payment Screen ("than select kore pay korte bolbe") -->
        <div id="change-plan-step-pay" class="hidden">
            <div class="max-w-xl mx-auto">
                <div class="flex items-center justify-between pb-4 border-b border-white/10 mb-6">
                    <button type="button" onclick="backToPlanSelection()" class="text-xs font-bold text-gray-400 hover:text-[#e2ff38] flex items-center gap-1.5 cursor-pointer">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Change Selected Plan</span>
                    </button>
                    <span class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest bg-emerald-500/10 px-2.5 py-1 rounded-full border border-emerald-500/20">
                        Secure Checkout
                    </span>
                </div>

                <h3 class="font-heading text-2xl font-black text-white">Review & Complete Payment</h3>
                <p class="text-xs text-gray-400 mt-1 mb-6">Your new plan privileges and turnstile access will activate instantly upon payment.</p>

                <!-- Plan Summary Card -->
                <div class="bg-[#182030] p-5 rounded-2xl border border-white/10 mb-6 space-y-3">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Selected Package</span>
                            <span id="checkout-plan-name" class="font-heading text-xl font-bold text-white">Pro Plan</span>
                            <span id="checkout-billing-cycle-label" class="text-xs text-[#e2ff38] block mt-0.5">Monthly Billing</span>
                        </div>
                        <div class="text-right">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Due Now</span>
                            <span id="checkout-plan-price" class="font-heading text-3xl font-black text-[#e2ff38]">$53.00</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Form -->
                <form id="change-plan-form" method="POST" action="{{ route('profile.change-plan') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="plan_name" id="form-plan-name" value="Pro Plan">
                    <input type="hidden" name="billing_cycle" id="form-billing-cycle" value="monthly">
                    <input type="hidden" name="plan_price" id="form-plan-price" value="$53.00">
                    <input type="hidden" name="trx_id" id="form-trx-id" value="">

                    <!-- Payment Method Selector -->
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                            Select Payment Method
                        </label>
                        <div class="space-y-2">
                            <!-- Option 1: bKash (Featured BD Mobile Wallet) -->
                            <label class="flex items-center justify-between p-3.5 rounded-xl bg-[#182030] border border-[#e2136e]/40 cursor-pointer hover:border-[#e2136e] transition-colors group">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" value="bKash Mobile Banking" checked class="accent-[#e2136e]" onchange="updatePayButtonLabel('bKash')">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded bg-[#e2136e] flex items-center justify-center text-white text-[10px] font-black">
                                            bK
                                        </div>
                                        <span class="text-xs font-bold text-white group-hover:text-[#e2136e] transition-colors">bKash Instant Gateway</span>
                                    </div>
                                </div>
                                <span class="text-[10px] font-extrabold text-[#e2136e] bg-[#e2136e]/10 px-2 py-0.5 rounded border border-[#e2136e]/30">Instant TrxID</span>
                            </label>

                            <!-- Option 2: Nagad Mobile Wallet -->
                            <label class="flex items-center justify-between p-3.5 rounded-xl bg-[#182030] border border-[#f7941d]/30 cursor-pointer hover:border-[#f7941d] transition-colors group">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" value="Nagad Mobile Banking" class="accent-[#f7941d]" onchange="updatePayButtonLabel('Nagad')">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded bg-[#f7941d] flex items-center justify-center text-white text-[10px] font-black">
                                            ন
                                        </div>
                                        <span class="text-xs font-bold text-white group-hover:text-[#f7941d] transition-colors">Nagad Instant Gateway</span>
                                    </div>
                                </div>
                                <span class="text-[10px] font-bold text-[#f7941d] bg-[#f7941d]/10 px-2 py-0.5 rounded border border-[#f7941d]/30">Instant</span>
                            </label>

                            <!-- Option 3: Saved Visa Card -->
                            <label class="flex items-center justify-between p-3.5 rounded-xl bg-[#182030] border border-white/10 cursor-pointer hover:border-[#e2ff38] transition-colors group">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" value="Visa •••• 4242" class="accent-[#e2ff38]" onchange="updatePayButtonLabel('Visa')">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-brands fa-cc-visa text-blue-400 text-lg"></i>
                                        <span class="text-xs font-bold text-white">Saved Visa ending in •••• 4242</span>
                                    </div>
                                </div>
                                <span class="text-[10px] text-gray-400">Card</span>
                            </label>

                            <!-- Option 4: Counter Payment -->
                            <label class="flex items-center justify-between p-3.5 rounded-xl bg-[#182030] border border-white/10 cursor-pointer hover:border-white/20 transition-colors">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" value="Cash at Front Reception Desk" class="accent-[#e2ff38]" onchange="updatePayButtonLabel('Counter')">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-money-bill-wave text-emerald-400 text-sm"></i>
                                        <span class="text-xs font-semibold text-white">Pay Cash / Card at Gym Counter</span>
                                    </div>
                                </div>
                                <span class="text-[10px] text-gray-400">On Next Visit</span>
                            </label>
                        </div>
                    </div>

                    <!-- Security note -->
                    <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-[11px] text-gray-400 flex items-center gap-2.5">
                        <i class="fa-solid fa-shield-halved text-[#e2ff38]"></i>
                        <span>256-bit encrypted SSL checkout. Instant TrxID and tax invoice generated on confirmation.</span>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 flex items-center justify-end gap-3">
                        <button 
                            type="button" 
                            onclick="backToPlanSelection()" 
                            class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-3 rounded-xl border border-white/10 cursor-pointer"
                        >
                            Cancel
                        </button>
                        <button 
                            type="button" 
                            onclick="handlePlanPaymentSubmission()"
                            id="plan-submit-pay-btn"
                            class="flex-1 bg-[#e2136e] hover:bg-[#c90f5f] text-white font-extrabold text-xs uppercase tracking-wider py-3 px-6 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#e2136e]/20 flex items-center justify-center gap-2"
                        >
                            <i class="fa-solid fa-mobile-screen text-xs"></i>
                            <span id="plan-submit-pay-text">Pay via bKash Gateway</span>
                        </button>
                    </div>
                </form>

                <!-- Step 2.5: Interactive bKash / Nagad Gateway Overlay -->
                <div id="change-plan-gateway-screen" class="hidden mt-6 p-6 rounded-2xl bg-[#0e121a] border-2 border-[#e2136e] shadow-2xl relative">
                    <div class="flex items-center justify-between pb-4 border-b border-white/10 mb-4">
                        <div class="flex items-center gap-2">
                            <span id="gateway-logo-badge" class="px-2.5 py-1 rounded bg-[#e2136e] text-white font-black text-xs">bKash</span>
                            <span class="text-xs font-bold text-white">Merchant Checkout</span>
                        </div>
                        <span id="gateway-due-amount" class="font-heading text-lg font-black text-[#e2ff38]">$53.00 (৳5,830)</span>
                    </div>

                    <div class="space-y-4">
                        <div id="gateway-step-phone">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">
                                Enter <span id="gateway-brand-name">bKash</span> Account Number
                            </label>
                            <input 
                                type="text" 
                                id="gateway-account-input" 
                                value="01712-345678" 
                                placeholder="01XXXXXXXXX"
                                class="w-full bg-[#182030] border border-white/20 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2136e]"
                            >
                            <button 
                                type="button" 
                                onclick="gatewayProceedToOtp()" 
                                class="w-full mt-3 py-2.5 rounded-xl bg-[#e2136e] hover:bg-[#c90f5f] text-white font-extrabold text-xs uppercase tracking-wider transition-all cursor-pointer"
                            >
                                Send Verification Code (OTP)
                            </button>
                        </div>

                        <div id="gateway-step-otp" class="hidden">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">
                                Enter 6-Digit OTP (Sent to mobile)
                            </label>
                            <input 
                                type="text" 
                                id="gateway-otp-input" 
                                value="749210" 
                                placeholder="123456"
                                class="w-full bg-[#182030] border border-white/20 rounded-xl px-4 py-2.5 text-xs text-white text-center font-mono tracking-[0.5em] focus:outline-none focus:border-[#e2136e]"
                            >
                            <button 
                                type="button" 
                                onclick="gatewayProceedToPin()" 
                                class="w-full mt-3 py-2.5 rounded-xl bg-[#e2136e] hover:bg-[#c90f5f] text-white font-extrabold text-xs uppercase tracking-wider transition-all cursor-pointer"
                            >
                                Verify OTP
                            </button>
                        </div>

                        <div id="gateway-step-pin" class="hidden">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">
                                Enter 4-Digit Account PIN
                            </label>
                            <input 
                                type="password" 
                                id="gateway-pin-input" 
                                value="1234" 
                                maxlength="5"
                                placeholder="••••"
                                class="w-full bg-[#182030] border border-white/20 rounded-xl px-4 py-2.5 text-xs text-white text-center font-mono tracking-[0.5em] focus:outline-none focus:border-[#e2136e]"
                            >
                            <button 
                                type="button" 
                                onclick="gatewayConfirmPayment()" 
                                class="w-full mt-3 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-black font-extrabold text-xs uppercase tracking-wider transition-all cursor-pointer shadow-lg shadow-emerald-500/20 flex items-center justify-center gap-2"
                            >
                                <i class="fa-solid fa-lock text-xs"></i>
                                <span>Confirm Payment & Activate Plan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3: Freeze / Pause Membership Request Form -->
<div id="freeze-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/10 rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative">
        <button type="button" onclick="closeFreezeModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="mb-6">
            <span class="text-[10px] font-bold text-[#e2ff38] uppercase tracking-wider">FITNES Membership Services</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Pause / Freeze Membership</h3>
            <p class="text-xs text-gray-400">Going on vacation or recovering from injury? Pause your membership and preserve all remaining paid days.</p>
        </div>

        <form method="POST" action="{{ route('profile.freeze') }}" class="space-y-4">
            @csrf

            <!-- Member Summary -->
            <div class="p-3 rounded-xl bg-[#182030] border border-white/5 flex items-center justify-between text-xs">
                <div>
                    <span class="text-gray-400 text-[10px] uppercase font-bold block">Member</span>
                    <strong class="text-white">{{ $profile['name'] }}</strong>
                </div>
                <div class="text-right">
                    <span class="text-gray-400 text-[10px] uppercase font-bold block">Active Plan</span>
                    <strong class="text-[#e2ff38]">{{ $profile['package_name'] }}</strong>
                </div>
            </div>

            <!-- Start Date -->
            <div>
                <label for="freeze_start_date" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Freeze Start Date
                </label>
                <input 
                    type="date" 
                    name="freeze_start_date" 
                    id="freeze_start_date" 
                    value="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    min="{{ date('Y-m-d') }}"
                    required 
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                >
            </div>

            <!-- Pause Duration -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">
                    Freeze Duration
                </label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                    <label class="p-2.5 rounded-lg bg-[#182030] border border-white/10 text-center cursor-pointer hover:border-[#e2ff38] transition-colors block">
                        <input type="radio" name="freeze_duration_days" value="7" class="accent-[#e2ff38] mb-1">
                        <div class="text-xs font-bold text-white">7 Days</div>
                        <div class="text-[9px] text-gray-400">1 Week</div>
                    </label>

                    <label class="p-2.5 rounded-lg bg-[#182030] border border-[#e2ff38]/40 text-center cursor-pointer hover:border-[#e2ff38] transition-colors block">
                        <input type="radio" name="freeze_duration_days" value="14" checked class="accent-[#e2ff38] mb-1">
                        <div class="text-xs font-bold text-white">14 Days</div>
                        <div class="text-[9px] text-gray-400">2 Weeks</div>
                    </label>

                    <label class="p-2.5 rounded-lg bg-[#182030] border border-white/10 text-center cursor-pointer hover:border-[#e2ff38] transition-colors block">
                        <input type="radio" name="freeze_duration_days" value="30" class="accent-[#e2ff38] mb-1">
                        <div class="text-xs font-bold text-white">30 Days</div>
                        <div class="text-[9px] text-gray-400">1 Month</div>
                    </label>

                    <label class="p-2.5 rounded-lg bg-[#182030] border border-white/10 text-center cursor-pointer hover:border-[#e2ff38] transition-colors block">
                        <input type="radio" name="freeze_duration_days" value="60" class="accent-[#e2ff38] mb-1">
                        <div class="text-xs font-bold text-white">60 Days</div>
                        <div class="text-[9px] text-gray-400">2 Months</div>
                    </label>
                </div>
            </div>

            <!-- Reason for Freeze -->
            <div>
                <label for="freeze_reason" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Primary Reason for Pause
                </label>
                <select 
                    name="freeze_reason" 
                    id="freeze_reason" 
                    required 
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                >
                    <option value="Medical Recovery / Injury">Medical Recovery / Injury</option>
                    <option value="Work Travel / Relocation">Work Travel / Relocation</option>
                    <option value="Vacation / Holiday">Vacation / Holiday</option>
                    <option value="Religious Observance / Fasting">Religious Observance / Fasting (Ramadan)</option>
                    <option value="Personal Sabbatical">Personal Sabbatical</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Additional Notes -->
            <div>
                <label for="freeze_notes" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Additional Comments / Notes (Optional)
                </label>
                <textarea 
                    name="freeze_notes" 
                    id="freeze_notes" 
                    rows="2"
                    placeholder="e.g. Advised 2 weeks knee recovery by physician..."
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3.5 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                ></textarea>
            </div>

            <!-- Policy Alert -->
            <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-[11px] text-gray-400 flex items-center gap-2">
                <i class="fa-solid fa-clock-rotate-left text-[#e2ff38]"></i>
                <span>Your remaining paid days will be automatically added to your next billing date. Zero cancellation penalty.</span>
            </div>

            <!-- Submit -->
            <div class="pt-2 flex items-center justify-end gap-3">
                <button 
                    type="button" 
                    onclick="closeFreezeModal()" 
                    class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg border border-white/10 cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider px-6 py-2.5 rounded-lg transition-all cursor-pointer shadow-md shadow-[#e2ff38]/20"
                >
                    Submit Freeze Request
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal 4: Official Gym Invoice / Receipt Modal -->
<div id="receipt-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/15 rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative">
        <button type="button" onclick="closeReceiptModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div id="receipt-printable-area">
            <!-- Receipt Header -->
            <div class="flex items-center justify-between pb-5 border-b border-white/10">
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-[2px] h-6">
                        <span class="w-[3px] h-3 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[4px] h-5 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[4px] h-4 bg-[#e2ff38] rounded-full"></span>
                    </div>
                    <span class="font-heading text-lg font-black text-white">FITNES TRAINING</span>
                </div>
                <div class="text-right">
                    <span class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest block">PAYMENT RECEIPT</span>
                    <span id="receipt-invoice-id" class="font-mono text-xs font-bold text-white"></span>
                </div>
            </div>

            <!-- Billing Details Grid -->
            <div class="grid grid-cols-2 gap-4 py-4 text-xs border-b border-white/10">
                <div>
                    <span class="text-gray-400 block text-[10px] uppercase font-bold">Billed To</span>
                    <strong class="text-white">{{ $profile['name'] }}</strong>
                    <div class="text-gray-400 text-[11px] font-mono mt-0.5">ID: {{ $profile['gym_id'] }}</div>
                </div>
                <div class="text-right">
                    <span class="text-gray-400 block text-[10px] uppercase font-bold">Payment Date</span>
                    <strong id="receipt-date" class="text-white"></strong>
                    <div id="receipt-method" class="text-gray-400 text-[11px] mt-0.5"></div>
                </div>
            </div>

            <!-- Line Items -->
            <div class="py-4 space-y-2 border-b border-white/10 text-xs">
                <div class="flex justify-between items-center text-gray-400 text-[10px] uppercase font-bold pb-1">
                    <span>Description</span>
                    <span>Amount</span>
                </div>
                <div class="flex justify-between items-center text-white py-1">
                    <span id="receipt-plan" class="font-medium"></span>
                    <span id="receipt-subtotal" class="font-bold"></span>
                </div>
                <div class="flex justify-between items-center text-gray-400 text-[11px]">
                    <span>Facility Maintenance & Tax (6%)</span>
                    <span id="receipt-tax"></span>
                </div>
                <div class="flex justify-between items-center text-white font-heading text-base font-black pt-2 border-t border-white/10">
                    <span>TOTAL PAID</span>
                    <span id="receipt-total" class="text-[#e2ff38]"></span>
                </div>
            </div>

            <div class="pt-4 text-center text-[10px] text-gray-500">
                Thank you for training with FITNES. Keep crushing your fitness goals!
            </div>
        </div>

        <div class="mt-6 flex flex-wrap items-center justify-end gap-3">
            <button 
                type="button" 
                onclick="closeReceiptModal()" 
                class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg border border-white/10 cursor-pointer"
            >
                Close
            </button>
            <a 
                id="receipt-tax-invoice-link"
                href="#" 
                target="_blank"
                class="bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider px-5 py-2.5 rounded-lg transition-all cursor-pointer flex items-center gap-1.5 shadow-md shadow-[#e2ff38]/20"
            >
                <i class="fa-solid fa-print"></i>
                <span>Open Full Tax Invoice</span>
            </a>
        </div>
    </div>
</div>

<!-- Modal 5: Log New Weigh-In & Body Composition -->
<div id="weighin-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border border-white/10 rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative">
        <button type="button" onclick="closeWeighInModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="mb-5">
            <span class="text-[10px] font-bold text-[#e2ff38] uppercase tracking-wider">Transformation Tracker</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Log Weekly Weigh-In</h3>
            <p class="text-xs text-gray-400">Record your current scale weight and body measurements to update your progress curve.</p>
        </div>

        <form method="POST" action="{{ route('profile.progress.store') }}" class="space-y-4">
            @csrf

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="weighin_weight" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Bodyweight (kg) *
                    </label>
                    <input 
                        type="number" 
                        step="0.1" 
                        name="weight_kg" 
                        id="weighin_weight" 
                        value="78.5" 
                        required
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                </div>

                <div>
                    <label for="weighin_fat" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                        Body Fat (%)
                    </label>
                    <input 
                        type="number" 
                        step="0.1" 
                        name="body_fat_pct" 
                        id="weighin_fat" 
                        value="14.8" 
                        placeholder="14.8"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                </div>
            </div>

            <div class="grid grid-cols-3 gap-2">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                        Waist (cm)
                    </label>
                    <input 
                        type="number" 
                        step="0.5" 
                        name="waist_cm" 
                        value="82.0" 
                        placeholder="82.0"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-2.5 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                        Chest (cm)
                    </label>
                    <input 
                        type="number" 
                        step="0.5" 
                        name="chest_cm" 
                        value="104.5" 
                        placeholder="104.5"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-2.5 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">
                        Arms (cm)
                    </label>
                    <input 
                        type="number" 
                        step="0.5" 
                        name="arms_cm" 
                        value="40.0" 
                        placeholder="40.0"
                        class="w-full bg-[#182030] border border-white/10 rounded-lg px-2.5 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                    >
                </div>
            </div>

            <div>
                <label for="weighin_notes" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-1">
                    Check-in Notes
                </label>
                <input 
                    type="text" 
                    name="notes" 
                    id="weighin_notes" 
                    placeholder="e.g. Fasted morning weigh-in, feeling leaner"
                    class="w-full bg-[#182030] border border-white/10 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2ff38]"
                >
            </div>

            <div class="pt-3 flex items-center justify-end gap-3">
                <button 
                    type="button" 
                    onclick="closeWeighInModal()"
                    class="bg-white/5 hover:bg-white/10 text-gray-300 text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg border border-white/10 cursor-pointer"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider px-6 py-2.5 rounded-lg transition-all cursor-pointer shadow-md shadow-[#e2ff38]/20"
                >
                    Record Weigh-In
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal 6: Turnstile RFID Check-In Confirmation -->
<div id="turnstile-modal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="bg-[#131722] border-2 border-emerald-500/40 rounded-3xl max-w-sm w-full p-6 text-center shadow-2xl relative overflow-hidden">
        <!-- Glow Circle -->
        <div class="w-18 h-18 rounded-full bg-emerald-500/20 border-2 border-emerald-400 flex items-center justify-center mx-auto mb-4 text-emerald-400 text-3xl shadow-lg shadow-emerald-500/20">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <span class="text-[10px] font-extrabold text-emerald-400 uppercase tracking-widest bg-emerald-500/10 px-3 py-0.5 rounded-full border border-emerald-500/30 inline-block mb-1">
            ACCESS GRANTED &bull; TURNSTILE UNLOCKED
        </span>

        <h3 class="font-heading text-xl font-black text-white mt-2">
            Welcome, {{ $profile['name'] }}!
        </h3>
        <p class="text-xs text-gray-400 mt-1">
            RFID Turnstile Gate A verified. Today's attendance logged successfully.
        </p>

        <div class="my-4 p-3.5 rounded-xl bg-[#182030] border border-white/5 text-xs text-left space-y-1.5 font-mono">
            <div class="flex justify-between text-gray-400">
                <span>Member ID:</span>
                <strong class="text-white">{{ $profile['gym_id'] }}</strong>
            </div>
            <div class="flex justify-between text-gray-400">
                <span>Access Gate:</span>
                <strong class="text-[#e2ff38]">VIP Turnstile Gate A</strong>
            </div>
            <div class="flex justify-between text-gray-400">
                <span>Check-in Time:</span>
                <strong id="turnstile-checkin-time" class="text-white">{{ date('h:i A') }}</strong>
            </div>
            <div class="flex justify-between text-gray-400">
                <span>Pass Status:</span>
                <strong class="text-emerald-400">Active VIP Athlete</strong>
            </div>
        </div>

        <button 
            type="button" 
            onclick="closeTurnstileModal()"
            class="w-full py-2.5 rounded-xl bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider transition-all cursor-pointer shadow-md shadow-[#e2ff38]/20"
        >
            Enter Training Zone
        </button>
    </div>
</div>

<!-- Chart.js CDN for Body Progress & Metrics Line Graph -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Turnstile Check-In Sound and Web Audio API Synthesizer
function playTurnstileChime() {
    try {
        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        const now = audioCtx.currentTime;

        // Tone 1: 880 Hz (A5)
        const osc1 = audioCtx.createOscillator();
        const gain1 = audioCtx.createGain();
        osc1.type = 'sine';
        osc1.frequency.setValueAtTime(880, now);
        gain1.gain.setValueAtTime(0.2, now);
        gain1.gain.exponentialRampToValueAtTime(0.001, now + 0.12);
        osc1.connect(gain1);
        gain1.connect(audioCtx.destination);
        osc1.start(now);
        osc1.stop(now + 0.12);

        // Tone 2: 1320 Hz (E6, pleasant electronic unlock chime)
        const osc2 = audioCtx.createOscillator();
        const gain2 = audioCtx.createGain();
        osc2.type = 'sine';
        osc2.frequency.setValueAtTime(1320, now + 0.14);
        gain2.gain.setValueAtTime(0.25, now + 0.14);
        gain2.gain.exponentialRampToValueAtTime(0.001, now + 0.35);
        osc2.connect(gain2);
        gain2.connect(audioCtx.destination);
        osc2.start(now + 0.14);
        osc2.stop(now + 0.35);
    } catch (e) {
        console.log('Web Audio API not supported', e);
    }
}

function scanTurnstilePass() {
    const btn = document.getElementById('turnstile-scan-btn');
    if (btn) {
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-sm"></i> Verifying Pass...';
        btn.disabled = true;
    }

    fetch("{{ route('profile.check-in') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        },
        body: JSON.stringify({ turnstile_gate: "Gate A - VIP Turnstile (West Wing)" })
    })
    .then(res => res.json())
    .then(data => {
        playTurnstileChime();
        if (btn) {
            btn.innerHTML = '<i class="fa-solid fa-qrcode text-sm"></i> Re-Scan Turnstile Entry';
            btn.disabled = false;
        }
        const timeEl = document.getElementById('turnstile-checkin-time');
        if (timeEl && data.timestamp) {
            timeEl.textContent = data.timestamp;
        }
        openTurnstileModal();
    })
    .catch(err => {
        console.error(err);
        playTurnstileChime();
        if (btn) {
            btn.innerHTML = '<i class="fa-solid fa-qrcode text-sm"></i> Re-Scan Turnstile Entry';
            btn.disabled = false;
        }
        openTurnstileModal();
    });
}

function openTurnstileModal() {
    const modal = document.getElementById('turnstile-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeTurnstileModal() {
    const modal = document.getElementById('turnstile-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Workout Logger Helpers
function selectMuscleGroup(name) {
    document.getElementById('selected_muscle_group').value = name;
    document.querySelectorAll('.muscle-pill').forEach(pill => {
        if (pill.getAttribute('data-group') === name) {
            pill.classList.remove('bg-[#182030]', 'text-gray-300', 'border-white/5');
            pill.classList.add('bg-[#e2ff38]', 'text-black', 'border-[#e2ff38]');
        } else {
            pill.classList.remove('bg-[#e2ff38]', 'text-black', 'border-[#e2ff38]');
            pill.classList.add('bg-[#182030]', 'text-gray-300', 'border-white/5');
        }
    });
}

function setExerciseName(name) {
    const input = document.getElementById('workout_exercise_name');
    if (input) {
        input.value = name;
        input.focus();
    }
}

// Smart Workout Routine Builder Helpers
function switchRoutineTab(tabId) {
    document.querySelectorAll('.routine-panel').forEach(panel => panel.classList.add('hidden'));
    const targetPanel = document.getElementById('routine-panel-' + tabId);
    if (targetPanel) targetPanel.classList.remove('hidden');

    document.querySelectorAll('.routine-tab-btn').forEach(btn => {
        btn.classList.remove('bg-[#e2ff38]', 'text-black');
        btn.classList.add('bg-[#182030]', 'text-gray-300', 'border', 'border-white/5');
    });
    const targetBtn = document.getElementById('tab-btn-' + tabId);
    if (targetBtn) {
        targetBtn.classList.remove('bg-[#182030]', 'text-gray-300', 'border', 'border-white/5');
        targetBtn.classList.add('bg-[#e2ff38]', 'text-black');
    }
}

function loadExerciseIntoForm(name, muscle, weight, sets, reps) {
    selectMuscleGroup(muscle);
    const nameInput = document.getElementById('workout_exercise_name');
    const weightInput = document.getElementById('workout_weight');
    const setsInput = document.getElementById('workout_sets');
    const repsInput = document.getElementById('workout_reps');

    if (nameInput) nameInput.value = name;
    if (weightInput) weightInput.value = weight;
    if (setsInput) setsInput.value = sets;
    if (repsInput) repsInput.value = reps;

    const formCard = document.getElementById('workout-logger-form-card');
    if (formCard) {
        formCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
        formCard.classList.add('ring-2', 'ring-[#e2ff38]', 'shadow-[#e2ff38]/20');
        setTimeout(() => {
            formCard.classList.remove('ring-2', 'ring-[#e2ff38]', 'shadow-[#e2ff38]/20');
        }, 1500);
    }
    if (nameInput) nameInput.focus();
}

// Weigh-In Modal
function openWeighInModal() {
    const modal = document.getElementById('weighin-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeWeighInModal() {
    const modal = document.getElementById('weighin-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Edit Profile Modal
function openEditProfileModal() {
    const modal = document.getElementById('edit-profile-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditProfileModal() {
    const modal = document.getElementById('edit-profile-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Change Plan Modal
let isModalYearly = false;
let currentPaymentMethod = 'bKash';

function openChangePlanModal() {
    const modal = document.getElementById('change-plan-modal');
    if (!modal) return;
    document.getElementById('change-plan-step-select').classList.remove('hidden');
    document.getElementById('change-plan-step-pay').classList.add('hidden');
    const gatewayScreen = document.getElementById('change-plan-gateway-screen');
    if (gatewayScreen) gatewayScreen.classList.add('hidden');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeChangePlanModal() {
    const modal = document.getElementById('change-plan-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function togglePlanModalDuration() {
    isModalYearly = !isModalYearly;
    const toggleBall = document.getElementById('plan-modal-toggle-ball');
    const labelMonthly = document.getElementById('plan-modal-monthly-label');
    const labelYearly = document.getElementById('plan-modal-yearly-label');
    const prices = document.querySelectorAll('.plan-modal-price');
    const periods = document.querySelectorAll('.plan-modal-period');

    if (isModalYearly) {
        toggleBall.classList.remove('translate-x-0');
        toggleBall.classList.add('translate-x-7');
        labelMonthly.classList.replace('text-[#e2ff38]', 'text-gray-400');
        labelYearly.classList.replace('text-gray-400', 'text-[#e2ff38]');

        prices.forEach(el => el.textContent = el.getAttribute('data-yearly'));
        periods.forEach(el => el.textContent = '/year');
    } else {
        toggleBall.classList.remove('translate-x-7');
        toggleBall.classList.add('translate-x-0');
        labelMonthly.classList.replace('text-gray-400', 'text-[#e2ff38]');
        labelYearly.classList.replace('text-[#e2ff38]', 'text-gray-400');

        prices.forEach(el => el.textContent = el.getAttribute('data-monthly'));
        periods.forEach(el => el.textContent = '/month');
    }
}

function selectPlanToPay(planName, monthlyPrice, yearlyPrice) {
    const price = isModalYearly ? yearlyPrice : monthlyPrice;
    const cycle = isModalYearly ? 'yearly' : 'monthly';
    const cycleLabel = isModalYearly ? 'Yearly Billing (Save 20%)' : 'Monthly Auto-Renewal';

    document.getElementById('checkout-plan-name').textContent = planName;
    document.getElementById('checkout-plan-price').textContent = price;
    document.getElementById('checkout-billing-cycle-label').textContent = cycleLabel;

    document.getElementById('form-plan-name').value = planName;
    document.getElementById('form-billing-cycle').value = cycle;
    document.getElementById('form-plan-price').value = price;

    document.getElementById('change-plan-step-select').classList.add('hidden');
    document.getElementById('change-plan-step-pay').classList.remove('hidden');
}

function backToPlanSelection() {
    document.getElementById('change-plan-step-pay').classList.add('hidden');
    document.getElementById('change-plan-step-select').classList.remove('hidden');
    const gatewayScreen = document.getElementById('change-plan-gateway-screen');
    if (gatewayScreen) gatewayScreen.classList.add('hidden');
}

function updatePayButtonLabel(method) {
    currentPaymentMethod = method;
    const btnText = document.getElementById('plan-submit-pay-text');
    const btn = document.getElementById('plan-submit-pay-btn');
    if (method === 'bKash') {
        btnText.textContent = 'Pay via bKash Gateway';
        btn.className = 'flex-1 bg-[#e2136e] hover:bg-[#c90f5f] text-white font-extrabold text-xs uppercase tracking-wider py-3 px-6 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#e2136e]/20 flex items-center justify-center gap-2';
    } else if (method === 'Nagad') {
        btnText.textContent = 'Pay via Nagad Gateway';
        btn.className = 'flex-1 bg-[#f7941d] hover:bg-[#df7e0c] text-white font-extrabold text-xs uppercase tracking-wider py-3 px-6 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#f7941d]/20 flex items-center justify-center gap-2';
    } else {
        btnText.textContent = 'Confirm & Pay Now';
        btn.className = 'flex-1 bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3 px-6 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#e2ff38]/20 flex items-center justify-center gap-2';
    }
}

function handlePlanPaymentSubmission() {
    if (currentPaymentMethod === 'bKash' || currentPaymentMethod === 'Nagad') {
        const screen = document.getElementById('change-plan-gateway-screen');
        const brandBadge = document.getElementById('gateway-logo-badge');
        const brandName = document.getElementById('gateway-brand-name');
        const dueAmount = document.getElementById('gateway-due-amount');
        const priceText = document.getElementById('checkout-plan-price').textContent;

        dueAmount.textContent = priceText;
        if (currentPaymentMethod === 'bKash') {
            brandBadge.textContent = 'bKash';
            brandBadge.className = 'px-2.5 py-1 rounded bg-[#e2136e] text-white font-black text-xs';
            brandName.textContent = 'bKash';
            screen.style.borderColor = '#e2136e';
        } else {
            brandBadge.textContent = 'Nagad';
            brandBadge.className = 'px-2.5 py-1 rounded bg-[#f7941d] text-white font-black text-xs';
            brandName.textContent = 'Nagad';
            screen.style.borderColor = '#f7941d';
        }

        document.getElementById('gateway-step-phone').classList.remove('hidden');
        document.getElementById('gateway-step-otp').classList.add('hidden');
        document.getElementById('gateway-step-pin').classList.add('hidden');
        screen.classList.remove('hidden');
        screen.scrollIntoView({ behavior: 'smooth' });
    } else {
        document.getElementById('change-plan-form').submit();
    }
}

function gatewayProceedToOtp() {
    const account = document.getElementById('gateway-account-input').value;
    if (!account) return;
    document.getElementById('gateway-step-phone').classList.add('hidden');
    document.getElementById('gateway-step-otp').classList.remove('hidden');
}

function gatewayProceedToPin() {
    document.getElementById('gateway-step-otp').classList.add('hidden');
    document.getElementById('gateway-step-pin').classList.remove('hidden');
}

function gatewayConfirmPayment() {
    const prefix = currentPaymentMethod === 'bKash' ? 'BK9X' : 'NG88';
    const randomTrx = prefix + Math.floor(100000 + Math.random() * 900000);
    document.getElementById('form-trx-id').value = randomTrx;
    document.getElementById('change-plan-form').submit();
}

// Freeze Modal
function openFreezeModal() {
    const modal = document.getElementById('freeze-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeFreezeModal() {
    const modal = document.getElementById('freeze-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Receipt Modal
function openReceiptModal(id, date, plan, total, subtotal, tax, method) {
    document.getElementById('receipt-invoice-id').textContent = id;
    document.getElementById('receipt-date').textContent = date;
    document.getElementById('receipt-plan').textContent = plan;
    document.getElementById('receipt-subtotal').textContent = subtotal;
    document.getElementById('receipt-tax').textContent = tax;
    document.getElementById('receipt-total').textContent = total;
    document.getElementById('receipt-method').textContent = method;

    const link = document.getElementById('receipt-tax-invoice-link');
    if (link) {
        link.href = '/profile/invoice/' + id;
    }

    const modal = document.getElementById('receipt-modal');
    if (!modal) return;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeReceiptModal() {
    const modal = document.getElementById('receipt-modal');
    if (!modal) return;
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Initialize Chart.js Progress Chart on Page Load
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('bodyProgressChart');
    if (ctx) {
        const labels = {!! json_encode($bodyProgress->pluck('recorded_date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('M d'))->toArray()) !!};
        const weights = {!! json_encode($bodyProgress->pluck('weight_kg')->toArray()) !!};
        const bodyFats = {!! json_encode($bodyProgress->pluck('body_fat_pct')->toArray()) !!};

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels.length ? labels : ['Aug 24', 'Aug 31', 'Sep 07', 'Sep 14', 'Sep 21', 'Sep 28', 'Oct 05', 'Oct 12'],
                datasets: [
                    {
                        label: 'Body Weight (kg)',
                        data: weights.length ? weights : [84.0, 83.2, 82.5, 81.6, 80.8, 79.9, 79.1, 78.5],
                        borderColor: '#e2ff38',
                        backgroundColor: 'rgba(226, 255, 56, 0.08)',
                        borderWidth: 2.5,
                        tension: 0.35,
                        fill: true,
                        pointBackgroundColor: '#e2ff38',
                        pointBorderColor: '#131722',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        yAxisID: 'yWeight',
                    },
                    {
                        label: 'Body Fat (%)',
                        data: bodyFats.length ? bodyFats : [22.5, 21.4, 20.2, 19.1, 17.8, 16.9, 15.6, 14.8],
                        borderColor: '#00d2ff',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        borderDash: [4, 4],
                        tension: 0.35,
                        pointBackgroundColor: '#00d2ff',
                        pointBorderColor: '#131722',
                        pointBorderWidth: 2,
                        pointRadius: 3.5,
                        pointHoverRadius: 5,
                        yAxisID: 'yFat',
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#161d2d',
                        borderColor: 'rgba(255,255,255,0.15)',
                        borderWidth: 1,
                        titleColor: '#ffffff',
                        bodyColor: '#e2ff38',
                        padding: 10,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y + (context.datasetIndex === 0 ? ' kg' : '%');
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: { color: '#9ca3af', font: { size: 10 } }
                    },
                    yWeight: {
                        type: 'linear',
                        position: 'left',
                        min: 75,
                        max: 86,
                        grid: { color: 'rgba(255,255,255,0.05)' },
                        ticks: {
                            color: '#e2ff38',
                            font: { size: 10 },
                            callback: (v) => v + ' kg'
                        }
                    },
                    yFat: {
                        type: 'linear',
                        position: 'right',
                        min: 10,
                        max: 25,
                        grid: { display: false },
                        ticks: {
                            color: '#00d2ff',
                            font: { size: 10 },
                            callback: (v) => v + '%'
                        }
                    }
                }
            }
        });
    }
});
</script>
@endsection
