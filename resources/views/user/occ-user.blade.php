@extends('user.app-user')

@section('content')
 <div class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16">
                <span class="text-xl font-bold text-gray-800 ml-4 mt-4 md:mt-20 md:mb-4 md:text-3xl">OCC & Idle Port</span>

    <div class="bg-white shadow rounded-lg overflow-hidden md:flex-row md:space-x-4 m-4">
        {{-- Top controls --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 p-4 border-b">

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="text-sm text-gray-600 flex items-center">
                     All data ▼
                </button>
                <ul x-show="open" @click.away="open = false"
                    class="absolute z-10 mt-2 bg-white border rounded shadow text-sm w-32">
                    <li><a href="?filter=all" class="block px-4 py-2 hover:bg-gray-100">All data</a></li>
                    <li><a href="?filter=occ" class="block px-4 py-2 hover:bg-gray-100">OCC</a></li>
                    <li><a href="?filter=idle" class="block px-4 py-2 hover:bg-gray-100">Idle Port</a></li>
                </ul>
            </div>

            <div class="flex flex-col sm:flex-row gap-2">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center px-3 py-1 text-sm text-gray-600 border rounded hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h18M3 10h14M3 16h10" />
                        </svg>
                        Sort
                    </button>
                    <ul x-show="open" @click.away="open = false"
                        class="absolute z-10 mt-2 bg-white border rounded shadow text-sm w-24">
                        <li><a href="?sort=asc" class="block px-4 py-2 hover:bg-gray-100">ASC</a></li>
                        <li><a href="?sort=desc" class="block px-4 py-2 hover:bg-gray-100">DESC</a></li>
                    </ul>
                </div>
                <input type="text" placeholder="Search" class="px-3 py-1 border rounded text-sm w-full sm:w-auto">
              
            </div>
        </div>

        {{-- Responsive table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">Telda</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">OCC</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">Idle Port</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">Last Updated</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php
                        $rows = [
                            'Binjai','Lubuk Pakam','Siantar','Inner Sumut','Kabanjahe','Kisaran',
                            'Padang Sidempuan','Rantau Prapat','Sibolga','Toba',
                            'Binjai','Lubuk Pakam','Siantar','Inner Sumut'
                        ];
                    @endphp
                    @foreach ($rows as $row)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 whitespace-nowrap">{{ $row }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">60.78%</td>
                        <td class="px-4 py-2 whitespace-nowrap">1000</td>
                        <td class="px-4 py-2 whitespace-nowrap">24/02/2024 00:00</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



<style>
    [x-cloak] { display: none !important; }
</style>
@endsection