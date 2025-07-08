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

        ,

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        ,

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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo - Left Side -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center justify-center h-12 w-12">
                        <img src="{{ asset('img/Logo 1.png') }}" alt="Logo" class="h-10 w-auto" />
                    </div>
                    <a href="{{ route('admDashboard') }}" class="font-bold text-2xl">ReFind.</a>
                </div>

                <!-- Navigation - Center -->
                <div class="hidden md:flex items-center justify-center flex-1">
                    <div class="flex space-x-12 items-center font-medium">
                        <a href="{{ route('admDashboard') }}" class="relative group py-2 transition-all duration-200"
                            :class="{
                                'text-blue-600': activeSection === 'admDashboard',
                                'text-gray-700 hover:text-blue-600': activeSection !== 'admDashboard'
                            }">
                            <span>Dashboard</span>
                            <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300"
                                :class="activeSection === 'admDashboard' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                        </a>

                        <a href="{{ route('admKehilangan') }}" class="relative group py-2 transition-all duration-200"
                            :class="{
                                'text-blue-600': activeSection === 'Kehilangan',
                                'text-gray-700 hover:text-blue-600': activeSection !== 'Kehilangan'
                            }">
                            <span>Kehilangan</span>
                            <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300"
                                :class="activeSection === 'Kehilangan' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                        </a>

                        <a href="{{ route('admPenemuan') }}" class="relative group py-2 transition-all duration-200"
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
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-500 transition-colors duration-200 rounded-md hover:bg-gray-100">
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
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                class="md:hidden border-t border-gray-200 bg-white">
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
                    <div class="border-t border-gray-200 pt-2 mt-2">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-red-500 transition-colors duration-200">
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
    <div class="max-w-7xl mx-auto">
        <!-- Header with Back Button -->
        <div class="mb-6">
            <button onclick="window.history.back()"
                class="text-slate-700 hover:text-blue-600 flex items-center space-x-2 transition-colors duration-300 font-medium">
                <span>← Kembali</span>
            </button>
        </div>

        <!-- Title Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center mb-4">
                <div class="header-line h-1 w-32 rounded-full"></div>
                <h1 class="text-3xl md:text-4xl font-bold text-black mx-6">Data Penemuan</h1>
                <div class="header-line h-1 w-32 rounded-full"></div>
            </div>
            <p class="text-slate-600 text-lg">Daftar barang temuan yang dilaporkan</p>
        </div>

        <!-- Table Container -->
        <div class="table-container bg-slate-200 rounded-2xl overflow-hidden overflow-x-auto">
            <table class="w-full table-auto">
                <!-- Table Header -->
                <thead class="bg-gradient-to-r from-slate-700 to-slate-800 text-white">
                    <tr>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            No.
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Nama
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Nomor Telepon
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Barang Temuan
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Deskripsi
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Lokasi
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Bukti Foto
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
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
                            <span class="font-semibold text-gray-900">{ini foto barang}</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <button
                                class="whatsapp-btn text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                                </svg>
                                <span>WhatsApp</span>
                            </button>
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
                            <span class="font-semibold text-gray-900">{ini foto barang}</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <button
                                class="whatsapp-btn text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                                </svg>
                                <span>WhatsApp</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
