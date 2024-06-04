<select {!! $attributes->merge([
    'class' =>
        'form-select w-full px-4 py-2 bg-neutral-50 border border-neutral-200 focus:border-primary focus:ring-primary rounded-md text-sm',
]) !!}>
    {{ $slot }}
</select>
