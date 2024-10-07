<x-app-layout>
    <!-- Link the Font Awesome CDN for Icons -->

    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Parent Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Dynamic Statistics with styled boxes and icons -->
            <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <!-- Number of Courses -->
                <div class="flex items-center rounded-lg bg-indigo-100 p-6 shadow-md">
                    <div class="mr-4">
                        <i class="fas fa-book fa-3x text-indigo-700"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-indigo-700">1</p>
                        <p class="text-lg font-semibold text-indigo-700">Courses</p>
                    </div>
                </div>

                <!-- Number of Students -->
                <div class="flex items-center rounded-lg bg-green-100 p-6 shadow-md">
                    <div class="mr-4">
                        <i class="fas fa-user-graduate fa-3x text-green-700"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-green-700">1</p>
                        <p class="text-lg font-semibold text-green-700">Child Enrolled</p>
                    </div>
                </div>

                <!-- Number of Meetings -->
                <div class="flex items-center rounded-lg bg-yellow-100 p-6 shadow-md">
                    <div class="mr-4">
                        <i class="fas fa-calendar-alt fa-3x text-yellow-700"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-yellow-700">3</p>
                        <p class="text-lg font-semibold text-yellow-700">Meetings</p>
                    </div>
                </div>
            </div>

            <!-- Tables displayed side by side -->
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <!-- Table for Courses -->
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <div class="flex items-center justify-between">
                        <h3 class="mb-4 text-lg font-semibold">Your Child's Courses</h3>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Course Code
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Course Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Description
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    ACC101
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    Accounting
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    Introduction to Accounting
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="rounded-lg bg-white p-6 shadow-md">
                    <div class="flex items-center justify-between">
                        <h3 class="mb-4 text-lg font-semibold">Your Child</h3>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Student Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Course
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    Student User
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    Accounting
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    Active
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
