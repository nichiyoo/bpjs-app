<x-guest-layout>
    <x-status class="mb-4" :status="session('status')" />

    <x-header as="h3" center>
        <x-slot name="title">
            {{ __('auth.register') }}
        </x-slot>

        <x-slot name="description">
            {{ __('auth.description') }}
        </x-slot>
    </x-header>


    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div>
            <x-label for="name" :value="__('fields.name.label')" />
            <x-input id="name" type="text" name="name" placeholder="{{ __('fields.name.placeholder') }}"
                value="{{ old('name') }}" autocomplete="name" required autofocus />
            <x-error :value="$errors->get('name')" />
        </div>

        <div>
            <x-label for="username" :value="__('fields.username.label')" />
            <x-input id="username" type="text" name="username" placeholder="{{ __('fields.username.placeholder') }}"
                value="{{ old('username') }}" autocomplete="username" required />
            <x-error :value="$errors->get('username')" />
        </div>

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

        <x-button type="submit" variant="primary" class="w-full">
            {{ __('auth.register') }}
        </x-button>

        <p class="mt-2 text-sm text-center text-gray-600">
            {{ __('auth.registered') }}
            <a href="{{ route('login') }}" class="font-medium text-primary hover:underline">
                {{ __('auth.login') }}
            </a>
        </p>
    </form>
</x-guest-layout>
