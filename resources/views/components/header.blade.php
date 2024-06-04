@props(['center' => false, 'as' => 'h2'])

@php
    $scenter = $center ? 'text-center mx-auto' : 'text-start';
@endphp

<header {{ $attributes->merge(['class' => "max-w-2xl space-y-2 {$scenter}"]) }}>
    @if ($as === 'h3')
        <h3 class="text-xl font-bold text-primary">
            {{ $title }}
        </h3>
    @else
        <h2 class="text-2xl font-bold uppercase text-tertiary">
            {{ $title }}
        </h2>
    @endif

    <p class="text-neutral-600">
        {{ $description }}
    </p>
</header>
