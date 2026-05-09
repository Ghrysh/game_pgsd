<x-layout>
    <div x-data="coverPage()" class="absolute inset-0 bg-black z-50 flex flex-col justify-between p-12 text-center">
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-60">
            <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
        </video>

        <div class="relative z-10 pt-10">
            <h1 class="text-4xl font-black text-white leading-tight drop-shadow-2xl tracking-tighter">
                KINCIR AIR PINTAR <br> UNTUK DESA
            </h1>
        </div>

        <div class="relative z-10 pb-10">
            <button @click="goToPeta()" class="w-full bg-orange-600 text-white text-xl font-bold py-5 rounded-full shadow-[0_6px_0_#9a3412] hover:translate-y-1 transition-all uppercase flex items-center justify-center gap-2">
                <span>Mulai Petualangan</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('coverPage', () => ({
                init() {
                    // Set BGM 1 (bgm.mp3)
                    if(window.setBgm) window.setBgm(1);
                },
                goToPeta() {
                    // Delay dikit supaya suara 'tap' dari layout sempat terdengar
                    setTimeout(() => {
                        // Tambahkan ?start=true agar peta.ogg berputar di halaman peta
                        window.location.href = "/kincir-air-interaktif/peta?start=true";
                    }, 300);
                }
            }));
        });
    </script>
</x-layout>