<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-md p-6 transition-transform duration-300 transform -translate-x-full md:translate-x-0 md:static md:inset-auto md:z-auto md:block">
    <button id="closeSidebarBtn"
        class="absolute top-4 right-4 text-4xl text-gray-500 hover:text-red-600 focus:outline-none md:hidden"
        aria-label="Close Sidebar">
        &times;
    </button>
    <div class="w-36 h-auto mb-6 flex items-center justify-center mx-auto">
        <img src="{{ asset('assets/img/LOGO TELKOM WITH FONT.png') }}" alt="Logo" />
    </div>
    <nav class="space-y-2">
        <ul class="space-y-4 mt-8">
            <li class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-600 font-bold bg-red-100">
                <i class="fas fa-home"></i><span>Home</span>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold rounded-lg">
                <i class="fas fa-map-marked-alt"></i><span>Territory</span>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg">
                <i class="fas fa-chart-bar"></i><span>OCC & Idle Port</span>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg">
                <i class="fas fa-bullseye"></i><span>Opportunity</span>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg">
                <i class="fas fa-users"></i><span>Customer Base</span>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg">
                <i class="fas fa-archive"></i><span>Resources</span>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg">
                <i class="fas fa-tasks"></i><span>Plans</span>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg">
                <i class="fas fa-info-circle"></i><span>About Us</span>
            </li>
            <li class="py-4"></li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg">
                <i class="fas fa-sign-out-alt"></i><span>Log Out</span>
            </li>
        </ul>
    </nav>
</aside>