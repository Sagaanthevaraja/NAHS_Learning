<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.courses.update', $course) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <x-input-label for="course_code" :value="__('Course Code')" />
                            <x-text-input id="course_code" class="mt-1 block w-full" type="text" name="course_code"
                                :value="$course->course_code" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="course_name" :value="__('Course Name')" />
                            <x-text-input id="course_name" class="mt-1 block w-full" type="text" name="course_name"
                                :value="$course->course_name" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea id="description" class="mt-1 block w-full" name="description"
                                required>{{ $course->description }}</x-textarea>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="stream" :value="__('Stream')" />
                            <select id="stream" name="stream"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                                <option value="Science" {{ $course->stream == 'Science' ? 'selected' : '' }}>Science
                                </option>
                                <option value="Commerce" {{ $course->stream == 'Commerce' ? 'selected' : '' }}>Commerce
                                </option>
                                <option value="Arts" {{ $course->stream == 'Arts' ? 'selected' : '' }}>Arts</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="lecturer_id" :value="__('Lecturer')" />
                            <select id="lecturer_id" name="lecturer_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                                @foreach ($lecturers as $lecturer)
                                    <option value="{{ $lecturer->id }}"
                                        {{ $course->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                                        {{ $lecturer->user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-primary-button class="ml-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
