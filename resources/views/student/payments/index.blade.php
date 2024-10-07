<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Payment Receipts') }}
            </h2>
            <a href="{{ route('student.payments.create') }}"
                class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900">
                {{ __('Upload New Receipt') }}
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($payments->isEmpty())
                        <p>{{ __('No payments made.') }}</p>
                    @else
                        <table class="min-w-full border border-gray-200 bg-white">
                            <thead>
                                <tr>
                                    <th
                                        class="border-b bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        {{ __('Month') }}
                                    </th>
                                    <th
                                        class="border-b bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        {{ __('Receipt') }}
                                    </th>
                                    <th
                                        class="border-b bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                        {{ __('Uploaded At') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            {{ $payment->month }}
                                        </td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            <a href="{{ Storage::url($payment->receipt_path) }}" target="_blank"
                                                class="text-blue-500 hover:underline">
                                                View Receipt
                                            </a>
                                        </td>
                                        <td class="border-b border-gray-200 px-6 py-4">
                                            {{ $payment->created_at->format('d M Y, h:i A') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
