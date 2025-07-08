<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin - ReFind.</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo 1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.cdnfonts.com/css/nexa" rel="stylesheet" />
    <style>
        body {
            font-family: 'Nexa';
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Sidebar -->
    <div class="fixed left-0 top-0 z-40 w-64 h-screen bg-white shadow-lg border-r border-gray-200">
        <!-- Logo -->
        <div
            class="flex items-center justify-center h-16 border-b border-gray-200 bg-gradient-to-r from-blue-800 to-blue-600">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-800" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <span class="text-xl font-bold text-white">ReFind.</span>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('admDashboard') }}"
                    class="flex items-center px-4 py-3 text-gray-700 bg-blue-50 border-r-4 border-blue-600 rounded-l-lg hover:bg-blue-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!-- Laporan Kehilangan -->
                <a href="{{ route('admKehilangan') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                    <span>Laporan Kehilangan</span>
                    <span class="ml-auto bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">12</span>
                </a>

                <!-- Penemuan Barang -->
                <a href="{{ route('admPenemuan') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>Penemuan Barang</span>
                    <span class="ml-auto bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">8</span>
                </a>

                <!-- User Profile -->
                <div class="absolute bottom-4 left-4 right-4">
                    <div class="flex items-center px-4 py-3 bg-gray-100 rounded-lg">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full flex items-center justify-center">
                            <span class="text-white font-medium">A</span>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-medium text-gray-800">Administrator</p>
                            <p class="text-xs text-gray-500">admin@unej.ac.id</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="ml-64 min-h-screen">
                <!-- Header -->
                <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
                    <div class="flex items-center justify-between px-6 py-4">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
                            <p class="text-sm text-gray-600">Selamat datang di panel administrasi ReFind</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <div class="relative">
                                <button
                                    class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>
                                <span
                                    class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                            </div>

                            <!-- Current Date -->
                            <div class="text-sm text-gray-600">
                                {{ date('d F Y') }}
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Dashboard Content -->
                <main class="p-6">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <!-- Total Laporan -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Total Laporan</p>
                                    <p class="text-2xl font-bold text-gray-800">156</p>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Kehilangan -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Kehilangan</p>
                                    <p class="text-2xl font-bold text-red-600">89</p>
                                </div>
                                <div class="bg-red-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Penemuan -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Penemuan</p>
                                    <p class="text-2xl font-bold text-green-600">67</p>
                                </div>
                                <div class="bg-green-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Berhasil Dikembalikan -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Dikembalikan</p>
                                    <p class="text-2xl font-bold text-blue-600">42</p>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Features Section -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
                        <div class="text-center mb-12">
                            <h2 class="text-3xl font-bold text-gray-800 mb-3">Fitur Administrasi</h2>
                            <div class="w-16 h-1 bg-blue-800 mx-auto mb-6"></div>
                            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                                Kelola sistem pelaporan penemuan dan kehilangan barang di lingkungan Universitas Jember
                                dengan
                                mudah dan efisien.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Kelola Laporan Kehilangan -->
                            <div
                                class="bg-gradient-to-br from-red-50 to-red-100 rounded-xl p-8 border border-red-200 hover:shadow-lg transition-shadow">
                                <div
                                    class="bg-white w-14 h-14 rounded-full flex items-center justify-center mb-6 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">Kelola Laporan Kehilangan</h3>
                                <p class="text-gray-600 mb-6 text-justify">
                                    Verifikasi, edit, dan kelola semua laporan kehilangan barang yang dilaporkan oleh
                                    pengguna.
                                    Pantau status dan berikan respon yang tepat.
                                </p>
                                <a href="{{ route('admKehilangan') }}"
                                    class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                                    <span>Kelola Laporan</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>

                            <!-- Kelola Penemuan Barang -->
                            <div
                                class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-8 border border-green-200 hover:shadow-lg transition-shadow">
                                <div
                                    class="bg-white w-14 h-14 rounded-full flex items-center justify-center mb-6 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">Kelola Penemuan Barang</h3>
                                <p class="text-gray-600 mb-6 text-justify">
                                    Verifikasi dan kelola semua laporan penemuan barang. Cocokkan dengan laporan
                                    kehilangan dan
                                    fasilitasi proses pengembalian.
                                </p>
                                <a href="{{ route('admPenemuan') }}"
                                    class="inline-flex items-center px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors">
                                    <span>Kelola Penemuan</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </nav>
    </div>
</body>

</html>
