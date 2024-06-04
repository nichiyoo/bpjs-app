<x-guest-layout>
    <x-status class="mb-4" :status="session('status')" />

    <x-header class="mb-8" as="h3" center>
        <x-slot name="title">
            {{ __('auth.login') }}
        </x-slot>

        <x-slot name="description">
            {{ __('auth.description') }}
        </x-slot>
    </x-header>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <x-label for="username" :value="__('fields.username.label')" />
            <x-input id="username" type="text" name="username" placeholder="{{ __('fields.username.placeholder') }}"
                value="{{ old('username') }}" autocomplete="username" required autofocus />
            <x-error :value="$errors->get('username')" />
        </div>

        <div>
            <x-label for="password" :value="__('fields.password.label')" />
            <x-input id="password" type="password" name="password"
                placeholder="{{ __('fields.password.placeholder') }}" value="{{ old('password') }}"
                autocomplete="current-password" required />
            <x-error :value="$errors->get('password')" />
        </div>

        <div>
            <div class="flex items-center space-x-2">
                <x-checkbox id="remember_me" name="remember" />
                <x-label for="remember_me" :value="__('fields.remember.label')" class="mb-0" />
            </div>
            <x-error :value="$errors->get('remember')" />
        </div>

        <x-button type="submit" variant="primary" class="w-full">
            {{ __('auth.login') }}
        </x-button>

        <p class="mt-2 text-sm text-center text-gray-600">
            {{ __('auth.unregistered') }}
            <a href="{{ route('register') }}" class="font-medium text-primary hover:underline">
                {{ __('auth.register') }}
            </a>
        </p>
    </form>
</x-guest-layout>
