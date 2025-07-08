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

<body class="min-h-screen font-[Nexa] relative scrollbar-hide">
    <nav x-data="{
        isOpen: false,
        activeSection: 'dashboard',
        sections: ['dashboard', 'fitur'],
        init() {
            if (window.location.hash) {
                this.activeSection = window.location.hash.substring(1);
            } else {
                this.activeSection = 'dashboard';
                window.history.replaceState(null, null, '#dashboard');
            }

            this.setupScrollHandler();
        },
        setupScrollHandler() {
            let ticking = false;

            const checkSections = () => {
                const scrollPosition = window.scrollY + (window.innerHeight / 3);

                this.sections.forEach(section => {
                    const el = document.getElementById(section);
                    if (el) {
                        const { offsetTop, offsetHeight } = el;
                        if (scrollPosition >= offsetTop && scrollPosition < offsetTop + offsetHeight) {
                            if (this.activeSection !== section) {
                                this.activeSection = section;
                                window.history.replaceState(null, null, `#${section}`);
                            }
                        }
                    }
                });

                ticking = false;
            };

            window.addEventListener('scroll', () => {
                if (!ticking) {
                    window.requestAnimationFrame(checkSections);
                    ticking = true;
                }
            }, { passive: true });
        },
        scrollTo(section) {
            this.activeSection = section;
            const el = document.getElementById(section);
            if (el) {
                window.scrollTo({
                    top: el.offsetTop,
                    behavior: 'smooth'
                });
                window.history.replaceState(null, null, `#${section}`);
            }
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
                    <a href="/dashboard" class="text-2xl font-bold">ReFind.</a>
                </div>

                <!-- Navigation - Center -->
                <div class="items-center justify-center flex-1 hidden md:flex">
                    <div class="flex items-center space-x-12 font-medium">
                        <a href="#dashboard" class="relative py-2 transition-all duration-200 group"
                            @click.prevent="scrollTo('dashboard')"
                            :class="{
                                'text-blue-600': activeSection === 'dashboard',
                                'text-gray-700 hover:text-blue-600': activeSection !== 'dashboard'
                            }">
                            <span>Dashboard</span>
                            <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300"
                                :class="activeSection === 'dashboard' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                        </a>

                        <a href="#fitur" class="relative py-2 transition-all duration-200 group"
                            @click.prevent="scrollTo('fitur')"
                            :class="{
                                'text-blue-600': activeSection === 'fitur',
                                'text-gray-700 hover:text-blue-600': activeSection !== 'fitur'
                            }">
                            <span>Fitur</span>
                            <span class="absolute -bottom-1 left-0 h-0.5 bg-blue-600 transition-all duration-300"
                                :class="activeSection === 'fitur' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                        </a>
                    </div>
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

            <!-- Mobile Navigation -->
            <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="bg-white border-t border-gray-200 md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#dashboard"
                        class="relative block px-3 py-2 text-base font-medium transition-colors duration-200"
                        @click.prevent="scrollTo('dashboard'); isOpen = false"
                        :class="{
                            'text-blue-600': activeSection === 'dashboard',
                            'text-gray-700 hover:text-blue-600': activeSection !== 'dashboard'
                        }">
                        Dashboard
                        <span class="absolute bottom-0 left-3 h-0.5 bg-blue-600 transition-all duration-300"
                            :class="activeSection === 'dashboard' ? 'w-16' : 'w-0'"></span>
                    </a>
                    <a href="#fitur"
                        class="relative block px-3 py-2 text-base font-medium transition-colors duration-200"
                        @click.prevent="scrollTo('fitur'); isOpen = false"
                        :class="{
                            'text-blue-600': activeSection === 'fitur',
                            'text-gray-700 hover:text-blue-600': activeSection !== 'fitur'
                        }">
                        Fitur
                        <span class="absolute bottom-0 left-3 h-0.5 bg-blue-600 transition-all duration-300"
                            :class="activeSection === 'fitur' ? 'w-12' : 'w-0'"></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section id="dashboard" class="pt-16 text-black bg-white">
        <div class="w-full h-[300px] relative overflow-hidden">
            <img src="{{ asset('img/header.png') }}" alt="header" class="w-full h-[300px] object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40"></div>
            <div class="absolute bottom-0 left-0 w-full p-6 text-white md:p-12">
                <div class="mx-auto max-w-7xl">
                    <h2 class="mb-2 text-3xl font-bold md:text-4xl lg:text-5xl">ReFind.</h2>
                    <p class="max-w-2xl text-lg md:text-xl opacity-90">Temukan dan laporkan barang hilang dengan
                        mudah.
                    </p>
                </div>
            </div>
        </div>

        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2 md:gap-12">
                <div>
                    <div class="mb-6">
                        <h3 class="mb-2 text-2xl font-bold text-black md:text-3xl">Selamat Datang di <span
                                class="text-blue-800">ReFind.</span></h3>
                        <div class="w-16 h-1 mb-6 bg-blue-800"></div>
                    </div>

                    <div class="prose prose-lg text-justify text-black max-w-none">
                        <p>
                            ReFind merupakan platform inovatif yang dirancang untuk membantu warga Universitas
                            Jember dalam melaporkan penemuan atau kehilangan barang.
                        </p>
                        <p class="mt-4">
                            Dengan memanfaatkan plaform yang terintegrasi, maka diharapkan dapat mempermudah proses
                            pelaporan barang di lingkungan Universitas Jember. ReFind dapat menjadi solusi yang
                            efektif untuk mengurangi kehilangan barang dan meningkatkan keamanan di kampus.
                        </p>
                        <p class="mt-4">
                            Platform yang dirancang dengan memahami kebutuhan seluruh warga dan civitas akademika
                            Universitas Jember.
                        </p>
                    </div>
                </div>

                <div
                    class="p-8 transition transform bg-gray-100 border-l-4 border-blue-800 shadow-lg rounded-xl hover:-translate-y-1">
                    <h3 class="mb-6 text-2xl font-bold text-black">Manfaat Utama</h3>

                    <div class="space-y-4">
                        <div class="flex pb-3 mb-3 border-b border-blue-800 border-dashed">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-4 bg-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-800" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-black">Laporan Kehilangan</h4>
                                <p class="mt-1 text-black">Laporkan barang Anda yang hilang, sehingga dapat
                                    ditemukan dengan cepat dan mudah.</p>
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-4 bg-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-black">Penemuan Barang</h4>
                                <p class="mt-1 text-black">Laporkan barang temuan Anda agar dapat dikembalikan
                                    melalui
                                    platform ini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Fitur --}}
    <section id="fitur" class="py-20 text-black bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <h2 class="mb-3 text-3xl font-bold text-black md:text-4xl">Fitur Unggulan</h2>
                <div class="w-16 h-1 mx-auto mb-6 bg-blue-800"></div>
                <p class="max-w-3xl mx-auto text-lg text-black">
                    Kami menghadirkan solusi terbaik untuk pelaporan penemuan dan kehilangan barang di lingkungan
                    Universitas Jember.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-20 md:grid-cols-2">
                <div
                    class="overflow-hidden transition transform bg-gray-100 shadow-lg rounded-xl hover:-translate-y-1">
                    <div class="p-8">
                        <div
                            class="relative z-10 flex items-center justify-center mb-6 bg-white rounded-full w-14 h-14">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-800" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-black">Laporan Kehilangan</h3>
                        <p class="mb-6 text-justify text-black">
                            Dengan bantuan platform ini, cukup isi form laporan kehilangan dengan detail dan barang
                            Anda akan langsung ditampilkan di daftar barang hilang.
                        </p>
                        <a href="{{ route('kehilangan') }}"
                            class="inline-flex items-center font-medium text-blue-600 transition hover:text-black group">
                            <span>Buat Laporan →</span>
                        </a>
                    </div>
                </div>

                <div
                    class="overflow-hidden transition transform bg-gray-100 shadow-lg rounded-xl hover:-translate-y-1">
                    <div class="p-8">
                        <div
                            class="relative z-10 flex items-center justify-center mb-6 bg-white rounded-full w-14 h-14">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-black">Penemuan Barang</h3>
                        <p class="mb-6 text-justify text-black">
                            Dengan bantuan platform ini, cukup isi form laporan penemuan dengan detail dan barang
                            temuan
                            Anda akan langsung ditampilkan di daftar barang temuan.
                        </p>
                        <a href="{{ route('penemuan') }}"
                            class="inline-flex items-center font-medium text-blue-600 transition hover:text-black group">
                            <span>Buat Laporan →</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
