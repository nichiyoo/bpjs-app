<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        @role('admin')
            <x-header as="h4">
                <x-slot name="title">
                    {{ __('Statistik') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Anda dapat melihat statistik data yang ada pada BPS INHU.') }}
                </x-slot>
            </x-header>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($counters as $counter)
                    <div class="relative p-4 space-y-2 border rounded-lg border-neutral-200">
                        <div class="absolute top-0 right-0 m-6">
                            <i data-lucide="bar-chart-3" class="size-5"></i>
                        </div>
                        <h5 class="block text-5xl font-bold text-primary">
                            {{ $counter['value'] }}
                        </h5>
                        <p class="text-sm text-neutral-500">
                            {{ $counter['name'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endrole

        <x-header as="h4">
            <x-slot name="title">
                {{ __('Statistik Data Survey') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Berikut adalah data survey terbaru yang ada pada BPS INHU dan bagan.') }}
            </x-slot>
        </x-header>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="border divide-y-2 rounded-lg divide-neutral-100 border-neutral-200">
                @forelse ($surveys as $survey)
                    <div class="px-6 py-2 space-y-2">
                        <div class="flex items-center justify-between">
                            <h5 class="font-semibold text-primary">
                                {{ $survey->name }}
                            </h5>
                            <x-badge variant="primary">
                                {{ $survey->type }}
                            </x-badge>
                        </div>
                        <p class="text-sm">
                            {{ $survey->duration }}
                        </p>
                        <div class="flex items-center space-x-2 text-sm text-neutral-500">
                            <span class="flex-none">{{ $survey->start->format('d F Y') }}</span>
                            <div class="w-full border-b-2 border-dotted border-secondary"></div>
                            <span class="flex-none">{{ $survey->end->format('d F Y') }}</span>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-2 space-y-2">
                        <div class="text-center">
                            <p class="text-sm text-neutral-500">
                                {{ __('Tidak ada data') }}
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="w-full h-full p-6 border rounded-lg border-neutral-200">
                <canvas id="chart-survey" class="w-full"></canvas>
            </div>
        </div>

        <x-header as="h4">
            <x-slot name="title">
                {{ __('Statistik Data Pemutahkhiran') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Berikut adalah data pemutahkhiran terbaru yang ada pada BPS INHU dan bagan.') }}
            </x-slot>
        </x-header>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="overflow-hidden border rounded-lg border-neutral-200">
                <table class="w-full text-sm table-auto">
                    <thead class="bg-primary">
                        <tr class="*:text-start *:px-8 *:py-2 *:font-medium *:text-white *:whitespace-nowrap">
                            <th>{{ __('No NKS') }}</th>
                            <th>{{ __('Kegiatan') }}</th>
                            <th>{{ __('Sebelum') }}</th>
                            <th>{{ __('Sesudah') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($households as $household)
                            <tr
                                class="*:text-start *:px-8 *:py-2 *:text-neutral-800 *:truncate *:border-b *:border-neutral-200">
                                <td>{{ $household->nks }}</td>
                                <td>{{ $household->category }}</td>
                                <td>{{ $household->before }}</td>
                                <td>{{ $household->after }}</td>
                            </tr>
                        @empty
                            <tr class="*:text-center *:px-8 *:py-2 *:text-neutral-800 *:truncate">
                                <td colSpan="4">{{ __('Tidak ada data') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="w-full h-full p-6 border rounded-lg border-neutral-200">
                <canvas id="chart-households" class="w-full"></canvas>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const months = {!! json_encode($months) !!};
            const start = {!! json_encode($charts['start']) !!};
            const end = {!! json_encode($charts['end']) !!};

            new Chart(document.getElementById('chart-survey'), {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Survey Start',
                        data: start,
                        backgroundColor: '#133160',
                    }, {
                        label: 'Survey End',
                        data: end,
                        backgroundColor: '#68b92e',
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#e5e5e5',
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                }
            });
        </script>

        <script>
            const types = {!! json_encode($types) !!};
            const households = {!! json_encode($charts['households']) !!};

            new Chart(document.getElementById('chart-households'), {
                type: 'bar',
                data: {
                    labels: types,
                    datasets: [{
                        label: 'Jumlah',
                        data: Object.values(households),
                        backgroundColor: '#133160',
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#e5e5e5',
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                }
            });
        </script>
    @endpush
</x-app-layout>
