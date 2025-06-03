@extends('user.app-user')

@section('content')
<div class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16">
                <span class="text-xl font-bold text-gray-800 ml-4 mt-4 md:mt-20 md:mb-4 md:text-3xl">Resource</span>

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
                    <li><a href="?filter=AM" class="block px-4 py-2 hover:bg-gray-100">Account Manager</a></li>
                    <li><a href="?filter=mitra-agensi" class="block px-4 py-2 hover:bg-gray-100">Mitra Agensi</a></li>
                    <li><a href="?filter=sales-asistant" class="block px-4 py-2 hover:bg-gray-100">Sales Asistant</a></li>
                    <li><a href="?filter=AP" class="block px-4 py-2 hover:bg-gray-100">Account Representative</a></li>
                    <li><a href="?filter=mitra-PM" class="block px-4 py-2 hover:bg-gray-100">Mitra PM</a></li>
                    <li><a href="?filter=head-of-telda" class="block px-4 py-2 hover:bg-gray-100">Head of Telda</a></li>
                    <li><a href="?filter=officer" class="block px-4 py-2 hover:bg-gray-100">Officer</a></li>
                </ul>
            </div>

            <div class="flex flex-col sm:flex-row gap-2">
                <input type="text" placeholder="Search" class="px-3 py-1 border rounded text-sm w-full sm:w-auto">
              
            </div>
        </div>

        {{-- Responsive table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">Telkom Daerah</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">Nama</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">Jabatan</th>
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
                        <td class="px-4 py-2 whitespace-nowrap">Khairunnisa</td>
                        <td class="px-4 py-2 whitespace-nowrap">Mitra Agensi</td>
                        <td class="px-4 py-2 whitespace-nowrap">24/02/2024 00:00</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Upload Modal -->
    
</main>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
