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
                <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('dashboard') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-home"></i><span>Home</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('territory') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg 
                        {{ request()->is('territory') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold'}}">
                    <i class="fas fa-map-marked-alt"></i><span>Territory</span>
                </a>
            </li>
           <li>
                <a href="{{ route('occ') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('occ') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-chart-bar"></i><span>OCC & Idle Port</span>
                </a>
            </li>

            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg cursor-pointer">
                <i class="fas fa-bullseye"></i><span>Opportunity</span>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg cursor-pointer">
                <i class="fas fa-users"></i><span>Customer Base</span>
            </li>
            <li>
                <a href="{{ route('resource') }}"
                 class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('resource') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-archive"></i><span>Resource</span>
                </a>
            </li>
            <li
                class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg cursor-pointer">
                <i class="fas fa-tasks"></i><span>Plans</span>
            </li>
            <li>
                <a href="{{ route('about') }}"
                 class="flex items-center gap-3 px-4 py-2 rounded-lg
                        {{ request()->is('about') ? 'text-red-600 font-bold bg-red-100' : 'text-gray-700 hover:bg-red-100 hover:text-red-600 hover:font-bold' }}">
                    <i class="fas fa-info-circle"></i><span>About Us</span>
                </a>
            </li>
           
            <li class="py-4"></li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-red-100 hover:font-bold hover:text-red-600 rounded-lg cursor-pointer w-full text-left">
                    <i class="fas fa-sign-out-alt"></i><span>Log Out</span>
                </button>
            </form>

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
