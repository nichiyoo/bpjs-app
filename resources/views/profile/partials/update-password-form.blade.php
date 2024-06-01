<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-label for="password" :value="__('fields.password.label')" />
            <x-input id="password" type="password" name="password" placeholder="{{ __('fields.password.placeholder') }}"
                value="{{ old('password') }}" autocomplete="password" required />
            <x-error :value="$errors->get('password')" />
        </div>

        <div>
            <x-label for="update_password_password" :value="__('fields.password.label')" />
            <x-input id="update_password_password" type="password" name="password"
                placeholder="{{ __('fields.password.placeholder') }}" value="{{ old('password') }}"
                autocomplete="new-password" required />
            <x-error :value="$errors->get('password')" />
        </div>

        <div>
            <x-label for="update_password_password_confirmation" :value="__('fields.password_confirmation.label')" />
            <x-input id="update_password_password_confirmation" type="password" name="password_confirmation"
                placeholder="{{ __('fields.password_confirmation.placeholder') }}"
                value="{{ old('password_confirmation') }}" autocomplete="new-password" required />
            <x-error :value="$errors->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button type="submit" variant="primary">
                {{ __('Save') }}
            </x-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
