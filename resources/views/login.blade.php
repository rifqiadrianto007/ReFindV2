<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ReFind.</title>
    <link rel="icon" type="image/png" href="{{ asset('img/Logo 1.png') }}" />
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="min-h-screen bg-cover bg-center bg-no-repeat font-sans overflow-hidden"
    style="background-image: url('{{ asset('img/bg-login.png') }}');">
    <div class="flex items-center justify-start h-screen pl-12 relative">
        <!-- Login Box -->
        <div class="bg-white/5 backdrop-blur-md shadow-lg rounded-xl w-[350px] p-6 z-10 relative left-24 top-36">
            <form id="login-form">
                <h1 class="text-white text-3xl font-bold mb-6">ReFind.</h1>

                <label for="username" class="block text-white text-sm mb-1">Username</label>
                <input type="text" id="username" name="username" required
                    class="w-full px-4 py-2 mb-4 rounded-full bg-[#4A5B6B] text-white font-semibold focus:outline-none" />

                <label for="password" class="block text-white text-sm mb-1">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 mb-6 rounded-full bg-[#4A5B6B] text-white font-semibold focus:outline-none" />

                <button type="submit"
                    class="w-full py-2 rounded-full bg-black text-white text-lg font-bold hover:bg-[#061532] transition-colors">Login</button>

                <p id="pesan-error" class="text-red-500 mt-4"></p>
            </form>
        </div>

        <!-- Tagline -->
        <div class="absolute top-[150px] right-[100px] max-w-[750px] text-white text-right">
            <h2 class="text-2xl font-bold">"Temukan dan laporkan<br />barang hilang dengan<br />mudah"</h2>
        </div>

        <!-- Logo -->
        <div class="absolute top-[70px] right-[50px]">
            <img src="{{ asset('img/logo semua.png') }}" alt="logo lengkap" class="w-[120px] md:w-[300px]" />
        </div>
    </div>

    <script>
        document.getElementById("login-form").addEventListener("submit", handleLogin);
    </script>
</body>

</html>
