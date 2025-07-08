<!DOCTYPE html>
<html lang="en">

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

        .whatsapp-btn {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }

        .header-line {
            background: linear-gradient(90deg, #193cb8 0%, #3b82f6 50%, #193cb8 100%);
        }

        .floating-btn {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
        }

        .floating-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.5);
        }

        .modal-overlay {
            backdrop-filter: blur(5px);
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-input {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: white;
        }

        .submit-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        .upload-area {
            border: 2px dashed #cbd5e1;
            background: rgba(248, 250, 252, 0.5);
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.05);
        }

        .upload-area.drag-over {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.1);
        }
    </style>
</head>

<body class="min-h-screen p-4 bg-white md:p-8" x-data="{ showModal: false, jenisLaporan: 'kehilangan' }">
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
                            Barang Hilang
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
                            Kontak
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
                            <button
                                class="flex items-center px-4 py-2 space-x-2 text-sm font-medium text-white transition-all duration-300 rounded-lg whatsapp-btn">
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
                            <span class="font-semibold text-gray-900">Sekitar jam 3 sore</span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <button
                                class="flex items-center px-4 py-2 space-x-2 text-sm font-medium text-white transition-all duration-300 rounded-lg whatsapp-btn">
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

    <!-- Floating Button -->
    <button @click="showModal = true"
        class="flex items-center px-6 py-4 space-x-2 text-sm font-semibold text-white transition-all duration-300 rounded-full floating-btn hover:scale-105">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <span>Buat Laporan</span>
    </button>

    <!-- Modal -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 modal-overlay" x-cloak>

        <div @click.away="showModal = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="modal-content rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto scrollbar-hide">

            <!-- Modal Header -->
            <div class="px-8 py-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-900">Buat Laporan</h2>
                    <button @click="showModal = false"
                        class="p-2 text-gray-500 transition-colors duration-300 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="mt-2 text-gray-600">Isi form di bawah untuk membuat laporan kehilangan atau penemuan barang
                </p>
            </div>

            <!-- Modal Body -->
            <div class="px-8 py-6">
                <form class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Nama Lengkap *</label>
                        <input type="text" required class="w-full px-4 py-3 outline-none form-input rounded-xl"
                            placeholder="Masukkan nama lengkap Anda">
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Nomor Telepon *</label>
                        <input type="tel" required class="w-full px-4 py-3 outline-none form-input rounded-xl"
                            placeholder="Contoh: 08123456789">
                    </div>

                    <!-- Jenis Laporan -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Jenis Laporan *</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="jenisLaporan" value="kehilangan" x-model="jenisLaporan"
                                    class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                                <span class="font-medium text-gray-700">Kehilangan</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="jenisLaporan" value="penemuan" x-model="jenisLaporan"
                                    class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                                <span class="font-medium text-gray-700">Penemuan</span>
                            </label>
                        </div>
                    </div>

                    <!-- Nama Barang -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Nama Barang *</label>
                        <input type="text" required class="w-full px-4 py-3 outline-none form-input rounded-xl"
                            placeholder="Contoh: Smartphone, Tas, Dompet, dll">
                    </div>

                    <!-- Deskripsi Barang -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Deskripsi Barang *</label>
                        <textarea required rows="4" class="w-full px-4 py-3 outline-none resize-none form-input rounded-xl"
                            placeholder="Jelaskan ciri-ciri barang secara detail (warna, ukuran, merek, dll)"></textarea>
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Lokasi *</label>
                        <input type="text" required class="w-full px-4 py-3 outline-none form-input rounded-xl"
                            placeholder="Contoh: Masjid UNEJ, Perpustakaan, Kantin, dll">
                    </div>

                    <!-- Waktu -->
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Waktu *</label>
                        <input type="text" required class="w-full px-4 py-3 outline-none form-input rounded-xl"
                            placeholder="Contoh: Sekitar jam 3 sore, Pagi hari tanggal 5 Januari">
                    </div>

                    <!-- Upload Gambar (Khusus untuk Penemuan) -->
                    <div x-show="jenisLaporan === 'penemuan'" x-transition>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Upload Gambar Barang *</label>
                        <div class="p-8 text-center border-2 border-dashed cursor-pointer upload-area rounded-xl"
                            ondrop="handleDrop(event)" ondragover="handleDragOver(event)"
                            ondragleave="handleDragLeave(event)">
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-gray-600">Drag & drop gambar di sini atau klik untuk memilih</p>
                            <p class="text-sm text-gray-500">Maksimal 5MB, format: JPG, PNG, JPEG</p>
                            <input type="file" accept="image/*" multiple class="hidden" id="imageUpload">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4 space-x-4">
                        <button type="button" @click="showModal = false"
                            class="px-6 py-3 font-semibold text-gray-700 transition-colors duration-300 bg-gray-200 rounded-xl hover:bg-gray-300">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-8 py-3 font-semibold text-white transition-all duration-300 submit-btn rounded-xl">
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Handle drag and drop for file upload
        function handleDragOver(e) {
            e.preventDefault();
            e.currentTarget.classList.add('drag-over');
        }

        function handleDragLeave(e) {
            e.currentTarget.classList.remove('drag-over');
        }

        function handleDrop(e) {
            e.preventDefault();
            e.currentTarget.classList.remove('drag-over');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                console.log('Files dropped:', files);
                // Handle file upload here
            }
        }

        // Handle click on upload area
        document.addEventListener('DOMContentLoaded', function() {
            const uploadArea = document.querySelector('.upload-area');
            const fileInput = document.getElementById('imageUpload');

            if (uploadArea && fileInput) {
                uploadArea.addEventListener('click', function() {
                    fileInput.click();
                });

                fileInput.addEventListener('change', function(e) {
                    const files = e.target.files;
                    if (files.length > 0) {
                        console.log('Files selected:', files);
                        // Handle file upload here
                    }
                });
            }
        });
    </script>
</body>

</html>
