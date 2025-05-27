<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Siswa') }}
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
                            {{ __('Data Siswa') }}
                        </span>
                    </div>
                </li>
            </ol>
        </div>
    </x-slot>

    {{--  <h1>User: {{ $data->user->uuid }}</h1>
    <h1>Detail Pendaftaran: {{ $data->nama_siswa }}</h1>
    <p>Nomor Registrasi: {{ $data->nomor_registrasi }}</p>
    <p>Nama: {{ $data->nama_siswa }}</p>
    <p>Status: {{ $data->status_pendaftaran }}</p>
    <p>Gelombang: {{ $data->gelombang->gelombang }}</p>

    <p>Alamat: {{ $data->alamat->uuid ?? '-' }}</p>
    <p>Orang Tua: {{ $data->orangTua->uuid ?? '-' }}</p>
    <p>Sekolah Asal: {{ $data->sekolahAsal->uuid ?? '-' }}</p>
    <!-- tambahkan data lain sesuai kebutuhan -->  --}}

    <div class="flex justify-center min-h-screen">
        <div class="w-full p-6 max-w-2xl">
            <div class="rounded-lg border bg-white px-4 pt-8 pb-10 shadow-lg">
                <div class="mb-6 mr-4 flex items-center justify-end gap-x-6">
                    <button class="text-sm/6 font-semibold text-gray-900 hover:underline">
                        {{ __('Keluar') }}
                    </button>
                    <a type="submit" href="{{ route('user.riwayat-pendaftaran.download', $data->uuid) }}"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 hover:underline">
                        <i class="fa-solid fa-print"></i>
                        {{ __('Cetak') }}
                    </a>
                </div>
                <div class="items-start mx-auto w-36 rounded-full">
                    {{--  <span
                        class="absolute right-0 m-3 h-3 w-3 rounded-full bg-green-500 ring-2 ring-green-300 ring-offset-2"></span>  --}}
                    <img class="mx-auto h-auto w-full rounded-full"
                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                        alt="" />
                </div>
                <h1 class="my-1 text-center text-xl font-bold leading-8 text-gray-900">{{ $data->nama_siswa }}</h1>
                <h3 class="font-lg text-semibold text-center leading-6 text-gray-600">{{ $data->nomor_registrasi }}
                </h3>
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2">
                            <a href="#"
                                class="tab-link inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500"
                                data-tab="tab-siswa" aria-current="page">Data Siswa</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                data-tab="tab-alamat">Data
                                Alamat</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                data-tab="tab-orangtua">Data
                                Orang Tua</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                data-tab="tab-sekolah">Data
                                Sekolah Asal</a>
                        </li>
                    </ul>
                </div>

                @php
                    $jarak_sekolah = [
                        '< 1KM' => 'Kurang dari 1 KM',
                        '1KM-5KM' => '1 sampai 5 KM',
                        '> 5KM' => 'Lebih dari 5 KM',
                    ];

                    function formatRupiah($angka)
                    {
                        return 'Rp. ' . number_format($angka, 0, ',', '.');
                    }

                    $data_siswa = [
                        'Nama' => $data->nama_siswa,
                        'NISN' => $data->nisn,
                        'NIS' => $data->nis,
                        'Jenis Kelamin' => $data->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan',
                        'Tempat Lahir' => $data->tempat_lahir,
                        'Tanggal Lahir' => \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y'),
                        'Jumlah Saudara' => $data->jmlh_saudara . ' Orang',
                        'Anak Ke' => 'Anak ke-' . $data->anak_ke,
                    ];

                    $data_alamat = [
                        'Jenis Tempat Tinggal' => $data->alamat->jenis_tmpt_tinggal,
                        'Alamat' => $data->alamat->alamat,
                        'Desa' => $data->alamat->desa,
                        'Kecamatan' => $data->alamat->kecamatan,
                        'Jarak ke Sekolah' => $jarak_sekolah[$data->alamat->jarak] ?? $data->alamat->jarak,
                        'Transportasi' => $data->alamat->transportasi,
                    ];

                    $data_orang_tua = [
                        'No KK' => $data->orangTua->no_kk,
                        'Kepala Keluarga' => $data->orangTua->kepala_keluarga,
                        'Nama Ayah' => $data->orangTua->nama_ayah,
                        'NIK Ayah' => $data->orangTua->nik_ayah,
                        'Tahun Lahir Ayah' => $data->orangTua->thn_lahir_ayah,
                        'Pendidikan Ayah' => $data->orangTua->pendidikan_ayah,
                        'Pekerjaan Ayah' => $data->orangTua->pekerjaan_ayah,
                        'Penghasilan Ayah' => formatRupiah($data->orangTua->penghasilan_ayah),
                        'Nama Ibu' => $data->orangTua->nama_ibu,
                        'NIK Ibu' => $data->orangTua->nik_ibu,
                        'Tahun Lahir Ibu' => $data->orangTua->thn_lahir_ibu,
                        'Pendidikan Ibu' => $data->orangTua->pendidikan_ibu,
                        'Pekerjaan Ibu' => $data->orangTua->pekerjaan_ibu,
                        'Penghasilan Ibu' => formatRupiah($data->orangTua->penghasilan_ibu),
                    ];

                    $data_sekolah = [
                        'Asal Sekolah' => $data->sekolahAsal->asal_sekolah,
                        'Jenjang' => $data->sekolahAsal->jenjang,
                        'NPSN' => $data->sekolahAsal->npsn,
                    ];
                @endphp


                {{-- Data Siswa --}}
                <div id="tab-siswa" class="tab-content">
                    <ul class="mt-3 divide-y rounded bg-gray-100 py-2 px-3">
                        @foreach ($data_siswa as $label => $value)
                            <li class="flex items-center py-3 text-sm">
                                <span class="font-bold w-40">{{ $label }}</span>
                                <span>{{ ': ' . $value ?? '-' }}</span>
                            </li>
                        @endforeach
                </div>

                {{-- Data Alamat --}}
                <div id="tab-alamat" class="tab-content hidden">
                    <ul class="mt-3 divide-y rounded bg-gray-100 py-2 px-3">
                        @foreach ($data_alamat as $label => $value)
                            <li class="flex items-center py-3 text-sm">
                                <span class="font-bold w-40">{{ $label }}</span>
                                <span>{{ ': ' . $value ?? '-' }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Data Orang Tua --}}
                <div id="tab-orangtua" class="tab-content hidden">
                    <ul class="mt-3 divide-y rounded bg-gray-100 py-2 px-3">
                        @foreach ($data_orang_tua as $label => $value)
                            <li class="flex items-center py-3 text-sm">
                                <span class="font-bold w-40">{{ $label }}</span>
                                <span>{{ ': ' . $value ?? '-' }}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>

                {{-- Data Sekolah Asal --}}
                <div id="tab-sekolah" class="tab-content hidden">
                    <ul class="mt-3 divide-y rounded bg-gray-100 py-2 px-3">
                        @foreach ($data_sekolah as $label => $value)
                            <li class="flex items-center py-3 text-sm">
                                <span class="font-bold w-40">{{ $label }}</span>
                                <span>{{ ': ' . $value ?? '-' }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>




    {{--  <div class="w-full flex md:justify-center items-center">
        <div
            class="p-3 w-full flex md:justify-center items-center overflow-hidden max-w-3xl bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <h1>User: {{ $data->user->uuid }}</h1>
            <h1>Detail Pendaftaran: {{ $data->nama_siswa }}</h1>
            <p>Nomor Registrasi: {{ $data->nomor_registrasi }}</p>
            <p>Nama: {{ $data->nama_siswa }}</p>
            <p>Status: {{ $data->status_pendaftaran }}</p>
            <p>Gelombang: {{ $data->gelombang->gelombang }}</p>

            <p>Alamat: {{ $data->alamat->uuid ?? '-' }}</p>
            <p>Orang Tua: {{ $data->orangTua->uuid ?? '-' }}</p>
            <p>Sekolah Asal: {{ $data->sekolahAsal->uuid ?? '-' }}</p>
            <!-- tambahkan data lain sesuai kebutuhan -->
            <div class="px-4 sm:px-0">
                <h3 class="text-base/7 font-semibold text-gray-900">Data Siswa</h3>
                <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">Personal details and application.</p>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm/6 font-medium text-gray-900">Nama Siswa </dt>
                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">Margot Foster</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm/6 font-medium text-gray-900">Application for</dt>
                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">Backend Developer</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm/6 font-medium text-gray-900">Email address</dt>
                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">margotfoster@example.com</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm/6 font-medium text-gray-900">Salary expectation</dt>
                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">$120,000</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm/6 font-medium text-gray-900">About</dt>
                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">Fugiat ipsum ipsum deserunt culpa
                            aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip
                            consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud
                            pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm/6 font-medium text-gray-900">Attachments</dt>
                        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm/6">
                                    <div class="flex w-0 flex-1 items-center">
                                        <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                            <span class="truncate font-medium">resume_back_end_developer.pdf</span>
                                            <span class="shrink-0 text-gray-400">2.4mb</span>
                                        </div>
                                    </div>
                                    <div class="ml-4 shrink-0">
                                        <a href="#"
                                            class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    </div>
                                </li>
                                <li class="flex items-center justify-between py-4 pr-5 pl-4 text-sm/6">
                                    <div class="flex w-0 flex-1 items-center">
                                        <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                            <span class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                                            <span class="shrink-0 text-gray-400">4.5mb</span>
                                        </div>
                                    </div>
                                    <div class="ml-4 shrink-0">
                                        <a href="#"
                                            class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>  --}}



</x-app-layout>
