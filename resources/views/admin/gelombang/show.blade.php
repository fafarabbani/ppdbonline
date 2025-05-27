<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Pendaftaran') }}
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

    <h3>Data Gelombang: {{ $data->gelombang }}</h3>
    <p>Tanggal: {{ $data->tanggal_mulai }} - {{ $data->tanggal_selesai }}</p>
    <table>
        <tbody>
            @foreach ($siswa as $item)
                <tr>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->status_pendaftaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="p-3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="pb-1 px-2 flex justify-between items-center">
            <div>
                <h2 class="text-base font-bold leading-7 text-primary dark:text-secondary">
                    {{ __('Data Pendaftaran') }}
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-300">
                    {{ __('This information will be displayed publicly so be careful what you share.') }}
                </p>
            </div>
        </div>

        <!-- Start coding here -->
        <div class="bg-white dark:bg-dark-eval-1 sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="w-full relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Search" required="">
                        </div>
                    </form>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Gelombang') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Tahun Ajaran') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Tanggal Mulai') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Tanggal Berakhir') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Kuota') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Total Pendaftar') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Status') }}</th>
                            <th scope="col" class="px-2 py-1 text-center">
                                <span>{{ __('Actions') }}</span>
                            </th>
                        </tr>
                    </thead>
                    {{--  <tbody>
                        @foreach ($data as $item)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 text-center hidden">
                                    {{ $item->id }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    {{ 'Gelombang ke-' . $item->gelombang }}
                                </td>
                                <th scope="row"
                                    class="px-4 py-3 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ 'TA. ' . $item->tahun_angkatan . '/' . ($item->tahun_angkatan + 1) }}
                                </th>
                                <td class="px-4 py-3 text-center">
                                    {{ $item->tanggal_mulai_formatted }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    {{ $item->tanggal_selesai_formatted }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    {{ $item->kuota . ' Orang' }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    {{ $item->kuota . ' Orang' }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if ($item->status == 'Tutup')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                            {{ __('Tutup') }}
                                        </span>
                                    @else
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                            {{ __('Buka') }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-2 py-3 flex items-center justify-center gap-1">
                                    <x-button class="hover:underline"
                                        href="{{ route('admin.gelombang.show', $item->uuid) }}" size="sm"
                                        variant="info">
                                        {{ __('Detail') }}
                                    </x-button>
                                    <x-button class="hover:underline"
                                        href="{{ route('admin.gelombang.edit', $item->uuid) }}" size="sm"
                                        variant="primary">
                                        {{ __('Edit') }}
                                    </x-button>
                                    <form action="{{ route('admin.gelombang.destroy', $item->uuid) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="hover:underline" size="sm" type="submit"
                                            variant="danger">
                                            {{ __('Delete') }}
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($data->isEmpty())
                            <tr class="justify-center items-center p-4">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="7" class="px-2 py-1 flex items-center justify-center gap-1">
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        {{ __('Data Masih Kosong') }}
                                    </span>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                    </tbody>
                    {{ $data->links() }}  --}}
                </table>

                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</x-app-layout>
