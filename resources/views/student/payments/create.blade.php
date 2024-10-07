<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Upload Payment Receipt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('student.payments.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Month Selection Dropdown -->
                        <div class="mb-4">
                            <x-input-label for="month" :value="__('Month')" />
                            <select id="month" name="month"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option value="" disabled selected>Select a month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>

                        <!-- Receipt File Upload -->
                        <div class="mb-4">
                            <x-input-label for="receipt" :value="__('Upload Receipt (PDF/Image)')" />
                            <x-text-input id="receipt" class="mt-1 block w-full" type="file" name="receipt"
                                required />
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
