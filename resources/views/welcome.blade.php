<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <!-- ====== Hero Section Start -->
    <nav class="p-3 flex bg-white justify-between items-center">
        <a href="/" class="flex gap-2 items-center flex-1" id="brand">
            <img class="object-cover max-w-12 max-h-12" src="{{ asset('assets/logo.svg') }}" alt="logo">
            <span class="text-2xl mt-2 font-black font-display">
                {{ __('PPDB ONLINE') }}
            </span>
        </a>

        <!-- ====== Handle Menu -->
        <div id="nav-menu" class="hidden lg:flex gap-6 items-center cursor-pointer">
            <a href="#cara-mendaftar" class="font-medium hover:text-primary">{{ __('Cara Mendaftar') }}</a>
            @if (Route::has('login'))
                @auth('web')
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard', Auth::user()) }}"
                        class="font-medium hover:text-primary">{{ __('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}"
                        class="items-center font-medium border border-gray-400 px-6 py-2 rounded-lg hover:border-gray-600 flex-1">
                        {{ __('Login') }}
                    </a>
                @endauth
            @endif
        </div>

        <!-- ====== Handle Menu -->
        <button class="p-2 lg:hidden" onclick="handleMenu()">
            <i class="fa-solid fa-bars text-gray-600"></i>
        </button>

        <!-- ====== Menu Bar -->
        <div id="nav-dialog" class="hidden fixed z-10 lg:hidden bg-white inset-0 p-3">
            <div id="nav-bar" class="flex justify-between">
                <a href="#" class="flex gap-2 items-center" id="brand">
                    <img class="object-cover max-w-12 max-h-12" src="{{ asset('assets/logo.svg') }}" alt="logo">
                    <span class="text-3xl mt-2 font-black font-display">{{ __('PPDB') }}</span>
                </a>
                <button class="p-2 lg:hidden" onclick="handleMenu()">
                    <i class="fa-solid fa-xmark text-gray-600"></i>
                </button>
            </div>
            <div class="mt-6 cursor-pointer">
                <a href="#cara-mendaftar"
                    class="font-medium m-3 p-3 hover:bg-gray-100 hover:text-primary block rounded-lg">{{ __('Cara Mendaftar') }}</a>
                <div class="h-[1px] bg-gray-300"></div>
                @if (Route::has('login'))
                    @auth('web')
                        <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard', Auth::user()) }}"
                            class="font-medium m-3 p-3 hover:bg-gray-100 hover:text-primary block rounded-lg">{{ __('Dashboard') }}</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="mt-6 flex font-medium  w-full items-center px-6 py-4 rounded-lg hover:bg-gray-100 hover:text-primary">
                            {{ __('Login') }}
                        </a>
                    @endauth
                @endif
            </div>

        </div>

    </nav>
    <!-- ====== Hero Section End -->

    <!-- ====== Main Start -->
    <main>
        <!-- ====== Hero Section Start -->
        <div id="hero" class="min-h-screen bg-slate-700 bg-center bg-cover bg-blend-overlay bg-black/35 bg-fixed"
            style="background-image: url('assets/image/hero.jpg');">
            <div id="hero-container"
                class="max-w-4xl mx-auto px-6 pt-6 pb-32 flex flex-col sm:items-center sm:text-center sm:pt-12">

                <div id="version-text"
                    class="flex items-center my-6 gap-2 border border-green-300 bg-green-50 rounded-lg px-3 py-1 w-fit shadow-md hover:shadow-lg hover:-translate-y-1 transition group">
                    <i class="fa-solid fa-circle fa-2xs text-green-400"></i>
                    <p class="font-display font-medium text-green-600">{{ __('v0.21.1: ') }}<span
                            class="text-green-800">{{ __('Find-in-page-bug') }}</span></p>
                    <i
                        class="fa-solid fa-arrow-right text-green-600 group-hover:translate-x-1 transition duration-300"></i>
                </div>

                <div id="hero-features" class="hidden sm:flex gap-8 my-6">
                    <div class="flex justify-center gap-2 items-center text-gray-400">
                        <i class="fa-regular fa-file-code text-sm"></i>
                        <p>{{ __('Code Optional') }}</p>
                    </div>
                    <div class="flex justify-center gap-2 items-center text-gray-400">
                        <i class="fa-solid fa-hand-back-fist text-sm"></i>
                        <p>Drag & drop builder</p>
                    </div>
                    <div class="flex justify-center gap-2 items-center text-gray-400">
                        <i class="fa-solid fa-laptop text-sm"></i>
                        <p>Windows, Mac, Linux</p>
                    </div>
                </div>

                <h1 class="text-4xl font-semibold text-gray-200 leading-snug mt-4 sm:text-7xl sm:leading-normal">
                    {{ __('PPDB ONLINE SD ISLAM NURUL HAQ BATAM') }}
                </h1>
                <p class="text-xl mt-4 text-gray-200 sm:text-2xl sm:mt-8">
                    {{ __('SD Islam Nurul Haq Batam merupakan lembaga pendidikan Islam rujukan di Propinsi Kepulauan Riau dengan misi Menyelenggarakan Pendidikan yang Berlandaskan pada Nilai-Nilai Ajaran Islam.') }}
                </p>
                <div class="mt-12 flex gap-4 flex-col sm:flex-row" id="button-container">
                    @if (Route::has('login'))
                        @auth('web')
                            <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard', Auth::user()) }}"
                                class="px-8 py-3 font-semibold rounded-lg bg-white border border-gray-400 hover:border-gray-800">
                                {{ __('Dashboard') }}
                            </a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-8 py-3 font-semibold rounded-lg text-white bg-primary shadow-sm hover:bg-opacity-90">
                                    {{ __('Daftar Akun') }}
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
        <!-- ====== Hero Section End -->

        <!-- ====== Gelombang Section Start -->
        <div id="gelombang" class="container py-12">
            <div class="rounded-xl border px-8 py-8 bg-white flex flex-col shadow-2xl">
                <h2 class="h2-style">Gelombang Pendaftaran</h2>
                <div class="flex flex-wrap mt-6">
                    {{-- === GELOMBANG PENDAFTARAN === --}}
                    @if ($gelombangAktif->isEmpty())
                        <div class="w-full">
                            <span
                                class="w-full flex items-center bg-orange-500/10 text-orange-500 m-2 rounded-full border border-transparent px-2.5 md:px-3 py-1 md:py-3 text-xs font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                                <p class="md:pl-2">
                                    {{ __('Belum ada gelombang Pendaftaran yang dibuka, silahkan cek secara berkala') }}
                                </p>
                            </span>
                        </div>
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

                                    <a href="{{ route('register') }}"
                                        class="w-full text-start px-5 py-3 bg-gray-200 hover:bg-gray-300 text-primary inline-block text-sm font-bold">
                                        {{ __('Daftar Sekarang!') }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{--  <div class="w-full">
                        <span
                            class="w-full flex items-center bg-orange-500/10 text-orange-500 m-2 rounded-full border border-transparent px-2.5 md:px-3 py-1 md:py-3 text-xs font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            <p class="md:pl-2">
                                {{ __('Belum ada gelombang Pendaftaran yang dibuka, silahkan cek secara berkala') }}
                            </p>
                        </span>
                    </div>
                    <div
                        class="md:w-1/3 mt-4 overflow-hidden border-primary shadow-1 dark:bg-dark-2 flex flex-col w-full rounded-lg border-l-[6px] bg-primary/5">
                        <div class="w-full text-start px-7 py-8 md:p-5">
                            <h5 class="text-dark mb-3 text-lg font-bold dark:text-white">
                                {{ __('PPDB Tahun Ajaran 2024/2025') }}
                            </h5>
                            <p class="text-body-color dark:text-dark-6 text-sm leading-relaxed">
                                {{ __('Pendaftaran ') }}
                                <span class="font-bold text-slate-800">
                                    {{ __('Gelombang Ke-2') }}
                                </span>
                                {{ __('telah dibuka dengan kuota') }}
                                <span class="font-bold text-slate-800">
                                    {{ __('50 Peserta') }}
                                </span>
                            </p>
                        </div>
                        <button href="#"
                            class="w-full text-start px-5 py-3 bg-gray-200 hover:bg-gray-300 text-primary  inline-block text-sm font-bold">
                            {{ __('Daftar Sekarang') }}
                        </button>
                    </div>  --}}
                </div>
            </div>
        </div>
        <!-- ====== Gelombang Section End -->

        <!-- ====== Cara Mendaftar Section Start -->
        <div id="cara-mendaftar" class="container py-2">
            <div class="rounded-xl border px-8 py-8 flex flex-col shadow-md">
                <h2 class="h2-style">Cara Mendaftar</h2>
                <div class="-mx-4 flex flex-wrap mt-6">
                    <div class="w-full flex items-center justify-center">
                        <ul class="space-y-3">
                            <li class="text-body-color dark:text-dark-6 flex text-sm ">
                                <span
                                    class="flex items-center text-justify justify-center mx-auto xl:px-56 lg:px-44 md:px-16">
                                    <p class="md:w-1/4 text-end md:text-sm text-xs">
                                        {{ __('Langkah Ke-1') }}
                                    </p>
                                    <span
                                        class="md:w-1/4 bg-transparent border-2 border-primary mx-3 flex h-3 max-w-[12px] items-center justify-center rounded-full md:text-sm text-xs">
                                    </span>
                                    <p class="md:w-3/4 md:mt-4 md:text-sm text-xs">
                                        {{ __('Login kedalam aplikasi, silahkan daftar akun terlebih dahulu jika belum mempunyai akun untuk login') }}
                                    </p>
                                </span>
                            </li>
                            <li class="text-body-color dark:text-dark-6 flex text-sm ">
                                <span
                                    class="flex items-center text-justify justify-center mx-auto xl:px-56 lg:px-44 md:px-16">
                                    <p class="md:w-1/4 text-end md:text-sm text-xs">
                                        {{ __('Langkah Ke-2') }}
                                    </p>
                                    <span
                                        class="md:w-1/4 bg-transparent border-2 border-red-900 mx-3 flex h-3 max-w-[12px] items-center justify-center rounded-full md:text-sm text-xs">
                                    </span>
                                    <p class="md:w-3/4 md:mt-4 md:text-sm text-xs">
                                        {{ __('Setelah login, masuk ke menu Pendaftaran untuk langsung mendaftar. Pendaftaran tidak bisa dilakukan jika kuota pendaftaran penuh atau gelombang pendaftaran sudah di tutup') }}
                                    </p>
                                </span>
                            </li>
                            <li class="text-body-color dark:text-dark-6 flex text-sm ">
                                <span
                                    class="flex items-center text-justify justify-center mx-auto xl:px-56 lg:px-44 md:px-16">
                                    <p class="md:w-1/4 text-end md:text-sm text-xs">
                                        {{ __('Langkah Ke-3') }}
                                    </p>
                                    <span
                                        class="md:w-1/4 bg-transparent border-2 border-cyan-500 mx-3 flex h-3 max-w-[12px] items-center justify-center rounded-full md:text-sm text-xs">
                                    </span>
                                    <p class="md:w-3/4 md:mt-4 md:text-sm text-xs">
                                        {{ __('Silahkan isi formulir pendaftaran dengan data yang valid sesuai dengan yang data persyaratan pendaftaran') }}
                                    </p>
                                </span>
                            </li>
                            <li class="text-body-color dark:text-dark-6 flex text-sm ">
                                <span
                                    class="flex items-center text-justify justify-center mx-auto xl:px-56 lg:px-44 md:px-16">
                                    <p class="md:w-1/4 text-end md:text-sm text-xs">
                                        {{ __('Langkah Ke-4') }}
                                    </p>
                                    <span
                                        class="md:w-1/4 bg-transparent border-2 border-yellow-500 mx-3 flex h-3 max-w-[12px] items-center justify-center rounded-full md:text-sm text-xs">
                                    </span>
                                    <p class="md:w-3/4 md:mt-4 md:text-sm text-xs">
                                        {{ __('Setelah mengisi formulir, data pendaftaran kamu sedang di periksa petugas, cek secara berkala untuk memastikan apakah status pendaftaran kamu diterima atau ditolak') }}
                                    </p>
                                </span>
                            </li>
                            <li class="text-body-color dark:text-dark-6 flex text-sm ">
                                <span
                                    class="flex items-center text-justify justify-center mx-auto xl:px-56 lg:px-44 md:px-16">
                                    <p class="md:w-1/4 text-end md:text-sm text-xs">
                                        {{ __('Langkah Ke-5') }}
                                    </p>
                                    <span
                                        class="md:w-1/4 bg-transparent border-2 border-orange-400 mx-3 flex h-3 max-w-[12px] items-center justify-center rounded-full md:text-sm text-xs">
                                    </span>
                                    <p class="md:w-3/4 md:mt-4 md:text-sm text-xs">
                                        {{ __('Jika status pendaftaran Diterima, cetak form yang sudah kamu isi dan serahkan kepada petugas sekolah di hari yang sudah di tentukan') }}
                                    </p>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== Cara Mendaftar Section End -->

        <!-- ====== Pertanyaan Umum Section Start -->
        <div id="faq" class="container py-2">
            <div class="rounded-xl border px-8 py-8 bg-slate-50 flex flex-col shadow-md">
                <h2 class="h2-style">Pertanyaan Umum</h2>
                <div class="flex flex-col xl:px-56 lg:px-44 md:px-16 sm:px-6 mt-6 gap-6">
                    <div class="group rounded-xl bg-white border border-gray-200 p-6">
                        <dt class="flex cursor-pointer justify-between items-center" aria-controls="faq-1">
                            <p class="font-semibold text-lg">
                                {{ __('Apakah harus membuat akun untuk mendaftar?') }}
                            </p>
                            <div
                                class=" bg-primary/5 dark:bg-white/5 text-primary flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                                <i class="fa-solid fa-chevron-up -rotate-180 transition-transform duration-500"></i>
                            </div>
                        </dt>
                        <dd id="faq-1" class="hidden text-lg font-light mt-6">
                            <p class="mt-2 leading-relaxed text-body-color dark:text-dark-6">
                                {{ __('Iya wajib, agar ') }}
                            </p>
                            <p class="pl-3 leading-relaxed text-body-color dark:text-dark-6">
                                {{ __('1. Formulir yang dikirim masih bisa di edit jika ada kesalahan') }}
                            </p>
                            <p class="pl-3 text-justify leading-relaxed text-body-color dark:text-dark-6">
                                {{ __('2. Melihat pengumuman lulus & tidak lulus, proses pengecekan data pendaftaran oleh petugas bisa melebihi beberapa hari dikarenakan banyaknya peserta, jadi calon siswa bisa login ke aplikasi untuk mengecek secara berkala.') }}
                            </p>
                            <p class="pl-3 text-justify leading-relaxed text-body-color dark:text-dark-6">
                                {{ __('3. Bisa melakukan daftar ulang. jika pendaftaran tidak diterima, anda masih bisa daftar ulang di gelombang pendaftaran selanjutnya.') }}
                            </p>
                        </dd>
                    </div>
                    <div class="group rounded-xl bg-white border border-gray-200 p-6">
                        <dt class="flex cursor-pointer justify-between items-center" aria-controls="faq-2">
                            <p class="font-semibold text-lg">
                                {{ __('Bagaimana jika pendaftaran saya tidak lulus?') }}
                            </p>
                            </p>
                            <div
                                class=" bg-primary/5 dark:bg-white/5 text-primary flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                                <i class="fa-solid fa-chevron-up -rotate-180 transition-transform duration-500"></i>
                            </div>
                        </dt>
                        <dd id="faq-2" class="hidden text-lg font-light mt-6">
                            <p class="">
                                {{ __('Anda bisa melakukan pendaftaran kembali di gelombang pendaftaran yang akan di buka selanjutnya') }}
                            </p>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== Pertanyaan Umum Section End -->

        <!-- ====== Scroll Section Star -->
        {{--  <div id="companies-container" class="flex flex-col gap-8">
            <div id="componies-title" class="flex justify-center gap-2 ">
                <img class="translate-y-2" src="{{ asset('assets/image/asset 2.svg') }}" alt="">
                <span class="font-medium">APPS POWERED BY PPDB ONLINE</span>
                <img class="-scale-x-100 translate-y-2" src="{{ asset('assets/image/asset 2.svg') }}" alt="">
            </div>
            <div id="lines-group" class="flex flex-col gap-4">
                <div id="line1" class="flex gap-4 w-screen -translate-x-48 transition-transform ease-linear">
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                </div>
                <div id="line2" class="flex gap-4 w-screen -translate-x-36 transition-transform ease-linear">
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                </div>
                <div id="line3"
                    class="flex md:hidden gap-4 w-screen -translate-x-48 transition-transform ease-linear">
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                    <div
                        class="flex flex-col min-w-24 min-h-24 items-center justify-center bg-white rounded-xl border border-gray-300 md:min-h-32 md:min-w-32">
                        <img class="w-12 h-12 md:w-16 md:h-16" src="{{ asset('assets/image/asset 3.png') }}"
                            alt="">
                        <span class="text-[12px] md:text-[16px] font-semibold">Unbounce</span>
                    </div>
                </div>
            </div>
        </div>  --}}
        <!-- ====== Scroll Section End -->

    </main>
    <!-- ====== Main End -->

    <!-- ====== Footer Start -->
    <footer class="wow fadeInUp relative z-10 bg-[#09341a] mt-10" data-wow-delay=".15s">
        <div class="border-t border-[#8890A4] border-opacity-40 py-8">
            <div class="w-11/12 mx-auto">
                <div class="-mx-4 flex flex-wrap text-white">
                    <div class="w-full px-4 md:w-2/3 lg:w-1/2">
                        <div class="my-1">
                            <div class="-mx-3 flex items-center justify-center md:justify-start">
                                <a href="javascript:void(0)"
                                    class="px-3 text-base text-gray-7 hover:text-white hover:underline">
                                    Privacy policy
                                </a>
                                <a href="javascript:void(0)"
                                    class="px-3 text-base text-gray-7 hover:text-white hover:underline">
                                    Legal notice
                                </a>
                                <a href="javascript:void(0)"
                                    class="px-3 text-base text-gray-7 hover:text-white hover:underline">
                                    Terms of service
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/3 lg:w-1/2">
                        <div class="my-1 flex justify-center md:justify-end">
                            <p class="text-base text-gray-7">
                                <span>{{ __('Copyright') }}</span>
                                <span>
                                    {{ __('©') }}
                                </span>
                                <span>{{ __('2024') }}</span>
                                <span>{{ __('-') }}</span>
                                <span>{{ __('Development by ') }}</span>
                                <a href="https://www.instagram.com/fafarabbani/"https://www.instagram.com/fafarabbani/
                                    target="_blank" class="text-gray-1 hover:underline">
                                    1810128262209
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====== Footer End -->

</body>

</html>

{{--  <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard', Auth::user()) }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    {{ __('Dashboard') }}
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    {{ __('Login') }}
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        {{ __('Register') }}
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main class="mt-6">

                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
</body>  --}}
