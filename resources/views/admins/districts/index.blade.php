<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Kecamatan') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Berikut adalah daftar kecamatan yang terdapat di BPS INHU') }}
            </x-slot>
        </x-header>

        <div class="w-full mt-8 overflow-x-auto border rounded-lg border-neutral-200">
            <table class="w-full text-sm table-auto">
                <thead class="bg-primary">
                    <tr class="*:text-start *:px-8 *:py-2 *:font-medium *:text-white *:whitespace-nowrap">
                        <th class="w-20">{{ __('ID') }}</th>
                        <th class="w-1/2 min-w-40">{{ __('Nama Kecamatan') }}</th>
                        <th class="w-1/2 min-w-40">{{ __('Jumlah Desa') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($districts as $district)
                        <tr
                            class="*:text-start *:px-8 *:py-2 *:text-neutral-800 *:truncate *:border-b *:border-neutral-200">
                            <td>{{ sprintf('%03d', $district->id) }}</td>
                            <td>
                                <a class="font-medium text-primary"
                                    href="{{ route('admins.villages.index', ['district' => $district->id]) }}">
                                    {{ $district->name }}
                                </a>
                            </td>
                            <td>{{ $district->villages_count }}</td>
                        </tr>
                    @empty
                        <tr
                            class="*:text-center *:px-8 *:py-2 *:text-neutral-800 *:truncate *:border-b *:border-neutral-200">
                            <td colSpan="3">{{ __('Tidak ada data') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        {{ $districts->links() }}
    </div>
</x-app-layout>
