<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Dashboard') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Pada halaman ini Anda dapat mengelola data Anda') }}
            </x-slot>
        </x-header>

        <div x-data>
            @for ($i = 0; $i < 5; $i++)
                <x-button variant="primary" x-on:click="$dispatch('modal', { id: {!! $i !!} })">
                    {{ $i }}
                </x-button>
            @endfor
        </div>

        <div x-data="{ data: null }" x-on:modal.window="data = $event.detail.id">
            <span x-text="data"></span>
        </div>
    </div>
</x-app-layout>
