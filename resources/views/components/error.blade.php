@props(['value'])

@if ($value)
    <ul {{ $attributes->merge(['class' => 'text-sm text-danger space-y-1 mt-2']) }}>
        @foreach ((array) $value as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
