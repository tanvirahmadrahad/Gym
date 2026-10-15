/**
 * Fitnes Athletic Web Application - Frontend Scripts
 */

// Dropdown Manager for Top Bar (Language & Currency)
window.toggleTopDropdown = function (menuId, event) {
    if (event) event.stopPropagation();

    const menu = document.getElementById(menuId);
    if (!menu) return;

    // Close other dropdown popovers
    document.querySelectorAll('.dropdown-popover').forEach(el => {
        if (el.id !== menuId) el.classList.add('hidden');
    });

    // Toggle target
    menu.classList.toggle('hidden');
};

// Close dropdowns on outside click
document.addEventListener('click', (e) => {
    if (!e.target.closest('.dropdown-parent')) {
        document.querySelectorAll('.dropdown-popover').forEach(el => {
            el.classList.add('hidden');
        });
    }
});

// Translation Dictionaries (Bengali & Spanish)
const translations = {
    bn: {
        // Navigation & General
        "Home": "হোম",
        "About Us": "আমাদের সম্পর্কে",
        "Pricing": "মূল্য তালিকা",
        "Programs": "প্রোগ্রাম",
        "Schedule": "সময়সূচী",
        "Gallery": "গ্যালারি",
        "Trainers": "ট্রেইনারবৃন্দ",
        "Blog": "ব্লগ",
        "Welcome to Fitnes": "ফিটনেস-এ স্বাগতম",
        "Member Login": "সদস্য লগইন",
        "Login": "লগইন",
        "Logout": "লগআউট",
        "My Gym Profile": "আমার প্রোফাইল",
        "Why Choose Us": "কেন আমাদের বেছে নেবেন",
        "Pricing Plans": "মূল্য প্যাকেজসমূহ",
        "Class Schedule": "ক্লাসের সময়সূচী",
        "Member Stories": "সদস্যদের গল্প",
        "Our Trainers": "আমাদের ট্রেইনারগণ",
        "Latest Insights": "সর্বশেষ আপডেট ও টিপস",
        
        // Buttons & Common Actions
        "Get Started": "শুরু করুন",
        "Join Now": "এখনই যোগ দিন",
        "Select Basic Plan": "বেসিক প্ল্যান নিন",
        "Select Pro Plan": "প্রো প্ল্যান নিন",
        "Select Elite Membership": "এলিট মেম্বারশিপ নিন",
        "Select Plan": "প্ল্যান নির্বাচন করুন",
        "Change Plan": "প্ল্যান পরিবর্তন করুন",
        "Freeze / Pause": "পজ / স্থগিত করুন",
        "Update Info": "তথ্য পরিবর্তন",
        "Save Changes": "সংরক্ষণ করুন",
        "Cancel": "বাতিল",
        "View Receipt": "রশিদ দেখুন",
        "Tax Invoice": "ট্যাক্স চালান",
        "Print Tax Invoice": "ট্যাক্স চালান প্রিন্ট",
        "Print Official Invoice": "অফিসিয়াল ইনভয়েস প্রিন্ট",
        "Print Latest Official Tax Invoice": "সর্বশেষ ট্যাক্স চালান প্রিন্ট করুন",
        "Open Full Tax Invoice": "সম্পূর্ণ ট্যাক্স চালান দেখুন",
        "Close": "বন্ধ করুন",
        "Download / Print": "ডাউনলোড ও প্রিন্ট",
        "Confirm & Pay Now": "নিশ্চিত করে পে করুন",
        "Submit Freeze Request": "স্থগিতের আবেদন জমা দিন",
        "Back to Athlete Profile": "অ্যাথলিট প্রোফাইলে ফিরুন",
        "Change Selected Plan": "নির্বাচিত প্ল্যান পরিবর্তন",
        
        // Pricing & Plans
        "Our Pricing Plans": "আমাদের প্রাইসিং প্ল্যানসমূহ",
        "Monthly": "মাসিক",
        "Yearly": "বার্ষিক",
        "Basic Plan": "বেসিক প্ল্যান",
        "Pro Plan": "প্রো প্ল্যান",
        "Elite Membership": "এলিট মেম্বারশিপ",
        "What you get": "যা যা পাচ্ছেন",
        "MOST POPULAR": "সবচেয়ে জনপ্রিয়",
        "CURRENT ACTIVE PLAN": "বর্তমান সক্রিয় প্ল্যান",
        "SAVE 20%": "২০% ছাড়",
        "/month": "/মাস",
        "/year": "/বছর",
        
        // Athlete Profile
        "Digital Gym Pass": "ডিজিটাল জিম পাস",
        "Athlete Profile Information": "অ্যাথলিট প্রোফাইল তথ্য",
        "Full Name": "পূর্ণ নাম",
        "Athlete Full Name": "অ্যাথলিটের পুরো নাম",
        "Email Address": "ইমেইল ঠিকানা",
        "Phone Number": "ফোন নম্বর",
        "Phone Number & Country Code": "ফোন নম্বর ও দেশের কোড",
        "Emergency Contact": "জরুরি যোগাযোগ",
        "Emergency Contact & Relationship": "জরুরি যোগাযোগ ও সম্পর্ক",
        "Blood Group": "রক্তের গ্রুপ",
        "Body Measurements": "শারীরিক পরিমাপ",
        "Bodyweight (kg)": "শরীরের ওজন (কেজি)",
        "Height": "উচ্চতা",
        "Assigned Locker": "বরাদ্দকৃত লকার",
        "Assigned Coach / Trainer": "দায়িত্বপ্রাপ্ত কোচ / ট্রেইনার",
        "Primary Athletic Objective": "প্রধান শারীরিক লক্ষ্য",
        "Current Gym Membership & Active Package": "বর্তমান জিম মেম্বারশিপ ও প্যাকেজ",
        "Included Privileges & Gym Access": "সুবিধাসমূহ ও জিম অ্যাক্সেস",
        "Monthly Workout Consistency": "মাসিক ওয়ার্কআউট ধারাবাহিকতা",
        "Total Lifetime Visits:": "মোট পরিদর্শনের সংখ্যা:",
        "Active Streak:": "অ্যাক্টিভ স্ট্রিক:",
        "Top Focus:": "মূল ফোকাস:",
        "Past Billing Records & Payment History": "পূর্ববর্তী বিলিং রেকর্ড ও পেমেন্ট হিস্ট্রি",
        "Invoice ID": "ইনভয়েস আইডি",
        "Billing Date": "বিলিং তারিখ",
        "Plan / Service Description": "প্ল্যান ও সেবার বিবরণ",
        "Amount": "পরিমাণ",
        "Payment Method": "পেমেন্ট মাধ্যম",
        "Status": "স্ট্যাটাস",
        "Receipt": "রশিদ",
        "Status:": "স্ট্যাটাস:",
        "Next Billing Date:": "পরবর্তী বিলিং তারিখ:",
        "Payment Card:": "পেমেন্ট কার্ড:",
        "Auto-Renew": "অটো-রিনিউ",
        "Paid": "পরিশোধিত",
        "ACTIVE": "সক্রিয়",
        "PAID IN FULL": "সম্পূর্ণ পরিশোধিত",
        "Due Now": "এখন প্রদেয়",
        "Selected Package": "নির্বাচিত প্যাকেজ",
        "Select Payment Method": "পেমেন্ট পদ্ধতি নির্বাচন করুন",
        "Pause / Freeze Membership": "মেম্বারশিপ স্থগিত / ফ্রিজ করুন",
        "Freeze Start Date": "স্থগিত শুরুর তারিখ",
        "Freeze Duration": "স্থগিতের সময়কাল",
        "Primary Reason for Pause": "স্থগিতের প্রধান কারণ",
        "Additional Comments / Notes (Optional)": "অতিরিক্ত মন্তব্য / নোট (ঐচ্ছিক)"
    },
    es: {
        // Navigation & General
        "Home": "Inicio",
        "About Us": "Nosotros",
        "Pricing": "Precios",
        "Programs": "Programas",
        "Schedule": "Horarios",
        "Gallery": "Galería",
        "Trainers": "Entrenadores",
        "Blog": "Blog",
        "Welcome to Fitnes": "Bienvenido a Fitnes",
        "Member Login": "Acceso Miembros",
        "Login": "Iniciar Sesión",
        "Logout": "Cerrar Sesión",
        "My Gym Profile": "Mi Perfil",
        "Why Choose Us": "Por Qué Elegirnos",
        "Pricing Plans": "Planes de Precios",
        "Class Schedule": "Horario de Clases",
        "Member Stories": "Historias de Miembros",
        "Our Trainers": "Nuestros Entrenadores",
        "Latest Insights": "Últimas Novedades",
        
        // Buttons
        "Get Started": "Comenzar",
        "Join Now": "Únete Ahora",
        "Select Basic Plan": "Elegir Plan Básico",
        "Select Pro Plan": "Elegir Plan Pro",
        "Select Elite Membership": "Elegir Membresía Elite",
        "Select Plan": "Elegir Plan",
        "Change Plan": "Cambiar Plan",
        "Freeze / Pause": "Pausar Membresía",
        "Update Info": "Actualizar Datos",
        "Save Changes": "Guardar Cambios",
        "Cancel": "Cancelar",
        "View Receipt": "Ver Recibo",
        "Tax Invoice": "Factura",
        "Print Tax Invoice": "Imprimir Factura",
        "Print Official Invoice": "Imprimir Factura Oficial",
        "Print Latest Official Tax Invoice": "Imprimir Última Factura Oficial",
        "Open Full Tax Invoice": "Abrir Factura Completa",
        "Close": "Cerrar",
        "Download / Print": "Descargar / Imprimir",
        "Confirm & Pay Now": "Confirmar y Pagar",
        "Submit Freeze Request": "Enviar Solicitud de Pausa",
        "Back to Athlete Profile": "Volver al Perfil de Atleta",
        
        // Pricing & Plans
        "Our Pricing Plans": "Nuestros Planes de Precios",
        "Monthly": "Mensual",
        "Yearly": "Anual",
        "Basic Plan": "Plan Básico",
        "Pro Plan": "Plan Pro",
        "Elite Membership": "Membresía Elite",
        "What you get": "Lo que incluye",
        "MOST POPULAR": "MÁS POPULAR",
        "CURRENT ACTIVE PLAN": "PLAN ACTIVO ACTUAL",
        "SAVE 20%": "AHORRA 20%",
        "/month": "/mes",
        "/year": "/año",
        
        // Profile
        "Digital Gym Pass": "Pase Digital de Gimnasio",
        "Athlete Profile Information": "Información del Atleta",
        "Full Name": "Nombre Completo",
        "Athlete Full Name": "Nombre Completo del Atleta",
        "Email Address": "Correo Electrónico",
        "Phone Number": "Teléfono",
        "Phone Number & Country Code": "Teléfono y Código de País",
        "Emergency Contact": "Contacto de Emergencia",
        "Emergency Contact & Relationship": "Contacto de Emergencia y Relación",
        "Blood Group": "Grupo Sanguíneo",
        "Body Measurements": "Medidas Corporales",
        "Bodyweight (kg)": "Peso Corporal (kg)",
        "Height": "Altura",
        "Assigned Locker": "Casillero Asignado",
        "Assigned Coach / Trainer": "Entrenador Asignado",
        "Primary Athletic Objective": "Objetivo Principal de Entrenamiento",
        "Current Gym Membership & Active Package": "Membresía Actual y Paquete Activo",
        "Included Privileges & Gym Access": "Privilegios Incluidos y Acceso",
        "Monthly Workout Consistency": "Constancia de Entrenamiento Mensual",
        "Total Lifetime Visits:": "Visitas Totales:",
        "Active Streak:": "Racha Activa:",
        "Top Focus:": "Enfoque Principal:",
        "Past Billing Records & Payment History": "Historial de Pagos y Facturación",
        "Invoice ID": "ID de Factura",
        "Billing Date": "Fecha",
        "Plan / Service Description": "Descripción del Servicio",
        "Amount": "Monto",
        "Payment Method": "Método de Pago",
        "Status": "Estado",
        "Receipt": "Recibo",
        "Status:": "Estado:",
        "Next Billing Date:": "Próxima Fecha de Cobro:",
        "Payment Card:": "Tarjeta de Pago:",
        "Auto-Renew": "Auto-Renovación",
        "Paid": "Pagado",
        "ACTIVE": "ACTIVO",
        "PAID IN FULL": "PAGADO COMPLETO",
        "Due Now": "Total a Pagar",
        "Selected Package": "Paquete Seleccionado",
        "Select Payment Method": "Seleccionar Método de Pago",
        "Pause / Freeze Membership": "Pausar / Congelar Membresía",
        "Freeze Start Date": "Fecha de Inicio de Pausa",
        "Freeze Duration": "Duración de Pausa",
        "Primary Reason for Pause": "Razón de Pausa"
    }
};

