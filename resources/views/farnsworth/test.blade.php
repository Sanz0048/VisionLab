<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FM-100 Hue Test – VisionLab</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --danger: #ef4444;
            --danger-dark: #dc2626;
            --text-dark: #1f2937;
            --bg-body: url('/images/splatt.png');
            --bg-card: greenyellow;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-image: var(--bg-body);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: #ffffff;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        header {
            background: rgba(173, 255, 47, 0.9);
            backdrop-filter: blur(8px);
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary);
            text-decoration: none;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 10px;
        }

        .wrap {
            max-width: 1100px;
            width: 100%;
            background: var(--bg-card);
            border-radius: 30px;
            padding: 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .test-header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0;
            font-size: 1.4rem;
        }

        .lead {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 10px;
        }

        /* GRID SYSTEM */
        #testArea {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .row-container {
            background: rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            padding: 15px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .row {
            display: flex;
            gap: 6px;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        /* UKURAN KOTAK BESAR */
        .anchor,
        .slot {
            width: 55px;
            height: 55px;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .anchor {
            border: 4px solid #1f2937;
        }

        .slot {
            border: 2px dashed rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.3);
        }

        .tile {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            cursor: grab;
            border: 1px solid rgba(0, 0, 0, .1);
            position: relative;
            z-index: 10;
            touch-action: none;
        }

        .tray-row {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            padding: 10px;
            min-height: 65px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
        }

        /* RESPONSIVE HP */
        @media (max-width: 992px) {
            #testArea {
                grid-template-columns: 1fr;
            }

            .row-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .row {
                justify-content: flex-start;
                min-width: 500px;
                padding-bottom: 10px;
            }
        }

        @media (max-width: 480px) {

            .anchor,
            .slot {
                width: 45px;
                height: 45px;
            }

            .tile {
                width: 38px;
                height: 38px;
            }
        }

        .controls {
            margin-top: 25px;
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }

        button,
        .btn-link {
            padding: 12px 20px;
            border-radius: 50px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            transition: 0.2s;
        }

        button:active {
            transform: scale(0.95);
        }

        .primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-home {
            background: var(--danger);
            color: #fff;
        }

        .secondary {
            background: rgba(255, 255, 255, 0.8);
            color: var(--text-dark);
        }

        .result {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 20px;
            text-align: center;
            border: 3px solid var(--primary);
        }

        .dragging {
            opacity: 0.6;
            transform: scale(1.4);
            z-index: 1000 !important;
            pointer-events: none;
            position: fixed !important;
        }

        footer {
            background: rgba(173, 255, 47, 0.9);
            padding: 1rem;
            text-align: center;
            font-size: 0.75rem;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <header>
        <a href="{{ route('welcomelogin') }}" class="logo">VisionLab</a>
        <div style="display:flex; gap:10px; align-items:center;">
            <a href="{{ route('riwayat') }}" class="btn-link secondary" style="padding: 8px 14px;">Riwayat</a>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" style="background: var(--danger); color:white; padding: 8px 14px; border-radius: 50px; border:none; font-weight:700;">Logout</button>
            </form>
        </div>
    </header>

    <main>
        <div class="wrap">
            <div class="test-header">
                <h1>Uji Gradasi Warna</h1>
                <p class="lead">Susun kotak warna agar membentuk gradasi yang mulus.</p>
            </div>

            <section id="testArea"></section>

            <div class="controls">
                <a href="{{ route('welcomelogin') }}" class="btn-link btn-home">Kembali</a>
                <button id="checkBtn" class="primary">Selesai & Simpan</button>
                <button id="resetBtn" class="secondary">Acak</button>
                <button id="solveBtn" class="secondary">Bantuan</button>
            </div>

            <div id="result" class="result"></div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 VisionLab. Gunakan kecerahan layar 100%.</p>
    </footer>

    <script>
        const ROWS_COUNT = 4;
        const TILES_PER_ROW = 6;
        const testArea = document.getElementById('testArea');
        const resultDiv = document.getElementById('result');

        let activeTile = null;
        let startParent = null;

        function getFMColor(index) {
            const total = ROWS_COUNT * (TILES_PER_ROW + 2);
            return `hsl(${(index * (360 / total))}, 60%, 50%)`;
        }

        function buildTest() {
            testArea.innerHTML = '';
            resultDiv.style.display = 'none';

            for (let r = 0; r < ROWS_COUNT; r++) {
                const container = document.createElement('div');
                container.className = 'row-container';
                const mainRow = document.createElement('div');
                mainRow.className = 'row';
                mainRow.dataset.row = r;
                const trayRow = document.createElement('div');
                trayRow.className = 'row tray-row';
                trayRow.dataset.row = r;

                const startIdx = r * (TILES_PER_ROW + 2);
                const endIdx = startIdx + (TILES_PER_ROW + 1);

                mainRow.appendChild(createBox('anchor', getFMColor(startIdx)));

                let tilesData = [];
                for (let i = 1; i <= TILES_PER_ROW; i++) {
                    const id = startIdx + i;
                    const slot = document.createElement('div');
                    slot.className = 'slot';
                    slot.dataset.correctId = id;
                    slot.dataset.row = r;
                    mainRow.appendChild(slot);
                    tilesData.push({
                        id,
                        color: getFMColor(id),
                        row: r
                    });
                }
                mainRow.appendChild(createBox('anchor', getFMColor(endIdx)));

                tilesData.sort(() => Math.random() - 0.5).forEach(data => {
                    const tile = createBox('tile', data.color);
                    tile.dataset.id = data.id;
                    tile.dataset.row = data.row;
                    addDragListeners(tile);
                    trayRow.appendChild(tile);
                });

                container.appendChild(mainRow);
                container.appendChild(trayRow);
                testArea.appendChild(container);
            }
        }

        function createBox(cls, bg) {
            const div = document.createElement('div');
            div.className = cls;
            div.style.background = bg;
            return div;
        }

        function addDragListeners(tile) {
            tile.addEventListener('touchstart', (e) => {
                activeTile = tile;
                startParent = tile.parentElement;
                tile.classList.add('dragging');
                const touch = e.touches[0];
                updatePos(touch.clientX, touch.clientY);
            }, {
                passive: false
            });

            tile.addEventListener('touchmove', (e) => {
                if (!activeTile) return;
                const touch = e.touches[0];
                updatePos(touch.clientX, touch.clientY);
                e.preventDefault();
            }, {
                passive: false
            });

            tile.addEventListener('touchend', (e) => {
                if (!activeTile) return;
                tile.classList.remove('dragging');
                activeTile.style.left = '';
                activeTile.style.top = '';
                const touch = e.changedTouches[0];
                const targetEl = document.elementFromPoint(touch.clientX, touch.clientY);
                const target = targetEl ? targetEl.closest('.slot, .tray-row') : null;
                handlePlacement(activeTile, target);
                activeTile = null;
            });

            tile.draggable = true;
            tile.addEventListener('dragstart', (e) => {
                activeTile = tile;
                startParent = tile.parentElement;
                setTimeout(() => tile.style.opacity = "0.3", 0);
            });
            tile.addEventListener('dragend', () => tile.style.opacity = "1");
        }

        function updatePos(x, y) {
            if (activeTile) {
                activeTile.style.left = (x - 25) + 'px';
                activeTile.style.top = (y - 25) + 'px';
            }
        }

        document.addEventListener('dragover', (e) => e.preventDefault());
        document.addEventListener('drop', (e) => {
            const target = e.target.closest('.slot, .tray-row');
            if (activeTile) handlePlacement(activeTile, target);
        });

        function handlePlacement(tile, target) {
            if (!tile || !target) return;
            if (target.dataset.row !== tile.dataset.row) return;
            if (target.classList.contains('slot')) {
                if (target.firstChild) startParent.appendChild(target.firstChild);
                target.appendChild(tile);
            } else {
                target.appendChild(tile);
            }
        }

        document.getElementById('resetBtn').onclick = buildTest;
        document.getElementById('solveBtn').onclick = () => {
            document.querySelectorAll('.slot').forEach(slot => {
                const correct = document.querySelector(`.tile[data-id='${slot.dataset.correctId}']`);
                if (correct) slot.appendChild(correct);
            });
        };

        document.getElementById('checkBtn').onclick = function() {
            let score = 0;
            document.querySelectorAll('.slot').forEach(slot => {
                if (slot.firstChild) {
                    score += Math.abs(parseInt(slot.firstChild.dataset.id) - parseInt(slot.dataset.correctId));
                } else {
                    score += 20;
                }
            });

            this.innerText = "Menyimpan...";
            this.disabled = true;

            fetch("{{ route('farnsworth.save') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        skor: score
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        let warnaKategori = score <= 15 ? '#10b981' : score <= 30 ? '#f59e0b' : '#ef4444';

                        resultDiv.style.display = 'block';
                        resultDiv.innerHTML = `
                        <h2 style="margin-bottom: 5px;">Skor: ${data.skor}</h2>
                        <p style="font-size: 1.4rem; font-weight: 800; color: ${warnaKategori}; margin-bottom:15px;">Kategori: ${data.kategori}</p>
                        
                        <div style="text-align: left; background: #f3f4f6; padding: 15px; border-radius: 15px; font-size: 0.85rem; line-height: 1.5;">
                            <strong>Panduan Skor:</strong>
                            <ul style="margin-top: 5px; padding-left: 20px;">
                                <li><strong>0 - 15:</strong> Normal / Sangat Baik</li>
                                <li><strong>16 - 30:</strong> Defisiensi Ringan</li>
                                <li><strong>31 - 60:</strong> Defisiensi Sedang</li>
                                <li><strong>> 60:</strong> Defisiensi Berat</li>
                            </ul>
                        </div>
                        <p style="font-size: 0.75rem; opacity: 0.7; margin-top: 10px;">Data berhasil disimpan ke riwayat.</p>
                    `;
                        resultDiv.scrollIntoView({
                            behavior: 'smooth'
                        });
                    } else {
                        alert("Gagal: " + data.message);
                    }
                })
                .catch(() => alert("Terjadi kesalahan sistem."))
                .finally(() => {
                    this.innerText = "Selesai & Simpan";
                    this.disabled = false;
                });
        };

        buildTest();
    </script>
</body>

</html>