<x-app-layout>
    {{--  <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Pendaftaran Tahun Ajaran') }}
            </h2>

            <!-- Breadcrumb -->
            <ol class="inline-flex items-center space-x-2 md:space-x-3 rtl:space-x-reverse">
                <li aria-current="page">
                    <div class="flex items-center px-1">
                        <span class="ms-1 px-1 text-sm font-medium text-gray-400 md:ms-2 dark:text-gray-400">
                            {{ __('Gelombang Ke-') }}
                        </span>
                    </div>
                </li>
            </ol>
        </div>
    </x-slot>  --}}

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
</x-app-layout>
