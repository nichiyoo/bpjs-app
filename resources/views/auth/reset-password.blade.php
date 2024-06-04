<x-guest-layout>
    <x-status class="mb-4" :status="session('status')" />

    <x-header class="mb-8" as="h3" center>
        <x-slot name="title">
            {{ __('reset.register') }}
        </x-slot>

        <x-slot name="description">
            {{ __('reset.description') }}
        </x-slot>
    </x-header>


    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-label for="email" :value="__('fields.email.label')" />
            <x-input id="email" type="email" name="email" placeholder="{{ __('fields.email.placeholder') }}"
                value="{{ old('email') }}" autocomplete="email" required />
            <x-error :value="$errors->get('email')" />
        </div>

        <div>
            <x-label for="password" :value="__('fields.password.label')" />
            <x-input id="password" type="password" name="password"
                placeholder="{{ __('fields.password.placeholder') }}" value="{{ old('password') }}"
                autocomplete="password" required />
            <x-error :value="$errors->get('password')" />
        </div>

        <div>
            <x-label for="password_confirmation" :value="__('fields.password_confirmation.label')" />
            <x-input id="password_confirmation" type="password" name="password_confirmation"
                placeholder="{{ __('fields.password_confirmation.placeholder') }}"
                value="{{ old('password_confirmation') }}" autocomplete="new-password" required />
            <x-error :value="$errors->get('password_confirmation')" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button type="submit" variant="primary">
                {{ __('Reset Password') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
