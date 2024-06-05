<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Desa') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Berikut adalah daftar desa yang terdapat di BPS INHU') }}
            </x-slot>
        </x-header>

        <form action="{{ route('admins.villages.index') }}" method="get" class="flex space-x-4">
            <div>
                <x-label for="district" :value="__('fields.district.label')" />
                <x-select id="district" name="district" value="{{ old('district') }}" class="min-w-52"
                    onchange="this.form.submit()">
                    <option value="" @if (empty($districts)) selected @endif>
                        {{ __('Pilih Kecamatan') }}
                    </option>

                    @foreach ($districts as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $district) selected @endif>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('district')" />
            </div>
        </form>

        <div class="w-full overflow-x-auto border rounded-lg border-neutral-200">
            <table class="w-full text-sm table-auto">
                <thead class="bg-primary">
                    <tr class="*:text-start *:px-8 *:py-2 *:font-medium *:text-white *:whitespace-nowrap">
                        <th class="w-20">{{ __('ID') }}</th>
                        <th class="w-1/2 min-w-40">{{ __('Nama Desa') }}</th>
                        <th class="w-1/2 min-w-40">{{ __('Nama Kecamatan') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($villages as $village)
                        <tr class="*:text-start *:px-8 *:py-2 *:text-neutral-800 *:truncate">
                            <td>{{ sprintf('%03d', $village->id) }}</td>
                            <td>
                                <span class="font-medium text-primary">
                                    {{ $village->name }}
                                </span>
                            </td>
                            <td>{{ $village->district->name }}</td>
                        </tr>
                    @empty
                        <tr class="*:text-center *:px-8 *:py-2 *:text-neutral-800 *:truncate">
                            <td colSpan="3">{{ __('Tidak ada data') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        {{ $villages->links() }}
    </div>
</x-app-layout>
