<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Pengumuman') }}
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
                            {{ __('Pengumuman') }}
                        </span>
                    </div>
                </li>
            </ol>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("You're logged in!") }}
    </div>
</x-app-layout>
