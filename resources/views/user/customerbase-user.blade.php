@extends('user.app-user')

@section('content')
<div class="flex min-h-screen" x-data="{ showUploadModal: false, modalCategory: '' }">
    <main class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16 p-6">

        <h1 class="text-3xl font-bold mb-6" style="margin-top: 60px;">Customer Base</h1>

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
                    <li><a href="?filter=localgov" class="block px-4 py-2 hover:bg-gray-100">Local Government</a></li>
                    <li><a href="?filter=large-enterprise" class="block px-4 py-2 hover:bg-gray-100">Large Enterprise</a></li>
                    <li><a href="?filter=state-owned" class="block px-4 py-2 hover:bg-gray-100">State Owned Enterprise</a></li>
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

                
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300 text-sm text-left bg-white">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Divisi</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Nama</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">NIPNAS</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">NIPNAS GROUP</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Last Updated</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @for($i = 0; $i < 10; $i++)
                    <tr class="hover:bg-gray-50 border-b border-gray-300">
                        <td class="px-5 py-3">Large Enterprise</td>
                        <td class="px-5 py-3">RUSINDO PRIMA FOOD INDUSTRI</td>
                        <td class="px-5 py-3">1999831</td>
                        <td class="px-5 py-3">1999831</td>
                        <td class="px-5 py-3 text-gray-500">24/02/2024 00:00</td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </main>

   
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
