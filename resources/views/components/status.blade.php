@props(['status', 'timeout' => 3000])

<div {{ $attributes->merge(['class' => 'font-medium text-sm']) }} x-data="{
    timeout: null,

    init() {
        this.timeout = setTimeout(() => {
            this.$el.classList.add('hidden');
        }, {{ $timeout }});
    }
}">
    {{ $status }}
</div>