// Traverse and translate text nodes
function translateDOM(langCode) {
    const dict = translations[langCode];

    const walk = (node) => {
        if (node.nodeType === Node.TEXT_NODE) {
            const originalText = node.nodeValue.trim();
            if (originalText && originalText.length > 1) {
                // Check if we need to restore English
                if (langCode === 'en') {
                    if (node.parentElement && node.parentElement.dataset.fitnesOrigText) {
                        node.nodeValue = node.nodeValue.replace(originalText, node.parentElement.dataset.fitnesOrigText);
                    }
                } else if (dict && dict[originalText]) {
                    if (node.parentElement && !node.parentElement.dataset.fitnesOrigText) {
                        node.parentElement.dataset.fitnesOrigText = originalText;
                    }
                    node.nodeValue = node.nodeValue.replace(originalText, dict[originalText]);
                }
            }
        } else if (node.nodeType === Node.ELEMENT_NODE) {
            // Skip scripts and styles
            if (node.tagName === 'SCRIPT' || node.tagName === 'STYLE') return;

            // Handle direct element text or children
            for (let child of node.childNodes) {
                walk(child);
            }
        }
    };

    walk(document.body);
}

// Global Language Switcher
window.changeLanguage = function (langCode, langName) {
    const label = document.getElementById('current-lang-label');
    if (label) label.textContent = langName;

    localStorage.setItem('selected_lang', langCode);
    localStorage.setItem('selected_lang_name', langName);

    // Apply translations in DOM
    translateDOM(langCode);

    // Close any open popovers
    document.querySelectorAll('.dropdown-popover').forEach(el => el.classList.add('hidden'));
};

