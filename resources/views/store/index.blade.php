@extends('layouts.app', ['title' => 'FITNES Pro Store - Supplements & Competition Gear'])

@section('content')
<section class="py-12 sm:py-16 bg-[#0a0c10] min-h-screen relative overflow-hidden">
    <!-- Ambient Glow -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[300px] bg-[#e2ff38]/5 rounded-full blur-[140px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">

        <!-- Store Header & Banner -->
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="px-3.5 py-1 rounded-full bg-[#e2ff38]/10 text-[#e2ff38] text-[10px] sm:text-xs font-black uppercase tracking-widest border border-[#e2ff38]/30 inline-block mb-3">
                OFFICIAL ATHLETE PRO SHOP
            </span>
            <h1 class="font-heading text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight uppercase leading-none">
                Fuel Your <span class="text-[#e2ff38]">Performance</span>
            </h1>
            <p class="text-gray-400 text-xs sm:text-sm mt-3 leading-relaxed">
                Lab-tested sports nutrition, Creapure creatine, isolate protein, and competition-grade powerlifting gear crafted for maximum gains.
            </p>

            <!-- Member Discount Alert -->
            @auth
                <div class="mt-6 inline-flex items-center gap-2.5 px-4 py-2 rounded-xl bg-gradient-to-r from-emerald-500/10 via-[#e2ff38]/10 to-emerald-500/10 border border-[#e2ff38]/30 text-xs font-bold text-[#e2ff38] shadow-lg">
                    <i class="fa-solid fa-crown text-sm"></i>
                    <span>Member Exclusive: <strong>15% Athlete Discount</strong> applied automatically to your cart!</span>
                </div>
            @endauth
        </div>

        <!-- Filter Controls & Search -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-10 pb-6 border-b border-white/10">
            <!-- Categories -->
            <div class="flex flex-wrap items-center gap-2">
                @foreach ($categories as $cat)
                    <a 
                        href="{{ route('store.index', ['category' => $cat]) }}" 
                        class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition-all {{ $category === $cat ? 'bg-[#e2ff38] text-black shadow-md shadow-[#e2ff38]/20' : 'bg-[#131722] text-gray-300 hover:bg-white/10 hover:text-white border border-white/10' }}"
                    >
                        {{ $cat }}
                    </a>
                @endforeach
            </div>

            <!-- Search & Floating Cart Trigger Button -->
            <div class="flex items-center gap-3 w-full md:w-auto">
                <form method="GET" action="{{ route('store.index') }}" class="flex-1 md:w-64 relative">
                    <input type="hidden" name="category" value="{{ $category }}">
                    <input 
                        type="text" 
                        name="q" 
                        value="{{ $search }}" 
                        placeholder="Search supplements, gear..." 
                        class="w-full bg-[#131722] border border-white/15 rounded-xl pl-9 pr-4 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#e2ff38]"
                    >
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-xs text-gray-400"></i>
                </form>

                <!-- Cart Button -->
                <button 
                    type="button" 
                    onclick="openCartDrawer()"
                    class="bg-[#131722] hover:bg-[#e2ff38] text-white hover:text-black border border-white/15 hover:border-[#e2ff38] px-4 py-2 rounded-xl text-xs font-bold flex items-center gap-2 transition-all cursor-pointer relative"
                    aria-label="View Shopping Cart"
                >
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span class="hidden sm:inline">Cart</span>
                    <span id="cart-counter-badge" class="w-5 h-5 rounded-full bg-[#ff5e36] text-white text-[10px] font-black flex items-center justify-center">0</span>
                </button>
            </div>
        </div>

        <!-- Product Grid (Compact, strictly uniform size across all screen widths) -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3.5 sm:gap-4 lg:gap-5">
            @forelse ($products as $product)
                <div class="bg-[#131722] border border-white/10 rounded-xl sm:rounded-2xl overflow-hidden flex flex-col justify-between hover:border-[#e2ff38]/50 hover:-translate-y-1 transition-all duration-300 group shadow-lg flex-1">
                    <!-- Uniform Fixed Image Container (Strictly 160px height on mobile, 180px on desktop) -->
                    <div class="relative h-36 sm:h-44 w-full bg-[#182030] overflow-hidden shrink-0">
                        <img 
                            src="{{ $product->image }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 block"
                            loading="lazy"
                            decoding="async"
                        >
                        <!-- Badge -->
                        @if ($product->badge)
                            <span class="absolute top-2 left-2 sm:top-2.5 sm:left-2.5 bg-[#e2ff38] text-black font-black text-[8px] sm:text-[9px] uppercase tracking-wider px-2 py-0.5 rounded-full shadow-md">
                                {{ $product->badge }}
                            </span>
                        @endif

                        <span class="absolute top-2 right-2 sm:top-2.5 sm:right-2.5 bg-black/75 backdrop-blur-md text-white text-[9px] font-bold px-1.5 py-0.5 rounded flex items-center gap-1 border border-white/10">
                            <i class="fa-solid fa-star text-amber-400 text-[8px]"></i>
                            {{ $product->rating }}
                        </span>
                    </div>

                    <!-- Details Area with Uniform Line Heights -->
                    <div class="p-3 sm:p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[9px] font-bold uppercase tracking-wider text-gray-500 block mb-0.5 truncate">
                                {{ $product->category }}
                            </span>
                            <h3 class="font-heading text-xs sm:text-sm font-bold text-white group-hover:text-[#e2ff38] transition-colors leading-snug line-clamp-2 min-h-[2rem] sm:min-h-[2.25rem]">
                                {{ $product->name }}
                            </h3>
                            <p class="text-[10px] sm:text-[11px] text-gray-400 mt-1 line-clamp-2 leading-relaxed min-h-[2rem] sm:min-h-[2.25rem]">
                                {{ $product->description }}
                            </p>
                        </div>

                        <!-- Price and Add to Cart Row (Pinned to bottom of card) -->
                        <div class="mt-3 pt-2.5 border-t border-white/10 flex items-center justify-between gap-1.5">
                            <div class="min-w-0">
                                <span class="text-[8px] sm:text-[9px] text-gray-400 block uppercase font-bold tracking-tight">Athlete Price</span>
                                <div class="flex items-baseline gap-1 flex-wrap">
                                    <span class="font-heading text-sm sm:text-base font-black text-[#e2ff38]">
                                        ${{ number_format($product->discount_price ?? $product->price, 2) }}
                                    </span>
                                    @if ($product->discount_price)
                                        <span class="text-[10px] text-gray-500 line-through">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <button 
                                type="button" 
                                onclick="addToCart({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->discount_price ?? $product->price }}, '{{ $product->image }}')"
                                class="bg-white/5 hover:bg-[#e2ff38] text-white hover:text-black border border-white/15 hover:border-[#e2ff38] w-8 h-8 rounded-lg flex items-center justify-center transition-all cursor-pointer shadow shrink-0"
                                title="Add to Cart"
                                aria-label="Add {{ $product->name }} to cart"
                            >
                                <i class="fa-solid fa-plus text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-[#131722] rounded-2xl border border-white/10">
                    <i class="fa-solid fa-box-open text-4xl text-gray-500 mb-3 block"></i>
                    <h3 class="font-heading text-xl font-bold text-white">No products found</h3>
                    <p class="text-xs text-gray-400 mt-1">Try clearing your search query or filter by a different category.</p>
                    <a href="{{ route('store.index') }}" class="inline-block mt-4 text-xs font-bold text-[#e2ff38] hover:underline">View All Items</a>
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- Slide-out Shopping Cart Drawer -->
<div id="cart-backdrop" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300"></div>

<aside 
    id="cart-drawer" 
    class="fixed top-0 right-0 h-full w-full sm:w-[440px] bg-[#10141e] border-l border-white/10 z-50 p-6 flex flex-col justify-between transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl"
    aria-label="Shopping Cart Drawer"
>
    <!-- Drawer Top -->
    <div>
        <div class="flex items-center justify-between pb-5 border-b border-white/10">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-cart-shopping text-[#e2ff38]"></i>
                <h3 class="font-heading text-lg font-black text-white uppercase tracking-wider">Your Gym Cart</h3>
            </div>
            <button 
                type="button" 
                onclick="closeCartDrawer()"
                class="w-8 h-8 rounded-lg bg-white/5 hover:bg-white/10 text-gray-300 flex items-center justify-center text-sm"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Items Container -->
        <div id="cart-items-container" class="py-4 space-y-3 max-h-[50vh] overflow-y-auto">
            <!-- Populated via JavaScript -->
        </div>

        <div id="cart-empty-message" class="text-center py-12 text-gray-400 hidden">
            <i class="fa-solid fa-cart-arrow-down text-3xl text-gray-600 mb-2 block"></i>
            <p class="text-xs">Your cart is currently empty.</p>
        </div>
    </div>

    <!-- Drawer Bottom / Checkout -->
    <div class="pt-4 border-t border-white/10 space-y-3">
        <div class="space-y-1.5 text-xs text-gray-400">
            <div class="flex justify-between">
                <span>Subtotal:</span>
                <span id="cart-subtotal" class="font-semibold text-white">$0.00</span>
            </div>
            <div class="flex justify-between text-emerald-400">
                <span>Athlete Privilege (15% Off):</span>
                <span id="cart-discount">-$0.00</span>
            </div>
            <div class="flex justify-between text-base font-heading font-black text-white pt-2 border-t border-white/10">
                <span>TOTAL DUE:</span>
                <span id="cart-total" class="text-[#e2ff38]">$0.00</span>
            </div>
        </div>

        <button 
            type="button" 
            onclick="openStoreCheckoutModal()"
            id="cart-checkout-btn"
            class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#e2ff38]/20 flex items-center justify-center gap-2"
        >
            <i class="fa-solid fa-lock text-xs"></i>
            <span>Proceed to Secure Checkout</span>
        </button>
    </div>
</aside>

<!-- Store Checkout Modal (bKash / Nagad / Visa Payment Simulation) -->
<div id="store-checkout-modal" class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md hidden items-center justify-center p-3 sm:p-4">
    <div class="bg-[#131722] border border-white/15 rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative max-h-[92vh] overflow-y-auto">
        <button type="button" onclick="closeStoreCheckoutModal()" class="absolute top-5 right-5 text-gray-400 hover:text-white text-lg cursor-pointer w-8 h-8 rounded-full bg-white/5 flex items-center justify-center">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="mb-6">
            <span class="text-[10px] font-bold text-[#e2ff38] uppercase tracking-wider">FITNES PRO STORE CHECKOUT</span>
            <h3 class="font-heading text-xl font-bold text-white mt-1">Complete Your Order</h3>
            <p class="text-xs text-gray-400">Select your preferred local or international payment gateway.</p>
        </div>

        <div class="p-3.5 rounded-xl bg-[#182030] border border-white/10 mb-4 flex justify-between items-center text-xs">
            <span class="text-gray-300 font-bold">Total Amount to Pay:</span>
            <span id="modal-checkout-total" class="font-heading text-2xl font-black text-[#e2ff38]">$0.00</span>
        </div>

        <!-- Payment Gateway Options Tabs -->
        <div class="space-y-3 mb-6">
            <!-- bKash -->
            <label class="p-3.5 rounded-xl bg-[#182030] border border-[#e2136e]/40 hover:border-[#e2136e] flex items-center justify-between cursor-pointer transition-colors block">
                <div class="flex items-center gap-3">
                    <input type="radio" name="store_payment_method" value="bKash Mobile Banking" checked onchange="selectGatewayTab('bkash')" class="accent-[#e2136e]">
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-0.5 rounded bg-[#e2136e] text-white font-extrabold text-[10px]">bKash</span>
                        <span class="text-xs font-bold text-white">bKash Direct Gateway</span>
                    </div>
                </div>
                <span class="text-[10px] text-gray-400">Instant</span>
            </label>

            <!-- Nagad -->
            <label class="p-3.5 rounded-xl bg-[#182030] border border-[#f7941d]/40 hover:border-[#f7941d] flex items-center justify-between cursor-pointer transition-colors block">
                <div class="flex items-center gap-3">
                    <input type="radio" name="store_payment_method" value="Nagad Mobile Banking" onchange="selectGatewayTab('nagad')" class="accent-[#f7941d]">
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-0.5 rounded bg-[#f7941d] text-white font-extrabold text-[10px]">Nagad</span>
                        <span class="text-xs font-bold text-white">Nagad Digital Payment</span>
                    </div>
                </div>
                <span class="text-[10px] text-gray-400">Instant</span>
            </label>

            <!-- Card / Counter -->
            <label class="p-3.5 rounded-xl bg-[#182030] border border-white/10 hover:border-[#e2ff38] flex items-center justify-between cursor-pointer transition-colors block">
                <div class="flex items-center gap-3">
                    <input type="radio" name="store_payment_method" value="Visa / Mastercard" onchange="selectGatewayTab('card')" class="accent-[#e2ff38]">
                    <div class="flex items-center gap-2">
                        <i class="fa-brands fa-cc-visa text-blue-400 text-lg"></i>
                        <span class="text-xs font-bold text-white">Credit / Debit Card</span>
                    </div>
                </div>
                <span class="text-[10px] text-gray-400">Visa/Mastercard</span>
            </label>
        </div>

        <!-- bKash Simulation Form Container -->
        <div id="bkash-input-section" class="p-4 rounded-xl bg-gradient-to-b from-[#e2136e]/10 to-transparent border border-[#e2136e]/30 space-y-3 mb-6">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-[#e2136e]">bKash Payment Gateway</span>
                <span class="text-[10px] text-gray-400">Merchant: FITNES CLUB</span>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 mb-1">Your bKash Account Number</label>
                <input type="text" id="bkash-account-number" placeholder="017XXXXXXXX" value="01712345678" class="w-full bg-[#10141e] border border-white/15 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2136e]">
            </div>
            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 mb-1">bKash 5-Digit PIN</label>
                <input type="password" id="bkash-pin" placeholder="•••••" value="12345" class="w-full bg-[#10141e] border border-white/15 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2136e]">
            </div>
        </div>

        <!-- Submit Button -->
        <form id="store-order-form" method="POST" action="{{ route('store.checkout') }}">
            @csrf
            <input type="hidden" name="items" id="form-order-items" value="">
            <input type="hidden" name="total_amount" id="form-order-total" value="0">
            <input type="hidden" name="payment_method" id="form-order-method" value="bKash Mobile Banking">
            <input type="hidden" name="trx_id" id="form-order-trx" value="">

            <button 
                type="button" 
                onclick="submitStoreOrder()"
                class="w-full bg-[#e2ff38] hover:bg-[#d0ee27] text-black font-extrabold text-xs uppercase tracking-wider py-3.5 rounded-xl transition-all cursor-pointer shadow-lg shadow-[#e2ff38]/20 flex items-center justify-center gap-2"
            >
                <i class="fa-solid fa-shield-halved"></i>
                <span>Confirm Payment & Place Order</span>
            </button>
        </form>
    </div>
</div>

<script>
// Cart state in localStorage
let cart = JSON.parse(localStorage.getItem('fitnes_gym_cart') || '[]');

function saveCart() {
    localStorage.setItem('fitnes_gym_cart', JSON.stringify(cart));
    renderCart();
}

function addToCart(id, name, price, image) {
    const existing = cart.find(item => item.id === id);
    if (existing) {
        existing.qty += 1;
    } else {
        cart.push({ id, name, price, image, qty: 1 });
    }
    saveCart();
    openCartDrawer();
}

function updateQty(id, delta) {
    const item = cart.find(i => i.id === id);
    if (!item) return;
    item.qty += delta;
    if (item.qty <= 0) {
        cart = cart.filter(i => i.id !== id);
    }
    saveCart();
}

function removeItem(id) {
    cart = cart.filter(i => i.id !== id);
    saveCart();
}

function renderCart() {
    const container = document.getElementById('cart-items-container');
    const badge = document.getElementById('cart-counter-badge');
    const emptyMsg = document.getElementById('cart-empty-message');
    const subtotalEl = document.getElementById('cart-subtotal');
    const discountEl = document.getElementById('cart-discount');
    const totalEl = document.getElementById('cart-total');
    const checkoutBtn = document.getElementById('cart-checkout-btn');

    if (!container) return;

    const totalCount = cart.reduce((acc, item) => acc + item.qty, 0);
    badge.textContent = totalCount;

    if (cart.length === 0) {
        container.innerHTML = '';
        emptyMsg.classList.remove('hidden');
        subtotalEl.textContent = '$0.00';
        discountEl.textContent = '-$0.00';
        totalEl.textContent = '$0.00';
        checkoutBtn.disabled = true;
        checkoutBtn.classList.add('opacity-50', 'pointer-events-none');
        return;
    }

    emptyMsg.classList.add('hidden');
    checkoutBtn.disabled = false;
    checkoutBtn.classList.remove('opacity-50', 'pointer-events-none');

    let subtotal = 0;
    container.innerHTML = cart.map(item => {
        const itemTotal = item.price * item.qty;
        subtotal += itemTotal;
        return `
            <div class="p-3 bg-[#161a24] border border-white/5 rounded-xl flex items-center justify-between gap-3">
                <img src="${item.image}" alt="${item.name}" class="w-12 h-12 rounded-lg object-cover">
                <div class="flex-1 min-w-0">
                    <h5 class="text-xs font-bold text-white truncate">${item.name}</h5>
                    <span class="text-xs font-mono font-bold text-[#e2ff38]">$${item.price.toFixed(2)}</span>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="updateQty(${item.id}, -1)" class="w-6 h-6 rounded bg-white/5 hover:bg-white/10 text-white flex items-center justify-center text-xs">-</button>
                    <span class="text-xs font-bold text-white">${item.qty}</span>
                    <button type="button" onclick="updateQty(${item.id}, 1)" class="w-6 h-6 rounded bg-white/5 hover:bg-white/10 text-white flex items-center justify-center text-xs">+</button>
                    <button type="button" onclick="removeItem(${item.id})" class="text-gray-500 hover:text-rose-400 ml-1 text-xs"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        `;
    }).join('');

    const discount = subtotal * 0.15; // 15% athlete discount
    const finalTotal = subtotal - discount;

    subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
    discountEl.textContent = `-$${discount.toFixed(2)}`;
    totalEl.textContent = `$${finalTotal.toFixed(2)}`;
    document.getElementById('modal-checkout-total').textContent = `$${finalTotal.toFixed(2)}`;
}

function openCartDrawer() {
    const backdrop = document.getElementById('cart-backdrop');
    const drawer = document.getElementById('cart-drawer');
    backdrop.classList.remove('hidden');
    setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
    drawer.classList.remove('translate-x-full');
}

function closeCartDrawer() {
    const backdrop = document.getElementById('cart-backdrop');
    const drawer = document.getElementById('cart-drawer');
    backdrop.classList.add('opacity-0');
    drawer.classList.add('translate-x-full');
    setTimeout(() => backdrop.classList.add('hidden'), 300);
}

document.getElementById('cart-backdrop').addEventListener('click', closeCartDrawer);

function openStoreCheckoutModal() {
    closeCartDrawer();
    const modal = document.getElementById('store-checkout-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeStoreCheckoutModal() {
    const modal = document.getElementById('store-checkout-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function selectGatewayTab(gw) {
    const section = document.getElementById('bkash-input-section');
    if (gw === 'bkash') {
        section.classList.remove('hidden');
        section.innerHTML = `
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-[#e2136e]">bKash Payment Gateway</span>
                <span class="text-[10px] text-gray-400">Merchant: FITNES CLUB</span>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 mb-1">Your bKash Account Number</label>
                <input type="text" id="bkash-account-number" placeholder="017XXXXXXXX" value="01712345678" class="w-full bg-[#10141e] border border-white/15 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2136e]">
            </div>
            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 mb-1">bKash 5-Digit PIN</label>
                <input type="password" id="bkash-pin" placeholder="•••••" value="12345" class="w-full bg-[#10141e] border border-white/15 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#e2136e]">
            </div>
        `;
    } else if (gw === 'nagad') {
        section.classList.remove('hidden');
        section.innerHTML = `
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-[#f7941d]">Nagad Payment Gateway</span>
                <span class="text-[10px] text-gray-400">Merchant: FITNES CLUB</span>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 mb-1">Your Nagad Mobile Account</label>
                <input type="text" id="nagad-account-number" placeholder="018XXXXXXXX" value="01812345678" class="w-full bg-[#10141e] border border-white/15 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#f7941d]">
            </div>
            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 mb-1">Nagad 4-Digit PIN</label>
                <input type="password" id="nagad-pin" placeholder="••••" value="1234" class="w-full bg-[#10141e] border border-white/15 rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-[#f7941d]">
            </div>
        `;
    } else {
        section.classList.remove('hidden');
        section.innerHTML = `
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-blue-400">Credit / Debit Card</span>
                <span class="text-[10px] text-gray-400">256-bit SSL</span>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-bold text-gray-400 mb-1">Card Number</label>
                <input type="text" value="•••• •••• •••• 4242" readonly class="w-full bg-[#10141e] border border-white/15 rounded-lg px-3 py-2 text-xs text-white">
            </div>
        `;
    }
}

function submitStoreOrder() {
    const selectedMethod = document.querySelector('input[name="store_payment_method"]:checked').value;
    const subtotal = cart.reduce((acc, i) => acc + (i.price * i.qty), 0);
    const finalTotal = subtotal * 0.85;

    let prefix = 'TRX';
    if (selectedMethod.includes('bKash')) prefix = 'BKASH';
    else if (selectedMethod.includes('Nagad')) prefix = 'NAGAD';
    else if (selectedMethod.includes('Visa')) prefix = 'CARD';

    const trxId = prefix + '-' + Math.floor(100000 + Math.random() * 900000);

    document.getElementById('form-order-items').value = JSON.stringify(cart);
    document.getElementById('form-order-total').value = finalTotal.toFixed(2);
    document.getElementById('form-order-method').value = selectedMethod;
    document.getElementById('form-order-trx').value = trxId;

    // Clear cart on checkout
    localStorage.removeItem('fitnes_gym_cart');

    document.getElementById('store-order-form').submit();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', renderCart);
</script>
@endsection
