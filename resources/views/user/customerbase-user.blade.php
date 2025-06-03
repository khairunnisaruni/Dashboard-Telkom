@extends('user.app-user')

@section('content')
<div  class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16">
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
                console.log('Selected Category:', this.selectedCategory);
                this.modalOpen = true;
            }
        }));
    });
</script>
@endsection
