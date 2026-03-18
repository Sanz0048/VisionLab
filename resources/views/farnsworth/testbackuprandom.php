<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tes Farnsworth–Munsell</title>

    <style>
        body {
            margin: 0;
            background: #f9fafb;
            font-family: Inter, system-ui, sans-serif;
            display: flex;
            justify-content: center;
            padding: 24px;
        }

        .wrap {
            max-width: 960px;
            width: 100%;
            background: #fff;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .1);
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        h1 {
            margin: 0;
            font-size: 20px;
        }

        .lead {
            font-size: 14px;
            color: #4b5563;
        }

        .logout-btn {
            background: #ef4444;
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        .board {
            margin-top: 16px;
            background: #f3f4f6;
            border-radius: 12px;
            padding: 16px;
        }

        .row {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 8px;
        }

        .anchor {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            border: 3px solid #000;
            flex-shrink: 0;
        }

        .slot {
            width: 50px;
            height: 50px;
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tile {
            width: 46px;
            height: 46px;
            border-radius: 6px;
            cursor: grab;
            border: 1px solid rgba(0, 0, 0, .2);
        }

        .controls {
            margin-top: 14px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        button {
            padding: 10px 14px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }

        .primary {
            background: #3b82f6;
            color: #fff;
        }

        .secondary {
            background: #fff;
            border: 1px solid #d1d5db;
        }

        .result {
            display: none;
            margin-top: 14px;
            padding: 12px;
            background: #e5e7eb;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="wrap">

        <!-- HEADER + LOGOUT -->
        <div class="header">
            <div>
                <h1>Tes Buta Warna – Farnsworth-Munsell</h1>
                <p class="lead">Susun gradasi warna di antara patokan kiri dan kanan</p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <section class="board">
            <div id="testArea"></div>

            <div class="controls">
                <button id="checkBtn" class="primary">Periksa Nilai</button>
                <button id="resetBtn" class="secondary">Acak Ulang</button>
                <button id="solveBtn" class="secondary">Urutan Benar</button>
            </div>

            <div id="result" class="result"></div>
        </section>

    </div>

    <script>
        const ROWS = 4;
        const PER_ROW = 8;
        const TOTAL = ROWS * (PER_ROW + 2);

        const testArea = document.getElementById('testArea');
        const result = document.getElementById('result');

        let hues = [];
        let draggedTile = null;

        function generateHues() {
            const start = Math.random() * 360;
            return Array.from({
                    length: TOTAL
                }, (_, i) =>
                (start + i * (360 / TOTAL)) % 360
            );
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
            hues = generateHues();
            let tileIndex = 0;

            for (let r = 0; r < ROWS; r++) {
                const mainRow = document.createElement('div');
                mainRow.className = 'row';

                const shuffledRow = document.createElement('div');
                shuffledRow.className = 'row';

                const slice = hues.slice(
                    r * (PER_ROW + 2),
                    (r + 1) * (PER_ROW + 2)
                );

                const leftHue = slice[0];
                const rightHue = slice[slice.length - 1];

                const middle = slice.slice(1, -1).map(h => ({
                    h,
                    id: tileIndex++,
                    row: r
                }));

                const left = document.createElement('div');
                left.className = 'anchor';
                left.style.background = `hsl(${leftHue} 90% 55%)`;
                mainRow.appendChild(left);

                middle.forEach(m => {
                    const slot = document.createElement('div');
                    slot.className = 'slot';
                    slot.dataset.pos = m.id;
                    slot.dataset.row = r;

                    slot.ondragover = e => e.preventDefault();
                    slot.ondrop = e => {
                        e.preventDefault();
                        if (!draggedTile) return;
                        if (draggedTile.dataset.row !== slot.dataset.row) return;

                        if (slot.firstChild) {
                            const target = slot.firstChild;
                            const origin = draggedTile.parentElement;
                            slot.appendChild(draggedTile);
                            origin.appendChild(target);
                        } else {
                            slot.appendChild(draggedTile);
                        }
                    };
                    mainRow.appendChild(slot);
                });

                const right = document.createElement('div');
                right.className = 'anchor';
                right.style.background = `hsl(${rightHue} 90% 55%)`;
                mainRow.appendChild(right);

                shuffle(middle).forEach(t => {
                    const tile = document.createElement('div');
                    tile.className = 'tile';
                    tile.draggable = true;
                    tile.dataset.id = t.id;
                    tile.dataset.row = r;
                    tile.style.background = `hsl(${t.h} 90% 55%)`;

                    tile.ondragstart = () => draggedTile = tile;
                    tile.ondragend = () => draggedTile = null;

                    shuffledRow.appendChild(tile);
                });

                testArea.appendChild(mainRow);
                testArea.appendChild(shuffledRow);
            }
        }

        document.getElementById('solveBtn').onclick = () => {
            document.querySelectorAll('.slot').forEach(slot => {
                const tile = document.querySelector(`[data-id='${slot.dataset.pos}']`);
                if (tile) slot.appendChild(tile);
            });
        };

        document.getElementById('resetBtn').onclick = buildTest;

        document.getElementById('checkBtn').onclick = () => {
            let score = 0;
            document.querySelectorAll('.slot').forEach(slot => {
                if (!slot.firstChild) score += TOTAL;
                else score += Math.abs(
                    slot.dataset.pos - slot.firstChild.dataset.id
                );
            });

            fetch("{{ route('farnsworth.save') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        skor: score
                    })
                })
                .then(res => res.json())
                .then(data => {
                    result.style.display = 'block';
                    result.innerHTML = `
            <strong>Skor:</strong> ${score}<br>
            <strong>Kategori:</strong> ${data.kategori}
        `;
                });
        };

        buildTest();
    </script>
</body>

</html>