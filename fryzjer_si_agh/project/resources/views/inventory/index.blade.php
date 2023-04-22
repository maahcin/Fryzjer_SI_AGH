<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All products in inventory') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="display: grid; grid-template-columns: repeat(3, 1fr)">
            @foreach($inventory as $i)
                @if($i->sum < 5)
                    <div style="background-color: #ff4a52; margin: 10px; padding: 10px; border-radius: 10px; width: 90%;">
                        <strong>ALERT!</strong> <br />
                        Mała ilość produktu: {{ $i->name }} <br />
                        Aktualna ilość: {{$i->sum}} <br/>
                    </div>
                @endif
            @endforeach
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($inventory as $i)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">#{{ $i->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $i->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if(!($i->sum))
                                        <div class="text-sm text-gray-900">0</div>
                                    @else
                                        <div class="text-sm text-gray-900">{{ $i->sum }}</div>
                                    @endif
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
