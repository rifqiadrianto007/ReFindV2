<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ReFind.</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo 1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.cdnfonts.com/css/nexa" rel="stylesheet" />
    <style>
        body {
            font-family: 'Nexa', sans-serif;
        }

        .bg-pattern {
            background-image: url("{{ asset('img/bg-login.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body class="bg-pattern min-h-screen font-[Nexa] relative overflow-hidden scrollbar-hide">

    <!-- Logo di pojok kanan atas -->
    <div class="absolute z-20 flex items-center gap-2 top-4 right-4">
        <img src="{{ asset('img/logo semua.png') }}" alt="logo kemendikbud" class="h-auto w-60" />
    </div>

    <!-- Konten Utama -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <div class="grid items-center w-full max-w-6xl gap-8 lg:grid-cols-2">

            <div class="order-1 text-center lg:order-2 lg:text-left">
                <h2 class="mb-6 text-3xl font-bold leading-tight text-white md:text-4xl lg:text-5xl drop-shadow-lg">
                    "Temukan dan laporkan barang hilang dengan mudah"
                </h2>
            </div>

            <!-- Section Login Form -->
            <div class="order-2 lg:order-1">
                <div
                    class="w-full max-w-md p-8 mx-auto border shadow-lg bg-white/10 backdrop-blur-md border-white/20 rounded-3xl">
                    <div class="mb-8 text-center">
                        <h1 class="text-white text-4xl font-bold font-[Nexa]">ReFind.</h1>
                    </div>

                    <form class="flex flex-col gap-6">
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-white">Username</label>
                            <input type="text" id="username" name="username" placeholder="Masukkan username"
                                class="w-full px-4 py-3 text-white transition duration-300 border outline-none rounded-xl bg-white/10 border-white/20 placeholder-white/70 backdrop-blur-md focus:bg-white/20 focus:border-white/40 focus:ring-2 focus:ring-white/20"
                                required />
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="Masukkan password"
                                    class="w-full px-4 py-3 pr-12 text-white transition duration-300 border outline-none rounded-xl bg-white/10 border-white/20 placeholder-white/70 backdrop-blur-md focus:bg-white/20 focus:border-white/40 focus:ring-2 focus:ring-white/20"
                                    required />
                                <button type="button" id="togglePassword"
                                    class="absolute text-white -translate-y-1/2 top-1/2 right-3 focus:outline-none">
                                    <!-- Icon terlihat -->
                                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="block w-6 h-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>

                                    <!-- Icon tersembunyi -->
                                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="hidden w-6 h-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.974 9.974 0 012.23-3.568M6.61 6.61a10.03 10.03 0 014.4-1.61m2.715.297a9.978 9.978 0 014.932 3.045M21 21L3 3" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="pt-4">
                            <a href="{{ route('dashboard') }}">
                                <button type="button"
                                    class="w-full px-6 py-3 rounded-xl bg-gradient-to-br from-black to-gray-800 text-white font-semibold transition duration-300 hover:translate-y-[-2px] hover:shadow-lg">
                                    Login
                                </button>
                            </a>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        togglePassword.addEventListener('click', () => {
            const isHidden = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isHidden ? 'text' : 'password');

            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeClosed.classList.toggle('hidden', isHidden);
        });
    </script>


</body>

</html>
