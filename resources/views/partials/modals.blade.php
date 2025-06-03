<div id="profileModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-xl w-[90%] max-w-xl p-8 relative shadow-lg">
        <button id="closeProfileModal"
            class="absolute top-4 right-4 text-2xl text-gray-600 hover:text-red-600">&times;</button>
        <h2 class="text-2xl font-bold mb-6">Profile Saya</h2>

        <form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-center justify-center mb-6">
                <label for="profilePhotoInput" class="cursor-pointer">
                    <img id="profilePhotoPreview" 
                         src="{{ Auth::check() && Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('assets/img/profile.png') }}"
                         alt="Profile Photo"
                         class="w-24 h-24 rounded-full object-cover object-center border-2 border-red-600" />
                </label>
                <input type="file" id="profilePhotoInput" name="profile_pic" accept="image/*" class="hidden"
                    @if (!Auth::check()) disabled @endif />
                <p class="text-sm text-gray-500 mt-2">Klik foto untuk upload</p>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-semibold text-red-600 mb-1">Nama Lengkap</label>
                    <input type="text" id="name" name="name" 
                           value="{{ Auth::check() ? Auth::user()->name : 'Guest' }}"
                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-red-400 @if (!Auth::check()) cursor-not-allowed disabled:bg-gray-100 text-gray-500 @endif"
                           @if (!Auth::check()) disabled @endif />
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-red-600 mb-1">Email</label>
                    <input type="email" id="email"
                           value="{{ Auth::check() ? Auth::user()->email : 'No Email' }}"
                           class="w-full px-4 py-2 border rounded-md bg-gray-100 text-gray-500 cursor-not-allowed"
                           disabled />
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                        class="bg-red-700 hover:bg-red-800 text-white font-semibold px-6 py-2 rounded-full @if (!Auth::check()) cursor-not-allowed disabled:bg-gray-500 @endif"
                        @if (!Auth::check()) disabled @endif >
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-xl w-[90%] max-w-sm p-8 relative shadow-lg text-center">
        <div class="flex flex-col items-center justify-center mb-6">
            <div class="bg-green-100 rounded-full p-4 mb-4">
                <i class="fas fa-check-circle text-green-500 text-5xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-green-700 mb-2">Berhasil!</h2>
            <p class="text-gray-700">Data telah berhasil disimpan</p>
        </div>
        <button id="okSuccessModalBtn"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Oke</button>
    </div>
</div>

{{-- Skrip khusus untuk modals, ditempatkan di sini atau di akhir app.blade.php --}}
@push('scripts')
<script>
    // Profile modal script
    const profileBtn = document.getElementById('profileBtn');
    const profileModal = document.getElementById('profileModal');
    const closeProfileModal = document.getElementById('closeProfileModal');
    const saveChangesBtn = document.getElementById('saveChangesBtn');
    const successModal = document.getElementById('successModal');
    const okSuccessModalBtn = document.getElementById('okSuccessModalBtn');

    profileBtn?.addEventListener('click', () => {
        profileModal.classList.remove('hidden');
    });

    closeProfileModal?.addEventListener('click', () => {
        profileModal.classList.add('hidden');
    });

    window.addEventListener('click', (e) => {
        if (e.target === profileModal) {
            profileModal.classList.add('hidden');
        }
    });

    const profilePhotoInput = document.getElementById('profilePhotoInput');
    const profilePhotoPreview = document.getElementById('profilePhotoPreview');

    profilePhotoInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePhotoPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    saveChangesBtn?.addEventListener('click', () => {
        profileModal.classList.add('hidden');
        successModal.classList.remove('hidden');
    });

    okSuccessModalBtn?.addEventListener('click', () => {
        successModal.classList.add('hidden');
    });
</script>
@endpush
