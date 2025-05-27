<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Edit Data') }}
            </h2>

            <!-- Breadcrumb -->
            <ol class="inline-flex items-center space-x-2 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-500 hover:underline hover:text-gray-500 dark:text-gray-400 dark:hover:text-white">
                        {{ __('Beranda') }}
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center px-1">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('admin.gelombang.index') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-500 hover:underline hover:text-gray-500 dark:text-gray-400 dark:hover:text-white">
                            {{ __('Data Pendaftaran') }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center px-1">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 px-1 text-sm font-medium text-gray-400 md:ms-2 dark:text-gray-400">
                            {{ __('Edit Data') }}
                        </span>
                    </div>
                </li>
            </ol>
        </div>
    </x-slot>

    <div class="p-3 overflow-hidden bg-white mb-3 rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="pb-3 px-2 flex justify-between items-center">
            <h2 class="text-base font-bold leading-7 text-primary dark:text-secondary">
                {{ __('Edit Data Pendaftaran') }}
            </h2>
        </div>
        <form action="{{ route('admin.gelombang.update', $data->id) }}" method="POST" class="px-3">
            @csrf
            @method('PUT')
            <div class="grid gap-3 md:grid-cols-4">
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Tanggal Mulai') }}
                    </label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm/6 rounded-lg focus:ring-primary focus:border-primary block w-full py-1.5 pl-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                        value="{{ old('tanggal_mulai', $data->tanggal_mulai->format('Y-m-d')) }}" />
                    @error('tanggal_mulai')
                        <p class="mt-[5px] text-xs text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Tanggal Selesai') }}
                    </label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm/6 rounded-lg focus:ring-primary focus:border-primary block w-full py-1.5 pl-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                        value="{{ old('tanggal_selesai', $data->tanggal_selesai->format('Y-m-d')) }}" />
                    @error('tanggal_selesai')
                        <p class="mt-[5px] text-xs text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="kuota" class="block text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Kuota Pendaftaran :') }}
                    </label>
                    <input type="number" id="kuota" name="kuota"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm/6 rounded-lg focus:ring-primary focus:border-primary block w-full py-1.5 pl-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                        value="{{ old('kuota', $data->kuota) }}" />
                    @error('kuota')
                        <p class="mt-[5px] text-xs text-red-700">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Status Pendaftaran :') }}
                    </label>
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm/6 rounded-lg focus:ring-primary focus:border-primary block w-full py-1.5 pl-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                        <option value="Buka" {{ old('status', $data->status) == 'Buka' ? 'selected' : '' }}>
                            Buka</option>
                        <option value="Tutup" {{ old('status', $data->status) == 'Tutup' ? 'selected' : '' }}>
                            Tutup</option>
                    </select>
                    @error('status')
                        <p class="mt-[5px] text-xs text-red-700">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <x-button size="sm" variant="primary" type="submit" class="justify-center mt-3 max-w-xs gap-2">
                <span>{{ __('Simpan') }}</span>
            </x-button>
            <x-button href="{{ route('admin.gelombang.index') }}" size="sm" variant="info"
                class="justify-center mt-3 max-w-xs gap-2">
                <span>{{ __('Kembali') }}</span>
            </x-button>
        </form>
    </div>
</x-app-layout>
