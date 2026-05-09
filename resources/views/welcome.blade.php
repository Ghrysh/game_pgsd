<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Kincir Pintar Untuk Desa</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Nunito', 'sans-serif'] },
                    animation: {
                        'bounce-short': 'bounce 0.5s ease-in-out 1',
                    }
                }
            }
        }
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <style>
        body { overscroll-behavior-y: none; }
        
        .title-stroke {
            -webkit-text-stroke: 2px #5e4125;
            color: #fff8db;
            text-shadow: 0 4px 4px rgba(0,0,0,0.4);
        }

        /* Pola Grid Blueprint Full Screen */
        .blueprint-grid {
            background-size: 30px 30px;
            background-image:
              linear-gradient(to right, rgba(255, 255, 255, 0.15) 1px, transparent 1px),
              linear-gradient(to bottom, rgba(255, 255, 255, 0.15) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-gray-900 font-sans text-gray-800 antialiased flex justify-center h-screen overflow-hidden">

    <div @selesaikan-level.window="selesaiMateri($event.detail)" class="w-full max-w-[420px] bg-gradient-to-b from-blue-600 to-blue-900 h-full relative shadow-2xl overflow-hidden flex flex-col" x-data="eModul()">

        <div class="absolute inset-0 blueprint-grid pointer-events-none opacity-60 z-0"></div>

        <div x-show="layar === 'cover'" class="absolute inset-0 bg-black z-50 flex flex-col justify-between p-12 text-center transition-all duration-500">
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-60">
                <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
            </video>

            <div class="relative z-10 pt-10">
                <h1 class="text-4xl font-black text-white leading-tight drop-shadow-2xl tracking-tighter">
                    KINCIR PINTAR <br> UNTUK DESA
                </h1>
            </div>

            <div class="relative z-10 pb-10">
                <button @click="layar = 'peta'" class="w-full bg-orange-600 text-white text-xl font-bold py-5 rounded-full shadow-[0_6px_0_#9a3412] hover:translate-y-1 hover:shadow-none transition-all uppercase tracking-widest border-2 border-white/30 flex items-center justify-center gap-2">
                    <span>Mulai Petualangan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>

        <button x-show="layar === 'konten'" style="display: none;" @click="layar = 'peta'" class="absolute top-6 left-6 z-50 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <main x-show="layar === 'peta'" style="display: none;" class="absolute inset-0 flex-1 overflow-y-auto z-30 bg-green-800">
            
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-80">
                <source src="{{ asset('videos/bg2.mp4') }}" type="video/mp4">
            </video>

            <div class="relative z-10 text-center pt-10 pb-2">
                <h2 class="text-4xl font-black title-stroke leading-tight tracking-wide">
                    PETA <br> PETUALANGAN
                </h2>
            </div>

            <div class="relative w-full h-[650px] z-10 mt-4 max-w-[360px] mx-auto pb-10">
                
                <svg class="absolute inset-0 w-full h-full z-0 pointer-events-none" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <path d="M 25,12 C 60,12 75,25 75,38 C 75,50 25,50 25,63 C 25,75 75,75 75,88" fill="none" stroke="#a07c50" stroke-width="5" stroke-linecap="round"/>
                    <path d="M 25,12 C 60,12 75,25 75,38 C 75,50 25,50 25,63 C 25,75 75,75 75,88" fill="none" stroke="#e4c795" stroke-width="3.5" stroke-linecap="round"/>
                </svg>

                <button @click="bukaMateri('caritahu', '1. Cari Tahu', 1)" class="absolute top-[6%] left-[13%] z-10 flex flex-col items-center group transition-transform hover:scale-105">
                    <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                        <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md">
                            1. Cari Tahu
                        </div>
                    </div>
                </button>

                <button :disabled="levelTerbuka < 2" @click="bukaMateri('budaya', '2. Kilas Budaya', 2)" class="absolute top-[32%] right-[13%] z-10 flex flex-col items-center transition-all" :class="levelTerbuka < 2 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                    <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                        <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md">
                            2. Kilas Budaya
                        </div>
                        <div x-show="levelTerbuka < 2" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                    </div>
                </button>

                <button :disabled="levelTerbuka < 3" @click="bukaMateri('sains', '3. Logika Sains', 3)" class="absolute top-[57%] left-[13%] z-10 flex flex-col items-center transition-all" :class="levelTerbuka < 3 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                    <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                        <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md">
                            3. Logika Sains
                        </div>
                        <div x-show="levelTerbuka < 3" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                    </div>
                </button>

                <button :disabled="levelTerbuka < 4" @click="bukaMateri('engineering', '4. Tantangan Insinyur', 4)" class="absolute top-[82%] right-[13%] z-10 flex flex-col items-center transition-all" :class="levelTerbuka < 4 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                    <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center relative overflow-hidden">
                        <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                        <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md">
                            4. Insinyur Cilik
                        </div>
                        <div x-show="levelTerbuka < 4" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                    </div>
                </button>
            </div>
        </main>

        <main x-show="layar === 'konten'" style="display: none;" class="flex-1 overflow-y-auto relative z-10 p-6 pt-20">
            
            <div x-show="materiAktif === 'caritahu'" class="w-full h-full flex flex-col justify-center items-center pb-10">
                <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-2xl border-4 border-white w-full relative flex flex-col min-h-[480px]">
                    
                    <h2 class="text-center font-black text-2xl text-orange-600 mb-4 border-b-2 border-orange-200 pb-2 flex items-center justify-center gap-2">
                        <span>Buku Pintar Energi</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </h2>

                    <div x-show="slideCariTahu === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="flex-1">
                        <h3 class="font-black text-xl text-blue-700 mb-3">1. Pengertian Energi</h3>
                        <p class="text-gray-700 text-[15px] leading-relaxed">
                            Energi adalah kemampuan untuk melakukan usaha atau kerja. Sederhananya, energi adalah <b>"tenaga"</b> yang membuat segala sesuatu di dunia ini bisa bergerak, hidup, tumbuh, atau menyala. 
                            <br><br>Tanpa energi, mobil tidak bisa berjalan, lampu tidak bisa menyala, dan kita tidak akan punya tenaga untuk bermain!
                        </p>
                    </div>

                    <div x-show="slideCariTahu === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="flex-1">
                        <h3 class="font-black text-xl text-blue-700 mb-3">2. Jenis-jenis Energi</h3>
                        <ul class="text-gray-700 text-sm space-y-3 leading-snug list-disc pl-4">
                            <li><b>Energi Cahaya:</b> Membuat keadaan terang. Contoh: matahari dan lampu.</li>
                            <li><b>Energi Panas (Kalor):</b> Dari benda bersuhu tinggi. Contoh: matahari dan api unggun.</li>
                            <li><b>Energi Gerak (Kinetik):</b> Dari benda bergerak. Contoh: kincir berputar dan air mengalir.</li>
                            <li><b>Energi Bunyi:</b> Dari benda bergetar. Contoh: suara gitar dan petir.</li>
                            <li><b>Energi Listrik:</b> Mengalir lewat kabel. Contoh: menyalakan TV.</li>
                            <li><b>Energi Kimia:</b> Tersimpan dalam zat. Contoh: makanan, baterai, dan bensin.</li>
                        </ul>
                    </div>

                    <div x-show="slideCariTahu === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="flex-1">
                        <h3 class="font-black text-xl text-blue-700 mb-3">3. Sumber Energi</h3>
                        <p class="text-gray-700 text-[15px] leading-relaxed mb-3">Sumber energi dibagi menjadi dua kelompok besar:</p>
                        <div class="space-y-4 text-sm">
                            <div class="bg-green-100 p-3 rounded-xl border border-green-300 flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                                <div>
                                    <b class="text-green-800">Energi Terbarukan (Tidak Habis):</b> <br>Bisa terus digunakan. Contoh: Matahari, angin, aliran air, dan panas bumi.
                                </div>
                            </div>
                            <div class="bg-red-100 p-3 rounded-xl border border-red-300 flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                <div>
                                    <b class="text-red-800">Energi Tak Terbarukan (Bisa Habis):</b> <br>Terbatas dan butuh jutaan tahun terbentuk. Contoh: Minyak bumi (bensin), batu bara, dan gas alam.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="slideCariTahu === 4" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="flex-1">
                        <h3 class="font-black text-xl text-blue-700 mb-3">4. Perubahan Energi</h3>
                        <p class="text-gray-700 text-[15px] leading-relaxed mb-3">Energi tidak bisa diciptakan/dimusnahkan, tapi <b>bisa diubah bentuknya</b>:</p>
                        <ul class="text-gray-700 text-sm space-y-4 leading-snug bg-blue-50 p-4 rounded-xl border border-blue-200">
                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"/></svg> 
                                <span class="font-bold">Listrik</span> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg> 
                                <span class="font-bold">Panas:</span> Menyetrika baju.
                            </li>
                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"/></svg> 
                                <span class="font-bold">Listrik</span> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg> 
                                <span class="font-bold">Gerak:</span> Kipas angin berputar.
                            </li>
                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"/></svg> 
                                <span class="font-bold">Listrik</span> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg> 
                                <span class="font-bold">Cahaya & Bunyi:</span> Menonton TV.
                            </li>
                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                <span class="font-bold">Kimia</span> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg> 
                                <span class="font-bold">Gerak:</span> Kita makan, lalu berlari.
                            </li>
                        </ul>
                    </div>

                    <div x-show="slideCariTahu === 5" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="flex-1">
                        <h3 class="font-black text-xl text-blue-700 mb-3 text-center">5. Permasalahan Budaya</h3>
                        <p class="text-gray-700 text-sm leading-snug mb-3">Ada beberapa masalah sosial dan budaya yang sering terjadi saat ini:</p>
                        <ul class="text-gray-700 text-[13px] space-y-2 list-disc pl-4 mb-3">
                            <li><b>Lunturnya Budaya Lokal:</b> Lebih suka budaya asing, kesenian tradisional dilupakan.</li>
                            <li><b>Kurang Toleransi:</b> Perbedaan suku/agama memicu pertengkaran.</li>
                            <li><b>Klaim Budaya:</b> Budaya kita diakui negara lain karena kita kurang melestarikannya.</li>
                        </ul>
                        <div class="bg-yellow-100 p-3 rounded-xl border border-yellow-300 text-[13px] font-bold text-yellow-900 flex gap-2 items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                            <span>Solusi: Kita harus bangga pakai produk Indonesia, belajar kesenian daerah, dan hargai teman yang berbeda!</span>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between items-center border-t-2 border-gray-100 pt-4">
                        <button @click="if(slideCariTahu > 1) slideCariTahu--" :class="slideCariTahu === 1 ? 'opacity-0 pointer-events-none' : ''" class="bg-gray-200 text-gray-700 font-bold px-4 py-2 rounded-full hover:bg-gray-300 transition text-sm flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                            Kembali
                        </button>
                        
                        <span class="font-black text-gray-400 text-sm"><span x-text="slideCariTahu" class="text-blue-600"></span> / 5</span>
                        
                        <button x-show="slideCariTahu < 5" @click="slideCariTahu++" class="bg-orange-500 text-white font-bold px-4 py-2 rounded-full hover:bg-orange-600 transition shadow-md text-sm flex items-center gap-1">
                            Lanjut
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </button>

                        <button x-show="slideCariTahu === 5" @click="selesaiMateri(1)" class="bg-green-500 text-white font-black px-5 py-2 rounded-full hover:bg-green-600 transition shadow-[0_4px_0_#166534] hover:translate-y-1 hover:shadow-none text-sm flex items-center gap-1">
                            Selesai Misi
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </button>
                    </div>

                </div>
            </div>

            <div x-show="materiAktif === 'budaya'" class="w-full h-full flex flex-col justify-center items-center text-center pb-10">
                <div x-show="tahapBudaya === 0" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto mb-4 text-white animate-bounce mt-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <h3 class="text-3xl font-black text-white title-stroke mb-2 leading-tight">MISI INVESTIGASI <br> DESA!</h3>
                    <p class="text-white text-lg font-bold mb-8 drop-shadow-md">Kira-kira masalah apa ya yang terjadi di sawah saat kemarau panjang?</p>
                    <button @click="tahapBudaya = 1; bacakan('Waduh! Saat musim kemarau, sawah menjadi kering dan desa sulit listrik.')" class="w-full bg-yellow-400 text-yellow-900 px-6 py-4 rounded-full font-black text-xl border-4 border-white shadow-[0_5px_0_#b45309] hover:translate-y-1 hover:shadow-none transition-all flex items-center justify-center gap-2">
                        <span>Cari Tahu!</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                </div>
                <div x-show="tahapBudaya === 1" style="display: none;" class="w-full mt-10" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="bg-white/95 backdrop-blur-md rounded-3xl p-6 border-4 border-red-400 shadow-xl relative">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-red-500 text-white font-bold px-4 py-1 rounded-full border-2 border-white shadow-sm flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                            MASALAH DITEMUKAN
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 mx-auto mb-2 mt-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <h3 class="text-xl font-black text-red-600 mb-2">Tanah Kering Kerontang!</h3>
                        <p class="text-gray-700 font-bold mb-6 text-base">Saat kemarau, sawah kekeringan dan kita sulit mendapat akses listrik. Bagaimana cara petani mengairi sawahnya?</p>
                        <button @click="tahapBudaya = 2; bacakan('Aha! Petani bergotong royong membangun kincir air bambu yang ramah lingkungan.')" class="w-full bg-green-500 text-white px-6 py-3 rounded-full font-black text-lg border-4 border-white shadow-[0_5px_0_#166534] hover:translate-y-1 hover:shadow-none transition-all flex items-center justify-center gap-2">
                            <span>Lihat Solusi Petani</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                        </button>
                    </div>
                </div>
                <div x-show="tahapBudaya === 2" style="display: none;" class="w-full mt-10" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="bg-white/95 backdrop-blur-md rounded-3xl p-6 border-4 border-green-400 shadow-xl relative">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-green-500 text-white font-bold px-4 py-1 rounded-full border-2 border-white shadow-sm flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                            KEARIFAN LOKAL
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 mx-auto mb-2 mt-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="text-xl font-black text-green-700 mb-2">Gotong Royong!</h3>
                        <p class="text-gray-700 font-bold mb-6 text-base">Petani bekerja sama merakit <b>Kincir Air Bambu</b>. Ini adalah teknologi ramah lingkungan yang diwariskan turun-temurun!</p>
                        
                        <button @click="selesaiMateri(2)" class="w-full bg-blue-500 text-white px-6 py-3 rounded-full font-black text-lg border-4 border-white shadow-[0_5px_0_#1e3a8a] hover:translate-y-1 hover:shadow-none transition-all flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Selesai Misi</span>
                        </button>
                    </div>
                </div>
            </div>

            <div x-show="materiAktif === 'sains'" class="absolute inset-0 z-0 bg-black flex flex-col justify-center items-center overflow-hidden">
                <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-90">
                    <source src="{{ asset('videos/kincir.mp4') }}" type="video/mp4">
                    Browsermu tidak mendukung video.
                </video>

                <div class="absolute top-[150px] left-6 z-20 animate-pulse">
                    <h3 class="text-2xl font-black title-stroke uppercase tracking-widest leading-none">
                        Energi Kinetik
                    </h3>
                    <p class="text-white text-[10px] font-black drop-shadow-md bg-blue-600/40 inline-block px-2 py-0.5 rounded-full mt-1">
                        (DORONGAN AIR MENGALIR)
                    </p>
                </div>

                <div class="relative top-[190px] z-20 text-center px-10">
                    <h2 class="text-4xl font-black title-stroke uppercase tracking-tighter drop-shadow-2xl mb-2">
                        Kekuatan Mekanik
                    </h2>
                    <p class="text-white text-sm font-black drop-shadow-md bg-black/30 backdrop-blur-sm p-3 rounded-2xl border border-white/20">
                        Energi kinetik air berubah menjadi gerak putaran pada kincir!
                    </p>
                </div>

                <div class="absolute bottom-[100px] z-20 text-white/70 text-[10px] font-bold tracking-widest animate-bounce flex flex-col items-center">
                    <span>LIHAT CARA AIR MEMUTAR KINCIR</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>

                <button @click="selesaiMateri(3)" class="absolute bottom-6 z-20 bg-green-500 text-white font-black px-8 py-3 rounded-full shadow-[0_4px_0_#166534] hover:translate-y-1 hover:shadow-none transition-all flex items-center justify-center gap-2 border-2 border-white">
                    <span>Misi Selesai</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                </button>
            </div>

            <div x-show="materiAktif === 'engineering'" class="w-full h-full flex flex-col items-center justify-center" x-data="gameEngineering()">
                
                <div x-show="tahapGame === 'video'" class="bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-2xl border-4 border-white w-full">
                    <h3 class="font-black text-xl text-center mb-4 text-orange-600 flex items-center justify-center gap-2">
                        <span>Pelajari Dulu Caranya!</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </h3>
                    
                    <div x-data="{ playing: false }" class="aspect-[3/4] bg-gray-200 rounded-xl flex items-center justify-center text-gray-500 mb-4 border-4 border-gray-300 overflow-hidden relative shadow-inner">
                        
                        <video x-ref="videoTutorial" class="absolute inset-0 w-full h-full object-cover" @play="playing = true" @pause="playing = false" @ended="playing = false">
                            <source src="{{ asset('videos/tutor.mp4') }}" type="video/mp4">
                            Browsermu tidak mendukung video.
                        </video>
                        
                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center transition-opacity duration-300" :class="playing ? 'opacity-0 hover:opacity-100' : 'opacity-100'">
                            <button @click="playing ? $refs.videoTutorial.pause() : $refs.videoTutorial.play()" class="bg-red-600 text-white p-4 rounded-full shadow-2xl transform hover:scale-110 transition-all flex items-center justify-center w-16 h-16 border-2 border-white/50">
                                
                                <svg x-show="!playing" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>

                                <svg x-show="playing" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <p class="text-sm text-center text-gray-600 mb-6 font-bold">Perhatikan alat dan bahan yang digunakan pada video di atas untuk merakit kincir.</p>
                    
                    <button @click="mulaiGame()" class="w-full bg-orange-500 text-white font-black py-4 rounded-full shadow-[0_5px_0_#c2410c] hover:translate-y-1 hover:shadow-none transition-all text-xl uppercase tracking-wider flex items-center justify-center gap-2">
                        <span>Mulai Merakit</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </button>
                </div>

                <div x-show="tahapGame === 'main'" style="display: none;" class="w-full h-full flex flex-col relative pb-10">
                    <div class="text-center mb-4 pt-2">
                        <h2 class="text-3xl font-black text-white title-stroke tracking-wider">
                            TANTANGAN<br>INSINYUR CILIK
                        </h2>
                    </div>

                    <div class="border-2 border-white/50 rounded-2xl p-4 mb-6 bg-blue-900/60 shadow-inner backdrop-blur-sm">
                        <h3 class="text-white font-bold mb-1 text-lg">Langkah 1: Alat & Bahan</h3>
                        <p class="text-blue-200 text-xs mb-3 font-semibold">*Ketuk/geser 4 bahan yang benar ke kotak bawah!</p>
                        
                        <div class="grid grid-cols-3 gap-3">
                            <template x-for="item in bahanTersedia" :key="item.id">
                                <div draggable="true" @dragstart="onDragStart(item)" @click="pilihBahan(item)" class="bg-[#fcd386] border-2 border-white rounded-xl aspect-square flex flex-col items-center justify-center cursor-pointer shadow-lg hover:scale-105 active:scale-95 transition-transform relative overflow-hidden">
                                    <span class="text-4xl drop-shadow-md z-10" x-text="item.icon"></span>
                                    <span class="text-[10px] font-black text-orange-950 mt-1 z-10 text-center leading-tight" x-text="item.nama"></span>
                                    <div class="absolute inset-0 bg-white/20 rounded-xl pointer-events-none"></div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="border-2 border-white/50 rounded-2xl p-4 bg-blue-900/60 shadow-inner backdrop-blur-sm flex-1 flex flex-col" @dragover.prevent @drop="onDrop()">
                        <h3 class="text-white font-bold mb-4 text-lg">Langkah 2: Rakit Kincir</h3>
                        
                        <div class="flex justify-around items-center flex-1 w-full gap-2 px-2">
                            <template x-for="i in 4">
                                <div class="w-16 h-16 rounded-xl border-2 border-dashed border-white/70 bg-blue-800/50 flex items-center justify-center relative shadow-inner">
                                    <template x-if="bahanTerpilih[i-1]">
                                        <div @click="hapusBahan(bahanTerpilih[i-1])" class="absolute inset-0 bg-[#fcd386] border-2 border-white rounded-xl flex items-center justify-center cursor-pointer shadow-md animate-bounce-short z-10">
                                            <span class="text-3xl drop-shadow-md" x-text="bahanTerpilih[i-1].icon"></span>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>

                        <div class="w-full bg-blue-950 h-3 rounded-full mt-6 border border-white/30 overflow-hidden relative">
                            <div class="bg-yellow-400 h-full rounded-full transition-all duration-300" :style="`width: ${(bahanTerpilih.length / 4) * 100}%`"></div>
                        </div>
                    </div>
                </div>

                <div x-show="tahapGame === 'hasil'" style="display: none;" class="absolute inset-0 z-50 flex items-center justify-center p-6 bg-black/80 backdrop-blur-sm"
                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    
                    <div class="bg-white rounded-3xl p-8 w-full max-w-[320px] shadow-2xl text-center border-4 border-gray-200">
                        <template x-if="statusHasil === 'menang'">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto mb-4 text-green-500 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-3xl font-black text-green-600 mb-2">BERHASIL!</h3>
                                <p class="text-gray-700 font-bold mb-8 text-lg">Hebat! Kamu berhasil mengumpulkan alat yang benar. Kincir air siap diputar!</p>
                                
                                <button @click="$dispatch('selesaikan-level', 4)" class="w-full bg-green-500 text-white font-black text-xl py-4 rounded-full shadow-[0_5px_0_#166534] hover:translate-y-1 hover:shadow-none transition-all flex justify-center items-center gap-2">
                                    <span>Selesai</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </button>
                            </div>
                        </template>

                        <template x-if="statusHasil === 'kalah'">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto mb-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-3xl font-black text-red-600 mb-2">YAH GAGAL!</h3>
                                <p class="text-gray-700 font-bold mb-8 text-lg">Ada bahan yang tidak nyambung nih. Kita kan merakit kincir sederhana pakai stik, bukan besi yang berat atau kantong plastik! Coba periksa lagi ya!</p>
                                <button @click="resetGame()" class="w-full bg-red-500 text-white font-black text-xl py-4 rounded-full shadow-[0_5px_0_#991b1b] hover:translate-y-1 hover:shadow-none transition-all flex justify-center items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                                    <span>Coba Lagi</span>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            
            Alpine.data('eModul', () => ({
                layar: 'cover',
                materiAktif: '',
                judulLayar: '',
                levelTerbuka: 1, // KUNCI LEVEL (Mulai dari Level 1)

                // State khusus untuk di-reset
                slideCariTahu: 1,
                tahapBudaya: 0,

                bukaMateri(id, judul, reqLevel) {
                    // Cegah klik jika level belum terbuka
                    if(this.levelTerbuka < reqLevel) return;

                    // Reset semua state saat materi dibuka
                    this.slideCariTahu = 1;
                    this.tahapBudaya = 0;

                    this.materiAktif = id;
                    this.judulLayar = judul;
                    this.layar = 'konten';
                },

                selesaiMateri(levelLulus) {
                    // Buka level selanjutnya jika level ini baru saja diselesaikan
                    if(this.levelTerbuka === levelLulus && this.levelTerbuka < 4) {
                        this.levelTerbuka = levelLulus + 1;
                    }
                    // Kembali ke peta
                    this.layar = 'peta';
                },

                bacakan(teks) {
                    if ('speechSynthesis' in window) {
                        window.speechSynthesis.cancel();
                        const suara = new SpeechSynthesisUtterance(teks);
                        suara.lang = 'id-ID';
                        suara.rate = 0.85; 
                        window.speechSynthesis.speak(suara);
                    }
                }
            }));

            Alpine.data('gameEngineering', () => ({
                tahapGame: 'video',
                statusHasil: '',
                bahanTersedia: [],
                bahanTerpilih: [],
                itemDiDrag: null,

                init() {
                    this.setupBahan();
                    // Fungsi Reset ke Video saat menu dibuka kembali
                    this.$watch('materiAktif', (value) => {
                        if (value === 'engineering') {
                            this.tahapGame = 'video';
                            this.setupBahan();
                        }
                    });
                },

                setupBahan() {
                    const bahanAwal = [
                        { id: 1, nama: 'Kayu/Stik', icon: '🪵', isBenar: true },
                        { id: 2, nama: 'Tutup Botol', icon: '🔴', isBenar: true },
                        { id: 3, nama: 'Lem Tembak', icon: '🔫', isBenar: true },
                        { id: 4, nama: 'Air/Sungai', icon: '💧', isBenar: true },
                        { id: 5, nama: 'Besi Berat', icon: '🔩', isBenar: false },
                        { id: 6, nama: 'Plastik', icon: '🛍️', isBenar: false },
                    ];
                    this.bahanTersedia = bahanAwal.sort(() => Math.random() - 0.5);
                    this.bahanTerpilih = [];
                    this.statusHasil = '';
                },

                mulaiGame() {
                    this.setupBahan();
                    this.tahapGame = 'main';
                },

                resetGame() {
                    this.setupBahan();
                    this.tahapGame = 'main';
                },

                onDragStart(item) {
                    this.itemDiDrag = item;
                },
                onDrop() {
                    if (this.itemDiDrag && this.bahanTerpilih.length < 4) {
                        this.pindahBahanKeBawah(this.itemDiDrag);
                    }
                },

                pilihBahan(item) {
                    if (this.bahanTerpilih.length < 4) {
                        this.pindahBahanKeBawah(item);
                    }
                },

                pindahBahanKeBawah(item) {
                    this.bahanTersedia = this.bahanTersedia.filter(i => i.id !== item.id);
                    this.bahanTerpilih.push(item);
                    this.itemDiDrag = null;

                    if (this.bahanTerpilih.length === 4) {
                        setTimeout(() => this.cekJawaban(), 400);
                    }
                },

                hapusBahan(item) {
                    this.bahanTerpilih = this.bahanTerpilih.filter(i => i.id !== item.id);
                    this.bahanTersedia.push(item);
                },

                cekJawaban() {
                    let adaSalah = this.bahanTerpilih.some(item => item.isBenar === false);
                    if (adaSalah) {
                        this.statusHasil = 'kalah';
                    } else {
                        this.statusHasil = 'menang';
                    }
                    this.tahapGame = 'hasil';
                }
            }));
            
        });
    </script>
</body>
</html>