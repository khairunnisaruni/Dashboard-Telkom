@extends('layouts.app')

@section('content')
<div x-data="uploadDropdown" class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16">
    <span class="text-xl font-bold text-gray-800 ml-4 mt-4 md:mt-20 md:mb-4 md:text-3xl">Customer Base</span>

    <div class="bg-white shadow rounded-lg overflow-hidden m-4">
        {{-- Top Controls --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 p-4 border-b">
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="text-sm text-gray-600 flex items-center">
                     All data ▼
                </button>
                <ul x-show="open" @click.away="open = false"
                    class="absolute z-10 mt-2 bg-white border rounded shadow text-sm w-32">
                    <li><a href="?filter=all" class="block px-4 py-2 hover:bg-gray-100">All data</a></li>
                    <li><a href="?filter=localgov" class="block px-4 py-2 hover:bg-gray-100">Local Government</a></li>
                    <li><a href="?filter=large-enterprise" class="block px-4 py-2 hover:bg-gray-100">Large Enterprise</a></li>
                    <li><a href="?filter=state-owned" class="block px-4 py-2 hover:bg-gray-100">State Owned Enterprise</a></li>
                </ul>
            </div>

            <div class="flex flex-col md:flex-row md:items-center gap-2 mt-2 md:mt-0">
                <!-- Search -->
                <input type="text" placeholder="Search" class="px-3 py-1 border rounded text-sm w-full md:w-64">

                <!-- Tombol Upload biru dengan dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-blue-700">
                        + Upload
                    </button>

                    <ul x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-52 bg-white border border-gray-200 rounded shadow-md z-10 text-sm">
                        <li><button @click="showModal('Local Government')" class="w-full text-left px-4 py-2 hover:bg-gray-100">Local Government</button></li>
                        <li><button @click="showModal('Large Enterprise')" class="w-full text-left px-4 py-2 hover:bg-gray-100">Large Enterprise</button></li>
                        <li><button @click="showModal('State Owned Enterprise')" class="w-full text-left px-4 py-2 hover:bg-gray-100">State Owned Enterprise</button></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-4 py-2 font-semibold">Divisi</th>
                        <th class="px-4 py-2 font-semibold">Nama</th>
                        <th class="px-4 py-2 font-semibold">NIPNAS</th>
                        <th class="px-4 py-2 font-semibold">NIPNAS GROUP</th>
                        <th class="px-4 py-2 font-semibold">Last Updated</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @for($i = 0; $i < 10; $i++)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">Large Enterprise</td>
                        <td class="px-4 py-2">RUSINDO PRIMA FOOD INDUSTRI</td>
                        <td class="px-4 py-2">1999831</td>
                        <td class="px-4 py-2">1999831</td>
                        <td class="px-4 py-2">24/02/2024 00:00</td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

    <!-- Upload Modal -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white w-full max-w-xl rounded-lg p-6 shadow-lg relative">
            <button @click="modalOpen = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">
                &times;
            </button>

            <h2 class="text-lg font-bold mb-1">Customer Base <span class="text-blue-500 text-sm ml-2">› Upload - <span x-text="selectedCategory"></span></span></h2>
            <p class="text-sm text-gray-600 mb-4">Unggah file CSV/Excel sesuai kategori yang dipilih</p>

            <!-- Form Upload -->
            <form method="POST" action="{{ route('customerbase.modal-upload') }}" enctype="multipart/form-data"
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

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('uploadDropdown', () => ({
            modalOpen: false,
            selectedCategory: '',
            showModal(category) {
                this.selectedCategory = category;
                this.modalOpen = true;
            }
        }));
    });
</script>
@endsection
