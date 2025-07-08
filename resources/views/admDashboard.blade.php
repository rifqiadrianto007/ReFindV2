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
</body>

</html>
