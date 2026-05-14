<x-layout>
    <audio id="audio-ct-1" src="{{ asset('audios/caritahu_1.ogg') }}"></audio>
    <audio id="audio-ct-2" src="{{ asset('audios/caritahu_2.ogg') }}"></audio>
    <audio id="audio-ct-3" src="{{ asset('audios/caritahu_3.ogg') }}"></audio>
    <audio id="audio-ct-4" src="{{ asset('audios/caritahu_4.ogg') }}"></audio>
    <audio id="audio-ct-5" src="{{ asset('audios/caritahu_5.ogg') }}"></audio>

    <style>
        @keyframes slow-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-slow-spin {
            animation: slow-spin 10s linear infinite;
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }
    </style>

    <script>
        function stopAudioCariTahu() {
            for(let i=1; i<=5; i++) {
                let a = document.getElementById('audio-ct-'+i);
                if(a) { a.pause(); a.currentTime = 0; }
            }
        }
    </script>

    <a href="/kincir-air-interaktif/peta" onclick="stopAudioCariTahu(); if(window.playBgm) window.playBgm();" class="absolute top-6 left-6 z-50 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <main class="flex-1 overflow-y-auto relative z-10 p-6 pt-24 pb-10" x-data="{ 
        slide: 1,
        init() {
            if(window.setBgm) window.setBgm(1);
            for(let i=1; i<=5; i++) {
                let a = document.getElementById('audio-ct-' + i);
                if(a) a.volume = 0.4; 
            }
            window.retrySuara = () => this.putarAudio(this.slide);
            setTimeout(() => { this.putarAudio(1); }, 500);
        },
        putarAudio(n) {
            stopAudioCariTahu();
            if(window.pauseBgm) window.pauseBgm();
            let audio = document.getElementById('audio-ct-' + n);
            if(audio) {
                let playPromise = audio.play();
                if (playPromise !== undefined) {
                    playPromise.catch(e => console.log('Autoplay dicegah browser.'));
                }
                audio.onended = () => {
                    if(window.playBgm) window.playBgm();
                };
            }
        }
    }">
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-2xl border-4 border-white w-full relative flex flex-col min-h-[520px]">
            <h2 class="text-center font-black text-2xl text-orange-600 mb-4 border-b-2 border-orange-200 pb-2">Buku Pintar Energi 📖</h2>

            <div x-show="slide === 1" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="flex-1 flex flex-col items-center">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mb-4 animate-pulse shadow-[0_0_20px_rgba(250,204,21,0.6)]">
                    <span class="text-4xl animate-bounce mt-2">⚡</span>
                </div>
                <h3 class="font-black text-xl text-blue-700 mb-3 w-full">1. Pengertian Energi</h3>
                <p class="text-gray-700 text-[15px] leading-relaxed w-full">Energi adalah kemampuan untuk melakukan usaha atau kerja. Sederhananya, energi adalah <b>"tenaga"</b> yang membuat segala sesuatu di dunia ini bisa bergerak, hidup, tumbuh, atau menyala. <br><br>Tanpa energi, mobil tidak bisa berjalan, lampu tidak bisa menyala, dan kita tidak akan punya tenaga untuk bermain!</p>
            </div>

            <div x-show="slide === 2" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;" class="flex-1">
                <h3 class="font-black text-xl text-blue-700 mb-3">2. Jenis-jenis Energi</h3>
                <ul class="text-gray-700 text-[13px] space-y-3 leading-snug list-none">
                    <li class="floating" style="animation-delay: 0.1s"><span class="text-lg mr-1">☀️</span> <b>Energi Cahaya:</b> Membuat keadaan terang. Contoh: matahari dan lampu.</li>
                    <li class="floating" style="animation-delay: 0.3s"><span class="text-lg mr-1">🔥</span> <b>Energi Panas (Kalor):</b> Dari benda bersuhu tinggi. Contoh: matahari dan api unggun.</li>
                    <li class="floating" style="animation-delay: 0.5s"><span class="text-lg mr-1">⚙️</span> <b>Energi Gerak (Kinetik):</b> Dari benda bergerak. Contoh: kincir berputar dan air mengalir.</li>
                    <li class="floating" style="animation-delay: 0.7s"><span class="text-lg mr-1">📻</span> <b>Energi Bunyi:</b> Dari benda bergetar. Contoh: suara gitar dan petir.</li>
                    <li class="floating" style="animation-delay: 0.9s"><span class="text-lg mr-1">⚡</span> <b>Energi Listrik:</b> Mengalir lewat kabel. Contoh: menyalakan TV.</li>
                    <li class="floating" style="animation-delay: 1.1s"><span class="text-lg mr-1">🔋</span> <b>Energi Kimia:</b> Tersimpan dalam zat. Contoh: makanan, baterai, dan bensin.</li>
                </ul>
            </div>

            <div x-show="slide === 3" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;" class="flex-1">
                <h3 class="font-black text-xl text-blue-700 mb-3">3. Sumber Energi</h3>
                <div class="space-y-4 text-sm">
                    <div class="bg-green-100 p-3 rounded-xl border-2 border-green-300 relative overflow-hidden group">
                        <div class="absolute -right-2 -top-2 text-5xl opacity-20 group-hover:rotate-12 transition-transform">🌿</div>
                        <b class="text-green-800">Energi Terbarukan (Tidak Habis):</b> <br>Bisa terus digunakan. Contoh: Matahari, angin, aliran air, dan panas bumi.
                    </div>
                    <div class="bg-red-100 p-3 rounded-xl border-2 border-red-300 relative overflow-hidden group">
                        <div class="absolute -right-2 -top-2 text-5xl opacity-20 group-hover:rotate-12 transition-transform">⛽</div>
                        <b class="text-red-800">Energi Tak Terbarukan (Bisa Habis):</b> <br>Terbatas dan butuh jutaan tahun. Contoh: Minyak bumi, batu bara, gas alam.
                    </div>
                </div>
            </div>

            <div x-show="slide === 4" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;" class="flex-1">
                <h3 class="font-black text-xl text-blue-700 mb-3">4. Perubahan Energi</h3>
                <ul class="text-gray-700 text-[14px] space-y-4 leading-snug bg-blue-50 p-4 rounded-xl border border-blue-200">
                    <li class="flex gap-2"><span class="animate-pulse">⚡</span> <span><b>Listrik ➡️ Panas:</b> Menyetrika baju atau memasak nasi.</span></li>
                    <li class="flex gap-2"><span class="animate-pulse">⚡</span> <span><b>Listrik ➡️ Gerak:</b> Kipas angin berputar.</span></li>
                    <li class="flex gap-2"><span class="animate-pulse">⚡</span> <span><b>Listrik ➡️ Cahaya & Bunyi:</b> Menonton TV.</span></li>
                    <li class="flex gap-2"><span class="animate-pulse">🔋</span> <span><b>Kimia ➡️ Gerak:</b> Kita makan, lalu mendapat tenaga untuk berlari.</span></li>
                </ul>
            </div>

            <div x-show="slide === 5" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" style="display: none;" class="flex-1 overflow-y-auto pr-1">
                <div class="flex justify-center mb-2">
                    <div class="relative w-16 h-16">
                        <div class="absolute inset-0 bg-blue-100 rounded-full animate-ping opacity-25"></div>
                        <img src="{{ asset('images/icon.png') }}" class="w-full h-full object-contain animate-slow-spin drop-shadow-md" alt="Kincir">
                    </div>
                </div>
                <h3 class="font-black text-lg text-blue-700 mb-2 text-center leading-tight">
                    5. Permasalahan Budaya
                </h3>

                <div class="bg-white/50 p-3 rounded-xl border border-blue-100 mb-3">
                    <p class="text-gray-700 text-[12px] leading-relaxed mb-2">
                        Nenek moyang kita sejak dulu hebat dalam bertani menggunakan <b>Kincir Air Tradisional</b> dari bambu. Tapi sekarang, budaya ini mulai hilang karena petani lebih memilih mesin pompa bensin.
                    </p>
                    <div class="bg-red-50 p-2 rounded-lg border-l-4 border-red-400">
                        <p class="text-red-900 text-[11px]">
                            <b>Masalah:</b> Generasi muda terancam tidak tahu lagi warisan teknologi ramah lingkungan ini.
                        </p>
                    </div>
                </div>

                <h4 class="font-bold text-[13px] text-blue-800 mb-2 uppercase tracking-wider">Mempelajari Kincir via STEM:</h4>
                <div class="grid grid-cols-1 gap-2 mb-3">
                    <div class="flex gap-2 items-start bg-blue-50 p-2 rounded-lg border border-blue-200">
                        <span class="font-black text-blue-600 text-lg">S</span>
                        <div class="text-[11px] text-gray-700">
                            <b>Science:</b> Perubahan energi gerak air menjadi energi mekanik untuk memutar baling-baling.
                        </div>
                    </div>
                    <div class="flex gap-2 items-start bg-green-50 p-2 rounded-lg border border-green-200">
                        <span class="font-black text-green-600 text-lg">T</span>
                        <div class="text-[11px] text-gray-700">
                            <b>Technology:</b> Kincir adalah teknologi tradisional yang hebat karena tanpa listrik & nol polusi.
                        </div>
                    </div>
                    <div class="flex gap-2 items-start bg-orange-50 p-2 rounded-lg border border-orange-200">
                        <span class="font-black text-orange-600 text-lg">E</span>
                        <div class="text-[11px] text-gray-700">
                            <b>Engineering:</b> Merancang miniatur kincir dari bambu/stik agar kuat dan berputar lancar.
                        </div>
                    </div>
                    <div class="flex gap-2 items-start bg-purple-50 p-2 rounded-lg border border-purple-200">
                        <span class="font-black text-purple-600 text-lg">M</span>
                        <div class="text-[11px] text-gray-700">
                            <b>Mathematics:</b> Menghitung diameter kincir, jarak antar baling-baling, dan debit air.
                        </div>
                    </div>
                </div>

                <div class="bg-indigo-600 p-3 rounded-xl shadow-lg">
                    <p class="text-white text-[12px] font-bold text-center leading-snug">
                        Ayo lestarikan budaya teknologi Indonesia dengan menjadi ilmuwan cilik yang pintar STEM! 🇮🇩✨
                    </p>
                </div>
            </div>

            <div class="mt-6 flex justify-between items-center border-t-2 border-gray-100 pt-4">
                <button @click="if(slide > 1) { slide--; putarAudio(slide); }" :class="slide === 1 ? 'opacity-0 pointer-events-none' : ''" class="bg-gray-200 text-gray-700 font-bold px-4 py-2 rounded-full hover:bg-gray-300 text-sm">Kembali</button>
                <span class="font-black text-gray-400 text-sm"><span x-text="slide" class="text-blue-600"></span> / 5</span>
                <button x-show="slide < 5" @click="slide++; putarAudio(slide);" class="bg-orange-500 text-white font-bold px-4 py-2 rounded-full hover:bg-orange-600 shadow-md text-sm">Lanjut</button>
                <button x-show="slide === 5" onclick="stopAudioCariTahu(); selesaiMateri(1)" class="bg-green-500 text-white font-black px-5 py-2 rounded-full shadow-[0_4px_0_#166534] hover:translate-y-1 hover:shadow-none text-sm">Selesai</button>
            </div>
        </div>
    </main>
</x-layout>