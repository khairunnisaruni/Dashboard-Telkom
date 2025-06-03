<div 
    x-show="showHapusModal" 
    x-cloak
    @keydown.escape.window="showHapusModal = false"
    @click.away="showHapusModal = false"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
>
    <div @click.stop 
         class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 relative text-center">

        {{-- Close Button --}}
        <button @click="showHapusModal = false" 
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-light" 
                type="button">&times;</button>

        {{-- Title --}}
        <h2 class="text-xl font-bold mb-2 text-gray-900">Simpan Perubahan</h2>

        {{-- Subtitle --}}
        <p class="text-gray-700 mb-6">Apakah yakin ingin menghapus data?</p>

        {{-- Checkbox --}}
        <label for="dontShowAgain" class="flex items-center space-x-2 mb-6 select-none cursor-pointer justify-center">
            <input type="checkbox" id="dontShowAgain" name="dontShowAgain" 
                   class="form-checkbox rounded text-gray-400 cursor-not-allowed" disabled />
            <span class="text-gray-400 text-sm">Jangan tampilkan lagi</span>
        </label>

        {{-- Action Buttons --}}
        <div class="flex justify-center space-x-6">
            <button 
                @click="showHapusModal = false" 
                type="button"
                class="px-8 py-2 bg-red-700 text-white rounded-full font-semibold hover:bg-red-800 transition"
            >
                Batal
            </button>
            <button 
                type="button" @click="showHapusModal = false; showHapusBerhasilModal = true"
                class="px-8 py-2 border border-green-600 text-green-600 rounded-full font-semibold hover:bg-green-600 hover:text-white transition"
            >
                Konfirmasi
            </button>
        </div>
    </div>
</div>
