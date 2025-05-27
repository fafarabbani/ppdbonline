<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Pendaftaran Tahun Ajaran') }}
                {{ $gelombang->tanggal_mulai->format('y') }}/{{ $gelombang->tanggal_mulai->addYear()->format('y') }}
            </h2>

            <!-- Breadcrumb -->
            <ol class="inline-flex items-center space-x-2 md:space-x-3 rtl:space-x-reverse">
                <li aria-current="page">
                    <div class="flex items-center px-1">
                        <span class="ms-1 px-1 text-sm font-medium text-gray-400 md:ms-2 dark:text-gray-400">
                            {{ __('Gelombang Ke-') }}
                            {{ $gelombang->gelombang }}
                        </span>
                    </div>
                </li>
            </ol>
        </div>
    </x-slot>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="p-3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="overflow-x-auto">
            <form method="POST" action="{{ route('user.formulir.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12 ">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-gray-900">
                            {{ __('Formulir Pendaftaran') }}
                        </h2>
                        <p class="mt-1 text-sm/6 text-gray-600">{{ __('Pastikan data yang diisi valid dan sesuai.') }}
                        </p>

                        <ol class="mt-6 flex items-center justify-center w-full">
                            <li
                                class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                                <span
                                    class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                                    1
                                </span>
                            </li>
                            <li
                                class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                                <span
                                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 16">
                                        <path
                                            d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="flex items-center w-full">
                                <span
                                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                                    </svg>
                                </span>
                            </li>
                        </ol>

                        @if ($step == 1)
                            <h2>Step 1: Data Siswa</h2>

                            {{--  Data Siswa  --}}
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <input type="hidden" name="gelombang_id" value="{{ $gelombang->id }}">
                                <input type="hidden" name="nomor_registrasi" wire:model="nomor_registrasi">



                                <div class="sm:col-span-3">
                                    <label for="nomor_registrasi" class="block text-sm/6 font-medium text-gray-900">
                                        {{ __('No Registrasi:') }}
                                    </label>
                                    <div class="mt-2">
                                        <input type="text" name="nomor_registrasi" id="nomor_registrasi"
                                            wire:model="nomor_registrasi"
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
                                        <input type="text" name="nama_siswa" id="nama_siswa" wire:model="nama_siswa"
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
                                        <input type="number" name="nisn" id="nisn" wire:model="nisn"
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
                                        <input type="number" name="nis" id="nis" wire:model="nis"
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
                                            wire:model="tempat_lahir"
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
                                            wire:model="tempat_lahir"
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
                                        <select name="jenis_kelamin" id="jenis_kelamin" wire:model="jenis_kelamin"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            required>
                                            <option>-- Pilih --</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
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
                                            wire:model="tempat_lahir"
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
                                            wire:model="tempat_lahir"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            required>
                                        @error('anak_ke')
                                            <span class="text-sm text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <label for="foto"
                                        class="block text-sm/6 font-medium text-gray-900">foto</label>
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
                                </div>

                                <div class="col-span-full">
                                    <label for="foto" class="block text-sm/6 font-medium text-gray-900">
                                        {{ __('Upload Foto:') }}
                                    </label>
                                    <div class="mt-2">
                                        <input type="file" name="foto" id="foto" accept="image/*"
                                            class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 focus:outline-none">
                                    </div>
                                </div>

                            </div>
                        @elseif ($step == 2)
                            <h2>Step 2: Data Alamat</h2>

                            {{--  Data Alamat  --}}
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-3">
                                    <label for="jenis_tmpt_tinggal" class="block text-sm/6 font-medium text-gray-900">
                                        {{ __('Jenis Tempat Tinggal:') }}
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <select name="jenis_tmpt_tinggal" id="jenis_tmpt_tinggal"
                                            wire:model="jenis_tmpt_tinggal"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            required>
                                            <option>-- Pilih --</option>
                                            <option value="Bersama Orang Tua">
                                                Bersama Orang Tua
                                            </option>
                                            <option value="Bersama Wali">
                                                Bersama Wali
                                            </option>
                                            <option value="Kost">
                                                Kost
                                            </option>
                                            <option value="Asrama">
                                                Asrama
                                            </option>
                                            <option value="Panti Asuhan">
                                                Panti Asuhan
                                            </option>
                                            <option value="Lainnya">
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
                                            wire:model="jenis_tmpt_tinggal"
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
                                            wire:model="jenis_tmpt_tinggal"
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
                                            wire:model="jenis_tmpt_tinggal"
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
                                        <select name="jarak" id="jarak" wire:model="jenis_tmpt_tinggal"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            required>
                                            <option>-- Pilih --</option>
                                            <option value="< 1 KM">
                                                < 1 KM </option>
                                            <option value="1 KM - 5 KM">
                                                1 KM - 5 KM
                                            </option>
                                            <option value="> 5 KM">
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
                                        <select name="transportasi" id="transportasi" wire:model="jenis_tmpt_tinggal"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            required>
                                            <option>-- Pilih --</option>
                                            <option value="Jalan Kaki">Jalan Kaki</option>
                                            <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                                            <option value="Kendaraan Umum/Angkot">Kendaraan Umum/Angkot</option>
                                            <option value="Jemputan Sekolah">Jemputan Sekolah</option>
                                            <option value="Ojek">Ojek</option>
                                            <option value="Sepeda">Sepeda</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('transportasi')
                                            <span class="text-sm text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        @elseif ($step == 3)
                            <h2>Step 3: Data Orang Tua</h2>
                            <!-- Input data orang tua sesuai field dan validasi -->
                            {{--  Data Orang Tua  --}}
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-3">
                                    <label for="no_kk" class="block text-sm/6 font-medium text-gray-900">
                                        {{ __('Nomor KK:') }}
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <input type="number" name="no_kk" id="no_kk"
                                            value="{{ old('no_kk') }}"
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
                                            value="{{ old('kepala_keluarga') }}"
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
                                            value="{{ old('nama_ayah') }}"
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
                                            value="{{ old('nik_ayah') }}"
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
                                            value="{{ old('thn_lahir_ayah') }}"
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
                                            value="{{ old('pendidikan_ayah') }}"
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
                                            value="{{ old('pekerjaan_ayah') }}"
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
                                            value="{{ old('penghasilan_ayah') }}"
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
                                            value="{{ old('nama_ibu') }}"
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
                                            value="{{ old('nik_ibu') }}"
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
                                            value="{{ old('thn_lahir_ibu') }}"
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
                                            value="{{ old('pendidikan_ibu') }}"
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
                                            value="{{ old('pekerjaan_ibu') }}"
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
                                            value="{{ old('penghasilan_ibu') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            required>
                                        @error('penghasilan_ibu')
                                            <span class="text-sm text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @elseif ($step == 4)
                            <h2>Step 4: Data Sekolah Asal</h2>
                            <!-- Input data sekolah asal sesuai field dan validasi -->

                            {{--  Data Asal Sekolah  --}}
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="asal_sekolah" class="block text-sm/6 font-medium text-gray-900">
                                        {{ __('Asal Sekolah:') }}
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="mt-2">
                                        <input type="text" name="asal_sekolah" id="asal_sekolah"
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
                                            <option>-- Pilih --</option>
                                            <option value="PAUD">
                                                PAUD
                                            </option>
                                            <option value="Sekolah Dasar">
                                                SD
                                            </option>
                                            <option value="Sekolah Menengah Pertama">
                                                SMP
                                            </option>
                                            <option value="Sekolah Menengah Atas">
                                                SMA
                                            </option>
                                            <option value="Sekolah Menengah Kejuruan">
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
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                            required>
                                        @error('npsn')
                                            <span class="text-sm text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        @endif

                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    @if ($step > 1)
                        <button type="button" wire:click="previousStep"
                            class="text-sm/6 font-semibold text-gray-900">
                            {{ __('Kembali') }}
                        </button>
                    @endif
                    @if ($step < 4)
                        <button type="submit" wire:click="nextStep"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ __('Selanjutnya') }}
                        </button>
                    @else
                        <button type="submit" wire:click="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ __('Simpan') }}
                        </button>
                    @endif
                </div>

            </form>
        </div>
    </div>

    @livewireScripts
</x-app-layout>
