@props(['size' => 'sm', 'variant' => 'default'])

@php
    $iclass = match ($size) {
        'sm' => 'w-10',
        'md' => 'w-14',
        'lg' => 'w-16',
    };

    $sclass = match ($size) {
        'sm' => 'text-lg',
        'md' => 'text-2xl',
        'lg' => 'text-3xl',
    };

    $svariant = match ($variant) {
        'default' => 'text-primary',
        'invert' => 'text-white',
    };
@endphp

<div class="flex items-center space-x-2">
    <img src="{{ asset('images/logo.svg') }}" alt="Logo Badan Pusat Statistik Kabupaten Indragiri Hulu"
        class="{{ $iclass }}" width="100%" height="100%" />
    <span class="font-bold {{ $sclass }} {{ $svariant }}">BPS INHU</span>
</div>
