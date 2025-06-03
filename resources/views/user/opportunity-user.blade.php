@extends('user.app-user')

@section('content')
<div class="flex min-h-screen">


    {{-- Overlay untuk sidebar mobile --}}
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden md:hidden"></div>

    {{-- Main content --}}
    <main class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16 p-6" 
          x-data="{ showOpportunityModal: false, showSimpanModal: false, showSimpanBerhasilModal: false, editMode: false, showHapusModal: false, showHapusBerhasilModal: false, showEditOpportunityModal : false }">


        {{-- Judul halaman --}}
        <h1 class="text-3xl font-bold mb-6" style="margin-top: 60px;">Opportunity</h1>

        {{-- Top Controls --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-4">

            {{-- Left side: Filter dropdown --}}
            <div class="flex items-center space-x-2 text-gray-700 font-semibold text-sm select-none cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span>All data</span>
            </div>

            {{-- Right side: Sort, Search, Upload, Edit Mode --}}
            <div class="flex items-center space-x-4">

                {{-- Sort dropdown --}}
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open" 
                        class="flex items-center px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100 text-sm font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 10h14M3 16h10" />
                        </svg>
                        Sort
                    </button>

                    <ul x-show="open" @click.away="open = false" 
                        class="absolute z-10 mt-2 bg-white border rounded shadow text-sm w-24">
                        <li><a href="?sort=asc" class="block px-4 py-2 hover:bg-gray-100">ASC</a></li>
                        <li><a href="?sort=desc" class="block px-4 py-2 hover:bg-gray-100">DESC</a></li>
                    </ul>
                </div>

                {{-- Search input --}}
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M9.5 17a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                    </svg>
                    <span class="text-black text-sm select-none">Search</span>
                    <input type="text"  
                        class="border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-red-600" />
                </div>

               
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300 text-sm text-left bg-white">
                <thead>
                    <tr class="bg-red-600 text-white">
                        <th class="px-5 py-3 border-b border-red-700 font-semibold whitespace-nowrap">Small Medium Enterprise</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold whitespace-nowrap">Wilayah</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold whitespace-nowrap">Jumlah</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold whitespace-nowrap">Last Updated</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold whitespace-nowrap" x-show="editMode">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @php
                        $data = [
                            ['Ruko', 'Binjai', 1049, '24/02/2024 00:00'],
                            ['Sekolah', 'Lubuk Pakam', 1050, '24/02/2024 00:00'],
                            ['Hotel', 'Siantar', 1048, '24/02/2024 00:00'],
                            ['Health', 'Inner Sumut', 1048, '24/02/2024 00:00'],
                            ['Manufacture', 'Kabanjahe', 1048, '24/02/2024 00:00'],
                            ['Agrikultur', 'Kisaran', 1048, '24/02/2024 00:00'],
                            ['Media & Comm', 'Padang Sidempuan', 1048, '24/02/2024 00:00'],
                            ['Ekpedisi', 'Rantau Prapat', 1048, '24/02/2024 00:00'],
                            ['Multifinance', 'Sibolga', 1048, '24/02/2024 00:00'],
                            ['Property', 'Toba', 1048, '24/02/2024 00:00'],
                            ['Enegry', 'Inner Sumut', 1048, '24/02/2024 00:00'],
                        ];
                    @endphp

                    @foreach ($data as $row)
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-5 py-3 font-semibold whitespace-nowrap">{{ $row[0] }}</td>
                        <td class="px-5 py-3 whitespace-nowrap">{{ $row[1] }}</td>
                        <td class="px-5 py-3 font-bold whitespace-nowrap">{{ $row[2] }}</td>
                        <td class="px-5 py-3 text-gray-500 whitespace-nowrap">{{ $row[3] }}</td>

                        <!-- Menambahkan kolom tombol Edit & Hapus, muncul hanya jika editMode aktif -->
                        <td class="px-5 py-3 whitespace-nowrap" x-show="editMode" style="display: none;">
                        <div class="flex space-x-2">
                            <button @click = "showEditOpportunityModal = true;"
                                class="w-9 h-9 rounded-lg bg-yellow-400 hover:bg-yellow-500 flex items-center justify-center">
                            <img src="{{ asset('assets/img/edit-icon.png') }}" alt="Edit" class="w-5 h-5" />
                            </button>
                            <button @click = "showHapusModal = true;"
                                class="w-9 h-9 rounded-lg bg-red-600 hover:bg-red-700 flex items-center justify-center">
                            <img src="{{ asset('assets/img/delete-icon.png') }}" alt="Hapus" class="w-5 h-5" />
                            </button>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    


    </main>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>

<script>
function dropdownData() {
    return {
        dropdownOpen: {
            kategori: false,
            wilayah: false,
        },
        selectedKategori: '',
        selectedWilayah: '',
        kategoriOptions: ['Ruko', 'Sekolah', 'Hotel', 'Health', 'Manufacture', 'Agrikultur', 'Media & Comm', 'Ekspedisi', 'Multifinance', 'Property', 'Energi'],
        wilayahOptions: ['Binjai', 'Kabanjahe', 'Siantar', 'Toba', 'Sibolga', 'Inner Sumut', 'Lubuk Pakam', 'Kisaran', 'Rantau Prapat', 'Padang Sidempuan'],
        toggleDropdown(name) {
            this.dropdownOpen[name] = !this.dropdownOpen[name];
            for (const key in this.dropdownOpen) {
                if (key !== name) this.dropdownOpen[key] = false;
            }
        },
        selectItem(name, value) {
            if (name === 'kategori') {
                this.selectedKategori = value;
            } else if (name === 'wilayah') {
                this.selectedWilayah = value;
            }
            this.dropdownOpen[name] = false;
        }
    }
}
</script>

@endsection
