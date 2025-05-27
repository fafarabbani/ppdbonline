<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">
        {{ __('Beranda') }}
    </div>

    {{--  <x-sidebar.link title="{{ Auth::user()->role === 'admin' ? 'Dashboard Admin' : 'Dashboard User' }}"  --}}
    <x-sidebar.link title="Dashboard"
        href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard', Auth::user()) }}"
        :isActive="Auth::user()->role === 'admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('user.dashboard', Auth::user())">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">
        {{ __('Data Master') }}
    </div>

    {{--  Admin Links  --}}
    @if (Auth::user()->role === 'admin')
        <x-sidebar.link title="Profile Sekolah" href="" :isActive="request()->routeIs('admin.profile-sekolah.*')">
            {{--  <x-sidebar.link title="Profile Sekolah" href="{{ route('admin.profile-sekolah.index') }}" :isActive="request()->routeIs('admin.profile-sekolah.*')">  --}}
            <x-slot name="icon">
                <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>
        <x-sidebar.link title="Pendaftaran" href="{{ route('admin.gelombang.index') }}" :isActive="request()->routeIs('admin.gelombang.*')">
            <x-slot name="icon">
                <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>
        <x-sidebar.link title="User Manage" href="" :isActive="request()->routeIs('admin.profile-sekolah.*')">
            <x-slot name="icon">
                <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>
    @else
        {{--  User Links  --}}
        {{--  <x-sidebar.link title="Formulir Pendaftaran" href="" :isActive="request()->routeIs('user.form.*')">
            <x-slot name="icon">
                <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>  --}}
        <x-sidebar.link title="Pendaftaran" href="{{ route('user.riwayat-pendaftaran.index', Auth::user()) }}"
            :isActive="request()->routeIs('user.riwayat-pendaftaran.*')">
            <x-slot name="icon">
                <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>
    @endif

</x-perfect-scrollbar>
