<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Territory - Witel Medan</title>
    @vite('resources/css/app.css') {{-- pastikan tailwind sudah di-compile --}}

    <style>
    .modal {
    @apply fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50;
    }
    .modal.active, .modal.flex {
    @apply flex;
    }
    .modal-content {
    @apply bg-white rounded-lg p-6 max-w-5xl w-full max-h-[80vh] overflow-auto relative;
    }
    .modal-close {
    @apply absolute top-4 right-4 text-2xl font-bold cursor-pointer;
    }
    </style>

</head>

<body class="bg-gray-100 text-gray-900 font-sans min-h-screen flex flex-col">

    {{-- Placeholder Navbar (bisa diganti nanti dengan @include('partials.navbar') --}}
    <header class="fixed top-0 left-0 right-0 h-20 bg-white shadow flex items-center px-5 z-50">
        {{-- Navbar content placeholder --}}
        <div class="text-red-600 font-bold text-lg">Witel Medan (Navbar Placeholder)</div>
    </header>

    <div class="flex flex-1 pt-20 min-h-[calc(100vh-5rem)]">
        {{-- Placeholder Sidebar (bisa diganti nanti dengan @include('partials.sidebar') --}}
        <aside class="hidden md:flex flex-col w-56 bg-white border-r border-gray-300 p-5 sticky top-20 h-[calc(100vh-5rem)] overflow-y-auto">
            {{-- Sidebar content placeholder --}}
            <div class="text-red-600 font-semibold mb-6">Sidebar Placeholder</div>
            {{-- contoh menu sidebar --}}
            <nav class="flex flex-col gap-4 text-gray-700">
                <a href="#" class="hover:text-red-600 font-semibold">Dashboard</a>
                <a href="#" class="hover:text-red-600 font-semibold">Territory</a>
                <a href="#" class="hover:text-red-600 font-semibold">OCC</a>
                <a href="#" class="hover:text-red-600 font-semibold">Opportunity</a>
              
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6 overflow-y-auto">
            <h1 class="text-3xl font-bold mb-8">Territory Overview</h1>

            <div class="flex flex-col md:flex-row gap-6">
                {{-- Territory List --}}
                <div class="bg-white rounded-lg shadow p-6 md:w-2/5 max-h-[600px] overflow-y-auto md:ml-6">
                     @foreach ($territories as $key => $territory)
                    <div class="mb-5 space-y-1 rounded-md bg-gray-100 p-4 shadow-sm">
                        <h2 class="font-bold text-lg">{{ $territory['name'] }}</h2>
                        <p class="italic text-gray-600 text-sm">{{ $territory['subtitle'] }}</p>
                        <a href="#" class="text-red-600 font-semibold hover:underline text-sm open-modal" data-target="{{ $key }}-modal">Lihat lebih lengkap &gt;</a>
                    </div>
                    @endforeach
                </div>

                {{-- Panggil partial modal --}}
                @foreach ($territories as $key => $territory)
                    @include('partials.modal-territory', ['territory' => $territory, 'modalId' => $key.'-modal'])
                @endforeach


                {{-- Territory Map --}}
                <div class="bg-white rounded-lg shadow p-6 md:w-3/5 max-w-xl mx-auto">
                    <h2 class="font-bold text-lg mb-4 text-center">Wilayah Telekomunikasi Sumatera Utara</h2>
                    <img src="{{ asset('assets/img/sumut-map.png') }}" alt="Peta Telekomunikasi Sumatera Utara" class="w-full max-w-md mx-auto rounded-md" />
                </div>
            </div>
        </main>
    </div>

<script>
  document.querySelectorAll('.open-modal').forEach(el => {
    el.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.dataset.target;
      const modal = document.getElementById(targetId);
      if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
    });
  });

  document.querySelectorAll('.modal-close').forEach(btn => {
    btn.addEventListener('click', function() {
      const modal = this.closest('.modal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    });
  });

  document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', function(e) {
      if (e.target === this) {
        this.classList.add('hidden');
        this.classList.remove('flex');
      }
    });
  });
</script>


</body>
</html>
