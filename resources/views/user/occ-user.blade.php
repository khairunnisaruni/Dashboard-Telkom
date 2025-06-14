@extends('user.app-user')

@section('content')
<div class="flex min-h-screen" 
     x-data="{ 
         filter: 'all' 
     }">
    <main class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16 p-6">

        <h1 class="text-3xl font-bold mb-6" style="margin-top: 60px;">OCC & Idle Port</h1>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-4">
             {{-- Dropdown Filter --}}
            <div x-data="{ open: false }" class="relative inline-block text-left">
                <button @click="open = !open" 
                    class="flex items-center px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100 text-sm font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span x-text="filter === 'all' ? 'All data' : (filter === 'occ' ? 'OCC' : 'Idle Port')"></span>
                </button>
                <ul x-show="open" @click.away="open = false" x-cloak
                    class="absolute z-10 mt-2 bg-white border rounded shadow text-sm w-32">
                    <li><button @click="filter = 'all'; open = false" class="block w-full text-left px-4 py-2 hover:bg-gray-100">All data</button></li>
                    <li><button @click="filter = 'occ'; open = false" class="block w-full text-left px-4 py-2 hover:bg-gray-100">OCC</button></li>
                    <li><button @click="filter = 'idle'; open = false" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Idle Port</button></li>
                </ul>
            </div>

             {{-- Tools --}}
            <div class="flex items-center space-x-4">
                {{-- Sort --}}
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open" 
                        class="flex items-center px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100 text-sm font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 10h14M3 16h10" />
                        </svg>
                        Sort
                    </button>
                    <ul x-show="open" @click.away="open = false" x-cloak 
                        class="absolute z-10 mt-2 bg-white border rounded shadow text-sm w-24">
                        <li><a href="?sort=asc" class="block px-4 py-2 hover:bg-gray-100">ASC</a></li>
                        <li><a href="?sort=desc" class="block px-4 py-2 hover:bg-gray-100">DESC</a></li>
                    </ul>
                </div>

                {{-- Search --}}
                <div class="flex items-center space-x-2">
                    <form method="GET" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M9.5 17a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                            class="border border-gray-300 rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-red-600" />
                    </form>
                </div>

                
            </div>
        </div>

         {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300 text-sm text-left bg-white">
                <thead>
                    <tr class="bg-red-600 text-white">
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Telda</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold" x-show="filter !== 'idle'" x-cloak>OCC</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold" x-show="filter !== 'occ'" x-cloak>Idle Port</th>
                        <th class="px-5 py-3 border-b border-red-700 font-semibold">Last Updated</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @if (empty($occData) || is_null($occData))
                        <tr>
                            <td colspan="4" class="text-center px-5 py-3 text-gray-500">Data belum tersedia</td>
                        </tr>
                    @else
                        @foreach ($occData as $row)
                        <tr class="hover:bg-gray-50 border-b border-gray-300">
                            <td class="px-5 py-3 font-semibold">{{ $row['telda'] }}</td>
                            <td class="px-5 py-3" x-show="filter !== 'idle'" x-cloak>{{ $row['occ'] }}</td>
                            <td class="px-5 py-3" x-show="filter !== 'occ'" x-cloak>{{ $row['idle'] }}</td>
                            <td class="px-5 py-3 text-gray-500">{{ $row['updated'] }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>

    
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
