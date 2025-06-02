@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Overlay untuk sidebar mobile --}}
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden md:hidden"></div>

    {{-- Main content --}}
    <main class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16 p-6" 
          x-data="{ showOpportunityModal: false, showSimpanModal: false, showSimpanBerhasilModal: false, editMode: false, showHapusModal: false, showHapusBerhasilModal: false, showEditOpportunityModal : false }">

        {{-- Header Navbar --}}
        @include('partials.header')

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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
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

                {{-- Upload button --}}
                <button @click="showOpportunityModal = true"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md text-sm font-semibold">
                    + Upload
                </button>

                {{-- Edit Mode toggle --}}
                <label for="editModeToggle" class="flex items-center cursor-pointer select-none space-x-3">
                    <div class="relative">
                        <input type="checkbox" id="editModeToggle" class="sr-only peer" x-model="editMode" />
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-yellow-400 transition-colors duration-300"></div>
                        <div
                            class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transform peer-checked:translate-x-full peer-checked:border-yellow-400 transition-transform duration-300 border"></div>
                    </div>
                    <span class="text-yellow-500 font-semibold text-sm select-none">Edit Mode</span>
                </label>
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

        {{-- Modal Opportunity --}}
        <div 
            x-show="showOpportunityModal" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
            @keydown.escape.window="showOpportunityModal = false"
        >
            <div 
                @click.outside="if(!showSimpanModal) showOpportunityModal = false" 
                class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8 relative text-gray-900 font-sans"
            >
                <button @click="showOpportunityModal = false" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-3xl font-thin leading-none">&times;</button>

                <div class="flex items-center space-x-2 mb-5">
                    <h2 class="text-2xl font-extrabold">Opportunity</h2>
                    <span class="text-blue-600 font-semibold select-none cursor-default mt-0.5 inline-block">› Upload</span>
                </div>

                <p class="mb-6 text-gray-700 text-sm font-normal">Tambahkan Nilai Opportunity</p>

                <form method="POST" action="{{ route('opportunity.modal-upload') }}" enctype="multipart/form-data" class="space-y-6 text-sm" x-data="dropdownData()">
                    @csrf

                    {{-- Kategori Dropdown --}}
                    <div>
                        <label for="kategori" class="block font-semibold mb-2">Kategori</label>
                        <div class="relative">
                            <button type="button" @click="toggleDropdown('kategori')" 
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-left cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-600">
                                <span x-text="selectedKategori ? selectedKategori : 'Pilih Kategori'"></span>
                                <svg class="w-5 h-5 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul x-show="dropdownOpen.kategori" x-transition 
                                class="absolute z-20 mt-1 w-full bg-white border border-gray-300 rounded-md max-h-36 overflow-y-auto shadow-lg">
                                <template x-for="item in kategoriOptions" :key="item">
                                    <li @click="selectItem('kategori', item)" class="px-3 py-2 cursor-pointer hover:bg-gray-100" x-text="item"></li>
                                </template>
                            </ul>
                            <input type="hidden" name="kategori" :value="selectedKategori" required />
                        </div>
                    </div>

                    {{-- Nilai --}}
                    <div>
                        <label for="nilai" class="block font-semibold mb-2">Nilai</label>
                        <input type="number" id="nilai" name="nilai" placeholder="Masukkan angka" required
                            class="w-full rounded-md border border-gray-300 px-3 py-2
                                focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent" />
                    </div>

                    {{-- Wilayah Dropdown --}}
                    <div>
                        <label for="wilayah" class="block font-semibold mb-2">Wilayah</label>
                        <div class="relative">
                            <button type="button" @click="toggleDropdown('wilayah')" 
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-left cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-600">
                                <span x-text="selectedWilayah ? selectedWilayah : 'Masukkan Wilayah'"></span>
                                <svg class="w-5 h-5 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul x-show="dropdownOpen.wilayah" x-transition 
                                class="absolute z-20 mt-1 w-full bg-white border border-gray-300 rounded-md max-h-36 overflow-y-auto shadow-lg">
                                <template x-for="item in wilayahOptions" :key="item">
                                    <li @click="selectItem('wilayah', item)" class="px-3 py-2 cursor-pointer hover:bg-gray-100" x-text="item"></li>
                                </template>
                            </ul>
                            <input type="hidden" name="wilayah" :value="selectedWilayah" required />
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end space-x-4 pt-4">
                        <button type="button" @click="showOpportunityModal = false"
                            class="px-6 py-2 border border-black rounded-md font-semibold hover:bg-gray-100 transition">
                            Batal
                        </button>
                        <button type="button" 
                            @click="
                                showOpportunityModal = false;
                                setTimeout(() => showSimpanModal = true, 150);
                            "
                            class="px-6 py-2 bg-blue-600 text-white rounded-md font-semibold hover:bg-blue-700 transition"
                        >
                            Lanjutkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        {{-- Modal Edit Opportunity --}}

        <div 
            x-show="showEditOpportunityModal" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
            @keydown.escape.window="showEditOpportunityModal = false"
        >
            <div 
                @click.outside="showEditOpportunityModal = false" 
                class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8 relative text-gray-900 font-sans"
            >
                {{-- Close Button --}}
                <button @click="showEditOpportunityModal = false" 
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-3xl font-thin leading-none">&times;</button>

                {{-- Header --}}
                <div class="flex items-center space-x-2 mb-5">
                    <h2 class="text-2xl font-extrabold">Opportunity</h2>
                    <span class="text-yellow-400 font-semibold select-none cursor-default mt-0.5 inline-block">› Edit</span>
                </div>

                {{-- Subtitle --}}
                <p class="mb-6 text-gray-700 text-sm font-normal">Perbaharui Nilai Opportunity</p>

                <form method="POST" action="{{ route('opportunity.modal-update') }}" class="space-y-6 text-sm" x-data="dropdownData()">
                    @csrf
                    @method('PUT')

                    {{-- Kategori Dropdown --}}
                    <div>
                        <label for="kategori" class="block font-semibold mb-2">Kategori</label>
                        <div class="relative">
                            <button type="button" @click="toggleDropdown('kategori')" 
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-left cursor-pointer focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                <span x-text="selectedKategori ? selectedKategori : 'Pilih Kategori'"></span>
                                <svg class="w-5 h-5 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul x-show="dropdownOpen.kategori" x-transition 
                                class="absolute z-20 mt-1 w-full bg-white border border-gray-300 rounded-md max-h-36 overflow-y-auto shadow-lg">
                                <template x-for="item in kategoriOptions" :key="item">
                                    <li @click="selectItem('kategori', item)" class="px-3 py-2 cursor-pointer hover:bg-gray-100" x-text="item"></li>
                                </template>
                            </ul>
                            <input type="hidden" name="kategori" :value="selectedKategori" required />
                        </div>
                    </div>

                    {{-- Wilayah Dropdown --}}
                    <div>
                        <label for="wilayah" class="block font-semibold mb-2">Wilayah</label>
                        <div class="relative">
                            <button type="button" @click="toggleDropdown('wilayah')" 
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-left cursor-pointer focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                <span x-text="selectedWilayah ? selectedWilayah : 'Pilih Wilayah'"></span>
                                <svg class="w-5 h-5 absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul x-show="dropdownOpen.wilayah" x-transition 
                                class="absolute z-20 mt-1 w-full bg-white border border-gray-300 rounded-md max-h-36 overflow-y-auto shadow-lg">
                                <template x-for="item in wilayahOptions" :key="item">
                                    <li @click="selectItem('wilayah', item)" class="px-3 py-2 cursor-pointer hover:bg-gray-100" x-text="item"></li>
                                </template>
                            </ul>
                            <input type="hidden" name="wilayah" :value="selectedWilayah" required />
                        </div>
                    </div>

                    {{-- Nilai Lama --}}
                    <div>
                        <label for="nilai_lama" class="block font-semibold mb-2">Nilai Sebelumnya :</label>
                        <input type="number" id="nilai_lama" name="nilai_lama" readonly disabled
                            class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-gray-600" />
                    </div>

                    {{-- Nilai Baru --}}
                    <div>
                        <label for="nilai_baru" class="block font-semibold mb-2">Masukkan Nilai baru</label>
                        <input type="number" id="nilai_baru" name="nilai_baru" placeholder="Masukkan nilai baru" required
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent" />
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end space-x-4 pt-4">
                        <button type="button" @click="showEditOpportunityModal = false"
                            class="px-6 py-2 border border-black rounded-md font-semibold hover:bg-gray-100 transition">
                            Batal
                        </button>
                        <button type="button" @click="
                                showEditOpportunityModal = false;
                                setTimeout(() => showSimpanModal = true, 150);
                            "
                            class="px-6 py-2 bg-yellow-400 text-white rounded-md font-semibold hover:bg-yellow-500 transition">
                            Lanjutkan
                        </button>
                    </div>
                </form>
            </div>
        </div>


        {{-- Modal Simpan --}}
         @include('partials.modal-simpan')

        {{-- Modal Simpan Berhasil--}}
         @include('partials.modal-simpan-berhasil')

         {{-- Modal Hapus --}}
         @include('partials.modal-hapus')

         {{-- Modal Hapus Berhasil--}}
         @include('partials.modal-hapus-berhasil')

         {{-- Modal Edit Berhasil --}}


    </main>
</div>

{{-- Footer --}}
@include('partials.footer')

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
