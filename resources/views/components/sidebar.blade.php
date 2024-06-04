<aside x-data="{ open: $persist(false).as('sidebar') }" x-bind:class="{ 'w-full md:max-w-xs': open }"
    class="relative flex-none w-full bg-primary md:max-w-xs">

    <div class="absolute hidden px-4 text-white md:block top-4">
        <div class="flex items-center px-2 py-2 space-x-4 rounded-md cursor-pointer hover:bg-white/10"
            x-on:click="open = ! open">
            <i data-lucide="menu" class="size-5"></i>
            <span class="sr-only">{{ __('Open') }}</span>
        </div>
    </div>

    <div class="px-4 mt-8 mb-6 md:mt-32">
        <a href="{{ route('landing') }}">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo Badan Pusat Statistik Kabupaten Indragiri Hulu"
                    class="size-8" />
                <span x-bind:class="{ 'md:sr-only': !open }" class="text-lg font-medium text-white md:sr-only">
                    {{ config('app.name', 'BPS INHU') }}
                </span>
            </div>
        </a>
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
                'href' => route('users.surveys.index', ['type' => 'IPDS']),
            ],
            [
                'label' => __('Fungsi Produksi'),
                'href' => route('users.surveys.index', ['type' => 'Produksi']),
            ],
            [
                'label' => __('Fungsi Sosial'),
                'href' => route('users.surveys.index', ['type' => 'Sosial']),
            ],
            [
                'label' => __('Fungsi Neraca'),
                'href' => route('users.surveys.index', ['type' => 'Neraca']),
            ],
            [
                'label' => __('Fungsi Distribusi'),
                'href' => route('users.surveys.index', ['type' => 'Distribusi']),
            ],
        ];

        $admins = [
            [
                'label' => __('Petugas Cacah Lapangan'),
                'href' => route('admins.officers.index'),
            ],
            [
                'label' => __('Master Data Kecamatan'),
                'href' => route('admins.districts.index'),
            ],
            [
                'label' => __('Master Data Desa'),
                'href' => route('admins.villages.index'),
            ],
            [
                'label' => __('Master Data User'),
                'href' => route('admins.users.index'),
            ],
        ];
    @endphp

    <div class="px-4 mb-24 space-y-6">
        <x-sidenav open="$open" label="{{ __('Dashboard') }}" icon="home">
            <li><a href="#">{{ __('Statistik') }}</a></li>
        </x-sidenav>

        <x-sidenav open="$open" label="{{ __('Data Petugas Survei') }}" icon="bar-chart-3">
            @foreach ($surveys as $survey)
                <li>
                    <a href="{{ $survey['href'] }}">
                        {{ $survey['label'] }}
                    </a>
                </li>
            @endforeach
        </x-sidenav>

        <x-sidenav open="$open" label="{{ __('Data Petugas Cacah Lapangan') }}" icon="database">
            @foreach ($pcls as $pcl)
                <li>
                    <a href="{{ $pcl['href'] }}">
                        {{ $pcl['label'] }}
                    </a>
                </li>
            @endforeach
        </x-sidenav>

        @role('admin')
            <x-sidenav open="$open" label="{{ __('Data Administrator') }}" icon="shield-check">
                @foreach ($admins as $admin)
                    <li>
                        <a href="{{ $admin['href'] }}">
                            {{ $admin['label'] }}
                        </a>
                    </li>
                @endforeach
            </x-sidenav>
        @endrole
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
