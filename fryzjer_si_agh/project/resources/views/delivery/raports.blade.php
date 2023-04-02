<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Viewing raports of deliveries
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 mt-4 mb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Delivery date {{ $deliveries[0]->date }}  |  Delivery sum: {{ $deliveries[0]->sum }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Detailed information.
                        </p>
                    </div>
                    <div class="border-t border-gray-200 pt-4">
                        <dl>
                            <!--produkty-->
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    @foreach($deliveries as $product)
                                        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                                            <tr>
                                                <td>Nazwa:{{$product->name}}</td><br>
                                                <td>Cena:{{$product->cost}}</td><br>
                                                <td>Ilość:{{$product->quantity}}</td>
                                            </tr>
                                        </div>
                                    @endforeach
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

