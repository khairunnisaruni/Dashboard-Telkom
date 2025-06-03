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

    <div class="pt-20 md:ml-64 md:pt-16">
        <img src="{{ asset('assets/img/about us whole pict (1).png') }}" alt="Telkom Sumut Map" class="max-w-full h-auto">
        <img src="{{ asset('assets/img/about us whole pict (2).png') }}" alt="Telkom Sumut Map" class="max-w-full h-auto">
        <img src="{{ asset('assets/img/about us whole pict (3).png') }}" alt="Telkom Sumut Map" class="max-w-full h-auto">


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