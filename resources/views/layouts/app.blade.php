<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'FITNES - We Help To Grow Your Fitness' }}</title>

    <!-- Google Fonts: Oswald & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 Icons & CDN Preconnect -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0a0c10] text-[#f3f4f6] antialiased selection:bg-[#e2ff38] selection:text-black">
    <div class="min-h-screen flex flex-col">
        @include('components.top-bar')
        @include('components.navbar')

        <main class="flex-1">
            @yield('content')
        </main>

        @include('components.footer')
        @include('components.login-modal')
    </div>
</body>
</html>
