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

<body class="font-sans antialiased">
    <div class="flex flex-col md:flex-row md:h-screen">
        <x-sidebar />

        <main class="flex-1 w-content">
            <nav class="py-6">
                <div class="flex items-start justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-primary">{{ $page }}</h1>
                        <span class="text-sm text-tertiary">{{ date('d M Y') }}</span>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-medium text-primary">{{ Auth::user()->name }}</span>
                        <img class="w-10 h-10 rounded-full"
                            src="{{ 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}"
                            alt="{{ Auth::user()->name }}">
                    </div>
                </div>
            </nav>

            {{ $slot }}
        </main>
    </div>

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

    <!-- Scripts -->
    @stack('scripts')
</body>

</html>
