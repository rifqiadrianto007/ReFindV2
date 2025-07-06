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
        class="fixed top-0 left-0 right-0 w-full bg-white bg-opacity-50 backdrop-blur-sm z-50 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="flex items-center justify-center h-12 w-12">
                        <img src="{{ asset('img/Logo 1.png') }}" alt="Logo" class="h-10 w-auto" />
                    </div>
                    <span class="font-bold text-2xl">ReFind.</span>
                </div>

                <div class="hidden md:flex space-x-10 items-center font-medium">
                    <a href="#dashboard" class="relative group" @click.prevent="scrollTo('dashboard')"
                        :class="{ 'text-indigo-700': activeSection === 'dashboard' }">
                        <span class="hover:text-indigo-700 transition">Dashboard</span>
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-indigo-600 transition-all duration-300"
                            :class="activeSection === 'dashboard' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                    </a>

                    <a href="#fitur" class="relative group" @click.prevent="scrollTo('fitur')"
                        :class="{ 'text-indigo-700': activeSection === 'fitur' }">
                        <span class="hover:text-indigo-700 transition">Fitur</span>
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-indigo-600 transition-all duration-300"
                            :class="activeSection === 'fitur' ? 'w-full' : 'w-0 group-hover:w-full'"></span>
                    </a>
                </div>

                {{-- <div class="hidden md:flex items-center">
                    @if ($isAdmin)
                    @elseif(Auth::check())
                        <form action="{{ route('logout') }}" method="POST" class="ml-4">
                            @csrf
                            <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 mt-4 rounded-full font-medium hover:bg-red-700 transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-full font-medium hover:bg-indigo-700 transition">
                            Login
                        </a>
                    @endif
                </div> --}}
            </div>
        </div>
    </nav>
    <section id="dashboard" class="pt-16 bg-blue-900 text-white">
        <div class="w-full h-[300px] relative overflow-hidden">
            <img src="{{ asset('img/header.png') }}" alt="header"
                class="w-full h-[300px] object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40"></div>
            <div class="absolute bottom-0 left-0 w-full p-6 md:p-12 text-white">
                <div class="max-w-7xl mx-auto">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2">ReFind.</h2>
                    <p class="text-lg md:text-xl opacity-90 max-w-2xl">Temukan dan laporkan barang hilang dengan mudah.</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-2 gap-8 md:gap-12">
                <div>
                    <div class="mb-6">
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Selamat Datang di <span
                                class="text-white">ReFind.</span></h3>
                        <div class="w-16 h-1 bg-white mb-6"></div>
                    </div>

                    <div class="prose prose-lg max-w-none text-white">
                        <p>
                            SiCekam merupakan solusi lengkap yang dibangun khusus untuk memudahkan para peternak ayam
                            dalam melakukan monitoring dan pengecekan kondisi ayam secara berkala.
                        </p>
                        <p class="mt-4">
                            Dengan memanfaatkan teknologi computer vision terkini, SiCekam mampu menghitung jumlah ayam
                            secara instan dan mendeteksi kondisi kesehatan ayam hanya melalui foto.
                        </p>
                        <p class="mt-4">
                            Platform yang dirancang dengan memahami kebutuhan peternak modern, membuat pengelolaan
                            peternakan ayam menjadi lebih efisien dan efektif.
                        </p>
                    </div>
                </div>

                <div
                    class="bg-blue-900 border-l-4 border-black rounded-xl p-8 shadow-lg transform transition hover:-translate-y-1">
                    <h3 class="text-2xl font-bold text-white mb-6">Manfaat Utama</h3>

                    <div class="space-y-4">
                        <div class="border-b border-dashed border-gray-200 pb-3 mb-3 flex">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-white flex items-center justify-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-black">Penghitungan Akurat</h4>
                                <p class="text-white mt-1">Hitung jumlah ayam secara instan dan akurat tanpa perlu
                                    menghitung manual</p>
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-white flex items-center justify-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-black">Deteksi Kesehatan</h4>
                                <p class="text-white mt-1">Identifikasi masalah kesehatan ayam sejak dini melalui
                                    analisis visual</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Fitur --}}
    <section id="fitur" class="py-20 bg-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Fitur Unggulan</h2>
                <div class="w-16 h-1 bg-indigo-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Kami menghadirkan solusi terbaik untuk kebutuhan pengelolaan peternakan ayam modern
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
                <div class="bg-white rounded-xl overflow-hidden shadow-lg transform transition hover:-translate-y-1">
                    <div class="p-8">
                        <div class="bg-gray-100 relative z-10 w-14 h-14 rounded-full flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Scan Jumlah Ayam</h3>
                        <p class="text-gray-600 mb-6">
                            Dengan teknologi computer vision yang canggih, cukup ambil foto kandang dan sistem akan
                            menghitung jumlah ayam secara otomatis dengan akurasi tinggi.
                        </p>
                        <a
                            {{-- @auth
                                href="{{ route('scan') }}"
                            @endauth

                            @guest
                                href="{{ route('login') }}"
                                onclick="alert('Silakan login terlebih dahulu untuk menggunakan fitur ini.')"
                            @endguest --}}

                            class="text-indigo-600 font-medium inline-flex items-center hover:text-indigo-800 transition group">
                            <span>Coba Fitur Ini</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 transform transition group-hover:translate-x-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl overflow-hidden shadow-lg transform transition hover:-translate-y-1">
                    <div class="p-8">
                        <div class="bg-gray-100 relative z-10 w-14 h-14 rounded-full flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Deteksi Kondisi Ayam</h3>
                        <p class="text-gray-600 mb-6">
                            Sistem cerdas yang dapat mendeteksi dan menganalisis kondisi kesehatan ayam berdasarkan ciri
                            fisik yang terlihat pada foto, membantu mencegah penyebaran penyakit.
                        </p>
                        <a
                            {{-- @auth
                                href="{{ route('penyakit') }}"
                            @endauth

                            @guest
                                href="{{ route('login') }}"
                                onclick="alert('Silakan login terlebih dahulu untuk menggunakan fitur ini.')"
                            @endguest --}}

                            class="text-indigo-600 font-medium inline-flex items-center hover:text-indigo-800 transition group">
                            <span>Coba Fitur Ini</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 transform transition group-hover:translate-x-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
