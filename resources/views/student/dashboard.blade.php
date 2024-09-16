<x-app-layout>
    <x-slot name="header">
        <!-- Include Font Awesome CDN -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Student Dashboard') }}
            </h2>
            <a href="{{ route('student.join-quiz') }}"
                class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900">
                {{ __('Join a Quiz') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Stats Section -->
                    <div class="mt-6">
                        <div class="mt-4 flex flex-col space-y-4 md:flex-row md:space-x-6 md:space-y-0">
                            <!-- Available Courses -->
                            <div class="flex items-center rounded-md bg-gray-50 p-4 text-gray-800 shadow-sm">
                                <i class="fas fa-book-open mr-4 text-3xl text-blue-600"></i> <!-- Font Awesome icon -->
                                <div>
                                    <h4 class="text-md font-semibold">Available Courses</h4>
                                    <p class="mt-2 text-xl font-bold">{{ $availableCourses->count() }}</p>
                                </div>
                            </div>

                            <!-- Enrolled Course -->
                            <div class="flex items-center rounded-md bg-gray-50 p-4 text-gray-800 shadow-sm">
                                <i class="fas fa-chalkboard-teacher mr-4 text-3xl text-green-600"></i>
                                <!-- Font Awesome icon -->
                                <div>
                                    <h4 class="text-md font-semibold">Enrolled Course</h4>
                                    @if ($enrolledCourse->isNotEmpty())
                                        <p class="mt-2 text-xl font-bold">
                                            {{ $enrolledCourse->first()->course_name }}
                                        </p>
                                    @else
                                        <p class="mt-2 text-sm text-gray-500">Not enrolled in any course</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
