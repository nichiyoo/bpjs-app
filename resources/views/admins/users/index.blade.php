<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Pengguna') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Berikut adalah daftar pengguna yang terdapat di BPS INHU') }}
            </x-slot>
        </x-header>

        <form action="{{ route('admins.users.index') }}" method="get" class="flex items-end space-x-4"
            x-data="{
                $form: null,
                init() {
                    this.$form = this.$refs.form;
                    this.$form.name.focus();
                },
            }" x-ref="form">
            <div>
                <x-label for="name" :value="__('fields.name.label')" />
                <x-input id="name" type="text" name="name" placeholder="{{ __('fields.name.placeholder') }}"
                    value="{{ $name ?? old('name') }}" autocomplete="name" x-on:input.debounce.500ms="$form.submit()" />
            </div>
        </form>

        <div class="w-full overflow-x-auto border rounded-lg border-neutral-200">
            <table class="w-full text-sm table-auto">
                <thead class="bg-primary">
                    <tr class="*:text-start *:px-8 *:py-2 *:font-medium *:text-white *:whitespace-nowrap">
                        <th class="w-20">{{ __('ID') }}</th>
                        <th class="w-1/3 min-w-40">{{ __('Nama User') }}</th>
                        <th class="w-1/3 min-w-40">{{ __('Username') }}</th>
                        <th class="w-1/3 min-w-40">{{ __('Alamt Email') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr
                            class="*:text-start *:px-8 *:py-2 *:text-neutral-800 *:truncate *:border-b *:border-neutral-200">
                            <td>{{ sprintf('%03d', $user->id) }}</td>
                            <td>
                                <x-avatar name="{{ $user->name }}" size="sm" expand />
                            </td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @empty
                        <tr
                            class="*:text-center *:px-8 *:py-2 *:text-neutral-800 *:truncate *:border-b *:border-neutral-200">
                            <td colSpan="4">{{ __('Tidak ada data') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        {{ $users->links() }}
    </div>
</x-app-layout>
