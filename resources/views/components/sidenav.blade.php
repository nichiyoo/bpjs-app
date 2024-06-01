@props(['open' => false, 'label' => '', 'icon' => ''])

<div class="text-sm text-white" x-data="{
    ref: null,
    arrow: null,

    init() {
        this.ref = this.$refs.menu;
        this.arrow = this.$refs.arrow;
    },

    toggle() {
        if (!open) open = true;
        this.ref.classList.toggle('hidden');
        this.arrow.classList.toggle('rotate-180');
    }
}">
    <div class="relative flex items-center px-2 py-2 mb-4 space-x-4 rounded-md cursor-pointer hover:bg-white/10"
        x-on:click="toggle">
        <i data-lucide="{{ $icon }}" class="size-5"></i>
        <span x-bind:class="{ 'md:sr-only': !open }" class="w-4/6 truncate md:sr-only">{{ $label }}</span>
        <i data-lucide="chevron-down" x-ref="arrow" x-bind:class="{ 'md:sr-only': !open }"
            class="absolute transition-all -translate-y-1/2 size-5 right-2 top-1/2 md:sr-only"></i>
    </div>

    <ul class="hidden mx-12 space-y-6" x-ref="menu" x-show="open">
        {{ $slot }}
    </ul>
</div>
