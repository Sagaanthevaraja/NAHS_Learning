<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">Name: {{ $student->user->name }}</h3>
                    <p class="text-gray-600">Email: {{ $student->user->email }}</p>
                    <p class="text-gray-600">Status: {{ $student->status }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
