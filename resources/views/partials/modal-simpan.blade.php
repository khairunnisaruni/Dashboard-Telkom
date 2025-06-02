<div 
    x-show="showSimpanModal" 
    x-cloak 
    @keydown.escape.window="showSimpanModal = false"
    @click.away="showSimpanModal = false"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
>
    <div @click.stop class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 relative">
        <button @click="showSimpanModal = false" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-light" type="button">&times;</button>

        <h2 class="text-xl font-bold mb-2 text-gray-900">Simpan Perubahan</h2>
        <p class="text-gray-700 mb-4">Apakah yakin ingin menyimpan perubahan?</p>

        <label for="dontShowAgain" class="flex items-center space-x-2 mb-6 select-none cursor-pointer">
            <input type="checkbox" id="dontShowAgain" name="dontShowAgain" class="form-checkbox rounded text-red-600 focus:ring-red-400" />
            <span class="text-gray-600 text-sm">Jangan tampilkan lagi</span>
        </label>

        <div class="flex justify-end space-x-4">
            <button @click="showSimpanModal = false" type="button" class="px-6 py-2 border border-red-600 text-red-600 rounded-md font-semibold hover:bg-red-600 hover:text-white transition">Batal</button>
            <button @click="showSimpanModal = false; showSimpanBerhasilModal = true" type="button" class="px-6 py-2 border border-green-600 text-green-600 rounded-md font-semibold hover:bg-green-600 hover:text-white transition">Konfirmasi</button>
        </div>
    </div>
</div>
