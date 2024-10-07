<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Schedule Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium">{{ __('Course:') }}</h3>
                        <p>{{ $scheduleCourse->course->course_name }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium">{{ __('Day:') }}</h3>
                        <p>{{ $scheduleCourse->day }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium">{{ __('Start Time:') }}</h3>
                        <p>{{ $scheduleCourse->start_time }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium">{{ __('End Time:') }}</h3>
                        <p>{{ $scheduleCourse->end_time }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-lg font-medium">{{ __('Location:') }}</h3>
                        <p>{{ $scheduleCourse->location }}</p>
                    </div>

                    <a href="{{ route('lecturer.schedules.index') }}"
                        class="mt-4 rounded-md bg-indigo-600 px-4 py-2 text-white">
                        {{ __('Back to Schedules') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
