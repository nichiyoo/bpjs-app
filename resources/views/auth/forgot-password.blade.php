<x-guest-layout>
    <x-status class="mb-4" :status="session('status')" />

    <x-header class="mb-8" as="h3" center>
        <x-slot name="title">
            {{ __('recovery.title') }}
        </x-slot>

        <x-slot name="description">
            {{ __('recovery.description') }}
        </x-slot>
    </x-header>


    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div>
            <x-label for="email" :value="__('fields.email.label')" />
            <x-input id="email" type="email" name="email" placeholder="{{ __('fields.email.placeholder') }}"
                value="{{ old('email') }}" autocomplete="email" required />
            <x-error :value="$errors->get('email')" />
        </div>

        <x-button type="submit" variant="primary" class="w-full">
            {{ __('fields.submit.label') }}
        </x-button>
    </form>
</x-guest-layout>
