<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        li span{
            position: relative;
        }

        li span::before{
            content: '';
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            border-left: 2px solid #553c9a;
            background: #fdfdfe;
            animation: cursor 1s infinite, typing 1.5s normal forwards ease-in-out;
        }
        @keyframes cursor{
            0%, 100%{border-color: transparent;}
            50%{border-color: #553c9a;}
        }
        @keyframes typing{
            100%{ left: 23ch;} /*Use the number of characters in the longest word*/
        }
    </style>

    <div class="py-12" style="size: auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="size: auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="size: auto">
                <div class="p-6 text-gray-900" style="size: auto">

                    <div style="display: inline-flex;">
                        <div style="  font-size: 50px; font-weight: 500; color: grey;">Welcome to</div>
                        <ul style="  margin-left: 20px;line-height: 90px; height: 90px;">
                            <li style="  color: darkblue;font-size: 60px;font-weight: 600;list-style: none;position: relative;"><span>Better than Worse hairdressers</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @switch(App\Models\User::where('id',Auth::id())->value('type'))
        @case(3)
            <div class="py-12" style="padding: 10px">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                                {{-- <div class="ml-4 text-lg leading-7 font-semibold" style="font-size: 1.5em"><a href=" {{route('requests.index')}} " class="underline text-gray-900 dark:text-white">Requests & Orders</a></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @break
        @case(4)
            <div class="py-12" style="padding: 10px">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                               {{-- <div class="ml-4 text-lg leading-7 font-semibold" style="font-size: 1.5em"><a href="{{route('requests.index')}}" class="underline text-gray-900 dark:text-white">List of requests</a></div> --}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-12" style="padding: 10px">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                                {{-- <div class="ml-4 text-lg leading-7 font-semibold" style="font-size: 1.5em"><a href="{{route('orders.index')}}" class="underline text-gray-900 dark:text-white">My orders</a></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @break
        @case(1)
            <div class="py-12" style="padding: 10px">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                                 {{-- <div class="ml-4 text-lg leading-7 font-semibold" style="font-size: 1.5em"><a href="{{route('requests.index')}}" class="underline text-gray-900 dark:text-white">Requests & Orders</a></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-12" style="padding: 10px">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                                    <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold" style="font-size: 1.5em"><a href="{{route('employees.index')}}" class="underline text-gray-900 dark:text-white">Employees</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-12" style="padding: 10px">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold" style="font-size: 1.5em"><a href="{{route('delivery.raport')}}" class="underline text-gray-900 dark:text-white">Watch Delivery Reports</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @break
    @endswitch
</x-app-layout>
