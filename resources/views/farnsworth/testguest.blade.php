<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Uji Gradasi Warna – VisionLab</title>
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
            touch-action: none;
        }

        /* Mencegah scroll saat drag di HP */

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
            max-width: 800px;
            width: 100%;
            background: var(--bg-card);
            border-radius: 30px;
            padding: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .test-header {
            text-align: center;
            margin-bottom: 20px;
            touch-action: auto;
        }

        h1 {
            margin: 0;
            font-size: 1.4rem;
        }

        .lead {
            font-size: 0.85rem;
            opacity: 0.8;
            touch-action: auto;
        }

        .board {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            padding: 15px;
        }

        .row-container {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
        }

        .row {
            display: flex;
            gap: 5px;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        .anchor {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            border: 3px solid #1f2937;
            flex-shrink: 0;
        }

        .slot {
            width: 40px;
            height: 40px;
            border: 2px dashed rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.3);
        }

        .tile {
            width: 34px;
            height: 34px;
            border-radius: 6px;
            cursor: grab;
            border: 1px solid rgba(0, 0, 0, .1);
            position: relative;
            z-index: 10;
        }

        /* Tray area (tempat kotak acak) */
        .tray-row {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
            padding: 10px;
            min-height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .controls {
            margin-top: 20px;
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
            touch-action: auto;
        }

        button,
        .btn-link {
            padding: 12px 20px;
            border-radius: 50px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            touch-action: auto;
        }

        .primary {
            background: var(--primary);
            color: #fff;
        }

        .danger {
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
            touch-action: auto;
        }

        footer {
            background: rgba(173, 255, 47, 0.9);
            padding: 1rem;
            text-align: center;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Class saat menyeret di HP */
        .dragging {
            opacity: 0.5;
            transform: scale(1.2);
            z-index: 1000 !important;
            pointer-events: none;
            position: fixed !important;
        }
    </style>
</head>

<body>

    <header>
        <a href="{{ route('home') }}" class="logo">VisionLab</a>
        <div style="font-weight: 700; font-size: 0.7rem; color: var(--text-dark); background: rgba(255,255,255,0.5); padding: 5px 12px; border-radius: 20px;">Mode Tamu</div>
    </header>

    <main>
        <div class="wrap">
            <div class="test-header">
                <h1>Uji Gradasi Warna</h1>
                <p class="lead">Sentuh dan geser kotak warna ke kotak putus-putus.</p>
            </div>

            <section class="board">
                <div id="testArea"></div>
            </section>

            <div class="controls">
                <a href="{{ route('home') }}" class="btn-link danger">Beranda</a>
                <button id="checkBtn" class="primary">Selesai</button>
                <button id="resetBtn" class="secondary">Acak</button>
                <button id="solveBtn" class="secondary">Bantuan</button>
            </div>

            <div id="result" class="result"></div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 VisionLab. Disarankan kecerahan layar 100%.</p>
    </footer>

    <script>
        const ROWS_COUNT = 4;
        const TILES_PER_ROW = 8;
        const testArea = document.getElementById('testArea');
        const resultDiv = document.getElementById('result');

        let activeTile = null;
        let startParent = null;

        function getFMColor(index) {
            const total = ROWS_COUNT * (TILES_PER_ROW + 2);
            return `hsl(${(index * (360 / total))}, 55%, 55%)`;
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

                // Anchors
                const leftA = createBox('anchor', getFMColor(startIdx));
                const rightA = createBox('anchor', getFMColor(endIdx));

                mainRow.appendChild(leftA);
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
                mainRow.appendChild(rightA);

                // Shuffled Tiles
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

        // Logic Drag & Drop Hybrid (Mouse & Touch)
        function addDragListeners(tile) {
            // Touch Events (HP)
            tile.addEventListener('touchstart', (e) => {
                activeTile = tile;
                startParent = tile.parentElement;
                tile.classList.add('dragging');
            }, {
                passive: false
            });

            tile.addEventListener('touchmove', (e) => {
                if (!activeTile) return;
                const touch = e.touches[0];
                activeTile.style.left = touch.clientX - 17 + 'px';
                activeTile.style.top = touch.clientY - 17 + 'px';
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
                const slot = targetEl ? targetEl.closest('.slot, .tray-row') : null;

                handlePlacement(activeTile, slot);
                activeTile = null;
            });

            // Mouse Events (PC)
            tile.draggable = true;
            tile.addEventListener('dragstart', () => {
                activeTile = tile;
                startParent = tile.parentElement;
                setTimeout(() => tile.style.opacity = "0.3", 0);
            });
            tile.addEventListener('dragend', () => {
                tile.style.opacity = "1";
            });
        }

        // Drop logic untuk PC
        document.addEventListener('dragover', (e) => e.preventDefault());
        document.addEventListener('drop', (e) => {
            const slot = e.target.closest('.slot, .tray-row');
            handlePlacement(activeTile, slot);
        });

        function handlePlacement(tile, target) {
            if (!tile || !target) return;

            // Validasi baris (Hanya boleh drop di baris yang sama)
            if (target.dataset.row !== tile.dataset.row) return;

            if (target.classList.contains('slot')) {
                if (target.firstChild) {
                    // Tukar posisi jika slot sudah ada isinya
                    startParent.appendChild(target.firstChild);
                }
                target.appendChild(tile);
            } else if (target.classList.contains('tray-row')) {
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

        document.getElementById('checkBtn').onclick = () => {
            let score = 0;
            document.querySelectorAll('.slot').forEach(slot => {
                if (slot.firstChild) {
                    score += Math.abs(parseInt(slot.firstChild.dataset.id) - parseInt(slot.dataset.correctId));
                } else {
                    score += 20;
                }
            });
            resultDiv.style.display = 'block';
            resultDiv.innerHTML = `<h2>Skor: ${score}</h2><p>${score <= 10 ? 'Normal' : 'Buta Warna Ringan/Berat'}</p>`;
            resultDiv.scrollIntoView({
                behavior: 'smooth'
            });
        };

        buildTest();
    </script>
</body>

</html>