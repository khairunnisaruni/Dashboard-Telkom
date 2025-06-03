<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Telkom</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @stack('styles') {{-- Untuk menambahkan CSS spesifik per halaman --}}
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        @include('user.sidebar-user')

        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-20 hidden md:hidden"></div>

        <main class="flex-1 flex flex-col">
            @include('user.header-user')

            {{-- Konten utama halaman akan disuntikkan di sini --}}
            @yield('content')
           

            {{-- Jika ada notifikasi, tampilkan di sini --}}
        </main>
    </div>
     @include('partials.footer')

    <!-- @include('partials.modals') -->

    <script>
        // JavaScript global yang mungkin dibutuhkan oleh partials
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
    </script>
    @stack('scripts') {{-- Untuk menambahkan JavaScript spesifik per halaman --}}
</body>

</html>