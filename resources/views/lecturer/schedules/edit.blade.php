<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('lecturer.schedules.update', $scheduleCourse->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Course Selection -->
                        <div>
                            <label for="course_id"
                                class="block text-sm font-medium text-gray-700">{{ __('Course') }}</label>
                            <select name="course_id" id="course_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ $scheduleCourse->course_id == $course->id ? 'selected' : '' }}>
                                        {{ $course->course_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Start Time -->
                        <div class="mt-4">
                            <label for="start_time"
                                class="block text-sm font-medium text-gray-700">{{ __('Start Time') }}</label>
                            <input type="time" name="start_time" id="start_time"
                                value="{{ $scheduleCourse->start_time }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- End Time -->
                        <div class="mt-4">
                            <label for="end_time"
                                class="block text-sm font-medium text-gray-700">{{ __('End Time') }}</label>
                            <input type="time" name="end_time" id="end_time" value="{{ $scheduleCourse->end_time }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Day -->
                        <div class="mt-4">
                            <label for="day"
                                class="block text-sm font-medium text-gray-700">{{ __('Day') }}</label>
                            <input type="text" name="day" id="day" value="{{ $scheduleCourse->day }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Location -->
                        <div class="mt-4">
                            <label for="location"
                                class="block text-sm font-medium text-gray-700">{{ __('Location') }}</label>
                            <input type="text" name="location" id="location"
                                value="{{ $scheduleCourse->location }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-4 py-2 text-white">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
