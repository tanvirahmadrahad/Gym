<section id="schedule" class="py-20 lg:py-28 bg-[#080a0e] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-tight leading-tight mb-4">
                Our Class Schedule
            </h2>
            <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                Choose a plan that fits your goals, schedule, and lifestyle we've got an option for you.
            </p>
        </div>

        <!-- Schedule Container: items-stretch so left sidebar and right table have the EXACT SAME length at bottom -->
        <div class="flex flex-col lg:flex-row gap-6 items-stretch">
            <!-- Left Filter Tabs -->
            <div class="w-full lg:w-48 flex lg:flex-col flex-wrap gap-2.5 shrink-0 justify-between">
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-lg bg-[#e2ff38] text-black transition-all flex items-center justify-between" data-category="all">
                    <span>ALL</span>
                    <i class="fa-solid fa-chevron-right text-[10px] hidden lg:inline"></i>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-lg bg-[#141924] text-gray-300 hover:bg-white/10 hover:text-[#e2ff38] transition-all flex items-center justify-between" data-category="aerobics">
                    <span>AEROBICS</span>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-lg bg-[#141924] text-gray-300 hover:bg-white/10 hover:text-[#e2ff38] transition-all flex items-center justify-between" data-category="cycling">
                    <span>CYCLING</span>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-lg bg-[#141924] text-gray-300 hover:bg-white/10 hover:text-[#e2ff38] transition-all flex items-center justify-between" data-category="cardio">
                    <span>CARDIO</span>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-lg bg-[#141924] text-gray-300 hover:bg-white/10 hover:text-[#e2ff38] transition-all flex items-center justify-between" data-category="yoga">
                    <span>YOGA</span>
                </button>
                <button class="schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-lg bg-[#141924] text-gray-300 hover:bg-white/10 hover:text-[#e2ff38] transition-all flex items-center justify-between" data-category="stretching">
                    <span>STRETCHING</span>
                </button>
            </div>

            <!-- Right Schedule Calendar Grid Table (Stretches to match exact bottom height) -->
            <div class="w-full flex-1 overflow-x-auto rounded-xl border border-white/10 bg-[#10141e] shadow-2xl flex flex-col justify-between">
                <table class="w-full h-full text-center border-collapse min-w-[700px]">
                    <!-- Days Header (Yellow Header row) -->
                    <thead>
                        <tr class="bg-[#e2ff38] text-black font-heading font-black text-xs sm:text-sm tracking-wider uppercase h-12">
                            <th class="py-3 px-3 border-r border-black/10">SUNDAY</th>
                            <th class="py-3 px-3 border-r border-black/10">MONDAY</th>
                            <th class="py-3 px-3 border-r border-black/10">TUESDAY</th>
                            <th class="py-3 px-3 border-r border-black/10">WEDNESDAY</th>
                            <th class="py-3 px-3 border-r border-black/10">THURSDAY</th>
                            <th class="py-3 px-3 border-r border-black/10">FRIDAY</th>
                            <th class="py-3 px-3">SATURDAY</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-xs text-gray-300 h-full">
                        <!-- Morning Slot -->
                        <tr class="divide-x divide-white/5 bg-[#121622]/60 hover:bg-[#151b2a] transition-colors h-[86px]">
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-gray-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cycling">
                                <span class="font-bold text-white block">CYCLING</span>
                                <span class="text-[11px] text-gray-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-gray-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cycling">
                                <span class="font-bold text-white block">CYCLING</span>
                                <span class="text-[11px] text-gray-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cardio">
                                <span class="font-bold text-white block">CARDIO</span>
                                <span class="text-[11px] text-gray-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 class-item" data-type="stretching">
                                <span class="font-bold text-white block">STRETCHING</span>
                                <span class="text-[11px] text-gray-400">10:30AM-11:30AM</span>
                            </td>
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-gray-400">10:30AM-11:30AM</span>
                            </td>
                        </tr>

                        <!-- Afternoon Slot -->
                        <tr class="divide-x divide-white/5 bg-[#0f131d]/60 hover:bg-[#151b2a] transition-colors h-[86px]">
                            <td class="p-4 class-item" data-type="yoga">
                                <span class="font-bold text-white block">YOGA</span>
                                <span class="text-[11px] text-gray-400">05:30PM-06:30PM</span>
                            </td>
                            <td class="p-4 text-gray-600">-</td>
                            <td class="p-4 text-gray-600">-</td>
                            <td class="p-4 class-item" data-type="yoga">
                                <span class="font-bold text-white block">YOGA</span>
                                <span class="text-[11px] text-gray-400">05:30PM-06:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cardio">
                                <span class="font-bold text-white block">CARDIO</span>
                                <span class="text-[11px] text-gray-400">05:30PM-06:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cycling">
                                <span class="font-bold text-white block">CYCLING</span>
                                <span class="text-[11px] text-gray-400">05:30PM-06:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="yoga">
                                <span class="font-bold text-white block">YOGA</span>
                                <span class="text-[11px] text-gray-400">05:30PM-06:30PM</span>
                            </td>
                        </tr>

                        <!-- Evening Slot -->
                        <tr class="divide-x divide-white/5 bg-[#121622]/60 hover:bg-[#151b2a] transition-colors h-[86px]">
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-gray-400">09:30PM-10:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="cycling">
                                <span class="font-bold text-white block">CYCLING</span>
                                <span class="text-[11px] text-gray-400">09:30PM-10:30PM</span>
                            </td>
                            <td class="p-4 text-gray-600">-</td>
                            <td class="p-4 text-gray-600">-</td>
                            <td class="p-4 class-item" data-type="cardio">
                                <span class="font-bold text-white block">CARDIO</span>
                                <span class="text-[11px] text-gray-400">09:30PM-10:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="stretching">
                                <span class="font-bold text-white block">STRETCHING</span>
                                <span class="text-[11px] text-gray-400">09:30PM-10:30PM</span>
                            </td>
                            <td class="p-4 class-item" data-type="aerobics">
                                <span class="font-bold text-white block">AEROBICS</span>
                                <span class="text-[11px] text-gray-400">09:30PM-10:30PM</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.schedule-tab');
    const items = document.querySelectorAll('.class-item');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => {
                t.className = 'schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-lg bg-[#141924] text-gray-300 hover:bg-white/10 hover:text-[#e2ff38] transition-all flex items-center justify-between';
            });
            tab.className = 'schedule-tab w-full text-left font-bold text-xs uppercase tracking-wider py-3.5 px-4 rounded-lg bg-[#e2ff38] text-black transition-all flex items-center justify-between';

            const cat = tab.getAttribute('data-category');
            items.forEach(item => {
                if (cat === 'all' || item.getAttribute('data-type') === cat) {
                    item.classList.remove('opacity-20');
                    item.classList.add('bg-[#e2ff38]/10');
                } else {
                    item.classList.add('opacity-20');
                    item.classList.remove('bg-[#e2ff38]/10');
                }
            });
        });
    });
});
</script>
