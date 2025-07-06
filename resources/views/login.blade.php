<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ReFind.</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

<body class="bg-pattern min-h-screen font-[Nexa] relative overflow-hidden">

    <!-- Logo di pojok kanan atas -->
    <div class="absolute top-4 right-4 z-20 flex items-center gap-2">
        <img src="{{ asset('img/logo semua.png') }}" alt="logo kemendikbud" class="w-60 h-auto" />
    </div>


    <!-- Konten Utama -->
    <div class="relative z-10 min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-6xl grid lg:grid-cols-2 gap-8 items-center">

            <div class="order-1 lg:order-2 text-center lg:text-left">
                <h2 class="text-white text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6 drop-shadow-lg">
                    "Temukan dan laporkan barang hilang dengan mudah"
                </h2>
            </div>

            <!-- Section Login Form -->
            <div class="order-2 lg:order-1">
                <div
                    class="bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-8 w-full max-w-md mx-auto shadow-lg">
                    <div class="mb-8 text-center">
                        <h1 class="text-white text-4xl font-bold font-[Nexa]">ReFind.</h1>
                    </div>

                    <form class="flex flex-col gap-6">
                        <div>
                            <label for="username" class="block text-white text-sm font-medium mb-2">Username</label>
                            <input type="text" id="username" name="username" placeholder="Masukkan username"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/70 backdrop-blur-md outline-none focus:bg-white/20 focus:border-white/40 focus:ring-2 focus:ring-white/20 transition duration-300"
                                required />
                        </div>
                        <div>
                            <label for="password" class="block text-white text-sm font-medium mb-2">Password</label>
                            <input type="password" id="password" name="password" placeholder="Masukkan password"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/70 backdrop-blur-md outline-none focus:bg-white/20 focus:border-white/40 focus:ring-2 focus:ring-white/20 transition duration-300"
                                required />
                        </div>
                        <div class="pt-4">
                            <button type="submit" formaction="{{ url('/dashboard') }}"
                                class="w-full px-6 py-3 rounded-xl bg-gradient-to-br from-black to-gray-800 text-white font-semibold transition duration-300 hover:translate-y-[-2px] hover:shadow-lg">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
