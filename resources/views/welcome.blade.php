<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @stack('styles')
</head>

<body class="overflow-x-hidden font-sans antialiased leading-relaxed bg-neutral-50">
    <section id="hero" class="relative">
        <img class="absolute right-0 h-52 top-16 " src="{{ asset('images/circle-1.svg') }}" alt="circle ornament" />
        <img class="absolute left-0 h-52 bottom-6" src="{{ asset('images/circle-2.svg') }}" alt="circle ornament" />

        <div class="w-content">
            <x-navbar />

            <div class="grid items-center gap-8 py-20 lg:grid-cols-2">
                <div class="space-y-4">
                    <h1 class="text-4xl font-bold text-tertiary">
                        {{ __('landing.title') }}
                    </h1>
                    <p class="text-lg text-neutral-500">
                        {{ __('landing.subtitle') }}
                    </p>

                    <a href="{{ route('dashboard') }}" class="block">
                        <x-button variant="primary">
                            {{ __('landing.action') }}
                        </x-button>
                    </a>
                </div>

                <div class="w-full aspect-square">
                    <img class="w-full" src="{{ asset('images/hero.svg') }}" alt="hero" width="100%"
                        height="100%" />
                </div>
            </div>
        </div>

        <img class="w-full" src="{{ asset('images/line.svg') }}" alt="line ornament" />
    </section>

    <section id="feature" class="py-20 w-content">
        <x-header center>
            <x-slot name="title">
                {{ __('feature.title') }}
            </x-slot>

            <x-slot name="description">
                {{ __('feature.description') }}
            </x-slot>
        </x-header>

        <div class="grid gap-8 lg:grid-cols-3">
            @foreach ($features as $feature)
                <div class="p-8 bg-white border border-neutral-200 rounded-xl">
                    <div class="w-full space-y-2">
                        <x-button variant="primary" size="icon" class="border-2" label="{{ $feature['title'] }}">
                            <i data-lucide={{ $feature['icon'] }}></i>
                        </x-button>

                        <h3 class="font-semibold text-primary">
                            {{ $feature['title'] }}
                        </h3>

                        <p class="text-sm text-neutral-600">
                            {{ $feature['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="contact" class="py-20 w-content">
        <x-header center>
            <x-slot name="title">
                {{ __('contact.title') }}
            </x-slot>

            <x-slot name="description">
                {{ __('contact.description') }}
            </x-slot>
        </x-header>

        <div class="flex p-8 bg-white border lg:space-x-8 border-neutral-200 rounded-2xl">
            <div class="relative hidden w-full rounded-xl lg:block max-w-80 bg-primary">
                <img class="absolute bottom-0 right-0 h-40 translate-x-1/2 translate-y-1/2"
                    src="{{ asset('images/circle-3.svg') }}" alt="contact" />
            </div>

            <form action="#" method="POST" class="w-full">
                @csrf

                <div class="grid gap-6 mb-6 lg:grid-cols-2">
                    <div>
                        <x-label for="name">{{ __('fields.name.label') }}</x-label>
                        <x-input type="text" name="name" id="name"
                            placeholder="{{ __('fields.name.placeholder') }}" required />
                    </div>

                    <div>
                        <x-label for="address">{{ __('fields.address.label') }}</x-label>
                        <x-input type="text" name="address" id="address"
                            placeholder="{{ __('fields.address.placeholder') }}" />
                    </div>

                    <div>
                        <x-label for="email">{{ __('fields.email.label') }}</x-label>
                        <x-input type="email" name="email" id="email"
                            placeholder="{{ __('fields.email.placeholder') }}" />
                    </div>

                    <div>
                        <x-label for="phone">{{ __('fields.phone.label') }}</x-label>
                        <x-input type="text" name="phone" id="phone"
                            placeholder="{{ __('fields.phone.placeholder') }}" />
                    </div>

                    <div class="col-span-full group">
                        <x-label for="message">{{ __('fields.message.label') }}</x-label>
                        <x-textarea type="text" name="message" id="message" rows="4"
                            placeholder="{{ __('fields.message.placeholder') }}" />
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <x-button type="reset" variant="ghost">
                        {{ __('fields.reset.label') }}
                    </x-button>

                    <x-button type="submit" variant="primary">
                        {{ __('fields.submit.label') }}
                    </x-button>
                </div>
            </form>
        </div>
    </section>

    <section id="about" class="py-20 w-content">
        <div class="grid items-start gap-8 pt-20 lg:grid-cols-2">
            <x-header>
                <x-slot name="title">
                    {{ __('about.title') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('about.description') }}
                </x-slot>
            </x-header>

            <div class="flex flex-col space-y-4">
                @foreach ($services as $service)
                    <div class="p-4 bg-white border border-neutral-200 rounded-xl">
                        <div class="flex items-start space-x-4">
                            <x-button variant="primary" size="icon" class="flex-none border-2"
                                label="{{ $service['title'] }}">
                                <i data-lucide={{ $service['icon'] }}></i>
                            </x-button>

                            <div>
                                <h3 class="font-semibold text-primary">
                                    {{ $service['title'] }}
                                </h3>
                                <p class="text-sm text-neutral-600">
                                    {{ $service['description'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer />

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

    <!-- Scripts -->
    @stack('scripts')
</body>

</html>
