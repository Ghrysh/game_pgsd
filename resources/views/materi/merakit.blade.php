<x-layout>
    <a href="/kincir-air-interaktif/peta" class="absolute top-6 left-6 z-50 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
    </a>

    <main class="flex-1 overflow-y-auto relative z-10 p-6 pt-24" x-data="kumpulkanKarya()">
        
        <div x-show="tahap === 'video'" class="bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-2xl border-4 border-white w-full">
            <h3 class="font-black text-xl text-center mb-4 text-orange-600">Mulai rakit kincir airmu!</h3>
            
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
            
            <input type="file" x-ref="inputKamera" accept="image/*" capture="environment" class="hidden" @change="handleFoto($event)">
            
            <button @click="bukaKamera()" class="w-full bg-orange-500 text-white font-black py-4 rounded-full shadow-[0_5px_0_#c2410c] hover:translate-y-1 mt-4 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Kumpulkan Hasil Karyamu</span>
            </button>
        </div>

        <div x-show="tahap === 'loading'" style="display: none;" class="flex flex-col items-center justify-center h-full text-white">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-white mb-4"></div>
            <p class="font-black text-xl italic">Menilai Karyamu...</p>
        </div>

        <div x-show="tahap === 'hasil'" style="display: none;" class="w-full flex flex-col items-center">
            <div class="bg-white rounded-3xl p-4 shadow-2xl border-4 border-white w-full overflow-hidden mb-6">
                <div class="relative aspect-square rounded-2xl overflow-hidden bg-gray-100 border-2 border-gray-200">
                    <img :src="fotoUrl" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-yellow-400 border-4 border-white text-orange-950 px-4 py-2 rounded-2xl shadow-xl transform rotate-12">
                        <p class="text-[10px] font-black uppercase text-center leading-none">Hasil Karya</p>
                        <p class="text-xl font-black text-center mt-1" x-text="predikat"></p>
                    </div>
                </div>
            </div>

            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-white title-stroke tracking-tighter" x-text="pesanPujian"></h2>
                <p class="text-blue-100 font-bold mt-1">Kincir buatanmu sangat hebat!</p>
            </div>

            <button @click="selesaiPetualangan()" class="w-full bg-green-500 text-white font-black py-5 rounded-full shadow-[0_6px_0_#166534] hover:translate-y-1 transition-all border-2 border-white/30 text-xl uppercase tracking-widest">
                Petualangan Selesai
            </button>
            
            <button @click="tahap = 'video'" class="mt-4 text-white/70 font-bold text-sm underline">Foto Ulang</button>
        </div>

    </main>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('kumpulkanKarya', () => ({
                tahap: 'video',
                playing: false,
                fotoUrl: '',
                
                // Variabel yang baru diubah menjadi teks
                predikat: '', 
                daftarPredikat: ['KEREN!', 'BAGUS!', 'MANTAP!', 'JUARA!', 'TOP!'],
                
                pesanPujian: '',
                pujianPilihan: ['LUAR BIASA!', 'HEBAT SEKALI!', 'KARYA INDAH!', 'KAMU HEBAT!', 'KARYA KEREN!'],

                // SFX
                sfxTap: new Audio('{{ asset("audios/tap.mp3") }}'),
                sfxWin: new Audio('{{ asset("audios/win.mp3") }}'),
                sfxShutter: new Audio('https://assets.mixkit.co/active_storage/sfx/710/710-preview.mp3'),

                init() {
                    if(typeof window.setBgm === 'function') window.setBgm(2);
                },

                bukaKamera() {
                    this.sfxTap.play().catch(e => {});
                    if (this.$refs.videoTutorial) this.$refs.videoTutorial.pause();
                    this.$refs.inputKamera.click();
                },

                handleFoto(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.tahap = 'loading';
                        this.sfxShutter.play().catch(e => {});
                        
                        this.fotoUrl = URL.createObjectURL(file);
                        
                        // Memilih predikat acak menggantikan angka 90-99
                        this.predikat = this.daftarPredikat[Math.floor(Math.random() * this.daftarPredikat.length)];
                        
                        this.pesanPujian = this.pujianPilihan[Math.floor(Math.random() * this.pujianPilihan.length)];

                        setTimeout(() => {
                            if(window.pauseBgm) window.pauseBgm();
                            this.sfxWin.play().catch(e => {});
                            this.tahap = 'hasil';
                        }, 1500);
                    }
                },

                selesaiPetualangan() {
                    this.sfxTap.play().catch(e => {});
                    if(typeof window.selesaiMateri === "function") {
                        window.selesaiMateri(4); 
                    } else {
                        window.location.href = "{{ url('peta') }}";
                    }
                }
            }));
        });
    </script>
</x-layout>