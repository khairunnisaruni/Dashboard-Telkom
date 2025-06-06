<header class="fixed top-0 left-0 w-full z-40 bg-white shadow px-6 py-6 flex items-center justify-between">
    <div class="flex items-center space-x-4 px-2 md:ml-64">
        <button id="menuBtn" class="text-3xl focus:outline-none md:hidden">&#9776;</button>
        <a href="{{ url('dashboard') }}" class="flex items-center space-x-2" aria-label="Go to Home">
            <img src="{{ asset('assets/img/logo witel sumut.png') }}" class="w-28 md:w-32 h-auto" alt="Logo Witel Sumut">
        </a>
    </div>

    <div class="flex items-center space-x-4">
        <div class="relative flex items-center">
            <button id="notifBtn" class="w-10 md:w-12 h-auto relative" aria-label="Notifications">
                <img id="notifIcon" src="{{ asset('assets/img/notifikasi.png') }}" alt="Notif" />
            </button>

            <div id="notifPanel"
                class="absolute top-16 right-6 bg-white shadow-lg rounded-lg w-96 p-4 hidden z-50">
                <div class="flex items-center justify-between px-4 py-2 border-b">
                    <h3 class="font-bold text-red-600">Notifications</h3>
                    <button id="closeNotif" class="text-xl text-gray-400 hover:text-red-500">&times;</button>
                </div>
                <div class="px-4 py-2 text-sm text-gray-600 border-b">
                    <span class="font-medium">Results (211)</span>
                </div>
                <ul class="max-h-96 overflow-y-auto divide-y">
                    <li class="flex items-start gap-3 px-4 py-3">
                        <div class="text-green-500"><i class="fas fa-check-circle"></i></div>
                        <div>
                            <p class="text-sm text-gray-700 font-medium">Successfully Added New OCC Value!
                            </p>
                            <p class="text-xs text-gray-500">Added by Rudi · 2 minutes ago</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 px-4 py-3">
                        <div class="text-yellow-500"><i class="fas fa-edit"></i></div>
                        <div>
                            <p class="text-sm text-gray-700 font-medium">Successfully Updated OCC Value!</p>
                            <p class="text-xs text-gray-500">Added by Rudi · 2 minutes ago</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <button id="profileBtn" class="w-10 md:w-12 h-10 md:h-12 overflow-hidden rounded-full border border-gray-300" aria-label="Profile">
            <img src="{{ Auth::check() && Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('assets/img/profile.png') }}" alt="Profile" class="w-full h-full object-cover object-center" />
        </button>
        <div class="hidden md:flex items-center space-x-4">
            @if (Auth::check())
                <span class="text-lg font-bold">{{ Auth::user()->name }}</span>
            @else
                <span class="text-lg font-bold">Guest</span>
            @endif
            @if (session('success'))
                <div id="sessionMessage" class="top-full right-6 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded shadow">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div id="sessionMessage" class="top-full right-6 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded shadow">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sessionMessage = document.getElementById('sessionMessage');
            if (sessionMessage) {
                setTimeout(function() {
                    sessionMessage.classList.add('hidden');
                }, 3000);
            }
        });
    </script>
</header>
