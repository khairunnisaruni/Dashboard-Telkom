<div 
    x-show="showSimpanBerhasilModal" 
    x-cloak
    @keydown.escape.window="showSimpanBerhasilModal = false"
    @click.away="showSimpanBerhasilModal = false"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
>
    <div @click.stop 
         class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 relative flex flex-col items-center text-center">

        {{-- Icon Check --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-green-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4" />
            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" fill="none"/>
        </svg>

        {{-- Title --}}
        <h2 class="text-2xl font-bold text-green-600 mb-2">Berhasil!</h2>

        {{-- Subtitle --}}
        <p class="text-gray-700 mb-6">Data telah berhasil disimpan</p>

        {{-- Button OK --}}
        <button 
            @click="showSimpanBerhasilModal = false"
            class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md font-semibold transition"
        >
            Oke
        </button>
    </div>
</div>
