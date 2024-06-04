<x-guest-layout>
    <x-status class="mb-4" :status="session('status')" />

    <x-header class="mb-8" as="h3" center>
        <x-slot name="title">
            {{ __('confirmation.title') }}
        </x-slot>

        <x-slot name="description">
            {{ __('confirmation.description') }}
        </x-slot>
    </x-header>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <x-label for="password" :value="__('fields.password.label')" />
            <x-input id="password" type="password" name="password" placeholder="{{ __('fields.password.placeholder') }}"
                value="{{ old('password') }}" autocomplete="current-password" required />
            <x-error :value="$errors->get('password')" />
        </div>

        <x-button type="submit" variant="primary" class="w-full">
            {{ __('fields.submit.label') }}
        </x-button>
    </form>
</x-guest-layout>
