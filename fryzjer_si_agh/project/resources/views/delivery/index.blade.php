<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of deliveries') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($deliveries->isEmpty())
                    <p class="p-6">No deliveries in database.</p>
                @else
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Sum
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Details</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($deliveries as $delivery)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">#{{ $delivery->date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $delivery->sum }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('delivery.show2', $delivery) }}"
                                       class="text-indigo-600 hover:text-indigo-900">Details</a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                    <div class="flex items-center justify-end mt-4 px-4 pb-5">
                        <form method="get" action="{{ route('delivery.create_products') }}">
                            <x-primary-button class="ml-4 mb-4">
                                {{ __('Add new delivery') }}
                            </x-primary-button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
