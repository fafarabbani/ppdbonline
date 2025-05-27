<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Riwayat Pendaftaran') }}
            </h2>

            <!-- Breadcrumb -->
            <ol class="inline-flex items-center space-x-2 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-500 hover:underline hover:text-gray-500 dark:text-gray-400 dark:hover:text-white">
                        {{ __('Data Master') }}
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center px-1">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 px-1 text-sm font-medium text-gray-400 md:ms-2 dark:text-gray-400">
                            {{ __('Data Riwayat Pendaftaran') }}
                        </span>
                    </div>
                </li>
            </ol>
        </div>
    </x-slot>

    {{--  <div class="border-warning bg-yellow-100 text-start flex w-full rounded-lg border-l-[6px] mb-5 px-7 py-8 md:p-6">
        <div class="bg-warning mr-5 flex h-[34px] w-full max-w-[34px] items-center justify-center rounded-md">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_961_15637)">
                    <path
                        d="M8.99998 0.506248C4.3031 0.506248 0.506226 4.30312 0.506226 9C0.506226 13.6969 4.3031 17.5219 8.99998 17.5219C13.6969 17.5219 17.5219 13.6969 17.5219 9C17.5219 4.30312 13.6969 0.506248 8.99998 0.506248ZM8.99998 16.2562C5.00623 16.2562 1.77185 12.9937 1.77185 9C1.77185 5.00625 5.00623 1.77187 8.99998 1.77187C12.9937 1.77187 16.2562 5.03437 16.2562 9.02812C16.2562 12.9937 12.9937 16.2562 8.99998 16.2562Z"
                        fill="white" />
                    <path
                        d="M11.4187 6.38437L8.07183 9.64687L6.55308 8.15625C6.29996 7.90312 5.90621 7.93125 5.65308 8.15625C5.39996 8.40937 5.42808 8.80312 5.65308 9.05625L7.45308 10.8C7.62183 10.9687 7.84683 11.0531 8.07183 11.0531C8.29683 11.0531 8.52183 10.9687 8.69058 10.8L12.3187 7.3125C12.5718 7.05937 12.5718 6.66562 12.3187 6.4125C12.0656 6.15937 11.6718 6.15937 11.4187 6.38437Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_961_15637">
                        <rect width="18" height="18" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="w-full">
            <h5 class="mb-2 text-lg font-bold text-warning uppercase">
                {{ __('Pending') }}
            </h5>
            <p class="text-body-color text-base leading-relaxed">
                {{ __('Pendaftaran atas nama') }}
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    {{ __('[nama anak]') }}
                </span>
                {{ __('masih belum lengkap. Mohon Bapak/Ibu dapat segera melengkapi data yang diperlukan agar proses dapat dilanjutkan. Terima kasih atas perhatian Bapak/Ibu.') }}
            </p>
            <p class="text-body-color text-base leading-relaxed mt-3">
                {{ __('Data Pendaftaran anda bisa di lihat disini') }}
                <span class="font-bold text-warning dark:text-gray-300 hover:underline cursor-pointer">
                    {{ __('Lihat Detail') }}
                </span>
            </p>
        </div>
    </div>

    <div class="border-gray-500 bg-slate-200 text-start flex w-full rounded-lg border-l-[6px] mb-5 px-7 py-8 md:p-6">
        <div class="bg-gray-500 mr-5 flex h-[34px] w-full max-w-[34px] items-center justify-center rounded-md">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_961_15637)">
                    <path
                        d="M8.99998 0.506248C4.3031 0.506248 0.506226 4.30312 0.506226 9C0.506226 13.6969 4.3031 17.5219 8.99998 17.5219C13.6969 17.5219 17.5219 13.6969 17.5219 9C17.5219 4.30312 13.6969 0.506248 8.99998 0.506248ZM8.99998 16.2562C5.00623 16.2562 1.77185 12.9937 1.77185 9C1.77185 5.00625 5.00623 1.77187 8.99998 1.77187C12.9937 1.77187 16.2562 5.03437 16.2562 9.02812C16.2562 12.9937 12.9937 16.2562 8.99998 16.2562Z"
                        fill="white" />
                    <path
                        d="M11.4187 6.38437L8.07183 9.64687L6.55308 8.15625C6.29996 7.90312 5.90621 7.93125 5.65308 8.15625C5.39996 8.40937 5.42808 8.80312 5.65308 9.05625L7.45308 10.8C7.62183 10.9687 7.84683 11.0531 8.07183 11.0531C8.29683 11.0531 8.52183 10.9687 8.69058 10.8L12.3187 7.3125C12.5718 7.05937 12.5718 6.66562 12.3187 6.4125C12.0656 6.15937 11.6718 6.15937 11.4187 6.38437Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_961_15637">
                        <rect width="18" height="18" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="w-full">
            <h5 class="mb-2 text-lg font-bold text-slate-600 uppercase">
                {{ __('Verifikasi') }}
            </h5>
            <p class="text-body-color text-base leading-relaxed">
                {{ __('Pendaftaran atas nama') }}
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    {{ __('[nama anak]') }}
                </span>
                {{ __('telah kami terima dan saat ini sedang menunggu verifikasi dari pengurus. Kami akan menginformasikan hasilnya setelah proses verifikasi selesai.') }}
            </p>
            <p class="text-body-color text-base leading-relaxed mt-3">
                {{ __('Data Pendaftaran anda bisa di lihat disini') }}
                <span class="font-bold text-slate-600 dark:text-gray-300 hover:underline cursor-pointer">
                    {{ __('Lihat Detail') }}
                </span>
            </p>
        </div>
    </div>

    <div class="border-secondary bg-green-100 text-start flex w-full rounded-lg border-l-[6px] mb-5 px-7 py-8 md:p-6">
        <div class="bg-secondary mr-5 flex h-[34px] w-full max-w-[34px] items-center justify-center rounded-md">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_961_15637)">
                    <path
                        d="M8.99998 0.506248C4.3031 0.506248 0.506226 4.30312 0.506226 9C0.506226 13.6969 4.3031 17.5219 8.99998 17.5219C13.6969 17.5219 17.5219 13.6969 17.5219 9C17.5219 4.30312 13.6969 0.506248 8.99998 0.506248ZM8.99998 16.2562C5.00623 16.2562 1.77185 12.9937 1.77185 9C1.77185 5.00625 5.00623 1.77187 8.99998 1.77187C12.9937 1.77187 16.2562 5.03437 16.2562 9.02812C16.2562 12.9937 12.9937 16.2562 8.99998 16.2562Z"
                        fill="white" />
                    <path
                        d="M11.4187 6.38437L8.07183 9.64687L6.55308 8.15625C6.29996 7.90312 5.90621 7.93125 5.65308 8.15625C5.39996 8.40937 5.42808 8.80312 5.65308 9.05625L7.45308 10.8C7.62183 10.9687 7.84683 11.0531 8.07183 11.0531C8.29683 11.0531 8.52183 10.9687 8.69058 10.8L12.3187 7.3125C12.5718 7.05937 12.5718 6.66562 12.3187 6.4125C12.0656 6.15937 11.6718 6.15937 11.4187 6.38437Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_961_15637">
                        <rect width="18" height="18" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="w-full">
            <h5 class="mb-2 text-lg font-bold text-primary uppercase">
                {{ __('Lulus') }}
            </h5>
            <p class="text-body-color text-base leading-relaxed">
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    {{ __('Selamat! ') }}
                </span>
                {{ __('Pendaftaran atas nama') }}
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    {{ __('[nama anak]') }}
                </span>
                {{ __('telah diterima. Kami sangat senang menyambut') }}
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    {{ __('[nama anak]') }}
                </span>
                {{ __('sebagai bagian dari [nama sekolah/lembaga]. Informasi selanjutnya akan segera kami kirimkan.') }}
            </p>
            <p class="text-body-color text-base leading-relaxed mt-3">
                {{ __('Data Pendaftaran anda bisa di lihat disini') }}
                <span class="font-bold text-primary dark:text-gray-300 hover:underline cursor-pointer">
                    {{ __('Lihat Detail') }}
                </span>
            </p>
        </div>
    </div>

    <div class="border-red-500 bg-red-100 text-start flex w-full rounded-lg border-l-[6px] mb-5 px-7 py-8 md:p-6">
        <div class="bg-red-500 mr-5 flex h-[34px] w-full max-w-[34px] items-center justify-center rounded-md">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_961_15637)">
                    <path
                        d="M8.99998 0.506248C4.3031 0.506248 0.506226 4.30312 0.506226 9C0.506226 13.6969 4.3031 17.5219 8.99998 17.5219C13.6969 17.5219 17.5219 13.6969 17.5219 9C17.5219 4.30312 13.6969 0.506248 8.99998 0.506248ZM8.99998 16.2562C5.00623 16.2562 1.77185 12.9937 1.77185 9C1.77185 5.00625 5.00623 1.77187 8.99998 1.77187C12.9937 1.77187 16.2562 5.03437 16.2562 9.02812C16.2562 12.9937 12.9937 16.2562 8.99998 16.2562Z"
                        fill="white" />
                    <path
                        d="M11.4187 6.38437L8.07183 9.64687L6.55308 8.15625C6.29996 7.90312 5.90621 7.93125 5.65308 8.15625C5.39996 8.40937 5.42808 8.80312 5.65308 9.05625L7.45308 10.8C7.62183 10.9687 7.84683 11.0531 8.07183 11.0531C8.29683 11.0531 8.52183 10.9687 8.69058 10.8L12.3187 7.3125C12.5718 7.05937 12.5718 6.66562 12.3187 6.4125C12.0656 6.15937 11.6718 6.15937 11.4187 6.38437Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_961_15637">
                        <rect width="18" height="18" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="w-full">
            <h5 class="mb-2 text-lg font-bold text-red-700 uppercase">
                {{ __('Gagal') }}
            </h5>
            <p class="text-body-color text-base leading-relaxed">
                {{ __('Kami mohon maaf, Pendaftaran atas nama') }}
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    $nama_anak
                </span>
                {{ __('belum dapat kami terima pada periode ini. Terima kasih atas kepercayaan Bapak/Ibu kepada') }}
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    {{ __('[nama sekolah/lembaga].') }}
                </span>
                {{ __('Semoga tetap semangat dan sukses selalu.') }}
            </p>
            <p class="text-body-color text-base leading-relaxed mt-3">
                {{ __('Data Pendaftaran anda bisa di lihat disini') }}
                <span class="font-bold text-red-700 dark:text-gray-300 hover:underline cursor-pointer">
                    {{ __('Lihat Detail') }}
                </span>
            </p>
        </div>
    </div>  --}}

    <div>
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($riwayat as $data)
            @php
                $status_pendaftaran = $data->status_pendaftaran;
                $nama_anak = $data->nama_siswa;
                $nomor_registrasi = $data->nomor_registrasi;

                $cardClasses = '';
                $title = '';
                $messagePrefix = '';
                $messageRegistrasi = '';
                $messageSuffix = '';
                $colorText = '';
                $highlight = '';

                switch ($status_pendaftaran) {
                    case 'pending':
                        $cardClasses = 'border-warning bg-yellow-100';
                        $colorText = 'text-warning';
                        $highlight = 'bg-warning';
                        $title = 'Pending';
                        $messagePrefix = 'Pendaftaran atas nama';
                        $messageRegistrasi = 'dengan Nomor Registrasi :';
                        $messageSuffix =
                            'masih belum lengkap. Mohon Bapak/Ibu dapat segera melengkapi data yang diperlukan agar proses dapat dilanjutkan. Terima kasih atas perhatian Bapak/Ibu.';
                        break;
                    case 'verifikasi':
                        $cardClasses = 'border-gray-500 bg-slate-200';
                        $colorText = 'text-slate-600';
                        $highlight = 'bg-gray-500';
                        $title = 'Verifikasi';
                        $messagePrefix = 'Pendaftaran atas nama';
                        $messageRegistrasi = 'dengan Nomor Registrasi :';
                        $messageSuffix =
                            'telah kami terima dan saat ini sedang menunggu verifikasi dari pengurus. Kami akan menginformasikan hasilnya setelah proses verifikasi selesai.';
                        break;
                    case 'diterima':
                        $cardClasses = 'border-secondary bg-green-100';
                        $colorText = 'text-primary';
                        $highlight = 'bg-secondary';
                        $title = 'Lulus';
                        $messagePrefix = 'Selamat! Pendaftaran atas nama';
                        $messageRegistrasi = 'dengan Nomor Registrasi :';
                        $messageSuffix = "telah diterima. Kami sangat senang menyambut $nama_anak sebagai bagian dari SD Islam Nurul Haq. Informasi selanjutnya akan segera kami kirimkan.";
                        break;
                    case 'ditolak':
                        $cardClasses = 'border-red-500 bg-red-100';
                        $colorText = 'text-red-700';
                        $highlight = 'bg-red-500';
                        $title = 'Gagal';
                        $messagePrefix = 'Kami mohon maaf, Pendaftaran atas nama';
                        $messageRegistrasi = ', dengan Nomor Registrasi :';
                        $messageSuffix =
                            'belum dapat kami terima pada periode ini. Terima kasih atas kepercayaan Bapak/Ibu kepada SD Islam Nurul Haq. Semoga tetap semangat dan sukses selalu.';
                        break;
                }
            @endphp

            <div class="{{ $cardClasses }} text-start flex w-full rounded-lg border-l-[6px] mb-5 px-7 py-8 md:p-6">
                <div
                    class="{{ $highlight }} mr-5 flex h-[34px] w-full max-w-[34px] items-center justify-center rounded-md">
                    <!-- Icon -->
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_961_15637)">
                            <path
                                d="M8.99998 0.506248C4.3031 0.506248 0.506226 4.30312 0.506226 9C0.506226 13.6969 4.3031 17.5219 8.99998 17.5219C13.6969 17.5219 17.5219 13.6969 17.5219 9C17.5219 4.30312 13.6969 0.506248 8.99998 0.506248ZM8.99998 16.2562C5.00623 16.2562 1.77185 12.9937 1.77185 9C1.77185 5.00625 5.00623 1.77187 8.99998 1.77187C12.9937 1.77187 16.2562 5.03437 16.2562 9.02812C16.2562 12.9937 12.9937 16.2562 8.99998 16.2562Z"
                                fill="white" />
                            <path
                                d="M11.4187 6.38437L8.07183 9.64687L6.55308 8.15625C6.29996 7.90312 5.90621 7.93125 5.65308 8.15625C5.39996 8.40937 5.42808 8.80312 5.65308 9.05625L7.45308 10.8C7.62183 10.9687 7.84683 11.0531 8.07183 11.0531C8.29683 11.0531 8.52183 10.9687 8.69058 10.8L12.3187 7.3125C12.5718 7.05937 12.5718 6.66562 12.3187 6.4125C12.0656 6.15937 11.6718 6.15937 11.4187 6.38437Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_961_15637">
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="w-full">
                    <h5 class="mb-2 text-lg font-bold {{ $colorText }} uppercase">
                        {{ __($title) }}
                    </h5>
                    <p class="text-body-color text-base leading-relaxed">
                        {{ __($messagePrefix) }}
                        <span class="font-bold text-slate-800 dark:text-gray-300">{{ $nama_anak }}</span>
                        {{ __($messageRegistrasi) }}
                        <span class="font-bold text-slate-800 dark:text-gray-300">{{ $nomor_registrasi }}</span>
                        {{ __($messageSuffix) }}
                    </p>
                </div>
            </div>
        @empty
            <div class="w-full">
                <span
                    class="w-full flex items-center bg-orange-500/10 text-orange-500 m-2 rounded-full border border-transparent px-2.5 md:px-3 py-1 md:py-3 text-xs font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    <p class="md:pl-2">
                        {{ __('Belum ada Riwayat Pendaftaran') }}
                    </p>
                </span>
            </div>
        @endforelse
    </div>

    <div class="p-3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="pb-1 px-2 flex justify-between items-center">
            <div>
                <h2 class="text-base font-bold leading-7 text-primary dark:text-secondary">
                    {{ __('Data Riwayat Pendaftaran') }}
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-300">
                    {{ __('Berisikan riwayat data pendaftaran yang pernah dikirim') }}
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
                            <th scope="col" class="px-4 py-3 text-center">{{ __('No') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Nomor Registrasi') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Nama Siswa') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Tahun Ajaran') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Gelombang') }}</th>
                            <th scope="col" class="px-4 py-3 text-center">{{ __('Status') }}</th>
                            <th scope="col" class="px-2 py-1 text-center">
                                <span>{{ __('Actions') }}</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayat as $data)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 text-center">
                                    <p><strong>{{ $data->nomor_registrasi }}</strong></p>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <p>{{ $data->nama_siswa }}</p>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    {{ 'TA ' . $data->gelombang->tanggal_mulai->format('Y') . '/' . $data->gelombang->tanggal_mulai->addYear()->format('Y') }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    {{ 'Gelombang ke-' . $data->gelombang->gelombang }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @php
                                        $status_pendaftaran = $data->status_pendaftaran;
                                        $badge = '';
                                        switch ($status_pendaftaran) {
                                            case 'verifikasi':
                                                $badge =
                                                    '<span class="bg-slate-200  text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300">Menunggu Verifikasi</span>';
                                                break;
                                            case 'ditolak':
                                                $badge =
                                                    '<span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Gagal</span>';
                                                break;
                                            case 'diterima':
                                                $badge =
                                                    '<span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Lulus</span>';
                                                break;
                                            case 'pending':
                                                $badge =
                                                    '<span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">Pending</span>';
                                                break;
                                            default:
                                                $badge =
                                                    '<span class="bg-gray-200 text-gray-600 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm">Tidak diketahui</span>';
                                                break;
                                        }
                                    @endphp

                                    {!! $badge !!}
                                </td>
                                <td class="px-2 py-3 flex items-center justify-center gap-1">
                                    <x-button href="{{ route('user.riwayat-pendaftaran.show', $data->uuid) }}"
                                        size="sm" class="hover:underline" variant="info">
                                        {{ __('Detail') }}
                                    </x-button>
                                    <x-button href="{{ route('user.riwayat-pendaftaran.edit', $data->uuid) }}"
                                        size="sm" class="hover:underline" variant="primary">
                                        {{ __('Edit') }}
                                    </x-button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center">
                                    <span class="text-sm text-gray-500">{{ __('Belum ada pendaftaran.') }}</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
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
