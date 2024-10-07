<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Schedules') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">{{ session('success') }}</div>
                    @endif

                    <table class="min-w-full border border-gray-200 bg-white">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Course</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Lecturer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Day</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="px-6 py-4">{{ $schedule->course->course_name }}</td>
                                    <td class="px-6 py-4">{{ $schedule->lecturer->user->name }}</td>
                                    <td class="px-6 py-4">{{ $schedule->day }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</td>
                                    <td class="px-6 py-4">{{ $schedule->location }}</td>
                                    <td class="px-6 py-4">{{ ucfirst($schedule->status) }}</td>
                                    <td class="px-6 py-4">
                                        @if ($schedule->status == 'pending')
                                            <!-- Approve Button -->
                                            <form action="{{ route('admin.schedules.approve', $schedule) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="rounded bg-green-500 px-4 py-2 text-white">
                                                    Approve
                                                </button>
                                            </form>

                                            <!-- Reject Form -->
                                            <form action="{{ route('admin.schedules.reject', $schedule) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <input type="text" name="reason" placeholder="Reason for rejection"
                                                    class="rounded-md border-gray-300 p-1" required>
                                                <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white">
                                                    Reject
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-500">{{ ucfirst($schedule->status) }}</span>
                                            @if ($schedule->status == 'rejected' && $schedule->reason)
                                                <p class="text-red-500">Reason: {{ $schedule->reason }}</p>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
