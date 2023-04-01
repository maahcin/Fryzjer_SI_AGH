<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creating a delivery') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="post" action="{{ route('delivery.store') }} " enctype="multipart/form-data">

                        @csrf

                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" autofocus />

                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <div>
                            @foreach($products as $product)

                                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td><input id="{{$product->id}}" type="number" name="{{$product->id}}" value=0></td>
                                    </tr>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
