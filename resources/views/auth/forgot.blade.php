<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lupa Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="flex flex-col items-center gap-4 w-full max-w-sm">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm text-center">
        <!-- Icon -->
        <div class="flex justify-center mb-4">
            <div class="border-2 border-gray-400 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-700" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-5V9a6 6 0 10-12 0v3H4v10h16V12h-2zm-2 0H8V9a4 4 0 018 0v3z" />
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-lg font-bold text-gray-800 mb-2">Lupa Password?</h2>
        <p class="text-sm text-red-600 mb-4">Silahkan masukkan email yang anda daftarkan untuk memulihkan akun anda.</p>

        <!-- Form -->
        <form method="POST" action="/forgot-password">
            <input type="email" name="email" placeholder="Email" required
                class="w-full mb-4 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" />
            <button type="submit"
                class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition duration-200">
                Kirim Email
            </button>
        </form>

        <!-- Separator -->
        <div class="flex items-center my-4">
            <hr class="flex-grow border-gray-300" />
            <span class="px-2 text-gray-400 text-sm">atau</span>
            <hr class="flex-grow border-gray-300" />
        </div>

        <!-- Links -->
        <div class="text-sm">
            <a href="/register" class="text-blue-600 hover:underline font-medium">Buat akun baru</a>
        </div>

        
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md w-full">
        <div class="text-sm text-center text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}"
                class="text-blue-600 hover:underline font-semibold">Masuk</a>
        </div>
    </div>
    </div>

    <!-- Back to login -->
    
</body>

</html>