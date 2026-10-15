@extends('layouts.app')

@section('content')
<!-- Leaderboard Hero Header -->
<section class="relative bg-[#0d1017] border-b border-white/10 py-12 lg:py-16 overflow-hidden">
    <!-- Ambient Glow Background -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#e2ff38]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -right-24 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-3 py-1 rounded-full bg-[#e2ff38]/15 border border-[#e2ff38]/30 text-[#e2ff38] text-xs font-black uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-trophy text-xs"></i>
                        <span>Official Gym Rankings & Records</span>
                    </span>
                    <span class="text-xs text-gray-400 font-mono">October 2026 Season</span>
                </div>
                <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-black text-white uppercase tracking-wider">
                    Gym Leaderboard & <span class="text-[#e2ff38]">PR Wall</span>
                </h1>
                <p class="text-sm sm:text-base text-gray-400 max-w-2xl mt-2 leading-relaxed">
                    Celebrating member consistency, personal lifting records, and athletic milestones verified live at FITNES turnstiles and lifting platforms.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3 shrink-0">
                <a 
                    href="{{ route('profile') }}" 
                    class="py-3 px-5 rounded-xl bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider transition-all shadow-lg shadow-[#e2ff38]/20 flex items-center gap-2"
                >
                    <i class="fa-solid fa-id-badge text-sm"></i>
                    <span>My Athlete Profile</span>
                </a>
                <a 
                    href="{{ route('home') }}" 
                    class="py-3 px-5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/15 text-white font-bold text-xs uppercase tracking-wider transition-all flex items-center gap-2"
                >
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>

        <!-- Highlight Metric Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
            <div class="p-4 rounded-2xl bg-[#131722] border border-white/10 shadow-lg flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-xl bg-amber-500/15 border border-amber-500/30 text-amber-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-crown"></i>
                </div>
                <div>
                    <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold block">Top Consistency</span>
                    <span class="text-lg font-black text-white font-heading">28 Days / Mo</span>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-[#131722] border border-white/10 shadow-lg flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-xl bg-[#e2ff38]/15 border border-[#e2ff38]/30 text-[#e2ff38] flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-dumbbell"></i>
                </div>
                <div>
                    <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold block">Deadlift Record</span>
                    <span class="text-lg font-black text-white font-heading">265.0 KG</span>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-[#131722] border border-white/10 shadow-lg flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-xl bg-sky-500/15 border border-sky-500/30 text-sky-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-fire"></i>
                </div>
                <div>
                    <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold block">Bench Record</span>
                    <span class="text-lg font-black text-white font-heading">165.0 KG</span>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-[#131722] border border-white/10 shadow-lg flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-medal"></i>
                </div>
                <div>
                    <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold block">Active Athletes</span>
                    <span class="text-lg font-black text-white font-heading">420+ Members</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Leaderboard Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">
    <!-- Section 1: Monthly Consistency Leaderboard (Top 10) -->
    <div>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-white/10 gap-2 mb-6">
            <div>
                <h2 class="font-heading text-2xl font-black text-white uppercase tracking-wider flex items-center gap-2.5">
                    <i class="fa-solid fa-ranking-star text-[#e2ff38]"></i>
                    <span>Monthly Consistency Top 10 Athletes</span>
                </h2>
                <p class="text-xs text-gray-400 mt-1">
                    Rankings based on RFID turnstile visits and completed workout sessions for October.
                </p>
            </div>
            <span class="text-xs font-mono text-[#e2ff38] bg-[#e2ff38]/10 border border-[#e2ff38]/30 px-3 py-1 rounded-full self-start sm:self-auto">
                Updated Live • Real-Time Turnstile Sync
            </span>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-white/10 shadow-xl bg-[#131722]">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#182030] text-[10px] uppercase font-bold text-gray-400 tracking-wider border-b border-white/10">
                    <tr>
                        <th class="py-3.5 px-4 text-center w-16">Rank</th>
                        <th class="py-3.5 px-4">Athlete & Tier</th>
                        <th class="py-3.5 px-4">Gym ID</th>
                        <th class="py-3.5 px-4">Monthly Visits</th>
                        <th class="py-3.5 px-4">Active Streak</th>
                        <th class="py-3.5 px-4">Specialization</th>
                        <th class="py-3.5 px-4 text-right">Consistency Score</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 font-medium text-xs">
                    @foreach ($leaderboard as $row)
                        <tr class="{{ $row['is_current_user'] ? 'bg-[#e2ff38]/10 border-y-2 border-[#e2ff38]/50' : 'hover:bg-white/[0.02]' }} transition-colors">
                            <!-- Rank Medal -->
                            <td class="py-3.5 px-4 text-center">
                                @if ($row['rank'] == 1)
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-amber-400/20 text-amber-400 font-extrabold text-sm border border-amber-400/50 shadow-md shadow-amber-400/20">
                                        🥇
                                    </span>
                                @elseif ($row['rank'] == 2)
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-slate-300/20 text-slate-200 font-extrabold text-sm border border-slate-300/50">
                                        🥈
                                    </span>
                                @elseif ($row['rank'] == 3)
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-amber-700/20 text-amber-600 font-extrabold text-sm border border-amber-700/50">
                                        🥉
                                    </span>
                                @else
                                    <span class="font-mono text-gray-400 font-bold text-xs">
                                        #{{ $row['rank'] }}
                                    </span>
                                @endif
                            </td>

                            <!-- Athlete Name & Tier -->
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-black text-black shrink-0" style="background-color: {{ $row['avatar_color'] }};">
                                        {{ strtoupper(substr($row['name'], 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-white flex items-center gap-2">
                                            <span>{{ $row['name'] }}</span>
                                            @if ($row['is_current_user'])
                                                <span class="px-2 py-0.2 rounded-full bg-[#e2ff38] text-black text-[9px] font-black uppercase tracking-wider">
                                                    YOU
                                                </span>
                                            @endif
                                        </div>
                                        <span class="text-[10px] text-gray-400 uppercase tracking-widest font-mono">
                                            {{ $row['tier'] }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <!-- Gym ID -->
                            <td class="py-3.5 px-4 font-mono text-xs text-gray-400">
                                {{ $row['gym_id'] }}
                            </td>

                            <!-- Visits & Progress -->
                            <td class="py-3.5 px-4">
                                <div class="space-y-1">
                                    <div class="flex items-center justify-between text-xs">
                                        <strong class="text-white">{{ $row['days_attended'] }} Days</strong>
                                        <span class="text-[10px] text-gray-400 font-mono">Goal 28</span>
                                    </div>
                                    <div class="w-28 h-1.5 bg-white/10 rounded-full overflow-hidden">
                                        <div class="h-full bg-[#e2ff38] rounded-full" style="width: {{ min(100, round(($row['days_attended'] / 28) * 100)) }}%;"></div>
                                    </div>
                                </div>
                            </td>

                            <!-- Active Streak -->
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-1 rounded-lg bg-orange-500/15 border border-orange-500/30 text-orange-400 font-bold text-xs inline-flex items-center gap-1.5">
                                    <i class="fa-solid fa-fire text-xs"></i>
                                    <span>{{ $row['streak_weeks'] }} Weeks</span>
                                </span>
                            </td>

                            <!-- Favorite Zone -->
                            <td class="py-3.5 px-4 text-xs text-gray-300">
                                {{ $row['favorite_zone'] }}
                            </td>

                            <!-- Consistency Score -->
                            <td class="py-3.5 px-4 text-right">
                                <span class="font-mono text-xs font-black {{ $row['is_current_user'] ? 'text-[#e2ff38]' : 'text-emerald-400' }}">
                                    {{ round(($row['days_attended'] / 28) * 100) }}%
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section 2: Heavy Lifter PR Wall -->
    <div>
        <div class="pb-4 border-b border-white/10 mb-6">
            <h2 class="font-heading text-2xl font-black text-white uppercase tracking-wider flex items-center gap-2.5">
                <i class="fa-solid fa-dumbbell text-[#e2ff38]"></i>
                <span>Heavy Lifters Wall of Fame (PR Wall)</span>
            </h2>
            <p class="text-xs text-gray-400 mt-1">
                Highest registered single rep personal records on Olympic platforms at FITNES.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Bench Press Records -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl p-5 shadow-xl space-y-4 relative overflow-hidden">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-amber-500/10 rounded-full blur-xl pointer-events-none"></div>
                <div class="flex items-center justify-between pb-3 border-b border-white/10">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl bg-amber-500/15 border border-amber-500/30 text-amber-400 flex items-center justify-center text-sm font-bold">
                            <i class="fa-solid fa-weight-hanging"></i>
                        </div>
                        <div>
                            <h3 class="font-heading text-base font-bold text-white uppercase tracking-wide">Bench Press</h3>
                            <span class="text-[10px] text-gray-400">Standard Barbell Grip</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-md bg-white/5 border border-white/10 text-gray-300 font-mono text-[10px]">
                        1RM Records
                    </span>
                </div>

                <div class="space-y-2.5">
                    @foreach ($benchRecords as $record)
                        <div class="p-3 rounded-xl {{ $record->rank_position == 1 ? 'bg-amber-500/10 border border-amber-500/30' : 'bg-white/5 border border-white/5' }} flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-full flex items-center justify-center font-bold text-xs {{ $record->rank_position == 1 ? 'bg-amber-400 text-black' : 'bg-white/10 text-gray-300' }}">
                                    {{ $record->rank_position }}
                                </span>
                                <div>
                                    <div class="font-bold text-white flex items-center gap-1.5">
                                        <span>{{ $record->lifter_name }}</span>
                                        @if (str_contains(strtolower($record->lifter_name), 'tanvir'))
                                            <span class="px-1.5 py-0.2 rounded bg-[#e2ff38] text-black text-[8px] font-black uppercase">YOU</span>
                                        @endif
                                    </div>
                                    <span class="text-[10px] text-gray-400">{{ $record->weight_class }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="font-heading text-base font-black text-[#e2ff38] block leading-none">
                                    {{ $record->weight_kg }} KG
                                </span>
                                <span class="text-[9px] font-mono text-gray-500">{{ $record->record_date->format('M Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Barbell Squat Records -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl p-5 shadow-xl space-y-4 relative overflow-hidden">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-[#e2ff38]/10 rounded-full blur-xl pointer-events-none"></div>
                <div class="flex items-center justify-between pb-3 border-b border-white/10">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl bg-[#e2ff38]/15 border border-[#e2ff38]/30 text-[#e2ff38] flex items-center justify-center text-sm font-bold">
                            <i class="fa-solid fa-person-walking-arrow-right"></i>
                        </div>
                        <div>
                            <h3 class="font-heading text-base font-bold text-white uppercase tracking-wide">Barbell Squat</h3>
                            <span class="text-[10px] text-gray-400">Parallel Depth PR</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-md bg-white/5 border border-white/10 text-gray-300 font-mono text-[10px]">
                        1RM Records
                    </span>
                </div>

                <div class="space-y-2.5">
                    @foreach ($squatRecords as $record)
                        <div class="p-3 rounded-xl {{ $record->rank_position == 1 ? 'bg-[#e2ff38]/10 border border-[#e2ff38]/30' : 'bg-white/5 border border-white/5' }} flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-full flex items-center justify-center font-bold text-xs {{ $record->rank_position == 1 ? 'bg-[#e2ff38] text-black' : 'bg-white/10 text-gray-300' }}">
                                    {{ $record->rank_position }}
                                </span>
                                <div>
                                    <div class="font-bold text-white flex items-center gap-1.5">
                                        <span>{{ $record->lifter_name }}</span>
                                        @if (str_contains(strtolower($record->lifter_name), 'tanvir'))
                                            <span class="px-1.5 py-0.2 rounded bg-[#e2ff38] text-black text-[8px] font-black uppercase">YOU</span>
                                        @endif
                                    </div>
                                    <span class="text-[10px] text-gray-400">{{ $record->weight_class }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="font-heading text-base font-black text-[#e2ff38] block leading-none">
                                    {{ $record->weight_kg }} KG
                                </span>
                                <span class="text-[9px] font-mono text-gray-500">{{ $record->record_date->format('M Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Deadlift Records -->
            <div class="bg-[#131722] border border-white/10 rounded-2xl p-5 shadow-xl space-y-4 relative overflow-hidden">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-rose-500/10 rounded-full blur-xl pointer-events-none"></div>
                <div class="flex items-center justify-between pb-3 border-b border-white/10">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl bg-rose-500/15 border border-rose-500/30 text-rose-400 flex items-center justify-center text-sm font-bold">
                            <i class="fa-solid fa-fire"></i>
                        </div>
                        <div>
                            <h3 class="font-heading text-base font-bold text-white uppercase tracking-wide">Deadlift</h3>
                            <span class="text-[10px] text-gray-400">Conventional & Sumo PR</span>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded-md bg-white/5 border border-white/10 text-gray-300 font-mono text-[10px]">
                        1RM Records
                    </span>
                </div>

                <div class="space-y-2.5">
                    @foreach ($deadliftRecords as $record)
                        <div class="p-3 rounded-xl {{ $record->rank_position == 1 ? 'bg-rose-500/10 border border-rose-500/30' : 'bg-white/5 border border-white/5' }} flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2.5">
                                <span class="w-6 h-6 rounded-full flex items-center justify-center font-bold text-xs {{ $record->rank_position == 1 ? 'bg-rose-400 text-black' : 'bg-white/10 text-gray-300' }}">
                                    {{ $record->rank_position }}
                                </span>
                                <div>
                                    <div class="font-bold text-white flex items-center gap-1.5">
                                        <span>{{ $record->lifter_name }}</span>
                                        @if (str_contains(strtolower($record->lifter_name), 'tanvir'))
                                            <span class="px-1.5 py-0.2 rounded bg-[#e2ff38] text-black text-[8px] font-black uppercase">YOU</span>
                                        @endif
                                    </div>
                                    <span class="text-[10px] text-gray-400">{{ $record->weight_class }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="font-heading text-base font-black text-[#e2ff38] block leading-none">
                                    {{ $record->weight_kg }} KG
                                </span>
                                <span class="text-[9px] font-mono text-gray-500">{{ $record->record_date->format('M Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Section 3: Athlete Achievement Badges -->
    <div>
        <div class="pb-4 border-b border-white/10 mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <div>
                <h2 class="font-heading text-2xl font-black text-white uppercase tracking-wider flex items-center gap-2.5">
                    <i class="fa-solid fa-medal text-[#e2ff38]"></i>
                    <span>Athlete Achievement Badges</span>
                </h2>
                <p class="text-xs text-gray-400 mt-1">
                    Special milestone badges awarded for gym consistency, strength goals, and early discipline.
                </p>
            </div>
            @auth
                <span class="text-xs text-emerald-400 font-bold flex items-center gap-1.5 bg-emerald-500/10 border border-emerald-500/30 px-3 py-1 rounded-full self-start sm:self-auto">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Showing Badges for {{ Auth::user()->name }}</span>
                </span>
            @endauth
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Badge 1: Century Club -->
            <div class="p-5 rounded-2xl bg-[#131722] border border-white/10 shadow-xl space-y-3 relative overflow-hidden group hover:border-amber-400/50 transition-all">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/15 border border-amber-500/30 text-amber-400 flex items-center justify-center text-xl shadow-md">
                        <i class="fa-solid fa-crown"></i>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-400 text-[10px] font-extrabold uppercase tracking-wider">
                        In Progress
                    </span>
                </div>
                <div>
                    <h3 class="font-heading text-base font-bold text-white uppercase tracking-wide">Century Club</h3>
                    <p class="text-xs text-gray-400 mt-1 leading-relaxed">
                        Complete 100 verified RFID turnstile attendance sessions throughout your gym membership.
                    </p>
                </div>
                <div class="space-y-1.5 pt-2 border-t border-white/5">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-400">Progress:</span>
                        <strong class="text-white font-mono">68 / 100 Days (68%)</strong>
                    </div>
                    <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full bg-amber-400 rounded-full" style="width: 68%;"></div>
                    </div>
                </div>
            </div>

            <!-- Badge 2: Iron Warrior (UNLOCKED) -->
            <div class="p-5 rounded-2xl bg-gradient-to-b from-[#e2ff38]/10 via-[#131722] to-[#131722] border-2 border-[#e2ff38]/50 shadow-xl space-y-3 relative overflow-hidden group">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-[#e2ff38] text-black flex items-center justify-center text-xl shadow-lg shadow-[#e2ff38]/30">
                        <i class="fa-solid fa-dumbbell"></i>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full bg-[#e2ff38] text-black text-[10px] font-black uppercase tracking-wider flex items-center gap-1">
                        <i class="fa-solid fa-check"></i> UNLOCKED
                    </span>
                </div>
                <div>
                    <h3 class="font-heading text-base font-black text-white uppercase tracking-wide flex items-center gap-1.5">
                        <span>Iron Warrior</span>
                        <i class="fa-solid fa-certificate text-[#e2ff38] text-xs"></i>
                    </h3>
                    <p class="text-xs text-gray-400 mt-1 leading-relaxed">
                        Registered 100+ kg in a single verified lift set (Bench 130kg, Squat 180kg, Deadlift 210kg).
                    </p>
                </div>
                <div class="space-y-1.5 pt-2 border-t border-white/10">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-[#e2ff38] font-bold">Achievement Mastered</span>
                        <strong class="text-[#e2ff38] font-mono">130 KG Lifted</strong>
                    </div>
                    <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full bg-[#e2ff38] rounded-full w-full"></div>
                    </div>
                </div>
            </div>

            <!-- Badge 3: Early Bird Striker -->
            <div class="p-5 rounded-2xl bg-[#131722] border border-white/10 shadow-xl space-y-3 relative overflow-hidden group hover:border-sky-400/50 transition-all">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-sky-500/15 border border-sky-500/30 text-sky-400 flex items-center justify-center text-xl shadow-md">
                        <i class="fa-solid fa-sun"></i>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full bg-sky-500/15 border border-sky-500/30 text-sky-400 text-[10px] font-extrabold uppercase tracking-wider">
                        85% Done
                    </span>
                </div>
                <div>
                    <h3 class="font-heading text-base font-bold text-white uppercase tracking-wide">Early Bird Striker</h3>
                    <p class="text-xs text-gray-400 mt-1 leading-relaxed">
                        Complete 20 early morning workout sessions before 7:00 AM turnstile lock.
                    </p>
                </div>
                <div class="space-y-1.5 pt-2 border-t border-white/5">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-400">Early Mornings:</span>
                        <strong class="text-white font-mono">17 / 20 Sessions</strong>
                    </div>
                    <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full bg-sky-400 rounded-full" style="width: 85%;"></div>
                    </div>
                </div>
            </div>

            <!-- Badge 4: Consistency King (UNLOCKED) -->
            <div class="p-5 rounded-2xl bg-gradient-to-b from-orange-500/10 via-[#131722] to-[#131722] border-2 border-orange-500/50 shadow-xl space-y-3 relative overflow-hidden group">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-500 text-white flex items-center justify-center text-xl shadow-lg shadow-orange-500/30">
                        <i class="fa-solid fa-fire-flame-curved"></i>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full bg-orange-500 text-white text-[10px] font-black uppercase tracking-wider flex items-center gap-1">
                        <i class="fa-solid fa-check"></i> UNLOCKED
                    </span>
                </div>
                <div>
                    <h3 class="font-heading text-base font-black text-white uppercase tracking-wide flex items-center gap-1.5">
                        <span>Consistency King</span>
                        <i class="fa-solid fa-fire text-orange-400 text-xs"></i>
                    </h3>
                    <p class="text-xs text-gray-400 mt-1 leading-relaxed">
                        Maintain 4 consecutive weeks of uninterrupted weekly gym visits (Current: 5 Weeks).
                    </p>
                </div>
                <div class="space-y-1.5 pt-2 border-t border-white/10">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-orange-400 font-bold">Unbroken Streak</span>
                        <strong class="text-orange-400 font-mono">5 Weeks Active</strong>
                    </div>
                    <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full bg-orange-500 rounded-full w-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
