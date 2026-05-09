<x-layout>
    <audio id="sains-snd-1" src="{{ asset('audios/sains_1.ogg') }}"></audio>

    <script>
        // Fungsi untuk menghentikan paksa suara materi sains jika user keluar halaman
        function forceStopSains() {
            let s1 = document.getElementById('sains-snd-1');
            if (s1) { s1.pause(); s1.currentTime = 0; }
        }
    </script>

    <a href="/peta" onclick="forceStopSains(); if(window.playBgm) window.playBgm();" class="absolute top-6 left-6 z-50 bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <main class="absolute inset-0 z-0 bg-black flex flex-col justify-center items-center overflow-hidden"
          x-data="{
              played: false,
              showSelesai: false, 
              init() {
                  // 1. Set BGM ke BGM 2
                  if(typeof window.setBgm === 'function') window.setBgm(2);
                  
                  // 2. Atur Volume Audio agar kecil (0.4)
                  let s1 = document.getElementById('sains-snd-1');
                  if(s1) s1.volume = 0.4;

                  // 3. Mulai putar suara otomatis
                  setTimeout(() => { this.playSequence(); }, 800);
              },
              playSequence() {
                  if (this.played) return;
                  this.played = true;

                  if(typeof window.pauseBgm === 'function') window.pauseBgm();
                  
                  let s1 = document.getElementById('sains-snd-1');
                  
                  if (s1) {
                      let playPromise = s1.play();
                      if (playPromise !== undefined) {
                          playPromise.catch(e => {
                              console.log('Autoplay dicegah browser, butuh interaksi tap.');
                              this.played = false; 
                          });
                      }
                      
                      // Saat audio SELESAI, nyalakan BGM dan munculkan Tombol
                      s1.onended = () => {
                          if(typeof window.playBgm === 'function') window.playBgm();
                          this.showSelesai = true; 
                      };
                  }
              }
          }"
          @click="!played ? playSequence() : null"
    >
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

        <button x-show="showSelesai" 
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                onclick="forceStopSains(); selesaiMateri(3)" 
                class="absolute bottom-10 z-20 bg-green-500 text-white font-black px-10 py-4 rounded-full shadow-[0_6px_0_#166534] hover:translate-y-1 hover:shadow-none transition-all border-2 border-white text-xl">
            Misi Selesai
        </button>
    </main>
</x-layout>