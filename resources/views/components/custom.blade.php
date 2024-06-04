@props(['name'])

<div x-data="{
    show: null,
    data: null,
    name: @js($name),

    init() {
        this.$watch('show', value => {
            if (value) {
                document.body.classList.add('overflow-y-hidden');
            } else {
                document.body.classList.remove('overflow-y-hidden');
            }
        });
    },

    display(detail) {
        if (this.name !== detail.name)
            return;
        this.show = true;
        this.data = detail.data;
    },

    hide() {
        this.show = false;
        this.data = null;
    },
}" x-on:modal.window="display($event.detail)" x-on:close.stop="hide()"
    x-on:keydown.escape.window="hide()" x-on:keydown.escape.window="hide()" x-bind:class="{ 'hidden': !show }"
    class="fixed inset-0 z-50 hidden mt-0 overflow-y-auto sm:px-0">

    <div x-show="show" class="fixed inset-0 transition-all transform" x-on:click="show = false"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-black opacity-50">
            {{-- backdrop --}}
        </div>
    </div>

    <div class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
        <div x-show="show"
            class="w-full max-w-md overflow-hidden transition-all transform bg-white border rounded-xl sm:mx-auto border-neutral-200"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            {{ $slot }}
        </div>
    </div>
</div>
