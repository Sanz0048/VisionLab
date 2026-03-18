<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tes Buta Warna – Beranda</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            /* Path diperbarui ke public/images/splatt.png */
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

            /* Konfigurasi Background Gambar */
            background-image: var(--bg-body);
            background-size: cover;
            /* Gambar menutupi seluruh layar */
            background-position: center;
            /* Gambar rata tengah */
            background-repeat: no-repeat;
            /* Gambar tidak diulang */
            background-attachment: fixed;
            /* Gambar tetap diam saat scroll */
            background-color: #ffffff;
            /* Warna cadangan jika gambar tidak ada */

            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- Header --- */
        header {
            background: rgba(173, 255, 47, 0.9);
            /* greenyellow dengan transparansi sedikit */
            backdrop-filter: blur(8px);
            /* Efek blur agar gambar di belakang terlihat halus */
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
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary);
            text-decoration: none;
        }

        nav a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 0.9rem;
            margin-left: 20px;
            transition: color 0.2s;
        }

        nav a:hover {
            color: var(--primary);
        }

        /* --- Main Content --- */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .container {
            text-align: center;
            background: var(--bg-card);
            padding: clamp(2rem, 5vw, 3.5rem);
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, 0.3);
            /* Sedikit aksen garis */
        }

        h1 {
            margin: 0 0 1rem;
            font-size: clamp(1.8rem, 5vw, 2.5rem);
            line-height: 1.1;
            font-weight: 800;
        }

        p {
            color: var(--text-dark);
            /* Menggunakan dark agar terbaca jelas di greenyellow */
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 16px 36px;
            border-radius: 50px;
            /* Lebih bulat agar terlihat modern */
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 15px rgba(59, 130, 246, 0.3);
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 12px 20px rgba(59, 130, 246, 0.4);
        }

        /* --- Footer --- */
        footer {
            background: rgba(173, 255, 47, 0.9);
            backdrop-filter: blur(8px);
            padding: 2rem 5%;
            text-align: center;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
            color: var(--text-dark);
        }

        .footer-links {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: var(--text-dark);
            text-decoration: none;
            margin: 0 10px;
            font-weight: 600;
        }

        /* Mobile Adjustments */
        @media (max-width: 480px) {
            header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            nav a {
                margin: 0 10px;
            }
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
        <div class="container">
            <h1>Tes Buta Warna <br><span style="color: var(--primary);">Farnsworth-Munsell</span></h1>
            <p>
                Uji kemampuan persepsi warna Anda dengan standar metode gradasi Farnsworth–Munsell.
                Cepat, mudah, dan dirancang untuk memberikan gambaran awal kesehatan mata Anda.
            </p>

            <a class="btn" href="{{ route('farnsworth.testguest') }}">Mulai Tes Sekarang</a>
        </div>
    </main>

    <footer>
        <div class="footer-links">
            <a href="#">Tentang</a>
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Bantuan</a>
        </div>
        <p style="margin: 0; font-weight: 500;">&copy; 2026 VisionLab. Dibuat untuk tujuan edukasi.</p>
    </footer>

</body>

</html>