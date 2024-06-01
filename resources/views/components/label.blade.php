@props(['value', 'for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block mb-1 text-sm font-medium text-primary']) }}>
    {{ $value ?? $slot }}
</label>
