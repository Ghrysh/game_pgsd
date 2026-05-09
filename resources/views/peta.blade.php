<x-layout>
    <main x-data="petaDesa()" class="absolute inset-0 flex-1 overflow-y-auto z-30 bg-green-800">
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

            <button @click="bukaMateri('/materi/caritahu', 1)" class="absolute top-[6%] left-[13%] z-10 flex flex-col items-center group transition-transform hover:scale-105">
                <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                </div>
                <div class="absolute -bottom-4 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md z-20">
                    1. Cari Tahu
                </div>
            </button>

            <button :disabled="level < 2" @click="bukaMateri('/materi/budaya', 2)" class="absolute top-[32%] right-[13%] z-10 flex flex-col items-center transition-all" :class="level < 2 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                    <div x-show="level < 2" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                </div>
                <div class="absolute -bottom-4 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md z-20">
                    2. Kilas Budaya
                </div>
            </button>

            <button :disabled="level < 3" @click="bukaMateri('/materi/sains', 3)" class="absolute top-[57%] left-[13%] z-10 flex flex-col items-center transition-all" :class="level < 3 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                    <div x-show="level < 3" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                </div>
                <div class="absolute -bottom-4 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md z-20">
                    3. Logika Sains
                </div>
            </button>

            <button :disabled="level < 4" @click="bukaMateri('/materi/engineering', 4)" class="absolute top-[82%] right-[13%] z-10 flex flex-col items-center transition-all" :class="level < 4 ? 'opacity-60 grayscale cursor-not-allowed' : 'group hover:scale-105'">
                <div class="w-[85px] h-[85px] rounded-full border-[3px] border-[#facc15] bg-gradient-to-b from-[#38bdf8] to-[#0284c7] shadow-lg flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('images/icon.png') }}" class="w-18 h-14 drop-shadow-lg" alt="Caping">
                    <div x-show="level < 4" class="absolute inset-0 bg-black/50 flex items-center justify-center backdrop-blur-[1px] z-20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                </div>
                <div class="absolute -bottom-4 bg-[#fef3c7] border-2 border-[#b45309] text-[#78350f] font-bold px-3 py-1 rounded-full text-[11px] whitespace-nowrap shadow-md z-20">
                    4. Insinyur Cilik
                </div>
            </button>
        </div>
    </main>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('petaDesa', () => ({
                level: parseInt(localStorage.getItem('kincir_level')) || 1,
                bukaMateri(url, reqLvl) {
                    if (this.level >= reqLvl) window.location.href = url;
                }
            }));
        });
    </script>
</x-layout>