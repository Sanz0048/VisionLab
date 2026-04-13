<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>VisionLab – Kebijakan Privasi</title>
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
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary);
            text-decoration: none;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .container {
            background: var(--bg-card);
            padding: clamp(2rem, 5vw, 3.5rem);
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            text-align: center;
            margin: 0 0 2rem;
            font-size: clamp(1.8rem, 5vw, 2.5rem);
            font-weight: 800;
        }

        .policy-content {
            text-align: left;
            max-height: 400px;
            /* Memberikan scrollbar jika teks terlalu panjang */
            overflow-y: auto;
            padding-right: 15px;
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 15px;
        }

        /* Custom Scrollbar */
        .policy-content::-webkit-scrollbar {
            width: 8px;
        }

        .policy-content::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }

        h2 {
            font-size: 1.2rem;
            margin-top: 1.5rem;
            color: var(--primary-dark);
        }

        p,
        li {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 0.8rem;
        }

        .btn-group {
            display: flex;
            justify-content: center;
        }

        .btn-red {
            display: inline-block;
            background: var(--danger);
            color: white;
            padding: 14px 36px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 8px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-red:hover {
            background: var(--danger-dark);
            transform: translateY(-3px);
            box-shadow: 0 12px 20px rgba(239, 68, 68, 0.4);
        }

        footer {
            background: rgba(173, 255, 47, 0.9);
            backdrop-filter: blur(8px);
            padding: 2rem 5%;
            text-align: center;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>

    <header>
        <a href="{{ route('home') }}" class="logo">VisionLab</a>
    </header>

    <main>
        <div class="container">
            <h1>Kebijakan <span style="color: var(--primary);">Privasi</span></h1>

            <div class="policy-content">
                <p>Terakhir diperbarui: April 2026</p>

                <h2>1. Informasi yang Kami Kumpulkan</h2>
                <p>Kami mengumpulkan data hasil tes buta warna Anda dan informasi akun (jika Anda mendaftar) untuk memberikan riwayat hasil yang akurat.</p>

                <h2>2. Penggunaan Data</h2>
                <p>Data yang dikumpulkan digunakan untuk:</p>
                <ul>
                    <li>Menyimpan dan menampilkan riwayat hasil tes Anda.</li>
                    <li>Meningkatkan akurasi algoritma pengujian kami.</li>
                    <li>Tujuan edukasi dan riset anonim.</li>
                </ul>

                <h2>3. Keamanan Data</h2>
                <p>VisionLab berkomitmen untuk menjaga keamanan data Anda. Kami tidak akan menjual atau membagikan informasi pribadi Anda kepada pihak ketiga tanpa izin Anda.</p>

                <h2>4. Cookies</h2>
                <p>Kami menggunakan cookies untuk meningkatkan pengalaman pengguna dan mengingat preferensi sesi Anda selama melakukan tes.</p>
            </div>

            <div class="btn-group">
                <a class="btn btn-red" href="{{ route('home') }}">Kembali ke Beranda</a>
            </div>
        </div>
    </main>

    <footer>
        <p style="margin: 0; font-weight: 500;">&copy; 2026 VisionLab. Dibuat untuk tujuan edukasi.</p>
    </footer>

</body>

</html>