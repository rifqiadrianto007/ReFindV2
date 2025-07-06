<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ReFind.</title>
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
    </style>
</head>

<body class="bg-white min-h-screen p-4 md:p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center mb-4">
                <div class="header-line h-1 w-32 rounded-full"></div>
                <h1 class="text-3xl md:text-4xl font-bold text-black mx-6">Data Kehilangan</h1>
                <div class="header-line h-1 w-32 rounded-full"></div>
            </div>
            <p class="text-slate-600 text-lg">Daftar barang hilang yang dilaporkan pengguna</p>
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
                            Barang Hilang
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Deskripsi
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Lokasi
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
                            Waktu
                        </th>
                        <th class="px-4 py-4 text-left font-semibold text-sm md:text-base whitespace-nowrap">
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
                            <span class="font-semibold text-gray-900">Sekitar jam 3 sore</span>
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
