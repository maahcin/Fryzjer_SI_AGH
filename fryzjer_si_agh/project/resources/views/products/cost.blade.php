<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cost of products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="GET" action="{{ route('product.cost') }} " enctype="multipart/form-data">

                        <div>

                            <x-input-label for="date" :value="__('Start Date')" />
                            <x-text-input id="sdate" class="block mt-1 w-full" type="date" name="sdate" :value="old('sdate')" autofocus />

                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="date" :value="__('End Date')" />
                            <x-text-input id="edate" class="block mt-1 w-full" type="date" name="edate" :value="old('edate')" autofocus />

                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button name="action" value="cal" class="ml-4">
                                {{ __('Calculate') }}
                            </x-primary-button>
                            <x-primary-button name="action"  title="Report will be generated a few minutes after clicking" value="report" class="ml-4">
                                {{ __('Generate Report') }}
                            </x-primary-button>
                        </div>


                        @if(!empty($err))
                            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6 mt-4 mb-4">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        {{ $err }}
                                    </h3>
                                </div>
                            </div>
                        @elseif(isset($sum))
                            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6 mt-4 mb-4">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Start date {{ $sdate }}  | End Date {{ $edate }} |  Sum: {{ $sum }}
                                    </h3>
                                </div>
                            </div>
                        @endif


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
