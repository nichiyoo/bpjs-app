<x-app-layout>
    <x-slot name="page">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-8 my-12 space-y-8 bg-white border border-neutral-200 rounded-xl">
        <x-header as="h3">
            <x-slot name="title">
                {{ __('Data Survei' . ' ' . $type) }}
            </x-slot>

            <x-slot name="description">
                {{ __('Berikut adalah daftar survei' . ' ' . $type . ' ' . 'yang terdapat di BPS INHU') }}
            </x-slot>
        </x-header>

        <div class="flex items-end justify-between">
            <form action="{{ route('users.surveys.index') }}" method="get" class="flex items-end space-x-4"
                x-data="{
                    $form: null,
                    init() {
                        this.$form = this.$refs.form;
                    },
                }" x-ref="form">
                <div>
                    <x-label for="type" :value="__('survey.type.label')" />
                    <x-select id="type" name="type" value="{{ old('type') }}" class="min-w-52"
                        x-on:change="$form.submit()">
                        @foreach ($types as $item)
                            <option value="{{ $item }}" @if ($item == $type) selected @endif>
                                {{ $item }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
                <div>
                    <x-label for="status" :value="__('survey.status.label')" />
                    <x-select id="status" name="status" value="{{ old('status') }}" class="min-w-52"
                        x-on:change="$form.submit()">
                        <option value="">Semua</option>
                        @foreach ($statuses as $item)
                            <option value="{{ $item }}" @if ($item == $status) selected @endif>
                                {{ $item }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
            </form>

            <div class="flex items-center space-x-2">
                <a href="{{ route('users.surveys.create') }}">
                    <x-button variant="primary">
                        {{ __('Tambah Data') }}
                    </x-button>
                </a>
            </div>
        </div>

        <x-status :status="session('success')" class="text-green-600" />
        <x-status :status="session('error')" class="text-red-600" />

        <div class="w-full mt-8 overflow-x-auto border rounded-lg border-neutral-200">
            <table class="w-full text-sm table-auto">
                <thead class="bg-primary">
                    <tr class="*:text-start *:px-8 *:py-2 *:font-medium *:text-white *:whitespace-nowrap">
                        <th class="w-20">{{ __('ID') }}</th>
                        <th class="w-1/5 min-w-40">{{ __('Petugas') }}</th>
                        <th class="w-1/5 min-w-40">{{ __('Nama Survei') }}</th>
                        <th class="w-1/5 min-w-40">{{ __('Status') }}</th>
                        <th class="w-1/5 min-w-40">{{ __('Jumlah Sampel') }}</th>
                        <th class="w-1/5 min-w-40">{{ __('Aksi') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($surveys as $survey)
                        <tr class="*:text-start *:px-8 *:py-2 *:text-neutral-800 *:border-t *:border-neutral-200">
                            <td>{{ sprintf('%03d', $survey->id) }}</td>
                            <td>
                                <x-avatar name="{{ $survey->user->name }}" size="sm" expand />
                            </td>
                            <td>{{ $survey->name }}</td>
                            <td>{{ $survey->status }}</td>
                            <td>{{ $survey->sample }}</td>
                            <td>
                                <div class="flex items-start space-x-2" x-data>
                                    <a href="{{ route('users.surveys.edit', $survey) }}" class="block">
                                        <x-button variant="outline" size="icon">
                                            <i data-lucide="settings-2" class="size-5"></i>
                                            <span class="sr-only">{{ __('Edit') }}</span>
                                        </x-button>
                                    </a>

                                    <x-button variant="danger" size="icon"
                                        x-on:click="$dispatch('modal', {
                                            data: {{ $survey }},
                                            name: 'delete-modal'
                                        })">
                                        <i data-lucide="trash-2" class="size-5"></i>
                                        <span class="sr-only">{{ __('Delete') }}</span>
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="*:text-center *:px-8 *:py-2 *:text-neutral-800 *:border-t *:border-neutral-200">
                            <td colSpan="6">{{ __('Tidak ada data') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $surveys->onEachSide(0)->links() }}
    </div>

    @isset($survey)
        <x-custom name="delete-modal">
            <div class="relative p-8 space-y-6">
                <div class="space-y-4 text-center">
                    <div class="inline-flex p-2 rounded-full bg-danger/20">
                        <div class="flex items-center justify-center w-10 h-10 text-white rounded-full bg-danger">
                            <i data-lucide="trash-2" class="size-5"></i>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-semibold text-primary">
                            {{ __('Konfirmasi Perubahan') }}
                        </h3>
                        <p class="text-sm text-neutral-600">
                            {{ __('Anda akan menghapus survei') }}
                            <span class="font-medium text-danger">
                                {{ $survey->name }}
                            </span>
                            <br />
                            {{ __('apakah Anda yakin detailnya sudah akurat?') }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <x-button variant="outline" x-on:click="$dispatch('close')">
                        {{ __('Batal') }}
                    </x-button>

                    <form action="{{ route('users.surveys.destroy', $survey) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <x-button variant="danger" type="submit" class="w-full">
                            {{ __('Hapus') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </x-custom>
    @endisset
</x-app-layout>
