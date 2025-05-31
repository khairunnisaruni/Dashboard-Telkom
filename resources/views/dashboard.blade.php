<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Telkom Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
   
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        @include('partials.sidebar')
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden md:hidden"></div>

        <main class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16">
            @include('partials.header')
            <span class="text-xl font-bold text-gray-800 ml-4 mt-4 md:mt-20 md:mb-4 md:text-3xl">Dashboard Witel
                Sumut</span>

            <div class="flex flex-col md:flex-row md:space-x-4 m-4">
                <div class="p-4 bg-white shadow-md rounded-lg mb-4 md:mb-0 md:w-1/2">
                    <span class="text-xl font-semibold text-red-600">Territory Overview</span>

                    <div class="flex items-center justify-between mt-4">
                        <img src="{{ asset('assets/img/telkom-sumut-map.jpg') }}" alt="Telkom Sumut Map"
                            class="max-w-full h-auto">
                    </div>

                </div>


                <div class="p-4 bg-white shadow-md rounded-lg md:w-1/2">
                    <span class="text-xl font-semibold text-red-600">OCC and Idle Port</span>
                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full divide-y divide-gray-200   ">
                            <thead class="bg-red-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Telda
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        OCC
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Idle Port
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 ">
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Binjai
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Lubuk
                                        Pakam
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Siantar
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Inner
                                        Sumut
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Kabanjahe
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Kisaran
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Padang
                                        Sidempuan
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Rantau
                                        Prapat
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Sibolga
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">Toba</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">60.78%</td>
                                    <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">1000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white shadow-md rounded-lg m-4">
                <span class="text-xl font-semibold text-red-600">Opportunity</span>
                <div class="mt-4">
                    <table class="w-full table-auto divide-y divide-gray-200 text-sm">
                        <thead class="bg-red-100">
                            <tr>
                                <th
                                    class="px-2 py-4 text-xs text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Small Medium Enterprise</th>
                                <th
                                    class="px-2 py-4 text-xs text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Wilayah</th>
                                <th
                                    class="px-2 py-4 text-xs text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Ruko</td>
                                <td class="px-2 py-4 text-gray-500">Binjai</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Sekolah</td>
                                <td class="px-2 py-4 text-gray-500">Lubuk Pakam</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Hotel</td>
                                <td class="px-2 py-4 text-gray-500">Siantar</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Health</td>
                                <td class="px-2 py-4 text-gray-500">Inner Sumut</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Manufacture</td>
                                <td class="px-2 py-4 text-gray-500">Kabanjahe</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Agrikultur</td>
                                <td class="px-2 py-4 text-gray-500">Kisaran</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Media & Comm</td>
                                <td class="px-2 py-4 text-gray-500">Padang Sidempuan</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Ekpedisi</td>
                                <td class="px-2 py-4 text-gray-500">Rantau Prapat</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Multifinance</td>
                                <td class="px-2 py-4 text-gray-500">Sibolga</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Property</td>
                                <td class="px-2 py-4 text-gray-500">Toba</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-4 font-medium text-gray-900">Enegry</td>
                                <td class="px-2 py-4 text-gray-500">Inner Sumut</td>
                                <td class="px-2 py-4 text-gray-500">1048</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-4 bg-white shadow-md rounded-lg m-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xl font-semibold text-gray-800">Customer Base</span>
                    <div class="relative inline-block text-left group">
                        <button type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-red-600 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 peer"
                            id="customerBaseDropdownBtn" aria-expanded="true" aria-haspopup="true">
                            State Owned Enterprise
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div id="customerBaseDropdownContent"
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden group-hover:block group-focus-within:block"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="#" data-view="local-government"
                                    class="text-red-600 block px-4 py-2 text-sm hover:bg-gray-100 customer-base-dropdown-item"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Local Government</a>
                                <hr class="border-gray-200">
                                <a href="#" data-view="large-enterprise"
                                    class="text-red-600 block px-4 py-2 text-sm hover:bg-gray-100 customer-base-dropdown-item"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Large Enterprise</a>
                                <hr class="border-gray-200">
                                <a href="#" data-view="state-owned-enterprise"
                                    class="text-red-600 block px-4 py-2 text-sm hover:bg-gray-100 customer-base-dropdown-item"
                                    role="menuitem" tabindex="-1" id="menu-item-2">State Owned Enterprise</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="customerBaseView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                </div>
            </div>

            <div class="p-4 bg-white shadow-md rounded-lg m-4">
                <span class="text-xl font-semibold text-gray-800">Resource</span>
                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Account
                                    Manager
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Mitra Agensi
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Sales
                                    Assistant
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Account
                                    Representative
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">88</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Mitra PM
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Head of Telkom
                                    Daerah
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Officer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    @include('partials.footer')

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

        // Adjust sidebar visibility on resize for desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) { // md breakpoint
                sidebar.classList.remove('-translate-x-full'); // Ensure sidebar is visible on desktop
                overlay.classList.add('hidden'); // Hide overlay on desktop
            } else {
                sidebar.classList.add('-translate-x-full'); // Hide sidebar on mobile
                // Don't hide overlay here, let the open/close functions handle it
            }
        });

        // Initialize sidebar state on page load based on screen size
        document.addEventListener('DOMContentLoaded', () => {
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

        notifBtn?.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent click from bubbling to window and closing immediately
            const isOpen = !notifPanel.classList.contains('hidden');
            notifPanel.classList.toggle('hidden');
            notifIcon.src = isOpen ? "{{ asset('assets/img/notifikasi.png') }}" : "{{ asset('assets/img/notifikasi-active.png') }}";
        });

        closeNotif?.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent click from bubbling
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

        // Customer Base Dropdown Logic
        const customerBaseDropdownBtn = document.getElementById('customerBaseDropdownBtn');
        const customerBaseDropdownContent = document.getElementById('customerBaseDropdownContent');
        const customerBaseDropdownItems = document.querySelectorAll('.customer-base-dropdown-item');
        const customerBaseView = document.getElementById('customerBaseView');

        // Data for each customer base view
        const customerBaseData = {
            'local-government': `
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-building text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">1</p>
                        <p class="text-gray-600">Local Government</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-users text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">50</p>
                        <p class="text-gray-600">Employees</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-network-wired text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">120</p>
                        <p class="text-gray-600">Connections</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-chart-line text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">10M</p>
                        <p class="text-gray-600">Revenue</p>
                    </div>
                </div>
            `,
            'large-enterprise': `
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-city text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">5</p>
                        <p class="text-gray-600">Branches</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-users-cog text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">500</p>
                        <p class="text-gray-600">Staff</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-server text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">20</p>
                        <p class="text-gray-600">Servers</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-dollar-sign text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">50M</p>
                        <p class="text-gray-600">Annual Spend</p>
                    </div>
                </div>
            `,
            'state-owned-enterprise': `
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-building text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">1</p>
                        <p class="text-gray-600">Local Government</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-building text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">218</p>
                        <p class="text-gray-600">Local Government</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-graduation-cap text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">26</p>
                        <p class="text-gray-600">Education</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-leaf text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">218</p>
                        <p class="text-gray-600">Agriculture</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-stethoscope text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">26</p>
                        <p class="text-gray-600">BPD</p>
                    </div>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg flex items-center space-x-3">
                    <i class="fas fa-industry text-3xl text-red-600"></i>
                    <div>
                        <p class="text-2xl font-bold">218</p>
                        <p class="text-gray-600">Manufacture and Infrastructure</p>
                    </div>
                </div>
            `,
        };

        function updateCustomerBaseView(viewKey, displayName) {
            customerBaseView.innerHTML = customerBaseData[viewKey];
            customerBaseDropdownBtn.innerHTML = `${displayName}
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>`;
            customerBaseDropdownContent.classList.add('hidden'); // Hide dropdown after selection
        }

        // Initialize the view with the default 'state-owned-enterprise'
        updateCustomerBaseView('state-owned-enterprise', 'State Owned Enterprise');

        customerBaseDropdownItems.forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default link behavior
                const viewKey = this.dataset.view;
                const displayName = this.textContent.trim();
                updateCustomerBaseView(viewKey, displayName);
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            const isClickInsideDropdown = customerBaseDropdownContent.contains(event.target) || customerBaseDropdownBtn.contains(event.target);
            if (!isClickInsideDropdown) {
                customerBaseDropdownContent.classList.add('hidden');
            }
        });

        function redirectToPage(pageURL) {
        window.location.href = pageURL;
    }
    </script>
</body>

</html>