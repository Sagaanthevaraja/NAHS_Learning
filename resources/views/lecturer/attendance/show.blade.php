<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Attendance for ') . $course->course_name }}
            </h2>
            <a href="{{ route('lecturer.attendance.mark', $course->id) }}"
                class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700">
                {{ __('Mark New Attendance') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($attendances as $attendance)
                                <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }}">
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ $attendance->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        <a href="{{ route('lecturer.attendance.mark', $course->id) }}"
                                            class="text-blue-500 hover:underline">
                                            {{ __('Mark New Attendance') }}
                                        </a>
                                        <a href="#" class="ml-4 text-yellow-500 hover:underline">
                                            {{ __('Edit Attendance') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($attendances->isEmpty())
                        <p class="mt-4 text-sm text-gray-500">No attendance records yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
