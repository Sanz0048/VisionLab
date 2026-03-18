<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FM-100 Hue Test (8-Slots) – VisionLab</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

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
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #ffffff;
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            padding: 30px 15px;
        }

        .wrap {
            max-width: 700px;
            /* Dipersempit agar 8 kotak terlihat proporsional */
            width: 100%;
            background: var(--bg-card);
            border-radius: 30px;
            padding: 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .test-header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0;
            font-size: 1.6rem;
            font-weight: 800;
        }

        .lead {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-top: 5px;
        }

        .board {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            padding: 20px;
        }

        .row-container {
            margin-bottom: 25px;
        }

        .row-title {
            font-weight: 800;
            font-size: 0.75rem;
            margin-bottom: 10px;
            opacity: 0.6;
            text-transform: uppercase;
        }

        .row {
            display: flex;
            gap: 8px;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        /* Ukuran kotak diperbesar karena jumlahnya lebih sedikit */
        .anchor {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            border: 4px solid #1f2937;
            flex-shrink: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .slot {
            width: 48px;
            height: 48px;
            border: 2px dashed rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
        }

        .tile {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            cursor: grab;
            border: 1px solid rgba(0, 0, 0, .1);
            transition: transform 0.2s, box-shadow 0.2s;
            touch-action: none;
            /* Penting untuk mobile drag */
        }

        .tile:active {
            cursor: grabbing;
            transform: scale(1.15);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
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
            padding: 10px 20px;
            border-radius: 50px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            font-size: 13px;
        }

        .primary {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
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
            animation: fadeIn 0.4s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        footer {
            background: rgba(173, 255, 47, 0.9);
            padding: 1.2rem;
            text-align: center;
            font-size: 0.8rem;
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
                <button type="submit" style="background: var(--danger); color:white; padding: 8px 14px; border-radius: 50px;">Logout</button>
            </form>
        </div>
    </header>

    <main>
        <div class="wrap">
            <div class="test-header">
                <h1>Uji Gradasi Warna</h1>
                <p class="lead">Susun 8 kotak per baris sesuai urutan warna yang benar.</p>
            </div>

            <section class="board">
                <div id="testArea"></div>
            </section>

            <div class="controls">
                <a href="{{ route('welcomelogin') }}" class="btn-link btn-home">Beranda</a>
                <button id="checkBtn" class="primary">Selesai & Periksa</button>
                <button id="resetBtn" class="secondary">Acak</button>
                <button id="solveBtn" class="secondary">Jawaban</button>
            </div>

            <div id="result" class="result"></div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 VisionLab. Gunakan kecerahan layar 100%.</p>
    </footer>

    <script>
        const ROWS_COUNT = 4;
        const TILES_PER_ROW = 8; // Sesuai permintaan: 8 kotak yang bisa dipindah

        const testArea = document.getElementById('testArea');
        const resultDiv = document.getElementById('result');
        let draggedTile = null;

        // Total warna = Baris * (8 slot + 2 anchor) = 40 warna unik
        const TOTAL_STEPS = ROWS_COUNT * (TILES_PER_ROW + 2);

        function getFMColor(index) {
            const hue = (index * (360 / TOTAL_STEPS));
            // Menggunakan saturasi dan lightness standar FM-100
            return `hsl(${hue}, 48%, 58%)`;
        }

        function shuffle(arr) {
            for (let i = arr.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [arr[i], arr[j]] = [arr[j], arr[i]];
            }
            return arr;
        }

        function buildTest() {
            testArea.innerHTML = '';
            resultDiv.style.display = 'none';

            for (let r = 0; r < ROWS_COUNT; r++) {
                const container = document.createElement('div');
                container.className = 'row-container';

                const mainRow = document.createElement('div');
                mainRow.className = 'row';

                const trayRow = document.createElement('div');
                trayRow.className = 'row';

                // Indeks global untuk warna
                const startIdx = r * (TILES_PER_ROW + 2);
                const endIdx = startIdx + (TILES_PER_ROW + 1);

                // 1. Anchor Kiri
                const leftAnchor = document.createElement('div');
                leftAnchor.className = 'anchor';
                leftAnchor.style.background = getFMColor(startIdx);
                mainRow.appendChild(leftAnchor);

                // 2. Siapkan Data Tile (Warna tengah yang akan diacak)
                let rowData = [];
                for (let i = 1; i <= TILES_PER_ROW; i++) {
                    const currentHueIdx = startIdx + i;

                    // Buat Slot kosong
                    const slot = document.createElement('div');
                    slot.className = 'slot';
                    slot.dataset.correctId = currentHueIdx;
                    slot.dataset.row = r;
                    slot.ondragover = e => e.preventDefault();
                    slot.ondrop = handleDrop;
                    mainRow.appendChild(slot);

                    // Simpan data warna untuk tile
                    rowData.push({
                        id: currentHueIdx,
                        color: getFMColor(currentHueIdx),
                        row: r
                    });
                }

                // 3. Anchor Kanan
                const rightAnchor = document.createElement('div');
                rightAnchor.className = 'anchor';
                rightAnchor.style.background = getFMColor(endIdx);
                mainRow.appendChild(rightAnchor);

                // 4. Acak Tile dan masukkan ke baris bawahnya (Tray)
                shuffle(rowData).forEach(data => {
                    const tile = document.createElement('div');
                    tile.className = 'tile';
                    tile.draggable = true;
                    tile.dataset.id = data.id;
                    tile.dataset.row = data.row;
                    tile.style.background = data.color;
                    tile.ondragstart = () => {
                        draggedTile = tile;
                        tile.style.opacity = "0.4";
                    };
                    tile.ondragend = () => {
                        draggedTile = null;
                        tile.style.opacity = "1";
                    };
                    trayRow.appendChild(tile);
                });

                container.appendChild(mainRow);
                container.appendChild(trayRow);
                testArea.appendChild(container);
            }
        }

        function handleDrop(e) {
            e.preventDefault();
            // Validasi: hanya bisa drop jika barisnya sama
            if (!draggedTile || draggedTile.dataset.row !== this.dataset.row) return;

            if (this.firstChild) {
                const target = this.firstChild;
                const origin = draggedTile.parentElement;
                this.appendChild(draggedTile);
                origin.appendChild(target);
            } else {
                this.appendChild(draggedTile);
            }
        }

        document.getElementById('solveBtn').onclick = () => {
            document.querySelectorAll('.slot').forEach(slot => {
                const correctTile = document.querySelector(`.tile[data-id='${slot.dataset.correctId}']`);
                if (correctTile) slot.appendChild(correctTile);
            });
        };

        document.getElementById('resetBtn').onclick = buildTest;

        document.getElementById('checkBtn').onclick = function() {
            let score = 0;
            const slots = document.querySelectorAll('.slot');

            slots.forEach(slot => {
                if (!slot.firstChild) {
                    score += 20;
                } else {
                    const placedId = parseInt(slot.firstChild.dataset.id);
                    const correctId = parseInt(slot.dataset.correctId);
                    score += Math.abs(placedId - correctId);
                }
            });

            // Indikator loading sederhana
            this.innerText = "Menyimpan...";
            this.disabled = true;

            fetch("{{ route('farnsworth.save') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json", // Penting agar error terbaca sebagai JSON
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        skor: score
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        resultDiv.style.display = 'block';
                        resultDiv.innerHTML = `
                <h2 style="margin:0; color:var(--primary); font-size: 2rem;">Skor: ${data.skor}</h2>
                <p style="margin:5px 0; font-weight:700;">Kategori: ${data.kategori}</p>
                <p style="font-size:0.8rem; color:#6b7280;">Data berhasil disimpan ke riwayat.</p>
            `;
                        resultDiv.scrollIntoView({
                            behavior: 'smooth'
                        });
                    } else {
                        alert("Gagal menyimpan: " + data.message);
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Terjadi kesalahan sistem.");
                })
                .finally(() => {
                    this.innerText = "Selesai & Periksa";
                    this.disabled = false;
                });
        };

        buildTest();
    </script>
</body>

</html>