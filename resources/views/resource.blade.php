@extends('layouts.app')

@section('content')
<div class="flex min-h-screen" x-data="{ showUploadModal: false }">
    <main class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16 p-6">

        <h1 class="text-3xl font-bold mb-6" style="margin-top: 60px;">Resource</h1>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-4">
            {{-- Dropdown Filter --}}
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <button @click="open = !open" 
                    class="flex items-center px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100 text-sm font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    All data
                </button>
                <ul x-show="open" @click.away="open = false" 
                    class="absolute z-10 mt-2 bg-white border rounded shadow text-sm w-48">
                    <li><a href="?filter=all" class="block px-4 py-2 hover:bg-gray-100">All data</a></li>
                    <li><a href="?filter=AM" class="block px-4 py-2 hover:bg-gray-100">Account Manager</a></li>
                    <li><a href="?filter=mitra-agensi" class="block px-4 py-2 hover:bg-gray-100">Mitra Agensi</a></li>
                    <li><a href="?filter=sales-asistant" class="block px-4 py-2 hover:bg-gray-100">Sales Assistant</a></li>
                    <li><a href="?filter=AP" class="block px-4 py-2 hover:bg-gray-100">Account Representative</a></li>
                    <li><a href="?filter=mitra-PM" class="block px-4 py-2 hover:bg-gray-100">Mitra PM</a></li>
                    <li><a href="?filter=head-of-telda" class="block px-4 py-2 hover:bg-gray-100">Head of Telda</a></li>
                    <li><a href="?filter=officer" class="block px-4 py-2 hover:bg-gray-100">Officer</a></li>
                </ul>
            </div>

            {{-- Tools --}}
            <div class="flex items-center space-x-4">
                {{-- Search --}}
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M9.5 17a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                    </svg>
                    <input type="text" placeholder="Search..." 
                        class="border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-red-600" />
                </div>

                {{-- Upload --}}
                <button @click="showUploadModal = true" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md text-sm font-semibold">
                    + Upload
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300 text-sm text-left bg-white">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Telkom Daerah</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Nama</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Jabatan</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Last Updated</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @php
                        $rows = [
                            'Binjai','Lubuk Pakam','Siantar','Inner Sumut','Kabanjahe','Kisaran',
                            'Padang Sidempuan','Rantau Prapat','Sibolga','Toba',
                            'Binjai','Lubuk Pakam','Siantar','Inner Sumut'
                        ];
                    @endphp
                    @foreach ($rows as $row)
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-5 py-3">{{ $row }}</td>
                        <td class="px-5 py-3">Khairunnisa</td>
                        <td class="px-5 py-3">Mitra Agensi</td>
                        <td class="px-5 py-3 text-gray-500">24/02/2024 00:00</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    {{-- Upload Modal --}}
    <div x-show="showUploadModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white w-full max-w-xl rounded-lg p-6 shadow-lg relative">
            <!-- Close Button -->
            <button @click="showUploadModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">
                &times;
            </button>

            <h2 class="text-lg font-bold mb-1">Resource <span class="text-blue-500 text-sm ml-2">› Upload</span></h2>
            <p class="text-sm text-gray-600 mb-4">Silakan unggah file CSV/Excel sesuai format untuk kategori ini.</p>

            <!-- Upload Form -->
            <form method="POST" action="{{ route('resource.modal-upload') }}" enctype="multipart/form-data"
                class="border-dashed border-2 border-gray-300 rounded-lg flex flex-col items-center justify-center p-6 text-gray-600 text-sm text-center hover:border-blue-400 cursor-pointer">
                @csrf
                <input type="file" name="file" class="hidden" id="uploadFile" onchange="this.form.submit()">
                <label for="uploadFile" class="flex flex-col items-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V4m0 0L8 8m4-4l4 4" />
                    </svg>
                    Klik atau tarik file ke area ini untuk upload
                </label>
            </form>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
