@props(['center' => false, 'as' => 'h2'])

<header class="max-w-xl mb-8 space-y-2 @if ($center) text-center mx-auto @endif">
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
