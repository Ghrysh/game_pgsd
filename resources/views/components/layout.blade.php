<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Kincir Pintar Untuk Desa</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Nunito', 'sans-serif'] },
                    animation: { 'bounce-short': 'bounce 0.5s ease-in-out 1' }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <style>
        body { overscroll-behavior-y: none; }
        .title-stroke {
            -webkit-text-stroke: 2px #5e4125;
            color: #fff8db;
            text-shadow: 0 4px 4px rgba(0,0,0,0.4);
        }
        .blueprint-grid {
            background-size: 30px 30px;
            background-image:
              linear-gradient(to right, rgba(255, 255, 255, 0.15) 1px, transparent 1px),
              linear-gradient(to bottom, rgba(255, 255, 255, 0.15) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-gray-900 font-sans text-gray-800 antialiased flex justify-center h-[100dvh] overflow-hidden">
    
    <div class="w-full max-w-[420px] bg-gradient-to-b from-blue-600 to-blue-900 h-full relative shadow-2xl overflow-hidden flex flex-col">
        <div class="absolute inset-0 blueprint-grid pointer-events-none opacity-60 z-0"></div>
        
        <button id="btn-force-audio" onclick="window.forcePlayAudio()" class="absolute top-6 right-6 z-[100] bg-white/20 backdrop-blur-md p-3 rounded-full hover:bg-white/40 transition border-2 border-white/50 shadow-lg flex items-center justify-center animate-pulse" title="Klik untuk menyalakan suara">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5 10v4a2 2 0 002 2h2.586l3.707 3.707A.996.996 0 0014 19V5a.996.996 0 00-1.707-.707L9.586 8H7a2 2 0 00-2 2z" />
            </svg>
        </button>
        {{ $slot }}
    </div>

    <audio id="global-bgm1" loop src="{{ asset('audios/bgm.mp3') }}"></audio>
    <audio id="global-bgm2" loop src="{{ asset('audios/bgm2.mp3') }}"></audio>
    <audio id="sfx-tap" src="{{ asset('audios/tap.mp3') }}"></audio>

    <script>
        window.activeBgm = null;
        window.bgmStatus = 'stop'; 

        // Fungsi Pilih BGM (1 atau 2)
        window.setBgm = function(num) {
            const bgm1 = document.getElementById('global-bgm1');
            const bgm2 = document.getElementById('global-bgm2');
            
            // Matikan semua dulu
            bgm1.pause();
            bgm2.pause();

            window.activeBgm = (num === 1) ? bgm1 : bgm2;
            window.activeBgm.volume = 0.2; // Volume background santai
            window.bgmStatus = 'play';
            window.playBgm();
        };

        window.playBgm = function() {
            if(window.activeBgm && window.bgmStatus === 'play') {
                window.activeBgm.play().catch(e => {
                    console.log("Autoplay diblokir browser. Menunggu klik pertama...");
                });
            }
        };

        window.pauseBgm = function() {
            if(window.activeBgm) window.activeBgm.pause();
        };

        // GLOBAL CLICK HANDLER (Untuk Sound Effect & Unlock Autoplay)
        document.addEventListener('click', function(e) {
            // 1. Unlock Audio Browser
            if (window.bgmStatus === 'play' && window.activeBgm && window.activeBgm.paused) {
                window.activeBgm.play().catch(err => {});
            }

            // 2. Tiap Klik Button ada suara Tap
            const isButton = e.target.closest('button') || e.target.closest('a');
            if (isButton && e.target.id !== 'btn-force-audio') {
                const tap = document.getElementById('sfx-tap');
                if(tap) {
                    tap.currentTime = 0;
                    tap.play().catch(err => {});
                }
            }
        });

        // FUNGSI KHUSUS TOMBOL FLOATING (FORCE PLAY ALL)
        window.forcePlayAudio = function() {
            // 1. Paksa mainkan BGM
            window.bgmStatus = 'play';
            window.playBgm();

            // 2. Cari semua tag audio di halaman dan coba "sentuh" agar terbuka kuncinya
            const allAudios = document.querySelectorAll('audio');
            allAudios.forEach(audio => {
                // Kita coba play & pause instan untuk unlock tanpa merusak urutan
                if (audio.paused) {
                    audio.play().then(() => {
                        // Jika bukan BGM, kita pause lagi, nanti halaman materi yang atur
                        if (!audio.id.includes('global-bgm')) {
                            audio.pause();
                        }
                    }).catch(e => {});
                }
            });

            // 3. JEMBATAN: Panggil fungsi retry dari halaman materi (caritahu, budaya, dll)
            if (typeof window.retrySuara === 'function') {
                window.retrySuara();
            }
            
            // 4. Hilangkan animasi pulse
            const btn = document.getElementById('btn-force-audio');
            if(btn) btn.classList.remove('animate-pulse');
        };

        // Global Selesai Level
        window.selesaiMateri = function(levelLulus) {
            let levelTerbuka = parseInt(localStorage.getItem('kincir_level')) || 1;
            if(levelTerbuka === levelLulus && levelTerbuka < 5) {
                localStorage.setItem('kincir_level', levelLulus + 1);
            }
            window.location.href = "/kincir-air-interaktif/peta";
        };
    </script>
</body>
</html>