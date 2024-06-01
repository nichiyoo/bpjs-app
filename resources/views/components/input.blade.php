<div class="relative" x-data="{
    ref: null,
    init() {
        this.ref = this.$refs.input;
    },
    show() {
        this.ref.type = 'text';
    },
    hide() {
        this.ref.type = 'password';
    },
}">
    <input x-ref="input" {!! $attributes->merge([
        'class' =>
            'w-full px-4 py-2 bg-neutral-50 border border-neutral-200 focus:border-primary focus:ring-primary rounded-md text-sm',
    ]) !!}>

    @if ($type === 'password')
        <div class="absolute z-10 -translate-y-1/2 right-4 top-1/2" x-on:mousedown="show" x-on:mouseup="hide">
            <i data-lucide="mouse" class="cursor-pointer size-5 text-primary"></i>
        </div>
    @endif
</div>
