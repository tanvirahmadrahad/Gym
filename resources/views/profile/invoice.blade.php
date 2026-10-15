<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Official Invoice {{ $invoice['id'] }} - FITNES Training</title>

    <!-- Google Fonts: Oswald & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @page {
            size: A4 portrait;
            margin: 10mm;
        }

        @media print {
            body {
                background-color: #0e121a !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .no-print {
                display: none !important;
            }
            .invoice-page {
                box-shadow: none !important;
                border: 1px solid rgba(255,255,255,0.15) !important;
                margin: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
                padding: 24px !important;
            }
        }

        .invoice-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 110px;
            font-weight: 900;
            font-family: 'Oswald', sans-serif;
            color: rgba(226, 255, 56, 0.03);
            pointer-events-none;
            user-select: none;
            white-space: nowrap;
        }

        .paid-stamp {
            transform: rotate(-12deg);
            border: 3px dashed #10b981;
            color: #10b981;
            border-radius: 12px;
            padding: 8px 18px;
            display: inline-block;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            font-size: 18px;
            font-weight: 800;
            background: rgba(16, 185, 129, 0.08);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="bg-[#080a0e] text-[#f3f4f6] font-sans antialiased min-h-screen py-6 px-3 sm:px-6">

    <!-- Screen Navigation & Action Bar (Hidden on Print) -->
    <div class="max-w-4xl mx-auto mb-6 flex flex-wrap items-center justify-between gap-4 no-print bg-[#131722] p-4 rounded-xl border border-white/10 shadow-xl">
        <a href="{{ route('profile') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-gray-300 hover:text-[#e2ff38] transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back to Athlete Profile</span>
        </a>

        <div class="flex items-center gap-3">
            <span class="text-xs text-gray-400 hidden sm:inline">
                <i class="fa-solid fa-circle-info text-[#e2ff38] mr-1"></i> Enable "Background graphics" in print settings
            </span>
            <button 
                type="button" 
                onclick="window.print()" 
                class="bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider px-5 py-2.5 rounded-lg transition-all cursor-pointer flex items-center gap-2 shadow-lg shadow-[#e2ff38]/20"
            >
                <i class="fa-solid fa-print"></i>
                <span>Print Official Invoice</span>
            </button>
        </div>
    </div>

    <!-- Official Full-Page Invoice Container -->
    <div class="invoice-page max-w-4xl mx-auto bg-[#131722] border-2 border-white/15 rounded-2xl p-8 sm:p-12 shadow-2xl relative overflow-hidden">
        
        <!-- Background Gym Watermark -->
        <div class="invoice-watermark">FITNES TRAINING</div>

        <!-- 1. Header Section: Gym Logo & Official Tax Information -->
        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-6 pb-8 border-b-2 border-white/10 relative z-10">
            <!-- Brand Logo & Details -->
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="flex items-center gap-[3px] h-9">
                        <span class="w-[5px] h-4 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[6px] h-8 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[6px] h-6 bg-[#e2ff38] rounded-full"></span>
                        <span class="w-[5px] h-3 bg-[#e2ff38] rounded-full"></span>
                    </div>
                    <div class="flex flex-col leading-none">
                        <span class="font-heading text-3xl font-black tracking-wider text-white">FITNES</span>
                        <span class="text-[10px] tracking-[0.3em] text-[#e2ff38] font-bold uppercase">TRAINING & ATHLETICS</span>
                    </div>
                </div>

                <div class="text-xs text-gray-400 space-y-1">
                    <p><i class="fa-solid fa-location-dot text-[#e2ff38] w-4"></i> 123 Fitness Ave, Workout City, Suite 400</p>
                    <p><i class="fa-solid fa-envelope text-[#e2ff38] w-4"></i> billing@fitnestraining.com &bull; +1 (234) 567-890</p>
                    <p><i class="fa-solid fa-shield-halved text-[#e2ff38] w-4"></i> BIN/Tax ID: <strong class="text-white">TX-88294012</strong> &bull; License: <strong class="text-white">LIC-2024-NY-9021</strong></p>
                </div>
            </div>

            <!-- Invoice Heading & Paid Stamp -->
            <div class="flex flex-col sm:items-end text-left sm:text-right">
                <span class="px-3 py-1 rounded-full bg-[#e2ff38]/10 text-[#e2ff38] text-[10px] font-extrabold uppercase tracking-widest border border-[#e2ff38]/30 inline-block mb-2">
                    Official Tax Invoice
                </span>
                <h1 class="font-heading text-2xl sm:text-3xl font-black text-white tracking-tight">
                    {{ $invoice['id'] }}
                </h1>
                <div class="text-xs text-gray-400 mt-1">
                    Date of Issue: <strong class="text-white">{{ $invoice['date'] }}</strong>
                </div>

                <!-- Green Paid Stamp -->
                <div class="mt-4">
                    <div class="paid-stamp">
                        <i class="fa-solid fa-circle-check mr-1.5 text-base"></i> PAID IN FULL
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Member & Invoice Meta Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-8 border-b border-white/10 relative z-10 text-xs">
            <!-- Billed To -->
            <div class="bg-[#182030] p-5 rounded-xl border border-white/5 space-y-2">
                <div class="flex items-center justify-between pb-2 border-b border-white/10">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Billed To (Athlete)</span>
                    <span class="px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 font-bold text-[9px] uppercase">Active Member</span>
                </div>
                <div class="pt-1">
                    <div class="font-heading text-lg font-bold text-white">{{ $profile['name'] }}</div>
                    <div class="font-mono text-[#e2ff38] font-bold mt-0.5">Gym ID: {{ $profile['gym_id'] }}</div>
                </div>
                <div class="text-gray-300 space-y-1 pt-1">
                    <p><i class="fa-regular fa-envelope text-gray-500 mr-1.5"></i> {{ $profile['email'] }}</p>
                    <p><i class="fa-solid fa-phone text-gray-500 mr-1.5"></i> {{ $profile['phone'] }}</p>
                    <p><i class="fa-solid fa-key text-gray-500 mr-1.5"></i> {{ $profile['locker_number'] }}</p>
                </div>
            </div>

            <!-- Invoice Details -->
            <div class="bg-[#182030] p-5 rounded-xl border border-white/5 space-y-2">
                <div class="flex items-center justify-between pb-2 border-b border-white/10">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Payment Summary</span>
                    <span class="font-mono text-gray-400 text-[10px]">AUTH: {{ $invoice['auth_code'] }}</span>
                </div>
                <div class="space-y-1.5 pt-1 text-gray-300">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Billing Coverage:</span>
                        <span class="font-semibold text-white">{{ $invoice['billing_period'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Payment Method:</span>
                        <span class="font-semibold text-white flex items-center gap-1.5">
                            <i class="fa-brands fa-cc-visa text-blue-400"></i> {{ $invoice['method'] }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Payment Status:</span>
                        <span class="font-bold text-emerald-400 uppercase flex items-center gap-1">
                            <i class="fa-solid fa-circle-check text-xs"></i> Verified & Cleared
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Currency:</span>
                        <span class="font-semibold text-white">USD ($)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Itemized Table -->
        <div class="py-8 border-b-2 border-white/10 relative z-10">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-[#182030] text-gray-400 uppercase text-[10px] tracking-wider border-b border-white/10">
                        <th class="py-3 px-4 font-bold">Item #</th>
                        <th class="py-3 px-4 font-bold">Plan & Description</th>
                        <th class="py-3 px-4 font-bold text-center">Period</th>
                        <th class="py-3 px-4 font-bold text-center">Qty</th>
                        <th class="py-3 px-4 font-bold text-right">Rate</th>
                        <th class="py-3 px-4 font-bold text-right">Tax (6%)</th>
                        <th class="py-3 px-4 font-bold text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-gray-300">
                    <tr>
                        <td class="py-4 px-4 font-mono font-bold text-white align-top">01</td>
                        <td class="py-4 px-4 align-top">
                            <div class="font-bold text-white text-sm">{{ $invoice['plan'] }}</div>
                            <div class="text-gray-400 text-[11px] mt-1 leading-relaxed max-w-md">
                                {{ $invoice['description'] }}
                            </div>
                        </td>
                        <td class="py-4 px-4 text-center align-top text-gray-400">1 Month</td>
                        <td class="py-4 px-4 text-center align-top font-bold text-white">1</td>
                        <td class="py-4 px-4 text-right align-top font-semibold text-white">{{ $invoice['subtotal'] }}</td>
                        <td class="py-4 px-4 text-right align-top text-gray-400">{{ $invoice['tax'] }}</td>
                        <td class="py-4 px-4 text-right align-top font-heading text-sm font-bold text-[#e2ff38]">{{ $invoice['amount'] }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Calculation Breakdown -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-6 pt-6 text-xs">
                <!-- Barcode & Verification Note -->
                <div class="space-y-3">
                    <div class="p-3 bg-[#182030] rounded-xl border border-white/5 inline-block">
                        <div class="h-9 flex items-center justify-between gap-[2px] w-56">
                            @for ($i = 0; $i < 48; $i++)
                                <span class="bg-white h-full {{ $i % 5 == 0 ? 'w-[3px]' : ($i % 3 == 0 ? 'w-[1.5px]' : 'w-[1px]') }}"></span>
                            @endfor
                        </div>
                        <div class="text-[8px] font-mono text-gray-400 tracking-[0.3em] mt-1 text-center">
                            {{ $invoice['id'] }}-VERIFIED-{{ $invoice['auth_code'] }}
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-400 max-w-sm">
                        * Electronic Gym Invoice generated by Fitnes Club Management System. Valid for official tax deductions and employer fitness reimbursement.
                    </p>
                </div>

                <!-- Totals Box -->
                <div class="w-full sm:w-72 bg-[#182030] p-4 rounded-xl border border-white/10 space-y-2">
                    <div class="flex justify-between text-gray-400">
                        <span>Subtotal:</span>
                        <span class="font-semibold text-white">{{ $invoice['subtotal'] }}</span>
                    </div>
                    <div class="flex justify-between text-gray-400">
                        <span>Tax & Maintenance (6%):</span>
                        <span class="font-semibold text-white">{{ $invoice['tax'] }}</span>
                    </div>
                    <div class="flex justify-between text-gray-400">
                        <span>Discount Applied:</span>
                        <span class="font-semibold text-emerald-400">$0.00</span>
                    </div>
                    <div class="flex justify-between text-white font-heading text-lg font-black pt-2 border-t border-white/10">
                        <span>TOTAL PAID:</span>
                        <span class="text-[#e2ff38]">{{ $invoice['amount'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Official Signatory & Footer -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-6 relative z-10 text-xs text-gray-400">
            <div>
                <p class="font-bold text-white mb-0.5">FITNES GYM & WELLNESS ENTERPRISE</p>
                <p class="text-[11px]">All memberships are non-transferable. 24/7 access granted via biometric RFID pass.</p>
            </div>

            <!-- Authorized Signatory -->
            <div class="text-center sm:text-right">
                <div class="h-10 flex items-center justify-center sm:justify-end">
                    <span class="font-heading text-xl italic text-gray-300 tracking-wider font-light">Alex Cox</span>
                </div>
                <div class="border-t border-white/20 pt-1 text-[10px] uppercase font-bold text-gray-400">
                    Authorized Signatory &bull; Chief Athletic Director
                </div>
            </div>
        </div>
    </div>

    <!-- Small Footer -->
    <div class="text-center text-[10px] text-gray-500 py-6 no-print">
        &copy; 2026 FITNES Training Club. All rights reserved.
    </div>

</body>
</html>
