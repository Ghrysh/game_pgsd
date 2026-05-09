<x-layout>
    <a href="/kincir-air-interaktif/peta" onclick="if(window.speechSynthesis) window.speechSynthesis.cancel();" class="absolute top-6 left-6 z-50 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
    </a>

    <main class="flex-1 overflow-y-auto relative z-10 p-6 pt-24" x-data="gameEngineering()">
        
        <div x-show="tahapGame === 'video'" class="bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-2xl border-4 border-white w-full">
            <h3 class="font-black text-xl text-center mb-4 text-orange-600">Pelajari Dulu Caranya!</h3>
            
            <div class="aspect-[3/4] bg-gray-200 rounded-xl overflow-hidden relative border-4 border-gray-300">
                <video x-ref="videoTutorial" class="absolute inset-0 w-full h-full object-cover" 
                    x-init="$el.volume = 0.4"
                    @play="playing = true; if(window.pauseBgm) pauseBgm();" 
                    @pause="playing = false; if(window.playBgm) playBgm();" 
                    @ended="playing = false; if(window.playBgm) playBgm();">
                    <source src="{{ asset('videos/tutor.mp4') }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 bg-black/30 flex items-center justify-center transition-opacity duration-300" :class="playing ? 'opacity-0 hover:opacity-100' : 'opacity-100'">
                    <button @click="playing ? $refs.videoTutorial.pause() : $refs.videoTutorial.play()" class="bg-red-600 text-white p-4 rounded-full shadow-2xl w-16 h-16 border-2 border-white/50 flex items-center justify-center">
                        <svg x-show="!playing" class="h-8 w-8 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z" /></svg>
                        <svg x-show="playing" style="display: none;" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z" /></svg>
                    </button>
                </div>
            </div>
            
            <button @click="mulaiGame()" class="w-full bg-orange-500 text-white font-black py-4 rounded-full shadow-[0_5px_0_#c2410c] hover:translate-y-1 mt-4">Mulai Merakit</button>
        </div>

        <div x-show="tahapGame === 'main'" style="display: none;" class="w-full flex flex-col relative pb-10">
            <h2 class="text-3xl font-black text-white title-stroke tracking-wider text-center mb-4">INSINYUR CILIK</h2>
            
            <div class="border-2 border-white/50 rounded-2xl p-4 mb-6 bg-blue-900/60 shadow-inner">
                <h3 class="text-white font-bold mb-1">Alat & Bahan</h3>
                <div class="grid grid-cols-3 gap-3">
                    <template x-for="item in bahanTersedia" :key="item.id">
                        <div @click="pilihBahan(item)" class="bg-[#fcd386] border-2 border-white rounded-xl aspect-square flex flex-col items-center justify-center cursor-pointer shadow-lg hover:scale-105 active:scale-95">
                            <div class="w-12 h-12 flex items-center justify-center drop-shadow-md z-10" x-html="item.icon"></div>
                            <span class="text-[10px] font-black text-orange-950 mt-1 z-10 text-center leading-tight" x-text="item.nama"></span>
                        </div>
                    </template>
                </div>
            </div>

            <div class="border-2 border-white/50 rounded-2xl p-4 bg-blue-900/60 shadow-inner flex-1 flex flex-col">
                <h3 class="text-white font-bold mb-4">Rakit Kincir</h3>
                <div class="flex justify-around gap-2 px-2">
                    <template x-for="i in 4">
                        <div class="w-16 h-16 rounded-xl border-2 border-dashed border-white/70 bg-blue-800/50 flex items-center justify-center relative">
                            <template x-if="bahanTerpilih[i-1]">
                                <div @click="hapusBahan(bahanTerpilih[i-1])" class="absolute inset-0 bg-[#fcd386] border-2 border-white rounded-xl flex items-center justify-center cursor-pointer shadow-md animate-bounce-short z-10">
                                    <div class="w-10 h-10 flex items-center justify-center drop-shadow-sm" x-html="bahanTerpilih[i-1].icon"></div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div x-show="tahapGame === 'hasil'" style="display: none;" class="absolute inset-0 z-50 flex items-center justify-center p-6 bg-black/80 backdrop-blur-sm">
            <div class="bg-white rounded-3xl p-8 w-full max-w-[320px] text-center border-4 border-gray-200">
                <template x-if="statusHasil === 'menang'">
                    <div>
                        <h3 class="text-3xl font-black text-green-600 mb-2">BERHASIL!</h3>
                        <p class="text-gray-700 font-bold mb-8">Hebat! Kamu mengumpulkan alat yang benar.</p>
                        <button @click="btnSelesai()" class="w-full bg-green-500 text-white font-black py-4 rounded-full shadow-[0_5px_0_#166534]">Selesai</button>
                    </div>
                </template>
                <template x-if="statusHasil === 'kalah'">
                    <div>
                        <h3 class="text-3xl font-black text-red-600 mb-2">YAH GAGAL!</h3>
                        <p class="text-gray-700 font-bold mb-8">Masa kincir sederhana pakai besi berat atau plastik? Coba lagi!</p>
                        <button @click="resetGame()" class="w-full bg-red-500 text-white font-black py-4 rounded-full shadow-[0_5px_0_#991b1b]">Coba Lagi</button>
                    </div>
                </template>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('gameEngineering', () => ({
                tahapGame: 'video',
                statusHasil: '',
                bahanTersedia: [],
                bahanTerpilih: [],
                playing: false,
                
                // DEKLARASI SFX
                sfxTap: new Audio('{{ asset("audios/tap.mp3") }}'),
                sfxDrop: new Audio('{{ asset("audios/pop.mp3") }}'),
                sfxWin: new Audio('{{ asset("audios/win.mp3") }}'),
                sfxLose: new Audio('{{ asset("audios/wrong.mp3") }}'),

                putarSfx(audio) {
                    if (audio) {
                        audio.currentTime = 0; 
                        audio.play().catch(e => {});
                    }
                },

                init() { 
                    if(typeof window.setBgm === 'function') window.setBgm(2);
                    this.setupBahan(); 
                },

                setupBahan() {
                    // Ikon Stik menggunakan SVG Cream seperti Tusuk Sate
                    const stikSvg = `<svg viewBox="0 0 24 24" class="w-full h-full" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="10.5" y="2" width="3" height="20" rx="1" fill="#FFF8DC" stroke="#D2B48C" stroke-width="0.8"/>
                        <path d="M12 4V20" stroke="#EEDC82" stroke-width="0.5" stroke-linecap="round" opacity="0.6"/>
                    </svg>`;

                    this.bahanTersedia = [
                        { id: 1, nama: 'Stik', icon: stikSvg, isBenar: true },
                        { id: 2, nama: 'Tutup Botol', icon: '🔴', isBenar: true },
                        { id: 3, nama: 'Lem Tembak', icon: '🔫', isBenar: true },
                        { id: 4, nama: 'Air/Sungai', icon: '💧', isBenar: true },
                        { id: 5, nama: 'Besi Berat', icon: '🔩', isBenar: false },
                        { id: 6, nama: 'Plastik', icon: '🛍️', isBenar: false },
                    ].sort(() => Math.random() - 0.5);
                    this.bahanTerpilih = [];
                    this.statusHasil = '';
                },

                mulaiGame() {
                    if (this.$refs.videoTutorial) this.$refs.videoTutorial.pause();
                    this.putarSfx(this.sfxTap);
                    if(window.playBgm) window.playBgm();
                    this.setupBahan();
                    this.tahapGame = 'main';
                },

                pilihBahan(item) {
                    if (this.bahanTerpilih.length < 4) {
                        this.putarSfx(this.sfxTap); 
                        this.bahanTersedia = this.bahanTersedia.filter(i => i.id !== item.id);
                        this.bahanTerpilih.push(item);
                        if (this.bahanTerpilih.length === 4) setTimeout(() => this.cekJawaban(), 400);
                    }
                },

                hapusBahan(item) {
                    this.putarSfx(this.sfxDrop); 
                    this.bahanTerpilih = this.bahanTerpilih.filter(i => i.id !== item.id);
                    this.bahanTersedia.push(item);
                },

                cekJawaban() {
                    if(window.pauseBgm) window.pauseBgm();
                    let gagal = this.bahanTerpilih.some(item => !item.isBenar);
                    if (gagal) {
                        this.statusHasil = 'kalah';
                        this.putarSfx(this.sfxLose);
                    } else {
                        this.statusHasil = 'menang';
                        this.putarSfx(this.sfxWin);
                    }
                    this.tahapGame = 'hasil';
                },

                resetGame() { 
                    this.putarSfx(this.sfxTap);
                    if(window.playBgm) window.playBgm();
                    this.setupBahan();
                    this.tahapGame = 'main';
                },

                btnSelesai() {
                    this.putarSfx(this.sfxTap);
                    if(typeof window.selesaiMateri === "function") window.selesaiMateri(4);
                }
            }));
        });
    </script>
</x-layout>