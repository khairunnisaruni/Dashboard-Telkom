@extends('user.app-user')

@section('title', 'Territory - Witel Medan')

@section('content')

    <style>
        /* Add a subtle hover effect to indicate clickability */
        .card-button {
            cursor: pointer;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .card-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(249, 71, 55, 0.2);
        }
    </style>
            <div class="flex-1 flex flex-col pt-24 md:ml-64 md:pt-16">
                <span class="text-xl font-bold text-gray-800 ml-4 mt-4 md:mt-20 md:mb-4 md:text-3xl">Dashboard Witel
                    Sumut</span>

                <div class="flex flex-col md:flex-row md:space-x-4 m-4">
                    <a href="/territory-user"
                        class="card-button p-4 bg-white shadow-md rounded-lg mb-4 md:mb-0 md:w-1/2 block">
                        <span class="text-xl font-semibold text-red-600">Territory Overview</span>
                        <div class="flex items-center justify-between mt-4">
                            <img src="{{ asset('assets/img/telkom-sumut-map.jpg') }}" alt="Telkom Sumut Map"
                                class="max-w-full h-auto">
                        </div>
                    </a>


                    <a href="/occ-user" class="card-button p-4 bg-white shadow-md rounded-lg md:w-1/2 block">

                        <span class="text-xl font-semibold text-red-600">OCC and Idle Port</span>
                        <div class="overflow-x-auto mt-4">
                            <table class="min-w-full divide-y divide-gray-200">
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
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if (empty($occData) || is_null($occData))
                                        <tr>
                                            <td colspan="4" class="text-center px-5 py-3 text-gray-500">Data belum tersedia</td>
                                        </tr>
                                    @else
                                        @foreach ($occData as $row)
                                        <tr>
                                            <td class="px-6 py-1 whitespace-nowrap text-sm font-medium text-gray-900">{{ $row['telda'] }}</td>
                                            <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">{{ $row['occ'] }}</td>
                                            <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-500">{{ $row['idle'] }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </a>
                </div>

                <a href="/opportunity-user" class="card-button p-4 bg-white shadow-md rounded-lg m-4 block">
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
                </a>

                <a href="/cbase-user" class="card-button p-4 bg-white shadow-md rounded-lg m-4 block">
                    <span class="text-xl font-semibold text-red-600">Customer Base</span>
                    <div class="mt-4">
                        <table class="min-w-full text-sm text-left">
                            <thead class="bg-red-100">
                                <tr>
                                    <th
                                        class="px-2 py-4 text-xs text-left font-medium text-gray-500 uppercase tracking-wider">
                                        Telkom Daerah</th>
                                    <th
                                        class="px-2 py-4 text-xs text-left font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-2 py-4 text-xs text-left font-medium text-gray-500 uppercase tracking-wider">
                                        Jabatan</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @php
                                    $rows = [
                                        'Binjai',
                                        'Lubuk Pakam',
                                        'Siantar',
                                        'Inner Sumut',
                                        'Kabanjahe',
                                        'Kisaran',
                                        'Padang Sidempuan',
                                        'Rantau Prapat',
                                        'Sibolga',
                                        'Toba',
                                        'Binjai',
                                        'Lubuk Pakam',
                                        'Siantar',
                                        'Inner Sumut'
                                    ];
                                @endphp
                                @foreach ($rows as $row)
                                    <tr class="border-t hover:bg-gray-50">
                                        <td class="px-2 py-2 whitespace-nowrap">{{ $row }}</td>
                                        <td class=" py-2 whitespace-nowrap">Khairunnisa</td>
                                        <td class="py-2 whitespace-nowrap">Mitra Agensi</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </a>


                <a href="/resource-user" class="card-button p-4 bg-white shadow-md rounded-lg m-4 block">
                    <span class="text-xl font-semibold text-red-600">Resource</span>
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
                </a>
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

    {{-- THE FOLLOWING IS JAVASCRIPT, IT MUST BE INCLUDED IN THE @push('scripts') IN THE APP.BLADE.PHP FILE --}}
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
    </script>
@endsection