<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Resources') }}
        </h2>
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
                                    Resource
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Type
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Download
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr class="bg-gray-50">
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                    Test 1 PDF
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    PDF
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    <a href="{{ asset('storage/test1.pdf') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-red-700 hover:text-red-300 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-blue-100 transition duration-150 ease-in-out">
                                        Download
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                    Test 2 PDF
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    PDF
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    <a href="{{ asset('storage/test2.pdf') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-red-700 hover:text-red-300 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-blue-100 transition duration-150 ease-in-out">
                                        Download
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="mt-4 text-sm text-gray-500">
                        Note: Resources are subject to change based on requests.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>