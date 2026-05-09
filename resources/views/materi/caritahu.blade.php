<x-layout>
    <audio id="audio-ct-1" src="{{ asset('audios/caritahu_1.ogg') }}"></audio>
    <audio id="audio-ct-2" src="{{ asset('audios/caritahu_2.ogg') }}"></audio>
    <audio id="audio-ct-3" src="{{ asset('audios/caritahu_3.ogg') }}"></audio>
    <audio id="audio-ct-4" src="{{ asset('audios/caritahu_4.ogg') }}"></audio>
    <audio id="audio-ct-5" src="{{ asset('audios/caritahu_5.ogg') }}"></audio>

    <script>
        // Fungsi untuk menghentikan paksa suara materi yang sedang berjalan
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
            // 1. Set BGM ke BGM 2 (bgm2.mp3)
            if(window.setBgm) window.setBgm(2);

            for(let i=1; i<=5; i++) {
                let a = document.getElementById('audio-ct-' + i);
                if(a) a.volume = 0.4; 
            }
            
            // 2. Putar penjelasan slide 1 otomatis setelah jeda setengah detik
            setTimeout(() => { this.putarAudio(1); }, 500);
        },
        putarAudio(n) {
            stopAudioCariTahu(); // Matikan audio materi sebelumnya
            
            if(window.pauseBgm) window.pauseBgm(); // Matikan sementara BGM 2
            
            let audio = document.getElementById('audio-ct-' + n);
            if(audio) {
                let playPromise = audio.play();
                if (playPromise !== undefined) {
                    playPromise.catch(e => console.log('Autoplay dicegah browser, butuh interaksi tap.'));
                }
                
                // Jika audio materi sudah selesai, nyalakan kembali BGM 2
                audio.onended = () => {
                    if(window.playBgm) window.playBgm();
                };
            }
        }
    }">
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-2xl border-4 border-white w-full relative flex flex-col min-h-[480px]">
            <h2 class="text-center font-black text-2xl text-orange-600 mb-4 border-b-2 border-orange-200 pb-2">Buku Pintar Energi 📖</h2>

            <div x-show="slide === 1" class="flex-1">
                <h3 class="font-black text-xl text-blue-700 mb-3">1. Pengertian Energi</h3>
                <p class="text-gray-700 text-[15px] leading-relaxed">Energi adalah kemampuan untuk melakukan usaha atau kerja. Sederhananya, energi adalah <b>"tenaga"</b> yang membuat segala sesuatu di dunia ini bisa bergerak, hidup, tumbuh, atau menyala. <br><br>Tanpa energi, mobil tidak bisa berjalan, lampu tidak bisa menyala, dan kita tidak akan punya tenaga untuk bermain!</p>
            </div>

            <div x-show="slide === 2" style="display: none;" class="flex-1">
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

            <div x-show="slide === 3" style="display: none;" class="flex-1">
                <h3 class="font-black text-xl text-blue-700 mb-3">3. Sumber Energi</h3>
                <div class="space-y-4 text-sm">
                    <div class="bg-green-100 p-3 rounded-xl border border-green-300">
                        <b class="text-green-800">Energi Terbarukan (Tidak Habis):</b> <br>Bisa terus digunakan. Contoh: Matahari, angin, aliran air, dan panas bumi.
                    </div>
                    <div class="bg-red-100 p-3 rounded-xl border border-red-300">
                        <b class="text-red-800">Energi Tak Terbarukan (Bisa Habis):</b> <br>Terbatas dan butuh jutaan tahun. Contoh: Minyak bumi, batu bara, gas alam.
                    </div>
                </div>
            </div>

            <div x-show="slide === 4" style="display: none;" class="flex-1">
                <h3 class="font-black text-xl text-blue-700 mb-3">4. Perubahan Energi</h3>
                <ul class="text-gray-700 text-sm space-y-4 leading-snug bg-blue-50 p-4 rounded-xl border border-blue-200">
                    <li><b>Listrik ➡️ Panas:</b> Menyetrika baju atau memasak nasi.</li>
                    <li><b>Listrik ➡️ Gerak:</b> Kipas angin berputar.</li>
                    <li><b>Listrik ➡️ Cahaya & Bunyi:</b> Menonton TV.</li>
                    <li><b>Kimia ➡️ Gerak:</b> Kita makan, lalu mendapat tenaga untuk berlari.</li>
                </ul>
            </div>

            <div x-show="slide === 5" style="display: none;" class="flex-1">
                <h3 class="font-black text-xl text-blue-700 mb-3 text-center">5. Permasalahan Budaya</h3>
                <ul class="text-gray-700 text-[13px] space-y-2 list-disc pl-4 mb-3">
                    <li><b>Lunturnya Budaya Lokal:</b> Lebih suka budaya asing.</li>
                    <li><b>Kurang Toleransi:</b> Perbedaan memicu pertengkaran.</li>
                    <li><b>Klaim Budaya:</b> Budaya kita diakui negara lain.</li>
                </ul>
                <div class="bg-yellow-100 p-3 rounded-xl border border-yellow-300 text-[13px] font-bold text-yellow-900">
                    Solusi: Bangga pakai produk Indonesia, belajar kesenian daerah, dan hargai teman!
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