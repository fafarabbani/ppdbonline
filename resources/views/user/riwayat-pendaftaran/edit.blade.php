<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Pendaftaran Tahun Ajaran') }}
                {{ $data->gelombang->tanggal_mulai->format('y') }}/{{ $data->gelombang->tanggal_mulai->addYear()->format('y') }}
            </h2>

            <!-- Breadcrumb -->
            <ol class="inline-flex items-center space-x-2 md:space-x-3 rtl:space-x-reverse">
                <li aria-current="page">
                    <div class="flex items-center px-1">
                        <span class="ms-1 px-1 text-sm font-medium text-gray-400 md:ms-2 dark:text-gray-400">
                            {{ __('Gelombang Ke-') }}
                            {{ $data->gelombang->gelombang }}
                        </span>
                    </div>
                </li>
            </ol>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="rounded-md bg-[#C4F9E2] p-4 mb-3">
            <p class="flex items-center text-sm font-medium text-[#004434]">
                <span class="pr-3">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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


    <div class="p-3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="overflow-x-auto">
            <form method="POST" action="{{ route('user.riwayat-pendaftaran.update', $data->uuid) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-12 ">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-gray-900">
                            {{ __('Edit Formulir Pendaftaran') }}
                        </h2>
                        <p class="mt-1 text-sm/6 text-gray-600">{{ __('Pastikan data yang diisi valid dan sesuai.') }}
                        </p>

                        {{--  <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                            <li
                                class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                                <span
                                    class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                                    1
                                </span>
                                <span>
                                    <h3 class="font-medium leading-tight">User info</h3>
                                    <p class="text-sm">Step details here</p>
                                </span>
                            </li>
                            <li
                                class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                                <span
                                    class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                                    2
                                </span>
                                <span>
                                    <h3 class="font-medium leading-tight">Company info</h3>
                                    <p class="text-sm">Step details here</p>
                                </span>
                            </li>
                            <li
                                class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                                <span
                                    class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                                    3
                                </span>
                                <span>
                                    <h3 class="font-medium leading-tight">Payment info</h3>
                                    <p class="text-sm">Step details here</p>
                                </span>
                            </li>
                        </ol>  --}}

                        <div class="md:flex mt-10 md:items-center">
                            <div class="md:w-1/6">
                                <label
                                    class="block text-gray-900 font-bold dark:text-gray-300 text-sm md:text-left md:mb-0"
                                    for="nama-calon-siswa">
                                    {{ __('A. Data Siswa') }}
                                </label>
                            </div>
                        </div>

                        <div class="items-center text-gray-300 w-full py-2 mb-2">
                            <hr class="border-gray-300">
                        </div>

                        {{--  Data Siswa  --}}
                        <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <input type="hidden" name="gelombang_id" value="{{ $data->gelombang->id }}">
                            <input type="hidden" name="nomor_registrasi" value="{{ $data->nomor_registrasi }}">

                            <div class="sm:col-span-3">
                                <label for="nomor_registrasi" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('No Registrasi:') }}
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="nomor_registrasi" id="nomor_registrasi"
                                        value="{{ $data->nomor_registrasi }}"
                                        class=" block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        readonly>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nama_siswa" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Nama') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="nama_siswa" id="nama_siswa"
                                        value="{{ old('nama_siswa', $data->nama_siswa) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('nama_siswa')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nisn" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('NISN:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="nisn" id="nisn"
                                        value="{{ old('nisn', $data->nisn) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('nisn')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nis" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('NIS:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="nis" id="nis"
                                        value="{{ old('nis', $data->nis) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('nis')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="tempat_lahir" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Tempat Lahir:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        value="{{ old('tempat_lahir', $data->tempat_lahir) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('tempat_lahir')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="tanggal_lahir" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Tanggal Lahir:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('tanggal_lahir')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="jenis_kelamin" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Jenis Kelamin:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                        <option value="L" @selected(old('jenis_kelamin', $data->jenis_kelamin) == 'L')>Laki-laki</option>
                                        <option value="P" @selected(old('jenis_kelamin', $data->jenis_kelamin) == 'P')>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="jmlh_saudara" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Jumlah Saudara:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="jmlh_saudara" id="jmlh_saudara"
                                        value="{{ old('jmlh_saudara', $data->jmlh_saudara) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('jmlh_saudara')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="anak_ke" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Anak Ke:') }}
                                    <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input type="number" name="anak_ke" id="anak_ke"
                                        value="{{ old('anak_ke', $data->anak_ke) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('anak_ke')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{--  <div class="col-span-full">
                                <label for="foto" class="block text-sm/6 font-medium text-gray-900">foto</label>
                                <div class="mt-2 flex items-center gap-x-3">
                                    <svg class="size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <button type="button"
                                        class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50">
                                        Change</button>
                                </div>
                            </div>  --}}
                        </div>

                        <div class="md:flex mt-10 md:items-center">
                            <div class="md:w-1/6">
                                <label
                                    class="block text-gray-900 font-bold dark:text-gray-300 text-sm md:text-left md:mb-0"
                                    for="nama-calon-siswa">
                                    {{ __('B. Data Alamat') }}
                                </label>
                            </div>
                        </div>

                        <div class="items-center text-gray-300 w-full py-2 mb-2">
                            <hr class="border-gray-300">
                        </div>

                        {{--  Data Alamat  --}}
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-3">
                                <label for="jenis_tmpt_tinggal" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Jenis Tempat Tinggal:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <select name="jenis_tmpt_tinggal" id="jenis_tmpt_tinggal"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                        {{--  <option>-- Pilih --</option>  --}}
                                        <option value="Bersama Orang Tua" @selected(old('jenis_tmpt_tinggal', $data->alamat->jenis_tmpt_tinggal) == 'Bersama Orang Tua')>
                                            Bersama Orang Tua
                                        </option>
                                        <option value="Bersama Wali" @selected(old('jenis_tmpt_tinggal', $data->alamat->jenis_tmpt_tinggal) == 'Bersama Wali')>
                                            Bersama Wali
                                        </option>
                                        <option value="Kost" @selected(old('jenis_tmpt_tinggal', $data->alamat->jenis_tmpt_tinggal) == 'Kost')>
                                            Kost
                                        </option>
                                        <option value="Asrama" @selected(old('jenis_tmpt_tinggal', $data->alamat->jenis_tmpt_tinggal) == 'Asrama')>
                                            Asrama
                                        </option>
                                        <option value="Panti Asuhan" @selected(old('jenis_tmpt_tinggal', $data->alamat->jenis_tmpt_tinggal) == 'Panti Asuhan')>
                                            Panti Asuhan
                                        </option>
                                        <option value="Lainnya" @selected(old('jenis_tmpt_tinggal', $data->alamat->jenis_tmpt_tinggal) == 'Lainnya')>
                                            Lainnya
                                        </option>
                                    </select>
                                    @error('jenis_tmpt_tinggal')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="alamat" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Alamat:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="alamat" id="alamat"
                                        value="{{ old('alamat', $data->alamat->alamat) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('alamat')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="desa" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Desa:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="desa" id="desa"
                                        value="{{ old('desa', $data->alamat->desa) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('desa')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="kecamatan" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Kecamatan:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="kecamatan" id="kecamatan"
                                        value="{{ old('kecamatan', $data->alamat->kecamatan) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('kecamatan')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="jarak" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Jarak dari Rumah:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <select name="jarak" id="jarak"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                        {{--  <option>-- Pilih --</option>  --}}
                                        <option value="< 1KM" @selected(old('jarak', $data->alamat->jarak) == '< 1KM')>
                                            < 1 KM </option>
                                        <option value="1KM-5KM" @selected(old('jarak', $data->alamat->jarak) == '1KM-5KM')>
                                            1 KM - 5 KM
                                        </option>
                                        <option value="> 5KM" @selected(old('jarak', $data->alamat->jarak) == '> 5KM')>
                                            > 5 KM
                                        </option>
                                    </select>
                                    @error('jarak')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="transportasi" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Transportasi:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <select name="transportasi" id="transportasi"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                        {{--  <option>-- Pilih --</option>  --}}
                                        <option value="Jalan kaki" @selected(old('transportasi', $data->alamat->transportasi) == 'Jalan kaki')>
                                            Jalan Kaki </option>
                                        <option value="Kendaraan Pribadi" @selected(old('transportasi', $data->alamat->transportasi) == 'Kendaraan Pribadi')>
                                            Kendaraan Pribadi
                                        </option>
                                        <option value="Kendaraan Umum/Angkot" @selected(old('transportasi', $data->alamat->transportasi) == 'Kendaraan Umum/Angkot')>
                                            Kendaraan Umum/Angkot
                                        </option>
                                        <option value="Jemputan Sekolah" @selected(old('transportasi', $data->alamat->transportasi) == 'Jemputan Sekolah')>
                                            Jemputan Sekolah
                                        </option>
                                        <option value="Ojek" @selected(old('transportasi', $data->alamat->transportasi) == 'Ojek')>
                                            Ojek
                                        </option>
                                        <option value="Sepeda" @selected(old('transportasi', $data->alamat->transportasi) == 'Sepeda')>
                                            Sepeda
                                        </option>
                                        <option value="Lainnya" @selected(old('transportasi', $data->alamat->transportasi) == 'Lainnya')>
                                            Lainnya
                                        </option>
                                    </select>
                                    @error('transportasi')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="md:flex mt-10 md:items-center">
                            <div class="md:w-1/6">
                                <label
                                    class="block text-gray-900 font-bold dark:text-gray-300 text-sm md:text-left md:mb-0"
                                    for="nama-calon-siswa">
                                    {{ __('C. Data Orang Tua') }}
                                </label>
                            </div>
                        </div>

                        <div class="items-center text-gray-300 w-full py-2 mb-2">
                            <hr class="border-gray-300">
                        </div>

                        {{--  Data Orang Tua  --}}
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-3">
                                <label for="no_kk" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Nomor KK:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="no_kk" id="no_kk"
                                        value="{{ old('no_kk', $data->orangTua->no_kk) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('no_kk')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="kepala_keluarga" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Kepala Keluarga:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="kepala_keluarga" id="kepala_keluarga"
                                        value="{{ old('kepala_keluarga', $data->orangTua->kepala_keluarga) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('kepala_keluarga')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nama_ayah" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Nama Ayah/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="nama_ayah" id="nama_ayah"
                                        value="{{ old('nama_ayah', $data->orangTua->nama_ayah) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('nama_ayah')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nik_ayah" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('NIK Ayah/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="nik_ayah" id="nik_ayah"
                                        value="{{ old('nik_ayah', $data->orangTua->nik_ayah) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('nik_ayah')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="thn_lahir_ayah" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Tahun Lahir Ayah/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="thn_lahir_ayah" id="thn_lahir_ayah"
                                        value="{{ old('thn_lahir_ayah', $data->orangTua->thn_lahir_ayah) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('thn_lahir_ayah')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="pendidikan_ayah" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Pendidikan Ayah/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="pendidikan_ayah" id="pendidikan_ayah"
                                        value="{{ old('pendidikan_ayah', $data->orangTua->pendidikan_ayah) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('pendidikan_ayah')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="pekerjaan_ayah" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Pekerjaan Ayah/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah"
                                        value="{{ old('pekerjaan_ayah', $data->orangTua->pekerjaan_ayah) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('pekerjaan_ayah')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="penghasilan_ayah" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Penghasilan Ayah/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="penghasilan_ayah" id="penghasilan_ayah"
                                        value="{{ old('penghasilan_ayah', $data->orangTua->penghasilan_ayah) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('penghasilan_ayah')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nama_ibu" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Nama Ibu/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="nama_ibu" id="nama_ibu"
                                        value="{{ old('nama_ibu', $data->orangTua->nama_ibu) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('nama_ibu')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nik_ibu" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('NIK Ibu/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="nik_ibu" id="nik_ibu"
                                        value="{{ old('nik_ibu', $data->orangTua->nik_ibu) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('nik_ibu')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="thn_lahir_ibu" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Tahun Lahir Ibu/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="thn_lahir_ibu" id="thn_lahir_ibu"
                                        value="{{ old('thn_lahir_ibu', $data->orangTua->thn_lahir_ibu) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('thn_lahir_ibu')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="pendidikan_ibu" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Pendidikan Ibu/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="pendidikan_ibu" id="pendidikan_ibu"
                                        value="{{ old('pendidikan_ibu', $data->orangTua->pendidikan_ibu) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('pendidikan_ibu')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="pekerjaan_ibu" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Pekerjaan Ibu/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu"
                                        value="{{ old('pekerjaan_ibu', $data->orangTua->pekerjaan_ibu) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('pekerjaan_ibu')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="penghasilan_ibu" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Penghasilan Ibu/Wali:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="penghasilan_ibu" id="penghasilan_ibu"
                                        value="{{ old('penghasilan_ibu', $data->orangTua->penghasilan_ibu) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('penghasilan_ibu')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="md:flex mt-10 md:items-center">
                            <div class="md:w-1/6">
                                <label
                                    class="block text-gray-900 font-bold dark:text-gray-300 text-sm md:text-left md:mb-0"
                                    for="nama-calon-siswa">
                                    {{ __('D. Data Sekolah Asal') }}
                                </label>
                            </div>
                        </div>

                        <div class="items-center text-gray-300 w-full py-2 mb-2">
                            <hr class="border-gray-300">
                        </div>

                        {{--  Data Asal Sekolah  --}}
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-3">
                                <label for="asal_sekolah" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Asal Sekolah:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="asal_sekolah" id="asal_sekolah"
                                        value="{{ old('asal_sekolah', $data->sekolahAsal->asal_sekolah) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('asal_sekolah')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="jenjang" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Jenjang Sekolah:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <select name="jenjang" id="jenjang"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                        {{--  <option>-- Pilih --</option>  --}}
                                        <option value="PAUD" @selected(old('jenjang', $data->sekolahAsal->jenjang) == 'PAUD')>
                                            PAUD
                                        </option>
                                        <option value="Sekolah Dasar" @selected(old('jenjang', $data->sekolahAsal->jenjang) == 'Sekolah Dasar')>
                                            SD
                                        </option>
                                        <option value="Sekolah Menengah Pertama" @selected(old('jenjang', $data->sekolahAsal->jenjang) == 'Sekolah Menengah Pertama')>
                                            SMP
                                        </option>
                                        <option value="Sekolah Menengah Atas" @selected(old('jenjang', $data->sekolahAsal->jenjang) == 'Sekolah Menengah Atas')>
                                            SMA
                                        </option>
                                        <option value="Sekolah Menengah Kejuruan" @selected(old('jenjang', $data->sekolahAsal->jenjang) == 'Sekolah Menengah Kejuruan')>
                                            SMK
                                        </option>
                                    </select>
                                    @error('jenjang')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="npsn" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('NPSN Sekolah:') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="number" name="npsn" id="npsn"
                                        value="{{ old('npsn', $data->sekolahAsal->npsn) }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        required>
                                    @error('npsn')
                                        <span class="text-sm text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="foto" class="block text-sm/6 font-medium text-gray-900">
                                    {{ __('Upload Foto Siswa:') }}
                                </label>
                                <div class="mt-2">
                                    <input type="file" name="foto" id="foto" accept="image/*"
                                        class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 focus:outline-none">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button class="text-sm/6 font-semibold text-gray-900">
                        {{ __('Keluar') }}
                    </button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ __('Lanjut') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
