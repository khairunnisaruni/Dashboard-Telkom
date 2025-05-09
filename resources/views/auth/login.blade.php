@extends('layouts.main')

@section('content')
<div class="flex flex-col lg:flex-row shadow-lg rounded-lg overflow-hidden w-full max-w-4xl mx-auto my-10 font-gotham">
    <!-- Form Login -->
    <div class="w-full lg:w-1/2 bg-white p-6 sm:p-8 flex flex-col justify-between min-h-[500px]">
        <div class="flex flex-col justify-between h-full">
            <div class="text-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Telkom Indonesia" class="h-12 mx-auto">
                <h2 class="text-2xl font-bold mt-4">Sign In</h2>
            </div>

            <form method="POST" action="{{ route('login.process') }}" class="mt-6 space-y-4 flex-grow">
                @csrf

                <div>
                    <label class="block mb-1 font-semibold">Email :</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="Masukkan Email Anda" required>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Password :</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2" placeholder="Masukkan Password" required>
                </div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-gray-400 text-white font-bold py-2 rounded hover:bg-red-600 hover:text-white">Login</button>
            </form>
        </div>
    </div>

    <!-- Kanan -->
    <div class="w-full lg:w-1/2 bg-gradient-to-br from-red-500 to-red-800 text-white flex flex-col items-center justify-center p-6 sm:p-8">
        <h2 class="text-2xl font-bold mb-2 text-center">Halo, Sobat Telkom!</h2>
        <p class="text-center mb-4">Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
        <a href="{{ route('register') }}" class="border border-white px-6 py-2 rounded-full font-semibold hover:bg-white hover:text-red-600">SIGN UP</a>
    </div>
</div>
@endsection
