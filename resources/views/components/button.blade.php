@props(['variant' => 'primary', 'size' => 'md', 'type' => 'submit', 'label' => null])

@php
    $vclass = match ($variant) {
        'primary' => 'text-white bg-primary hover:bg-primary/90 focus:bg-primary/90 border-transparent',
        'ghost' => 'text-primary bg-gray-200 hover:bg-gray-300 focus:bg-gray-300 border-transparent',
        'danger' => 'text-white bg-danger hover:bg-danger/90 focus:bg-danger/90 border-transparent',
        'link' => 'text-primary bg-transparent hover:underline focus:underline border-transparent',
        'outline' => 'text-primary hover:bg-primary hover:text-white focus:bg-primary focus:text-white border-primary',
        'invert-primary' => 'text-primary bg-white hover:bg-white/90 border-transparent',
        'invert-outline' => 'text-white hover:bg-white hover:text-primary border-transparent',
    };

    $sclass = match ($size) {
        'sm' => 'px-3 py-1.5',
        'md' => 'px-4 py-2',
        'lg' => 'px-6 py-3',
        'icon'
            => 'h-8 w-8 relative [&>svg]:absolute [&>svg]:top-1/2 [&>svg]:left-1/2 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:transform [&>svg]:-translate-y-1/2 [&>svg]:-translate-x-1/2',
    };
@endphp

<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => "inline-flex justify-center items-center text-sm font-medium space-x-2 {$sclass} {$vclass} border rounded-md focus:outline-none transition ease-in-out duration-150 whitespace-nowrap",
    ]) }}>
    {{ $slot }}

    @if ($size === 'icon')
        <span class="sr-only">{{ $label }}</span>
    @endif
</button>
