<div class="bg-[#131722] border border-white/10 rounded-3xl p-6 sm:p-10 shadow-2xl relative overflow-hidden">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-white/10 mb-8">
        <div>
            <span class="text-[10px] font-black uppercase tracking-widest text-[#e2ff38] bg-[#e2ff38]/10 px-3 py-1 rounded-full border border-[#e2ff38]/30 inline-block mb-1.5">
                SCIENTIFIC MACRO ENGINE
            </span>
            <h3 class="font-heading text-2xl sm:text-3xl font-black text-white uppercase tracking-tight">
                Calorie & Macro <span class="text-[#e2ff38]">Calculator</span>
            </h3>
            <p class="text-xs text-gray-400 mt-1">Calculate your optimal daily protein, carbohydrates, and fats tailored to your athletic goals.</p>
        </div>

        <!-- Metric / Imperial Toggle -->
        <div class="flex items-center gap-2 bg-[#182030] p-1.5 rounded-xl border border-white/10 self-start md:self-auto">
            <button 
                type="button" 
                id="unit-metric" 
                onclick="setCalculatorUnit('metric')" 
                class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all bg-[#e2ff38] text-black shadow-sm cursor-pointer"
            >
                Metric (kg/cm)
            </button>
            <button 
                type="button" 
                id="unit-imperial" 
                onclick="setCalculatorUnit('imperial')" 
                class="px-3.5 py-1.5 rounded-lg text-xs font-bold text-gray-400 hover:text-white transition-all cursor-pointer"
            >
                Imperial (lbs/in)
            </button>
        </div>
    </div>

    <!-- 2 Column Layout: Inputs & Results -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Form Inputs (7 cols) -->
        <div class="lg:col-span-7 space-y-5">
            <!-- Gender & Age -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1.5">Gender</label>
                    <div class="grid grid-cols-2 gap-2">
                        <button type="button" onclick="setCalcGender('male')" id="gender-male" class="py-2.5 px-3 rounded-xl border border-[#e2ff38] bg-[#e2ff38]/10 text-[#e2ff38] text-xs font-bold flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="fa-solid fa-mars"></i> Male
                        </button>
                        <button type="button" onclick="setCalcGender('female')" id="gender-female" class="py-2.5 px-3 rounded-xl border border-white/10 bg-[#182030] text-gray-400 hover:text-white text-xs font-bold flex items-center justify-center gap-1.5 cursor-pointer">
                            <i class="fa-solid fa-venus"></i> Female
                        </button>
                    </div>
                </div>

                <div>
                    <label for="calc-age" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1.5">Age (Years)</label>
                    <input type="number" id="calc-age" value="26" min="14" max="90" oninput="calculateMacros()" class="w-full bg-[#182030] border border-white/15 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]">
                </div>
            </div>

            <!-- Height & Weight -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label id="label-height" for="calc-height" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1.5">Height (cm)</label>
                    <input type="number" id="calc-height" value="180" min="100" max="230" oninput="calculateMacros()" class="w-full bg-[#182030] border border-white/15 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]">
                </div>

                <div>
                    <label id="label-weight" for="calc-weight" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1.5">Weight (kg)</label>
                    <input type="number" step="0.5" id="calc-weight" value="78.5" min="35" max="250" oninput="calculateMacros()" class="w-full bg-[#182030] border border-white/15 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]">
                </div>
            </div>

            <!-- Activity Level -->
            <div>
                <label for="calc-activity" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1.5">Weekly Training Frequency</label>
                <select id="calc-activity" onchange="calculateMacros()" class="w-full bg-[#182030] border border-white/15 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]">
                    <option value="1.2">Sedentary (Desk Job, Minimal Exercise)</option>
                    <option value="1.375">Light Training (1-2 Days / Week)</option>
                    <option value="1.55" selected>Moderate Training (3-5 Days Heavy Lifting)</option>
                    <option value="1.725">Intense Athletic Training (6-7 Days High Volume)</option>
                    <option value="1.9">Elite Competitive Athlete (2x Daily Workouts)</option>
                </select>
            </div>

            <!-- Fitness Goal -->
            <div>
                <label for="calc-goal" class="block text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1.5">Primary Target Goal</label>
                <select id="calc-goal" onchange="calculateMacros()" class="w-full bg-[#182030] border border-white/15 rounded-xl px-3.5 py-2.5 text-xs text-white focus:outline-none focus:border-[#e2ff38]">
                    <option value="cut">Fat Loss & Definition (-500 kcal deficit)</option>
                    <option value="recomp" selected>Lean Muscle Recomposition (High Protein, Slight Deficit)</option>
                    <option value="maintain">Weight Maintenance & Strength Performance (0 kcal balance)</option>
                    <option value="bulk">Hypertrophy Muscle Bulking (+400 kcal surplus)</option>
                </select>
            </div>
        </div>

        <!-- Right: Results Dashboard (5 cols) -->
        <div class="lg:col-span-5 bg-gradient-to-b from-[#182030] to-[#121622] border border-white/15 rounded-2xl p-6 sm:p-7 space-y-6 shadow-xl relative overflow-hidden">
            <div class="text-center pb-5 border-b border-white/10">
                <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 block mb-1">Target Daily Energy Intake</span>
                <div class="flex items-baseline justify-center gap-1.5">
                    <span id="res-calories" class="font-heading text-4xl sm:text-5xl font-black text-[#e2ff38]">2,480</span>
                    <span class="text-xs font-bold text-gray-400">kcal / day</span>
                </div>
                <div class="flex items-center justify-center gap-4 text-[11px] text-gray-400 mt-2">
                    <span>BMR: <strong id="res-bmr" class="text-white">1,780</strong> kcal</span>
                    <span>&bull;</span>
                    <span>TDEE: <strong id="res-tdee" class="text-white">2,760</strong> kcal</span>
                </div>
            </div>

            <!-- Macros Breakdown Progress -->
            <div class="space-y-4 text-xs">
                <!-- Protein -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-bold text-white flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                            Protein (2.2g / kg)
                        </span>
                        <span class="font-mono font-bold text-rose-400"><span id="res-protein">173</span>g <span class="text-gray-400 font-normal">(<span id="res-protein-cal">692</span> kcal)</span></span>
                    </div>
                    <div class="w-full bg-black/40 rounded-full h-2 overflow-hidden">
                        <div id="bar-protein" class="bg-rose-500 h-full rounded-full transition-all duration-500" style="width: 30%"></div>
                    </div>
                </div>

                <!-- Carbs -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-bold text-white flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#e2ff38]"></span>
                            Carbohydrates
                        </span>
                        <span class="font-mono font-bold text-[#e2ff38]"><span id="res-carbs">270</span>g <span class="text-gray-400 font-normal">(<span id="res-carbs-cal">1080</span> kcal)</span></span>
                    </div>
                    <div class="w-full bg-black/40 rounded-full h-2 overflow-hidden">
                        <div id="bar-carbs" class="bg-[#e2ff38] h-full rounded-full transition-all duration-500" style="width: 45%"></div>
                    </div>
                </div>

                <!-- Fats -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-bold text-white flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyan-400"></span>
                            Healthy Fats
                        </span>
                        <span class="font-mono font-bold text-cyan-400"><span id="res-fats">70</span>g <span class="text-gray-400 font-normal">(<span id="res-fats-cal">630</span> kcal)</span></span>
                    </div>
                    <div class="w-full bg-black/40 rounded-full h-2 overflow-hidden">
                        <div id="bar-fats" class="bg-cyan-400 h-full rounded-full transition-all duration-500" style="width: 25%"></div>
                    </div>
                </div>
            </div>

            <!-- Hydration Recommendation -->
            <div class="pt-4 border-t border-white/10 flex items-center justify-between text-xs">
                <span class="text-gray-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-droplet text-cyan-400"></i>
                    Optimal Hydration Target:
                </span>
                <span id="res-water" class="font-bold text-white font-mono">3.8 Liters / day</span>
            </div>
        </div>

    </div>
</div>

<script>
let calcUnit = 'metric';
let calcGender = 'male';

function setCalculatorUnit(unit) {
    calcUnit = unit;
    const btnM = document.getElementById('unit-metric');
    const btnI = document.getElementById('unit-imperial');
    const lblH = document.getElementById('label-height');
    const lblW = document.getElementById('label-weight');
    const inH = document.getElementById('calc-height');
    const inW = document.getElementById('calc-weight');

    if (unit === 'metric') {
        btnM.classList.replace('text-gray-400', 'text-black');
        btnM.classList.add('bg-[#e2ff38]');
        btnI.classList.replace('text-black', 'text-gray-400');
        btnI.classList.remove('bg-[#e2ff38]');

        lblH.textContent = 'Height (cm)';
        lblW.textContent = 'Weight (kg)';
        inH.value = Math.round(inH.value * 2.54) || 180;
        inW.value = Math.round(inW.value * 0.453592) || 78.5;
    } else {
        btnI.classList.replace('text-gray-400', 'text-black');
        btnI.classList.add('bg-[#e2ff38]');
        btnM.classList.replace('text-black', 'text-gray-400');
        btnM.classList.remove('bg-[#e2ff38]');

        lblH.textContent = 'Height (Inches)';
        lblW.textContent = 'Weight (lbs)';
        inH.value = Math.round(inH.value / 2.54) || 71;
        inW.value = Math.round(inW.value / 0.453592) || 173;
    }
    calculateMacros();
}

function setCalcGender(gender) {
    calcGender = gender;
    const bM = document.getElementById('gender-male');
    const bF = document.getElementById('gender-female');
    if (gender === 'male') {
        bM.className = 'py-2.5 px-3 rounded-xl border border-[#e2ff38] bg-[#e2ff38]/10 text-[#e2ff38] text-xs font-bold flex items-center justify-center gap-1.5 cursor-pointer';
        bF.className = 'py-2.5 px-3 rounded-xl border border-white/10 bg-[#182030] text-gray-400 hover:text-white text-xs font-bold flex items-center justify-center gap-1.5 cursor-pointer';
    } else {
        bF.className = 'py-2.5 px-3 rounded-xl border border-[#e2ff38] bg-[#e2ff38]/10 text-[#e2ff38] text-xs font-bold flex items-center justify-center gap-1.5 cursor-pointer';
        bM.className = 'py-2.5 px-3 rounded-xl border border-white/10 bg-[#182030] text-gray-400 hover:text-white text-xs font-bold flex items-center justify-center gap-1.5 cursor-pointer';
    }
    calculateMacros();
}

function calculateMacros() {
    let weight = parseFloat(document.getElementById('calc-weight').value) || 78.5;
    let height = parseFloat(document.getElementById('calc-height').value) || 180;
    const age = parseInt(document.getElementById('calc-age').value) || 26;
    const activity = parseFloat(document.getElementById('calc-activity').value) || 1.55;
    const goal = document.getElementById('calc-goal').value;

    // Normalize to kg & cm for Mifflin-St Jeor formula
    let weightKg = calcUnit === 'metric' ? weight : weight * 0.453592;
    let heightCm = calcUnit === 'metric' ? height : height * 2.54;

    // Basal Metabolic Rate (Mifflin-St Jeor)
    let bmr = (10 * weightKg) + (6.25 * heightCm) - (5 * age);
    bmr = calcGender === 'male' ? bmr + 5 : bmr - 161;

    // Total Daily Energy Expenditure (TDEE)
    let tdee = Math.round(bmr * activity);

    // Goal adjustments
    let targetCalories = tdee;
    if (goal === 'cut') targetCalories = tdee - 500;
    else if (goal === 'recomp') targetCalories = tdee - 250;
    else if (goal === 'bulk') targetCalories = tdee + 400;

    targetCalories = Math.max(targetCalories, 1400);

    // Protein: 2.2g per kg for athletes
    let proteinGrams = Math.round(weightKg * 2.2);
    let proteinCal = proteinGrams * 4;

    // Fats: 25% of calories
    let fatsCal = targetCalories * 0.25;
    let fatsGrams = Math.round(fatsCal / 9);

    // Carbs: Remaining calories
    let carbsCal = Math.max(targetCalories - proteinCal - fatsCal, 200);
    let carbsGrams = Math.round(carbsCal / 4);

    // Water: 35ml per kg of bodyweight
    let waterLiters = (weightKg * 0.045).toFixed(1);

    document.getElementById('res-calories').textContent = targetCalories.toLocaleString();
    document.getElementById('res-bmr').textContent = Math.round(bmr).toLocaleString();
    document.getElementById('res-tdee').textContent = tdee.toLocaleString();

    document.getElementById('res-protein').textContent = proteinGrams;
    document.getElementById('res-protein-cal').textContent = proteinCal;

    document.getElementById('res-carbs').textContent = carbsGrams;
    document.getElementById('res-carbs-cal').textContent = carbsCal;

    document.getElementById('res-fats').textContent = fatsGrams;
    document.getElementById('res-fats-cal').textContent = Math.round(fatsCal);

    document.getElementById('res-water').textContent = `${waterLiters} Liters / day`;

    // Progress bar widths
    document.getElementById('bar-protein').style.width = `${Math.round((proteinCal / targetCalories) * 100)}%`;
    document.getElementById('bar-carbs').style.width = `${Math.round((carbsCal / targetCalories) * 100)}%`;
    document.getElementById('bar-fats').style.width = `${Math.round((fatsCal / targetCalories) * 100)}%`;
}

document.addEventListener('DOMContentLoaded', calculateMacros);
</script>
