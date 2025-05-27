<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ppbdonline</title>

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

<!-- Styles / Scripts -->
<script src="{{ asset('assets/js/my.js') }}"></script>

</html>
