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

    <audio id="global-bgm" loop src="{{ asset('audios/bgm.ogg') }}"></audio>

    <script>
        // Setup BGM
        window.bgm = document.getElementById('global-bgm');
        if(window.bgm) window.bgm.volume = 0.2; // Volume dikecilkan (20%) agar tidak menutupi suara materi

        window.playBgm = function() {
            if(window.bgm && window.bgm.paused) {
                window.bgm.play().catch(e => console.log('Menunggu interaksi user untuk BGM'));
            }
        };

        window.pauseBgm = function() {
            if(window.bgm) window.bgm.pause();
        };

        // BGM otomatis menyala saat user pertama kali menyentuh layar manapun
        document.body.addEventListener('click', () => {
            playBgm();
        }, { once: true });

        // Fungsi Suara Materi (Text-to-Speech manual dengan OGG/MP3)
        window.bacakan = function(teks) {
            if ('speechSynthesis' in window) {
                window.speechSynthesis.cancel();
                const suara = new SpeechSynthesisUtterance(teks);
                suara.lang = 'id-ID';
                suara.rate = 0.85; 
                
                // Matikan BGM saat suara materi jalan
                pauseBgm();
                suara.onend = function() { playBgm(); }; // Nyalakan lagi BGM setelah materi selesai dibaca
                
                window.speechSynthesis.speak(suara);
            }
        };

        // Fungsi Simpan Level
        window.selesaiMateri = function(levelLulus) {
            let levelTerbuka = parseInt(localStorage.getItem('kincir_level')) || 1;
            if(levelTerbuka === levelLulus && levelTerbuka < 4) {
                localStorage.setItem('kincir_level', levelLulus + 1);
            }
            window.location.href = '/peta';
        };
    </script>
</body>
</html>