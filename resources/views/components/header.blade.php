@props(['center' => false, 'as' => 'h2'])

@php
    $scenter = $center ? 'text-center mx-auto' : 'text-start';
    $sas = match ($as) {
        'h2' => 'space-y-2',
        'h3' => 'space-y-2',
        'h4' => '',
    };
    $das = match ($as) {
        'h2' => '',
        'h3' => '',
        'h4' => 'text-sm',
    };
@endphp

<header {{ $attributes->merge(['class' => "max-w-2xl {$sas} {$scenter}"]) }}>
    @if ($as === 'h2')
        <h2 class="text-2xl font-bold uppercase text-tertiary">
            {{ $title }}
        </h2>
    @elseif ($as === 'h3')
        <h3 class="text-xl font-bold text-primary">
            {{ $title }}
        </h3>
    @elseif ($as === 'h4')
        <h4 class="font-bold text-primary">
            {{ $title }}
        </h4>
    @endif

    <p class="text-neutral-500 {{ $das }}">
        {{ $description }}
    </p>
</header>