// Global Currency Switcher
window.changeCurrency = function (symbol, code) {
    const label = document.getElementById('current-currency-label');
    if (label) label.textContent = `${symbol}-${code}`;

    localStorage.setItem('selected_currency', code);
    localStorage.setItem('selected_currency_symbol', symbol);

    const rates = {
        'USD': 1,
        'EUR': 0.92,
        'BDT': 125
    };
    const rate = rates[code] || 1;

    // Convert prices across pricing section
    document.querySelectorAll('.price-amount').forEach(el => {
        let base = el.getAttribute('data-base-price');
        if (!base) {
            base = parseInt(el.textContent.replace(/[^0-9]/g, '')) || 29;
            el.setAttribute('data-base-price', base);
        }
        const converted = Math.round(base * rate);
        el.textContent = `${symbol}${converted.toLocaleString()}`;
    });

    // Convert prices in change-plan modal
    document.querySelectorAll('.plan-modal-price').forEach(el => {
        let base = el.getAttribute('data-base-price');
        if (!base) {
            base = parseInt(el.textContent.replace(/[^0-9]/g, '')) || 29;
            el.setAttribute('data-base-price', base);
        }
        const converted = Math.round(base * rate);
        el.textContent = `${symbol}${converted.toLocaleString()}`;
    });

    // Close any open popovers
    document.querySelectorAll('.dropdown-popover').forEach(el => el.classList.add('hidden'));
};

