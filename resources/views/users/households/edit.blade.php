<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Edit Data Pemutakhiran') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Edit data pemutakhiran, dan pastikan data yang dikirim benar') }}
            </x-slot>
        </x-header>

        <form action="{{ route('users.households.update', $household) }}" method="post" class="grid gap-6 lg:grid-cols-2">
            @csrf
            @method('PATCH')

            <div class="col-span-full">
                <x-label for="nks" :value="__('pcl.nks.label')" />
                <x-select id="nks" name="nks" value="{{ old('nks') }}" required>
                    @foreach ($officers as $officer)
                        <option value="{{ $officer->nks }}" @if ($officer->nks == old('nks') ?? $officer->nks == $household->officer->nks) selected @endif>
                            {{ $officer->nks }} - {{ $officer->village->name }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('nks')" />
            </div>

            <div class="col-span-full">
                <x-label for="category" :value="__('pcl.category.label')" />
                <x-select id="category" name="category" value="{{ old('category') }}" required>
                    @foreach ($categories as $item)
                        <option value="{{ $item }}" @if ($item == old('category') ?? $item == $household->category) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('category')" />
            </div>

            <div class="col-span-full">
                <x-label for="type" :value="__('pcl.type.label')" />
                <x-select id="type" name="type" value="{{ old('type') }}" required>
                    @foreach ($types as $item)
                        <option value="{{ $item }}" @if ($item == old('type') ?? $item == $household->type) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('type')" />
            </div>

            <div>
                <x-label for="before" :value="__('pcl.before.label')" />
                <x-input id="before" type="number" name="before" value="{{ old('before') ?? $household->before }}"
                    placeholder="{{ __('pcl.before.placeholder') }}" required />
                <x-error :value="$errors->get('before')" />
            </div>

            <div>
                <x-label for="after" :value="__('pcl.after.label')" />
                <x-input id="after" type="number" name="after" value="{{ old('after') ?? $household->after }}"
                    placeholder="{{ __('pcl.after.placeholder') }}" required />
                <x-error :value="$errors->get('after')" />
            </div>

            <div class="col-span-full">
                <x-label for="household" :value="__('pcl.household.label')" />
                <x-input id="household" type="number" name="household"
                    value="{{ old('household') ?? $household->household }}"
                    placeholder="{{ __('pcl.household.placeholder') }}" required />
                <x-error :value="$errors->get('household')" />
            </div>

            <div class="flex justify-end space-x-2 col-span-full">
                <x-button type="reset" variant="outline">
                    {{ __('fields.reset.label') }}
                </x-button>

                <x-button type="submit" variant="primary">
                    {{ __('fields.submit.label') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
