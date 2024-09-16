<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Dynamic Statistics -->
            <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <!-- Number of Lecturers -->
                <div class="rounded-lg bg-blue-100 p-6 text-center shadow-md">
                    <h3 class="mb-2 text-lg font-semibold text-blue-700">Number of Lecturers</h3>
                    <p class="text-2xl font-bold text-blue-700">{{ $numLecturers }}</p>
                </div>

                <!-- Number of Students -->
                <div class="rounded-lg bg-green-100 p-6 text-center shadow-md">
                    <h3 class="mb-2 text-lg font-semibold text-green-700">Number of Students</h3>
                    <p class="text-2xl font-bold text-green-700">{{ $numStudents }}</p>
                </div>

                <!-- Number of Parents -->
                <div class="rounded-lg bg-yellow-100 p-6 text-center shadow-md">
                    <h3 class="mb-2 text-lg font-semibold text-yellow-700">Number of Parents</h3>
                    <p class="text-2xl font-bold text-yellow-700">{{ $numParents }}</p>
                </div>

                <!-- Number of Meetings -->
                <div class="rounded-lg bg-indigo-100 p-6 text-center shadow-md">
                    <h3 class="mb-2 text-lg font-semibold text-indigo-700">Number of Meetings</h3>
                    <p class="text-2xl font-bold text-indigo-700">{{ $numMeetings }}</p>
                </div>

                <!-- Number of Courses -->
                <div class="rounded-lg bg-red-100 p-6 text-center shadow-md">
                    <h3 class="mb-2 text-lg font-semibold text-red-700">Number of Courses</h3>
                    <p class="text-2xl font-bold text-red-700">{{ $numCourses }}</p>
                </div>
            </div>

            <!-- Tables -->
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <!-- Current Users Table -->
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Current Users</h3>
                        <a href="{{ route('admin.users.index') }}" class="text-sm text-indigo-600 hover:underline">View
                            All</a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $user->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $user->email }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm capitalize text-gray-500">
                                        {{ $user->role }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Courses and Lecturer Table -->
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Available Courses</h3>
                        <a href="{{ route('admin.courses.index') }}"
                            class="text-sm text-indigo-600 hover:underline">View
                            All</a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Course Code</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Course Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Lecturer</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        {{ $course->course_code }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        {{ $course->course_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        {{ $course->lecturer->user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
