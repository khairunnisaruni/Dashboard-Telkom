<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Dashboard Witel Sumut</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- WRAPPER -->
    <div class="flex flex-col items-center gap-4 w-full max-w-sm">

        <!-- FORM REGISTER -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <!-- Logo -->
            <div class="mb-4 text-center">
                <img src="{{ asset('assets/img/header register.png') }}" alt="Logo">
            </div>

            <!-- Error Message -->
            @if ($errors->any())
                <div class="mb-4 text-red-500 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama -->
                <input type="text" name="name" placeholder="Nama Lengkap" required
                    class="w-full mb-3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" />

                <!-- Email -->
                <input type="email" name="email" placeholder="Email Telkom" required
                    class="w-full mb-3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" />
                    
                <!-- Password -->
                <div class="relative mb-3">
                    <input type="password" id="password" name="password" placeholder="Kata Sandi" required
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" />
                </div>

                <!-- Konfirmasi Password -->
                <div class="relative mb-4">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" />
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition duration-200">
                    Daftar
                </button>
            </form>
        </div>

        <!-- SUDAH PUNYA AKUN -->
        <div class="bg-white p-4 rounded-lg shadow-md w-full">
            <div class="text-sm text-center text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Masuk</a>
            </div>
        </div>
    </div>

</body>

</html>
