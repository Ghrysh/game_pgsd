<x-layout>
    <a href="/peta" class="absolute top-6 left-6 z-50 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
    </a>

    <main class="absolute inset-0 z-0 bg-black flex flex-col justify-center items-center overflow-hidden">
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-90">
            <source src="{{ asset('videos/kincir.mp4') }}" type="video/mp4">
        </video>

        <div class="absolute top-[150px] left-6 z-20 animate-pulse">
            <h3 class="text-2xl font-black title-stroke uppercase tracking-widest leading-none">Energi Kinetik</h3>
            <p class="text-white text-[10px] font-black drop-shadow-md bg-blue-600/40 px-2 py-0.5 rounded-full mt-1">(DORONGAN AIR)</p>
        </div>

        <div class="relative top-[190px] z-20 text-center px-10">
            <h2 class="text-4xl font-black title-stroke uppercase tracking-tighter drop-shadow-2xl mb-2">Kekuatan Mekanik</h2>
            <p class="text-white text-sm font-black bg-black/30 backdrop-blur-sm p-3 rounded-2xl border border-white/20">Energi kinetik air berubah menjadi gerak putaran pada kincir!</p>
        </div>

        <button onclick="selesaiMateri(3)" class="absolute bottom-10 z-20 bg-green-500 text-white font-black px-8 py-3 rounded-full shadow-[0_4px_0_#166534] hover:translate-y-1 transition-all border-2 border-white">
            Misi Selesai
        </button>
    </main>
</x-layout>