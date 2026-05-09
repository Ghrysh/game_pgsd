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
<body class="bg-gray-900 font-sans text-gray-800 antialiased flex justify-center h-screen overflow-hidden">
    
    <div class="w-full max-w-[420px] bg-gradient-to-b from-blue-600 to-blue-900 h-full relative shadow-2xl overflow-hidden flex flex-col">
        <div class="absolute inset-0 blueprint-grid pointer-events-none opacity-60 z-0"></div>
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
            // 1. Unlock Audio Browser (Jika bgm harusnya nyala tapi terblokir)
            if (window.bgmStatus === 'play' && window.activeBgm && window.activeBgm.paused) {
                window.activeBgm.play().catch(err => {});
            }

            // 2. Tiap Klik Button ada suara Tap
            const isButton = e.target.closest('button') || e.target.closest('a');
            if (isButton) {
                const tap = document.getElementById('sfx-tap');
                if(tap) {
                    tap.currentTime = 0;
                    tap.play().catch(err => {});
                }
            }
        });

        // Global Selesai Level
        window.selesaiMateri = function(levelLulus) {
            let levelTerbuka = parseInt(localStorage.getItem('kincir_level')) || 1;
            if(levelTerbuka === levelLulus && levelTerbuka < 5) {
                localStorage.setItem('kincir_level', levelLulus + 1);
            }
            window.location.href = '/peta';
        };
    </script>
</body>
</html>