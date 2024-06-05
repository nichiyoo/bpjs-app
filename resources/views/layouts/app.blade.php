<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @stack('styles')
</head>

<body class="overflow-x-hidden font-sans antialiased leading-relaxed bg-neutral-50">
    <div class="flex flex-col md:flex-row md:h-screen">
        <x-sidebar />

        <main class="flex-1 overflow-y-scroll">
            <nav class="py-6 w-content">
                <div class="flex items-start justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-primary">{{ $page }}</h1>
                        <span class="text-sm text-tertiary">{{ now()->translatedFormat('d F Y') }}</span>
                    </div>
                    <x-avatar name="{{ Auth::user()->name }}" size="sm" expand />
                </div>
            </nav>

            <div class="w-content">
                {{ $slot }}
            </div>
        </main>
    </div>

    <!-- Scripts -->
    @stack('scripts')
</body>

</html>
