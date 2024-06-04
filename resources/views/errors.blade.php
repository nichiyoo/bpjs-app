{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{ $code }}</h1>
    <p>{{ $message }}</p>
</body>

</html> --}}

<x-guest-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="flex flex-col items-center justify-center space-y-4 text-center">
        <h1 class="text-5xl font-bold text-primary">{{ $code }}</h1>
        <p class="text-neutral-500">
            {{ $message }},
            {{ __('Silahkan hubungi admin untuk mendapatkan bantuan') }}
        </p>

        <a href="{{ route('landing') }}">
            <x-button variant="primary">
                {{ __('Kembali') }}
            </x-button>
        </a>
    </div>
</x-guest-layout>
