<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before
                                                                                                                                    deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-button variant="danger" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please
                                                                                                                                                                                enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div>
                <x-label for="password" :value="__('fields.password.label')" />
                <x-input id="password" type="password" name="password"
                    placeholder="{{ __('fields.password.placeholder') }}" value="{{ old('password') }}"
                    autocomplete="password" required />
                <x-error :value="$errors->get('password')" />
            </div>

            <div class="flex justify-end mt-6">
                <x-button variant="outline" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-button>

                <x-button variant="danger" class="ms-3">
                    {{ __('Delete Account') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</section>
