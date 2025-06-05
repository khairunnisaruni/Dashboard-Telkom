<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashboard Witel Sumut</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- WRAPPER: konten vertikal sejajar -->
    <div class="flex flex-col items-center gap-4 w-full max-w-sm">

        <!-- FORM LOGIN -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            
            <!-- Logo -->
            <div class="mb-4 text-center">
                <img src="{{ asset('assets/img/header login.png') }}" alt="Logo">
            </div>

            <!-- Error Message -->
            @if ($errors->any())
                <div class="mb-4 text-red-500 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Show flash message -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="/login">
                @csrf

                <!-- Email -->
                <input type="email" name="email" placeholder="Email Telkom" required
                    class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" />

                <!-- Password -->
                <div class="relative mb-4">
                    <input type="password" id="password" name="password" placeholder="Kata Sandi" required
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" />
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition duration-200">
                    Masuk
                </button>
            </form>

            <!-- Lupa Password -->
            <div class="text-sm text-center mt-4 text-gray-600">
                Lupa Kata Sandi? <a href="forgot" class="text-blue-600 hover:underline font-semibold">Klik disini</a>
            </div>
        </div>

        <!-- DAFTAR -->
        <div class="bg-white p-4 rounded-lg shadow-md w-full">
            <div class="text-sm text-center text-gray-600">
                Belum punya akun? <a href="register" class="text-blue-600 hover:underline font-semibold">Daftar</a>
            </div>
        </div>
    </div>

</body>
</html>
