@props(['name' => '', 'size' => 'md', 'expand' => false])

@php
    $sclass = match ($size) {
        'sm' => 'size-8',
        'md' => 'size-10',
        'lg' => 'size-12',
    };
@endphp

<div class="flex items-center space-x-2">
    <img class="rounded-full {{ $sclass }}"
        src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=f1f1f1&format=svg&bold=true&color=133160' }}"
        alt="{{ $name }}">

    @if ($expand)
        <span class="text-sm font-medium text-primary whitespace-nowrap">
            {{ $name }}
        </span>
    @endif
</div>
