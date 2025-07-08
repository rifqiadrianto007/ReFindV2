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
    <nav x-data="{
        isOpen: false,
        activeSection: 'admDashboard',
        init() {
            // Determine active section based on current URL
            const path = window.location.pathname.toLowerCase();
            const fullUrl = window.location.href.toLowerCase();

            console.log('Current path:', path); // Debug log
            console.log('Full URL:', fullUrl); // Debug log

            if (path.includes('kehilangan') || path.includes('admkehilangan') || fullUrl.includes('kehilangan')) {
                this.activeSection = 'Kehilangan';
            } else if (path.includes('penemuan') || path.includes('admpenemuan') || fullUrl.includes('penemuan')) {
                this.activeSection = 'Penemuan';
            } else if (path.includes('dashboard') || path.includes('admdashboard') || fullUrl.includes('dashboard')) {
                this.activeSection = 'admDashboard';
            } else {
                // Default fallback - check if we're on root or any other page
                this.activeSection = 'admDashboard';
            }

            console.log('Active section set to:', this.activeSection); // Debug log
        }
    }"
        class="fixed top-0 left-0 right-0 w-full bg-white/50 backdrop-blur z-50 shadow-sm border-b font-[Nexa]">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo - Left Side -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-12 h-12">
                        <img src="{{ asset('img/Logo 1.png') }}" alt="Logo" class="w-auto h-10" />
                    </div>
                    <a href="{{ route('admDashboard') }}" class="text-2xl font-bold">ReFind.</a>
                </div>

                <!-- Navigation - Center -->
                <div class="items-center justify-center flex-1 hidden md:flex">
                    <div class="flex items-center space-x-12 font-medium">
                        <a href="{{ route('admDashboard') }}" class="relative py-2 transition-all duration-200 group"
                            :class="{
                                'text-blue-600': activeSection === 'admDashboard',
                                'text-gray-700 hover:text-blue-600': activeSection !== 'admDashboard'
                            }">
                            <span>Dashboard</span>
                            <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300"
                                :class="activeSection === 'admDashboard' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                        </a>

                        <a href="{{ route('admKehilangan') }}" class="relative py-2 transition-all duration-200 group"
                            :class="{
                                'text-blue-600': activeSection === 'Kehilangan',
                                'text-gray-700 hover:text-blue-600': activeSection !== 'Kehilangan'
                            }">
                            <span>Kehilangan</span>
                            <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300"
                                :class="activeSection === 'Kehilangan' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                        </a>

                        <a href="{{ route('admPenemuan') }}" class="relative py-2 transition-all duration-200 group"
                            :class="{
                                'text-blue-600': activeSection === 'Penemuan',
                                'text-gray-700 hover:text-blue-600': activeSection !== 'Penemuan'
                            }">
                            <span>Penemuan</span>
                            <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300"
                                :class="activeSection === 'Penemuan' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                        </a>
                    </div>
                </div>

                <!-- Right Side - Logout Button and Mobile Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Logout Button (Desktop) -->
                    <div class="hidden md:block">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors duration-200 rounded-md hover:text-red-500 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button @click="isOpen = !isOpen" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="bg-white border-t border-gray-200 md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('admDashboard') }}"
                        class="relative block px-3 py-2 text-base font-medium transition-colors duration-200"
                        @click="isOpen = false"
                        :class="{
                            'text-blue-600': activeSection === 'admDashboard',
                            'text-gray-700 hover:text-blue-600': activeSection !== 'admDashboard'
                        }">
                        Dashboard
                        <span class="absolute bottom-0 left-3 h-0.5 bg-blue-600 transition-all duration-300"
                            :class="activeSection === 'admDashboard' ? 'w-16' : 'w-0'"></span>
                    </a>
                    <a href="{{ route('admKehilangan') }}"
                        class="relative block px-3 py-2 text-base font-medium transition-colors duration-200"
                        @click="isOpen = false"
                        :class="{
                            'text-blue-600': activeSection === 'Kehilangan',
                            'text-gray-700 hover:text-blue-600': activeSection !== 'Kehilangan'
                        }">
                        Kehilangan
                        <span class="absolute bottom-0 left-3 h-0.5 bg-blue-600 transition-all duration-300"
                            :class="activeSection === 'Kehilangan' ? 'w-12' : 'w-0'"></span>
                    </a>
                    <a href="{{ route('admPenemuan') }}"
                        class="relative block px-3 py-2 text-base font-medium transition-colors duration-200"
                        @click="isOpen = false"
                        :class="{
                            'text-blue-600': activeSection === 'Penemuan',
                            'text-gray-700 hover:text-blue-600': activeSection !== 'Penemuan'
                        }">
                        Penemuan
                        <span class="absolute bottom-0 left-3 h-0.5 bg-blue-600 transition-all duration-300"
                            :class="activeSection === 'Penemuan' ? 'w-12' : 'w-0'"></span>
                    </a>

                    <!-- Logout Button (Mobile) -->
                    <div class="pt-2 mt-2 border-t border-gray-200">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-700 transition-colors duration-200 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="mx-auto max-w-7xl">
        <!-- Header with Back Button -->
        <div class="mb-6">
            <button onclick="window.history.back()"
                class="flex items-center space-x-2 font-medium transition-colors duration-300 text-slate-700 hover:text-blue-600">
                <span>← Kembali</span>
            </button>
        </div>

        <!-- Title Section -->
        <div class="mb-8 text-center">
            <div class="inline-flex items-center justify-center mb-4">
                <div class="w-32 h-1 rounded-full header-line"></div>
                <h1 class="mx-6 text-3xl font-bold text-black md:text-4xl">Data Kehilangan</h1>
                <div class="w-32 h-1 rounded-full header-line"></div>
            </div>
            <p class="text-lg text-slate-600">Daftar barang hilang yang dilaporkan pengguna</p>
        </div>

        <!-- Table Container -->
        <div class="overflow-hidden overflow-x-auto table-container bg-slate-200 rounded-2xl">
            <table class="w-full table-auto">
                <!-- Table Header -->
                <thead class="text-white bg-gradient-to-r from-slate-700 to-slate-800">
                    <tr>
                        <th class="px-4 py-4 text-sm font-semibold text-left md:text-base whitespace-nowrap">
                            No.
                        </th>
                        <th class="px-4 py-4 text-sm font-semibold text-left md:text-base whitespace-nowrap">
                            Nama
                        </th>
                        <th class="px-4 py-4 text-sm font-semibold text-left md:text-base whitespace-nowrap">
                            Nomor Telepon
                        </th>
                        <th class="px-4 py-4 text-sm font-semibold text-left md:text-base whitespace-nowrap">
                            Barang Temuan
                        </th>
                        <th class="px-4 py-4 text-sm font-semibold text-left md:text-base whitespace-nowrap">
                            Deskripsi
                        </th>
                        <th class="px-4 py-4 text-sm font-semibold text-left md:text-base whitespace-nowrap">
                            Lokasi
                        </th>
                        <th class="px-4 py-4 text-sm font-semibold text-left md:text-base whitespace-nowrap">
                            Waktu
                        </th>
                        <th class="px-4 py-4 text-sm font-semibold text-left md:text-base whitespace-nowrap">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr
                        class="table-row transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50">
                        <td class="px-4 py-4 whitespace-nowrap">
                            <p class="font-semibold text-gray-900">1</p>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <p class="font-semibold text-gray-900">Budiono Siregar</p>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="font-semibold text-gray-900">08118233212</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <p class="font-semibold text-gray-900">Kapal Laut</p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-gray-900">Besar dan Panjang</p>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="font-semibold text-gray-900">Masjid UNEJ</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="font-semibold text-gray-900">Sekitar jam 3 sore</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-3">
                                <button
                                    style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 8px; border-radius: 9999px; transition: all 0.3s; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px;"
                                    onmouseover="this.style.background='linear-gradient(135deg, #059669, #047857)'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(16, 185, 129, 0.3)'"
                                    onmouseout="this.style.background='linear-gradient(135deg, #10b981, #059669)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                    title="Terima">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </button>
                                <button
                                    style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white; padding: 8px; border-radius: 9999px; transition: all 0.3s; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px;"
                                    onmouseover="this.style.background='linear-gradient(135deg, #dc2626, #b91c1c)'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)'"
                                    onmouseout="this.style.background='linear-gradient(135deg, #ef4444, #dc2626)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                    title="Tolak">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr
                        class="table-row transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50">
                        <td class="px-4 py-4 whitespace-nowrap">
                            <p class="font-semibold text-gray-900">2</p>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <p class="font-semibold text-gray-900">Budiono Siregar</p>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="font-semibold text-gray-900">08118233212</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <p class="font-semibold text-gray-900">Kapal Laut</p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-gray-900">Besar dan Panjang</p>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="font-semibold text-gray-900">Masjid UNEJ</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="font-semibold text-gray-900">Sekitar jam 3 sore</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-3">
                                <button
                                    style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 8px; border-radius: 9999px; transition: all 0.3s; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px;"
                                    onmouseover="this.style.background='linear-gradient(135deg, #059669, #047857)'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(16, 185, 129, 0.3)'"
                                    onmouseout="this.style.background='linear-gradient(135deg, #10b981, #059669)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                    title="Terima">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </button>
                                <button
                                    style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white; padding: 8px; border-radius: 9999px; transition: all 0.3s; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px;"
                                    onmouseover="this.style.background='linear-gradient(135deg, #dc2626, #b91c1c)'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)'"
                                    onmouseout="this.style.background='linear-gradient(135deg, #ef4444, #dc2626)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                    title="Tolak">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
