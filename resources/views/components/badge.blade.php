@props(['variant' => 'primary'])

@php
    $sstyle = match ($variant) {
        'primary' => 'text-primary bg-secondary',
        'success' => 'text-white bg-green-600',
        'danger' => 'text-white bg-danger',
        'warning' => 'text-white bg-warning',
    };
@endphp

<span
    {{ $attributes->merge(['class' => "inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {$sstyle}"]) }}>
    {{ $slot }}
</span>
