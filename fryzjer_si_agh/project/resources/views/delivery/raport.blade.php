<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of reports:
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="border-t border-gray-200 pt-4">
                        <dl>
                            <!--produkty-->
                            <div class="bg-gray-50 px-4 py-1">
                                    @foreach($del as $d)
                                        <div class="w-full md:w-2/3 xl:w-1/2 p-6 flex flex-col">
                                            <tr>
                                                <td><b>Report from delivery, id number: {{$d->id}}</b></td>
                                                <td>Date of transaction: {{$d->date}}</td><br>
                                                <td>Price: {{$d->sum}}</td><br>
                                                <td>Products:<br>
                                                    @foreach($delpr as $p)
                                                        @if($d->id == $p->id_delivery)
                                                            {!! "&emsp;" !!} {{$p->name}},  amount: {{$p->quantity}}, cost of single item: {{$p->cost}} <br>
                                                        @endif
                                                    @endforeach</td><br>
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

