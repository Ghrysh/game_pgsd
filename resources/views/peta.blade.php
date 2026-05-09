<x-layout>
    <style>
        /* Animasi kilatan cahaya (Shimmer) */
        @keyframes shimmer {
            0% { transform: translateX(-150%) skewX(-20deg); }
            100% { transform: translateX(150%) skewX(-20deg); }
        }
        .animate-shimmer {
            animation: shimmer 3s infinite;
        }
        .glow-orange {
            box-shadow: 0 0 20px 5px rgba(249, 115, 22, 0.6);
        }
    </style>

    <audio id="sfx-peta" src="{{ asset('audios/peta.ogg') }}"></audio>

    <a href="/kincir-air-interaktif/" class="absolute top-6 left-6 z-50 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <main x-data="petaDesa()" class="absolute inset-0 flex-1 overflow-y-auto z-30 bg-green-800">
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-80 scale-[1.2]">
            <source src="{{ asset('videos/bg2.mp4') }}" type="video/mp4">
        </video>

        <div class="relative z-10 text-center pt-10 pb-2">
            <h2 class="text-4xl font-black title-stroke leading-tight tracking-wide">
                PETA <br> PETUALANGAN
            </h2>
        </div>

        <div class="relative w-full h-[750px] z-10 mt-4 max-w-[360px] mx-auto pb-10 mb-24">
            
            <svg class="absolute inset-0 w-full h-full z-0 pointer-events-none" preserveAspectRatio="none" viewBox="0 0 100 100">
                <path d="M 25,8 C 65,8 75,18 75,28 C 75,38 25,38 25,48 C 25,58 75,58 75,68 C 75,78 25,78 25,88" fill="none" stroke="#a07c50" stroke-width="5" stroke-linecap="round"/>
                <path d="M 25,8 C 65,8 75,18 75,28 C 75,38 25,38 25,48 C 25,58 75,58 75,68 C 75,78 25,78 25,88" fill="none" stroke="#e4c795" stroke-width="3.5" stroke-linecap="round"/>
            </svg>

            <button @click="bukaMateri('/materi/caritahu', 1)" class="absolute top-[3%] left-[13%] z-10 flex flex-col items-center group transition-transform hover:scale-105">
                <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                </div>
                <div class="absolute -bottom-4 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md z-20">1. Cari Tahu</div>
            </button>

            <button :disabled="level < 2" @click="bukaMateri('/materi/budaya', 2)" class="absolute top-[23%] right-[13%] z-10 flex flex-col items-center transition-all" :class="level < 2 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                    <div x-show="level < 2" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                </div>
                <div class="absolute -bottom-4 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md z-20">2. Kilas Budaya</div>
            </button>

            <button :disabled="level < 3" @click="bukaMateri('/materi/sains', 3)" class="absolute top-[43%] left-[13%] z-10 flex flex-col items-center transition-all" :class="level < 3 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                    <div x-show="level < 3" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                </div>
                <div class="absolute -bottom-4 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md z-20">3. Logika Sains</div>
            </button>

            <button :disabled="level < 4" @click="bukaMateri('/materi/engineering', 4)" class="absolute top-[63%] right-[13%] z-10 flex flex-col items-center transition-all" :class="level < 4 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                    <div x-show="level < 4" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                </div>
                <div class="absolute -bottom-4 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md z-20">4. Insinyur Cilik</div>
            </button>

            <button :disabled="level < 5" @click="bukaMateri('/materi/merakit', 5)" class="absolute top-[83%] left-[10%] z-10 flex flex-col items-center transition-all" :class="level < 5 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-110'">
                <div class="w-[100px] h-[100px] rounded-full border-[4px] border-white bg-gradient-to-b from-orange-400 to-orange-600 glow-orange flex items-center justify-center overflow-hidden relative">
                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/40 to-transparent -translate-x-full animate-shimmer pointer-events-none"></div>
                    <img src="{{ asset('images/icon.png') }}" class="w-20 h-16 drop-shadow-lg z-10" alt="Caping">
                    <div x-show="level < 5" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                </div>
                <div class="absolute -bottom-5 bg-orange-100 border-2 border-orange-700 text-orange-900 font-black px-4 py-1 rounded-full text-[12px] whitespace-nowrap shadow-xl z-20 uppercase tracking-tighter">
                    5. Mulai Merakit
                </div>
            </button>

        </div>
    </main>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('petaDesa', () => ({
                level: parseInt(localStorage.getItem('kincir_level')) || 1,
                init() {
                    // 1. Jalankan BGM normal di segala kondisi (Refresh, Selesai Misi, dsb)
                    if(typeof window.setBgm === 'function') {
                        window.setBgm(1); 
                    }

                    // 2. Cek apakah user datang dari Cover (Hanya jika klik Mulai Petualangan)
                    const urlParams = new URLSearchParams(window.location.search);
                    if (urlParams.get('start') === 'true') {
                        this.putarSuaraSambutan();
                    }
                },
                putarSuaraSambutan() {
                    const audio = document.getElementById('sfx-peta');
                    if (audio) {
                        // Volume sambutan lebih tinggi agar terdengar di atas BGM
                        audio.volume = 0.4; 
                        
                        // Mainkan bersamaan (TANPA pauseBgm)
                        audio.play().catch(e => console.log("Menunggu interaksi user"));

                        audio.onended = () => {
                            // Bersihkan URL agar saat refresh suara sambutan tidak mengulang
                            const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                            window.history.replaceState({path:cleanUrl}, '', cleanUrl);
                        };
                    }
                },
                bukaMateri(url, reqLvl) {
                    if (this.level >= reqLvl) {
                        setTimeout(() => {
                            window.location.href = "/kincir-air-interaktif" + url;
                        }, 200);
                    }
                }
            }));
        });
    </script>
</x-layout>