@extends('layouts.app')

@section('content')
<main class="p-4 md:p-6" x-data="{ showUploadModal: false }">
    <h1 class="text-xl md:text-2xl font-bold mb-4">OCC and Idle Port</h1>

    <div class="bg-white shadow rounded-lg overflow-hidden">
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
                <button @click="showUploadModal = true"
                    class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 text-sm w-full sm:w-auto">
                    + Upload
                </button>
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

    <!-- Upload Modal -->
    <div x-show="showUploadModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white w-full max-w-xl rounded-lg p-6 shadow-lg relative">
            <!-- Close Button -->
            <button @click="showUploadModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">
                &times;
            </button>

            <h2 class="text-lg font-bold mb-1">OCC dan Idle Port <span class="text-blue-500 text-sm ml-2">› Upload</span></h2>
            <p class="text-sm text-gray-600 mb-4">Mohon Unggah file CSV/Excel sesuai format yang ditentukan</p>

            <!-- Upload Form -->
            <form method="POST" action="{{ route('occ.modal-upload') }}" enctype="multipart/form-data"
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

</main>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
