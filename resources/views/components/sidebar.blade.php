<aside x-data="{ open: $persist(false).as('sidebar') }" x-bind:class="{ 'w-full md:max-w-xs': open }" class="relative flex-none bg-primary">

    <div class="absolute hidden px-4 text-white md:block top-4">
        <div class="flex items-center px-2 py-2 space-x-4 rounded-md cursor-pointer hover:bg-white/10"
            x-on:click="open = ! open">
            <i data-lucide="menu" class="size-5"></i>
            <span class="sr-only">{{ __('Open') }}</span>
        </div>
    </div>

    <div class="px-4 mt-8 mb-6 md:mt-32">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo Badan Pusat Statistik Kabupaten Indragiri Hulu"
                class="size-8" />
            <span x-bind:class="{ 'md:sr-only': !open }" class="text-lg font-medium text-white md:sr-only">
                {{ config('app.name', 'BPS INHU') }}
            </span>
        </div>
    </div>

    @php
        $pcls = [
            [
                'label' => __('Fungsi IPDS'),
                'href' => '#',
            ],
            [
                'label' => __('Fungsi Produksi'),
                'href' => '#',
            ],
        ];

        $surveys = [
            [
                'label' => __('Fungsi IPDS'),
                'href' => '#',
            ],
            [
                'label' => __('Fungsi Produksi'),
                'href' => '#',
            ],
            [
                'label' => __('Fungsi Sosial'),
                'href' => '#',
            ],
            [
                'label' => __('Fungsi Neraca'),
                'href' => '#',
            ],
            [
                'label' => __('Fungsi Distribusi'),
                'href' => '#',
            ],
        ];
    @endphp

    <div class="px-4 mb-24 space-y-6">
        <x-sidenav open="$open" label="{{ __('Dashboard') }}" icon="home">
            <li><a href="#">{{ __('Statistik') }}</a></li>
        </x-sidenav>

        <x-sidenav open="$open" label="{{ __('Data Pencacah Lapangan') }}" icon="database">
            @foreach ($pcls as $pcl)
                <li>
                    <a href="{{ $pcl['href'] }}">
                        {{ $pcl['label'] }}
                    </a>
                </li>
            @endforeach
        </x-sidenav>

        <x-sidenav open="$open" label="{{ __('Data Survei') }}" icon="bar-chart-3">
            @foreach ($surveys as $survey)
                <li>
                    <a href="{{ $survey['href'] }}">
                        {{ $survey['label'] }}
                    </a>
                </li>
            @endforeach
        </x-sidenav>
    </div>


    <form action="{{ route('logout') }}" method="POST" class="absolute w-full px-4 text-white bottom-4">
        @csrf

        <button type="submit"
            class="flex items-center w-full px-2 py-2 space-x-4 rounded-md cursor-pointer hover:bg-white/10">
            <i data-lucide="door-closed" class="size-5"></i>
            <span class="md:sr-only" x-bind:class="{ 'md:sr-only': !open }">{{ __('auth.logout') }}</span>
        </button>
    </form>
</aside>
