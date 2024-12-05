<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('dashboard.courses.create') }}"
                    class="py-4 px-5 rounded-full bg-indigo-600 text-white">Create New Course</a>
            </div>
        </div>
    </div>
</x-app-layout>
