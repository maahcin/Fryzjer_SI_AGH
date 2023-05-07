<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Viewing visit details
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- todo --}}
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 mt-4 mb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Visit no #{{ $visit->id }}: {{ $visit->name }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Detailed information.
                        </p>
                    </div>
                    <div class="border-t border-gray-200 pt-4">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Name
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Phone number
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Email
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                </dd>
                            </div>

                            <div class="bg-white px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Speciality
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                </dd>
                            </div>
                            @if ($visit->status == 0)
                                <form method="post" action="{{ route('visits.update', $visit->id) }}" enctype="multipart/form-data">

                                    @csrf
                                    @method("PUT")
                                    @foreach ($products as $product)
                                    <div>

                                        <x-input-label for="startDatetime" :value="__($product->name.' - quantity: '.$product->quantity)" />
                                        <x-text-input id="{{$product->name}}" class="block mt-1 w-full" type="number" name="{{$product->name}}" :value=0 />

                                        <x-input-error :messages="$errors->get($product->name)" class="mt-2" />
                                        <br />
                                    </div>
                                        <input type="hidden" name="requestID" value="{{$product->id}}" />
                                    @endforeach



                                    <div class="flex items-center justify-end mt-4">

                                        <x-primary-button class="ml-4">
                                            {{ __('Finish') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            @else

                            @endif
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

