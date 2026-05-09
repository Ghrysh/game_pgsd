<x-layout>
    <audio id="audio-bd-0" src="{{ asset('audios/budaya_1.ogg') }}"></audio>
    <audio id="audio-bd-1" src="{{ asset('audios/budaya_2.ogg') }}"></audio>
    <audio id="audio-bd-2" src="{{ asset('audios/budaya_3.ogg') }}"></audio>

    <script>
        function stopAudioBudaya() {
            for(let i=0; i<=2; i++) {
                let a = document.getElementById('audio-bd-'+i);
                if(a) { a.pause(); a.currentTime = 0; }
            }
        }
    </script>

    <a href="/peta" onclick="stopAudioBudaya()" class="absolute top-6 left-6 z-50 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
    </a>

    <main class="flex-1 overflow-y-auto relative z-10 p-6 pt-20" x-data="{ 
        tahap: 0,
        init() {
            // Coba putar intro Misi Investigasi otomatis
            setTimeout(() => { this.putarAudio(0); }, 300);
        },
        putarAudio(n) {
            stopAudioBudaya(); // Matikan audio sebelumnya
            let audio = document.getElementById('audio-bd-' + n);
            if(audio) {
                let playPromise = audio.play();
                if (playPromise !== undefined) {
                    playPromise.catch(e => console.log('Autoplay dicegah browser.'));
                }
            }
        }
    }">
        <div class="w-full h-full flex flex-col justify-center items-center text-center pb-10">
            
            <div x-show="tahap === 0">
                <h3 class="text-3xl font-black text-white title-stroke mb-2 mt-10">MISI INVESTIGASI <br> DESA!</h3>
                <p class="text-white text-lg font-bold mb-8">Kira-kira masalah apa ya yang terjadi di sawah saat kemarau panjang?</p>
                <button @click="tahap = 1; putarAudio(1);" class="bg-yellow-400 text-yellow-900 px-6 py-4 rounded-full font-black text-xl border-4 border-white shadow-[0_5px_0_#b45309] hover:translate-y-1">Cari Tahu!</button>
            </div>
            
            <div x-show="tahap === 1" style="display: none;" class="w-full mt-10">
                <div class="bg-white/95 rounded-3xl p-6 border-4 border-red-400 shadow-xl relative">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-red-500 text-white font-bold px-4 py-1 rounded-full">MASALAH DITEMUKAN</div>
                    <h3 class="text-xl font-black text-red-600 mb-2 mt-4">Tanah Kering Kerontang!</h3>
                    <p class="text-gray-700 font-bold mb-6">Saat kemarau, sawah kekeringan. Bagaimana cara petani mengairi sawahnya?</p>
                    <button @click="tahap = 2; putarAudio(2);" class="w-full bg-green-500 text-white px-6 py-3 rounded-full font-black shadow-[0_5px_0_#166534] hover:translate-y-1">Lihat Solusi Petani</button>
                </div>
            </div>

            <div x-show="tahap === 2" style="display: none;" class="w-full mt-10">
                <div class="bg-white/95 rounded-3xl p-6 border-4 border-green-400 shadow-xl relative">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-green-500 text-white font-bold px-4 py-1 rounded-full">KEARIFAN LOKAL</div>
                    <h3 class="text-xl font-black text-green-700 mb-2 mt-4">Gotong Royong!</h3>
                    <p class="text-gray-700 font-bold mb-6">Petani bekerja sama merakit Kincir Air Bambu warisan turun-temurun!</p>
                    
                    <div class="flex flex-col gap-3">
                        <button @click="tahap = 0; putarAudio(0);" class="w-full bg-blue-500 text-white px-6 py-3 rounded-full font-black shadow-[0_5px_0_#1e3a8a] hover:translate-y-1">Ulangi Misi</button>
                        
                        <button onclick="stopAudioBudaya(); selesaiMateri(2)" class="w-full bg-green-500 text-white px-6 py-3 rounded-full font-black shadow-[0_5px_0_#166534] hover:translate-y-1">Selesai Misi</button>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
</x-layout>