document.addEventListener('DOMContentLoaded', () => {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetUrl = new URL(this.href, window.location.origin);
            if (targetUrl.pathname === window.location.pathname && targetUrl.hash) {
                const targetEl = document.querySelector(targetUrl.hash);
                if (targetEl) {
                    e.preventDefault();
                    targetEl.scrollIntoView({ behavior: 'smooth' });
                    history.pushState(null, '', targetUrl.hash);
                }
            }
        });
    });

    if (window.location.hash) {
        setTimeout(() => {
            const el = document.querySelector(window.location.hash);
            if (el) el.scrollIntoView({ behavior: 'smooth' });
        }, 200);
    }

    // Restore saved language preference
    const savedLang = localStorage.getItem('selected_lang');
    const savedLangName = localStorage.getItem('selected_lang_name');
    if (savedLang && savedLangName) {
        const label = document.getElementById('current-lang-label');
        if (label) label.textContent = savedLangName;
        if (savedLang !== 'en') {
            translateDOM(savedLang);
        }
    }

    // Restore saved currency preference
    const savedCurrency = localStorage.getItem('selected_currency');
    const savedSymbol = localStorage.getItem('selected_currency_symbol');
    if (savedCurrency && savedSymbol) {
        window.changeCurrency(savedSymbol, savedCurrency);
    }
});
