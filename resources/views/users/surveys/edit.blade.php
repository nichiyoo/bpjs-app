<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Edit Data Survei') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update data survei, dan pastikan data yang dikirim benar') }}
            </x-slot>
        </x-header>

        <form action="{{ route('users.surveys.update', $survey) }}" method="post" class="grid gap-6 lg:grid-cols-2">
            @csrf
            @method('PATCH')

            <div class="col-span-full">
                <x-label for="name" :value="__('survey.name.label')" />
                <x-input id="name" type="text" name="name" placeholder="{{ __('survey.name.placeholder') }}"
                    value="{{ $survey->name ?? old('name') }}" autocomplete="name" autofocus required />
                <x-error :value="$errors->get('name')" />
            </div>

            <div>
                <x-label for="type" :value="__('survey.type.label')" />
                <x-select id="type" name="type" value="{{ old('type') }}" required>
                    @foreach ($types as $item)
                        <option value="{{ $item }}" @if ($item == old('type') ?? $item == $survey->type) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('type')" />
            </div>

            <div>
                <x-label for="duration" :value="__('survey.duration.label')" />
                <x-select id="duration" name="duration" value="{{ old('duration') }}" required>
                    @foreach ($durations as $item)
                        <option value="{{ $item }}" @if ($item == old('duration') ?? $item == $survey->duration) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('duration')" />
            </div>

            <div>
                <x-label for="start" :value="__('survey.start.label')" />
                <x-input id="start" type="date" name="start" value="{{ $survey->start ?? old('start') }}"
                    required />
                <x-error :value="$errors->get('start')" />
            </div>

            <div>
                <x-label for="end" :value="__('survey.end.label')" />
                <x-input id="end" type="date" name="end" value="{{ $survey->end ?? old('end') }}"
                    required />
                <x-error :value="$errors->get('end')" />
            </div>

            <div class="col-span-full">
                <x-label for="sample" :value="__('survey.sample.label')" />
                <x-input id="sample" type="number" name="sample" value="{{ $survey->sample ?? old('sample') }}"
                    required />
                <x-error :value="$errors->get('sample')" />
            </div>

            <div class="col-span-full">
                <x-label for="status" :value="__('survey.status.label')" />
                <x-select id="status" name="status" value="{{ $survey->status ?? old('status') }}" required>
                    @foreach ($statuses as $item)
                        <option value="{{ $item }}" @if ($item == old('status')) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </x-select>
                <x-error :value="$errors->get('status')" />
            </div>

            <div class="col-span-full">
                <x-label for="annotation" :value="__('survey.annotation.label')" />
                <x-textarea id="annotation" name="annotation" value="{{ $survey->annotation ?? old('annotation') }}"
                    rows="3" />
                <x-error :value="$errors->get('annotation')" />
            </div>

            <div>
                <x-label for="document" :value="__('survey.document.label')" />
                <x-input id="document" type="number" name="document"
                    value="{{ $survey->document ?? old('document') }}" required />
                <x-error :value="$errors->get('document')" />
            </div>

            <div>
                <x-label for="entry" :value="__('survey.entry.label')" />
                <x-input id="entry" type="number" name="entry" value="{{ $survey->entry ?? old('entry') }}"
                    required />
                <x-error :value="$errors->get('entry')" />
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
