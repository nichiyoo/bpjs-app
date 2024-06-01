<nav class="py-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('landing') }}">
            <x-logo size="sm" />
        </a>

        @php
            $navigations = [
                [
                    'name' => __('feature.title'),
                    'url' => route('landing') . '#feature',
                ],
                [
                    'name' => __('contact.title'),
                    'url' => route('landing') . '#contact',
                ],
                [
                    'name' => __('about.title'),
                    'url' => route('landing') . '#about',
                ],
            ];
        @endphp

        <ul class="flex items-center space-x-4">
            @foreach ($navigations as $navigation)
                <li>
                    <a href="{{ $navigation['url'] }}" class="text-primary hover:text-primary">
                        {{ $navigation['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        @auth
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}">
                    <x-button variant="primary">
                        {{ __('dashboard.title') }}
                    </x-button>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-button variant="ghost">
                        {{ __('auth.logout') }}
                    </x-button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}">
                <x-button variant="primary">
                    {{ __('auth.login') }}
                </x-button>
            </a>
        @endauth
    </div>
</nav>
