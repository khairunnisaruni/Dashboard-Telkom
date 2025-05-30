<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Telkom Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        @include('partials.sidebar')
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden md:hidden"></div>

        <main class="flex-1 flex flex-col">
            @include('partials.header')
        </main>
    </div>

    <div id="profileModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-xl w-[90%] max-w-xl p-8 relative shadow-lg">
            <button id="closeProfileModal"
                class="absolute top-4 right-4 text-2xl text-gray-600 hover:text-red-600">&times;</button>
            <h2 class="text-2xl font-bold mb-6">Profile Saya</h2>
            <div class="flex flex-col items-center justify-center mb-6">
                <label for="profilePhotoInput" class="cursor-pointer">
                    <img id="profilePhotoPreview" src="{{ asset('assets/img/profile.png') }}" alt="Profile Photo"
                        class="w-24 h-24 rounded-full object-cover border-2 border-red-600" />
                </label>
                <input type="file" id="profilePhotoInput" accept="image/*" class="hidden" />
                <p class="text-sm text-gray-500 mt-2">Klik foto untuk upload</p>
            </div>
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-semibold text-red-600 mb-1">Nama Lengkap</label>
                    <input type="text" id="name" value="Agung Suptanto"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-red-400" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-red-600 mb-1">Email</label>
                    <input type="email" id="email" value="80001@telkom.co.id"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100 text-gray-500 cursor-not-allowed"
                        disabled />
                </div>
                <div class="flex justify-end pt-4">
                    <button id="saveChangesBtn"
                        class="bg-red-700 hover:bg-red-800 text-white font-semibold px-6 py-2 rounded-full">Simpan
                        Perubahan</button>
                </div>
            </div>
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

    <script>
        const toggleBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        toggleBtn?.addEventListener('click', openSidebar);
        overlay?.addEventListener('click', closeSidebar);
        closeSidebarBtn?.addEventListener('click', closeSidebar);

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });

        const notifBtn = document.getElementById('notifBtn');
        const notifPanel = document.getElementById('notifPanel');
        const notifIcon = document.getElementById('notifIcon');
        const closeNotif = document.getElementById('closeNotif');

        notifBtn?.addEventListener('click', () => {
            const isOpen = !notifPanel.classList.contains('hidden');
            notifPanel.classList.toggle('hidden');
            notifIcon.src = isOpen ? "{{ asset('assets/img/notifikasi.png') }}" : "{{ asset('assets/img/notifikasi-active.png') }}";
        });

        closeNotif?.addEventListener('click', () => {
            notifPanel.classList.add('hidden');
            notifIcon.src = "{{ asset('assets/img/notifikasi.png') }}";
        });

        window.addEventListener('click', (e) => {
            if (!notifPanel.contains(e.target) && !notifBtn.contains(e.target)) {
                notifPanel.classList.add('hidden');
                notifIcon.src = "{{ asset('assets/img/notifikasi.png') }}";
            }
        });

        // Profile modal script
        const profileBtn = document.getElementById('profileBtn');
        const profileModal = document.getElementById('profileModal');
        const closeProfileModal = document.getElementById('closeProfileModal');
        const saveChangesBtn = document.getElementById('saveChangesBtn'); // Get the "Simpan Perubahan" button
        const successModal = document.getElementById('successModal'); // Get the new success modal
        const okSuccessModalBtn = document.getElementById('okSuccessModalBtn'); // Get the "Oke" button in the success modal

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
                reader.onload = function (e) {
                    profilePhotoPreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Event listener for "Simpan Perubahan" button
        saveChangesBtn?.addEventListener('click', () => {
            // In a real application, you would perform an AJAX call here to save the data.
            // For this example, we'll just simulate success.

            profileModal.classList.add('hidden'); // Hide the profile modal
            successModal.classList.remove('hidden'); // Show the success modal
        });

        // Event listener for "Oke" button in the success modal
        okSuccessModalBtn?.addEventListener('click', () => {
            successModal.classList.add('hidden'); // Hide the success modal
        });
    </script>
</body>

</html>