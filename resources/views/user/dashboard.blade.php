<x-app-layout>
    {{--  <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard User') }}
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
    </x-slot>  --}}
    @if (session('success'))
        <div class="rounded-md bg-[#C4F9E2] p-4 mb-3">
            <p class="flex items-center text-sm font-medium text-[#004434]">
                <span class="pr-3">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10" cy="10" r="10" fill="#00B078" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.1203 6.78954C14.3865 7.05581 14.3865 7.48751 14.1203 7.75378L9.12026 12.7538C8.85399 13.02 8.42229 13.02 8.15602 12.7538L5.88329 10.4811C5.61703 10.2148 5.61703 9.78308 5.88329 9.51682C6.14956 9.25055 6.58126 9.25055 6.84753 9.51682L8.63814 11.3074L13.156 6.78954C13.4223 6.52328 13.854 6.52328 14.1203 6.78954Z"
                            fill="white" />
                    </svg>
                </span>
                {{ session('success') }}
            </p>
        </div>
    @endif
    @if ($errors->any())
        <div
            class="w-full bg-red-700/15 inline-flex rounded-lg px-[18px] py-4 shadow-[0px_2px_10px_0px_rgba(0,0,0,0.08)] mb-3">
            <p class="flex items-center text-sm font-medium text-[#BC1C21]">
                <span class="bg-red-700 mr-3 flex h-5 w-5 items-center justify-center rounded-full">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_961_15656)">
                            <path
                                d="M6 0.337494C2.86875 0.337494 0.3375 2.86874 0.3375 5.99999C0.3375 9.13124 2.86875 11.6812 6 11.6812C9.13125 11.6812 11.6813 9.13124 11.6813 5.99999C11.6813 2.86874 9.13125 0.337494 6 0.337494ZM6 10.8375C3.3375 10.8375 1.18125 8.66249 1.18125 5.99999C1.18125 3.33749 3.3375 1.18124 6 1.18124C8.6625 1.18124 10.8375 3.35624 10.8375 6.01874C10.8375 8.66249 8.6625 10.8375 6 10.8375Z"
                                fill="white" />
                            <path
                                d="M7.725 4.25625C7.55625 4.0875 7.29375 4.0875 7.125 4.25625L6 5.4L4.85625 4.25625C4.6875 4.0875 4.425 4.0875 4.25625 4.25625C4.0875 4.425 4.0875 4.6875 4.25625 4.85625L5.4 6L4.25625 7.14375C4.0875 7.3125 4.0875 7.575 4.25625 7.74375C4.33125 7.81875 4.44375 7.875 4.55625 7.875C4.66875 7.875 4.78125 7.8375 4.85625 7.74375L6 6.6L7.14375 7.74375C7.21875 7.81875 7.33125 7.875 7.44375 7.875C7.55625 7.875 7.66875 7.8375 7.74375 7.74375C7.9125 7.575 7.9125 7.3125 7.74375 7.14375L6.6 6L7.74375 4.85625C7.89375 4.6875 7.89375 4.425 7.725 4.25625Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_961_15656">
                                <rect width="12" height="12" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </span>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </p>
        </div>
    @endif

    <div class="justify-center min-h-screen items-center text-center md:py-5">
        <div class="">
            <h5 class="mb-2 md:text-3xl text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('Selamat Datang, Generasi Baru!') }}
            </h5>
            <p class="mb-7 md:mx-48 mx-5 text-sm text-gray-500 sm:text-base dark:text-gray-400">
                {{ __('Selamat datang, ') }}
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    {{ Auth::user()->name }}
                </span>
                {{ __(' Kami sangat senang kamu telah resmi menjadi bagian dari keluarga besar') }}
                <span class="font-bold text-slate-800 dark:text-gray-300">
                    {{ __('SD ISLAM NURUL HAQ.') }}
                </span>
            </p>
        </div>

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

            <div class="{{ $cardClasses }} text-start flex w-full rounded-lg border-l-[6px] mb-10 px-7 py-8 md:p-6">
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
                    <p class="text-body-color text-base leading-relaxed mt-3">
                        {{ __('Data Pendaftaran anda bisa di lihat disini') }}
                        <a href="{{ route('user.riwayat-pendaftaran.index', Auth::user()) }}"
                            class="font-bold {{ $colorText }} dark:text-gray-300 hover:underline cursor-pointer">
                            {{ __('Lihat Detail') }}
                        </a>
                    </p>
                </div>
            </div>
        @empty
            <p>Belum ada riwayat pendaftaran.</p>
        @endforelse

        {{-- === GELOMBANG PENDAFTARAN === --}}
        @if ($gelombangAktif->isEmpty())
            <div class="w-full">
                <span
                    class="w-full flex items-center bg-orange-500/10 text-orange-500 m-2 rounded-full border border-transparent px-2.5 md:px-3 py-1 md:py-3 text-xs font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    <p class="md:pl-2">
                        {{ __('Belum ada gelombang Pendaftaran yang dibuka, silahkan cek secara berkala') }}
                    </p>
                </span>
            </div>
        @elseif ($sudahDaftar)
            <p class="text-gray-500">Anda sudah mendaftar di gelombang.</p>
        @else
            <div class="flex items-center gap-3">
                @foreach ($gelombangAktif as $gelombang)
                    <div
                        class="md:w-1/3 overflow-hidden border-primary shadow-1 dark:bg-dark-2 flex flex-col w-full rounded-lg border-l-[6px] bg-white mb-5">
                        <div class="w-full text-start px-7 py-8 md:p-5">
                            <h5 class="text-dark mb-3 text-lg font-bold dark:text-white">
                                {{ __('PPDB Tahun Ajaran ') }}
                                {{ $gelombang->tanggal_mulai->format('Y') }}/{{ $gelombang->tanggal_mulai->addYear()->format('Y') }}
                            </h5>
                            <p class="text-body-color dark:text-dark-6 text-sm leading-relaxed">
                                {{ __('Pendaftaran ') }}
                                <span class="font-bold text-slate-800 dark:text-gray-300">
                                    {{ __('Gelombang Ke-') }}
                                    {{ $gelombang->gelombang }}
                                </span>
                                {{ __('telah dibuka dengan kuota') }}
                                <span class="font-bold text-slate-800 dark:text-gray-300">
                                    {{ $gelombang->kuota }}{{ __(' Peserta') }}
                                </span>
                            </p>
                        </div>

                        <a href="{{ route('user.formulir.create', $gelombang->uuid) }}"
                            class="w-full text-start px-5 py-3 bg-gray-200 hover:bg-gray-300 text-primary inline-block text-sm font-bold">
                            {{ __('Daftar Sekarang!') }}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-app-layout>
