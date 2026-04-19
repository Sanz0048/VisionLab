<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tes Buta Warna – VisionLab</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --text-dark: #1f2937;
            --text-light: #4b5563;
            --bg-body: url('/images/splatt.png');
            --bg-card: greenyellow;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-image: var(--bg-body);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #f3f4f6;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* --- Header --- */
        header {
            background: rgba(173, 255, 47, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.2rem 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-weight: 800;
            font-size: 1.6rem;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -1px;
        }

        nav a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 700;
            font-size: 0.95rem;
            margin-left: 25px;
            transition: 0.3s;
        }

        nav a:hover {
            color: var(--primary);
        }

        /* --- Main Content --- */
        main {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 60px 8%;
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* --- Sisi Kiri: Preview (8 Kotak Warna) --- */
        .preview-section {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .test-mockup {
            background: rgba(255, 255, 255, 0.92);
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.12);
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .color-row {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            /* 1 Baris 8 Kotak */
            gap: 8px;
            margin: 20px 0;
        }

        .color-box {
            aspect-ratio: 1/1;
            border-radius: 10px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.05);
        }

        /* --- Sisi Kanan: Konten dengan Kotak Putih --- */
        .content-card {
            background: rgba(255, 255, 255, 0.32);
            /* Kotak agar mudah dibaca */
            padding: 50px;
            border-radius: 32px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        h1 {
            font-size: clamp(2rem, 4vw, 3rem);
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
        }

        p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2.5rem;
            color: var(--text-light);
        }

        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.5);
        }

        /* --- Footer --- */
        footer {
            background: rgba(173, 255, 47, 0.95);
            padding: 2.5rem 8%;
            text-align: center;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .footer-links a {
            color: var(--text-dark);
            text-decoration: none;
            margin: 0 15px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        @media (max-width: 968px) {
            main {
                grid-template-columns: 1fr;
                padding: 40px 5%;
                text-align: center;
            }

            .content-card {
                padding: 30px;
            }

            .preview-section {
                order: 1;
            }

            .color-row {
                grid-template-columns: repeat(4, 1fr);
            }

            /* Jadi 2 baris di HP */
        }
    </style>
</head>

<body>

    <header>
        <a href="{{ route('home') }}" class="logo">VisionLab</a>
        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('login') }}">Masuk</a>
        </nav>
    </header>

    <main>
        <section class="preview-section">
            <div class="test-mockup">
                <div style="font-weight: 800; color: #94a3b8; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px; text-align: center;">
                    Farnsworth-Munsell Simulator
                </div>

                <div class="color-row">
                    <div class="color-box" style="background: #ef4444;"></div>
                    <div class="color-box" style="background: #f97316;"></div>
                    <div class="color-box" style="background: #f59e0b;"></div>
                    <div class="color-box" style="background: #84cc16;"></div>
                    <div class="color-box" style="background: #22c55e;"></div>
                    <div class="color-box" style="background: #06b6d4;"></div>
                    <div class="color-box" style="background: #3b82f6;"></div>
                    <div class="color-box" style="background: #8b5cf6;"></div>
                </div>

                <div style="width: 100%; height: 12px; background: #f1f5f9; border-radius: 20px; position: relative;">
                    <div style="width: 40%; height: 100%; background: var(--primary); border-radius: 20px; opacity: 0.3;"></div>
                </div>
                <div style="text-align: center; margin-top: 15px; font-size: 0.8rem; color: #64748b; font-weight: 500;">Preview</div>
            </div>
        </section>

        <section class="content-section">
            <div class="content-card">
                <h1>Uji persepsi warna Anda dengan <span style="color: var(--primary);">VisionLab.</span></h1>
                <p>
                    Gunakan standar metode gradasi <strong>Farnsworth–Munsell</strong> untuk mendeteksi tingkat akurasi penglihatan warna Anda. Cepat, interaktif, dan mudah dipahami.
                </p>

                <a class="btn" href="{{ route('farnsworth.testguest') }}">Mulai Tes Sekarang</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-links">
            <a href="tentang">Tentang</a>
            <a href="kebijakanprivasi">Kebijakan Privasi</a>
            <a href="bantuan">Bantuan</a>
        </div>
        <p style="margin-top: 10px; font-weight: 600; font-size: 0.85rem;">&copy; 2026 VisionLab. Dibuat untuk tujuan edukasi.</p>
    </footer>

</body>

</html>