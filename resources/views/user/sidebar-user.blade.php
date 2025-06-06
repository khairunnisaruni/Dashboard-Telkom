<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-md p-6 md:block transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
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
            <li>
                <a href="{{ route('dashboard-user') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('dashboard-user') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-home"></i><span>Home</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('territory-user') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg 
                        {{ request()->is('territory-user') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold'}}">
                    <i class="fas fa-map-marked-alt"></i><span>Territory</span>
                </a>
            </li>
           <li>
                <a href="{{ route('occ-user') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('occ-user') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-chart-bar"></i><span>OCC & Idle Port</span>
                </a>
            </li>
            <li>
                <a href="{{ route('opportunity-user') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('opportunity-user') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-bullseye"></i>
                    <span>Opportunity</span>
                </a>
            </li>
            <li>
                <a href="{{ route('customerbase-user') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('cbase-user') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-users"></i><span>Customer Base</span>
                </a>
            </li>
            <li>
                <a href="{{ route('resource-user') }}"
                 class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('resource-user') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-archive"></i><span>Resource</span>
                </a>
            </li>
            <!-- <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg cursor-pointer">
                <i class="fas fa-tasks"></i><span>Plans</span>
            </li> -->
            <li>
                <a href="{{ route('about-user') }}"
                 class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('about-user') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-info-circle"></i><span>About Us</span>
                </a>
            </li>
            <li>
                <button type="button"
                    onclick="document.getElementById('logoutModal').classList.remove('hidden')"
                    class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg cursor-pointer w-full text-left">
                    <i class="fas fa-sign-out-alt"></i><span>Log Out</span>
                </button>
            </li>

            <!-- <li class="py-4"></li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg cursor-pointer w-full text-left">
                    <i class="fas fa-sign-out-alt"></i><span>Log Out</span>
                </button>
            </form> -->

        </ul>
    </nav>
</aside>

<script>
  const menuItems = document.querySelectorAll('aside nav ul li');

  menuItems.forEach(item => {
    item.addEventListener('click', () => {
      // Reset semua item ke default style
      menuItems.forEach(i => {
        i.classList.remove('text-red-600', 'font-bold', 'bg-red-100');
        i.classList.add('text-gray-700', 'hover:bg-red-100', 'hover:text-red-600', 'hover:font-bold');
      });

      // Set item yang diklik jadi aktif
      item.classList.add('text-red-600', 'font-bold', 'bg-red-100');
      item.classList.remove('text-gray-700', 'hover:bg-red-100', 'hover:text-red-600', 'hover:font-bold');
    });
  });
</script>
<!-- Modal Logout -->
<div id="logoutModal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-xl px-8 pt-8 pb-5 shadow-xl text-center relative w-100">
        <button onclick="document.getElementById('logoutModal').classList.add('hidden')" 
                class="absolute top-2 right-3 text-xl text-gray-500 hover:text-red-600">&times;</button>
        <p class="text-lg font-semibold mb-6">Apakah anda yakin ingin keluar?</p>
        <div class="flex justify-center gap-4">
   <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
        class="w-28 border border-red-600 text-red-600 font-semibold py-2 rounded-lg hover:bg-red-100 transition">
        Batal
    </button>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="w-28 bg-red-600 text-white font-semibold py-2 rounded-lg hover:bg-red-700 transition">
            Keluar
        </button>
    </form>
</div>

    </div>
</div>



