<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Tambah Data Pemutakhiran') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Tambahkan data pemutakhiran, dan pastikan data yang dikirim benar') }}
            </x-slot>
        </x-header>

        <form action="{{ route('users.progresses.store') }}" method="post" class="grid gap-6 lg:grid-cols-2">
            @csrf

            <div class="col-span-full">
                <x-label for="nks" :value="__('pcl.nks.label')" />
                <x-select id="nks" name="nks" value="{{ old('nks') }}" required>
                    @foreach ($officers as $officer)
                        <option value="{{ $officer->nks }}" @if ($officer->nks == old('nks')) selected @endif>
                            {{ $officer->nks }} - {{ $officer->village->name }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('nks')" />
            </div>

            <div>
                <x-label for="category" :value="__('pcl.category.label')" />
                <x-select id="category" name="category" value="{{ old('category') }}" required>
                    @foreach ($categories as $item)
                        <option value="{{ $item }}" @if ($item == old('category')) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('category')" />
            </div>

            <div>
                <x-label for="type" :value="__('pcl.type.label')" />
                <x-select id="type" name="type" value="{{ old('type') }}" required>
                    @foreach ($types as $item)
                        <option value="{{ $item }}" @if ($item == old('type') ?? $item == $type) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('type')" />
            </div>

            <div>
                <x-label for="sample" :value="__('pcl.sample.label')" />
                <x-input id="sample" type="number" name="sample" value="{{ old('sample') }}"
                    placeholder="{{ __('pcl.sample.placeholder') }}" required />
                <x-error :value="$errors->get('sample')" />
            </div>

            <div class="col-span-full">
                <x-label for="kor" :value="__('pcl.kor.label')" />
                <x-select id="kor" name="kor" value="{{ old('kor') }}" required>
                    @foreach ($answers as $item)
                        <option value="{{ $item }}" @if ($item == old('kor')) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('kor')" />
            </div>

            <div class="col-span-full">
                <x-label for="kp" :value="__('pcl.kp.label')" />
                <x-select id="kp" name="kp" value="{{ old('kp') }}" required>
                    @foreach ($answers as $item)
                        <option value="{{ $item }}" @if ($item == old('kp')) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('kp')" />
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
