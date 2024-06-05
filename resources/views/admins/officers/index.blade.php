<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Petugas Pencacah Lapangan') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Berikut adalah daftar petugas pencacah lapangan yang terdapat di BPS INHU') }}
            </x-slot>
        </x-header>

        <form action="{{ route('admins.officers.index') }}" method="get" class="flex items-end space-x-4"
            x-data="{
                $form: null,
                init() {
                    this.$form = this.$refs.form;
                },
            }" x-ref="form">
            <div>
                <x-label for="district" :value="__('fields.district.label')" />
                <x-select id="district" name="district" value="{{ old('district') }}" class="min-w-52"
                    x-on:change="$form.submit()">
                    <option value="" @if (empty($districts)) selected @endif>
                        {{ __('Pilih Kecamatan') }}
                    </option>

                    @foreach ($districts as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $district) selected @endif>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div>
                <x-label for="nks" :value="__('fields.nks.label')" />
                <x-input id="nks" type="text" name="nks" placeholder="{{ __('fields.nks.placeholder') }}"
                    value="{{ $nks ?? old('nks') }}" autocomplete="nks" x-on:input.debounce.500ms="$form.submit()" />
            </div>

            <div>
                <x-label for="name" :value="__('fields.name.label')" />
                <x-input id="name" type="text" name="name" placeholder="{{ __('fields.name.placeholder') }}"
                    value="{{ $name ?? old('name') }}" autocomplete="name"
                    x-on:input.debounce.500ms="$form.submit()" />
            </div>
        </form>

        <div class="w-full overflow-x-auto border rounded-lg border-neutral-200">
            <table class="w-full text-sm table-auto">
                <thead class="bg-primary">
                    <tr class="*:text-start *:px-8 *:py-2 *:font-medium *:text-white *:whitespace-nowrap">
                        <th class="w-20">{{ __('No NKS') }}</th>
                        <th class="w-1/3 min-w-40">{{ __('Nama Petugas PCL') }}</th>
                        <th class="w-1/3 min-w-40">{{ __('Nama Desa') }}</th>
                        <th class="w-1/3 min-w-40">{{ __('Nama Kecamatan') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($officers as $officer)
                        <tr class="*:text-start *:px-8 *:py-2 *:text-neutral-800 *:truncate">
                            <td>{{ $officer->nks }}</td>
                            <td>
                                <x-avatar name="{{ $officer->user->name }}" size="sm" expand />
                            </td>
                            <td>{{ $officer->village->name }}</td>
                            <td>{{ $officer->village->district->name }}</td>
                        </tr>
                    @empty
                        <tr class="*:text-center *:px-8 *:py-2 *:text-neutral-800 *:truncate">
                            <td colSpan="4">{{ __('Tidak ada data') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        {{ $officers->links() }}
    </div>
</x-app-layout>
