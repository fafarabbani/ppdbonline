<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard Admin') }}
            </h2>

            <!-- Breadcrumb -->
            <ol class="inline-flex items-center space-x-2 md:space-x-3 rtl:space-x-reverse">
                <li aria-current="page">
                    <div class="flex items-center px-1">
                        <span class="ms-1 px-1 text-sm font-medium text-gray-400 md:ms-2 dark:text-gray-400">
                            {{ __('Dashboard') }}
                        </span>
                    </div>
                </li>
            </ol>
        </div>
    </x-slot>

    <div class="flex items-center gap-5">
        <!-- Tahun Ajaran -->
        <div class="md:w-1/4 p-6 overflow-hidden bg-green-50 rounded-md shadow-md dark:bg-dark-eval-1">
            <a href="#" class="flex items-center justify-between gap-3">
                <div class="flex flex-col justify-between p-1 leading-normal">
                    <p class="mb-1 font-medium text-sm text-gray-700 dark:text-gray-400">
                        {{ __('Pendaftaran') }}
                    </p>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $jumlahGelombang }}
                    </h5>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40" viewBox="0 0 640 512">
                        <path fill="#00966b"
                            d="M160 64c0-35.3 28.7-64 64-64L576 0c35.3 0 64 28.7 64 64l0 288c0 35.3-28.7 64-64 64l-239.2 0c-11.8-25.5-29.9-47.5-52.4-64l99.6 0 0-32c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 32 64 0 0-288L224 64l0 49.1C205.2 102.2 183.3 96 160 96l0-32zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352l53.3 0C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7L26.7 512C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z" />
                    </svg>
                </div>
            </a>
        </div>

        <!-- Calon Peserta Didik Baru -->
        <div class="md:w-1/4 p-6 overflow-hidden bg-orange-50 rounded-md shadow-md dark:bg-dark-eval-1">
            <a href="" class="flex items-center justify-between gap-3">
                <div class="flex flex-col justify-between p-1 leading-normal">
                    <p class="mb-1 font-medium text-sm text-gray-700 dark:text-gray-400">
                        {{ __('Calon Peserta Didik') }}
                    </p>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $jumlahSiswa }}
                    </h5>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40" viewBox="0 0 640 512">
                        <path fill="#f97316"
                            d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l448 0c53 0 96-43 96-96l0-320c0-53-43-96-96-96L96 0zM64 96c0-17.7 14.3-32 32-32l448 0c17.7 0 32 14.3 32 32l0 320c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32L64 96zm159.8 80a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM96 309.3c0 14.7 11.9 26.7 26.7 26.7l56.1 0c8-34.1 32.8-61.7 65.2-73.6c-7.5-4.1-16.2-6.4-25.3-6.4l-69.3 0C119.9 256 96 279.9 96 309.3zM461.2 336l56.1 0c14.7 0 26.7-11.9 26.7-26.7c0-29.5-23.9-53.3-53.3-53.3l-69.3 0c-9.2 0-17.8 2.3-25.3 6.4c32.4 11.9 57.2 39.5 65.2 73.6zM372 289c-3.9-.7-7.9-1-12-1l-80 0c-4.1 0-8.1 .3-12 1c-26 4.4-47.3 22.7-55.9 47c-2.7 7.5-4.1 15.6-4.1 24c0 13.3 10.7 24 24 24l176 0c13.3 0 24-10.7 24-24c0-8.4-1.4-16.5-4.1-24c-8.6-24.3-29.9-42.6-55.9-47zM512 176a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM320 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128z" />
                    </svg>
                </div>
            </a>
        </div>

        <!-- Pendaftar Diterima -->
        <div class="md:w-1/4 p-6 overflow-hidden bg-green-50 rounded-md shadow-md dark:bg-dark-eval-1">
            <a href="#" class="flex items-center justify-between gap-3">
                <div class="flex flex-col justify-between p-1 leading-normal">
                    <p class="mb-1 font-medium text-sm text-gray-700 dark:text-gray-400">
                        {{ __('Pendaftar Diterima') }}
                    </p>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $jumlahDiterima }}
                    </h5>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40" viewBox="0 0 640 512">
                        <path fill="#00966b"
                            d="M211.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM32 256c0 17.7 14.3 32 32 32l85.6 0c10.1-39.4 38.6-71.5 75.8-86.6c-9.7-6-21.2-9.4-33.4-9.4l-96 0c-35.3 0-64 28.7-64 64zm461.6 32l82.4 0c17.7 0 32-14.3 32-32c0-35.3-28.7-64-64-64l-96 0c-11.7 0-22.7 3.1-32.1 8.6c38.1 14.8 67.4 47.3 77.7 87.4zM391.2 226.4c-6.9-1.6-14.2-2.4-21.6-2.4l-96 0c-8.5 0-16.7 1.1-24.5 3.1c-30.8 8.1-55.6 31.1-66.1 60.9c-3.5 10-5.5 20.8-5.5 32c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32c0-11.2-1.9-22-5.5-32c-10.8-30.7-36.8-54.2-68.9-61.6zM563.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM321.6 192a80 80 0 1 0 0-160 80 80 0 1 0 0 160zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32l576 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 416z" />
                    </svg>
                </div>
            </a>
        </div>
        <!-- Pendaftar Ditolak -->
        <div class="md:w-1/4 p-6 overflow-hidden bg-orange-50 rounded-md shadow-md dark:bg-dark-eval-1">
            <a href="" class="flex items-center justify-between gap-3">
                <div class="flex flex-col justify-between p-1 leading-normal">
                    <p class="mb-1 font-medium text-sm text-gray-700 dark:text-gray-400">
                        {{ __('Pendaftar Ditolak') }}
                    </p>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $jumlahDitolak }}
                    </h5>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40" viewBox="0 0 640 512">
                        <path fill="#b91c1c"
                            d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L440.6 320l178.1 0c11.8 0 21.3-9.6 21.3-21.3C640 239.8 592.2 192 533.3 192l-42.7 0c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 30.2-10.5 58-28 79.9l-25.2-19.7C408.1 267.7 416 246.8 416 224c0-53-43-96-96-96c-31.1 0-58.7 14.8-76.3 37.7l-40.6-31.8c13-14.2 20.9-33.1 20.9-53.9c0-44.2-35.8-80-80-80C116.3 0 91.9 14.1 77.5 35.5L38.8 5.1zM106.7 192C47.8 192 0 239.8 0 298.7C0 310.4 9.6 320 21.3 320l213.3 0c.2 0 .4 0 .7 0c-20.6-18.2-35.2-42.8-40.8-70.8L121.8 192l-15.2 0zM261.3 352C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7l330.7 0c10.5 0 19.5-6 23.9-14.8L324.9 352l-63.6 0zM512 160A80 80 0 1 0 512 0a80 80 0 1 0 0 160z" />
                    </svg>
                </div>
            </a>
        </div>
    </div>

    <div class="flex items-center gap-5 mt-5">
        <!-- Jumlah User -->
        <div class="md:w-1/4 p-6 overflow-hidden bg-green-50 rounded-md shadow-md dark:bg-dark-eval-1">
            <a href="#" class="flex items-center justify-between gap-3">
                <div class="flex flex-col justify-between p-1 leading-normal">
                    <p class="mb-1 font-medium text-sm text-gray-700 dark:text-gray-400">
                        {{ __('User') }}
                    </p>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $jumlahUser }}
                    </h5>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40" viewBox="0 0 640 512">
                        <path fill="#00966b"
                            d="M160 64c0-35.3 28.7-64 64-64L576 0c35.3 0 64 28.7 64 64l0 288c0 35.3-28.7 64-64 64l-239.2 0c-11.8-25.5-29.9-47.5-52.4-64l99.6 0 0-32c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 32 64 0 0-288L224 64l0 49.1C205.2 102.2 183.3 96 160 96l0-32zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352l53.3 0C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7L26.7 512C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z" />
                    </svg>
                </div>
            </a>
        </div>
    </div>

</x-app-layout>
