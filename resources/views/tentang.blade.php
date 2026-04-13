<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>VisionLab – Tentang</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --danger: #ef4444;
            /* Warna merah untuk tombol kembali */
            --danger-dark: #dc2626;
            --text-dark: #1f2937;
            --text-light: #6b7280;
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

        /* --- Header --- */
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
            max-width: 700px;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            margin: 0 0 1.5rem;
            font-size: clamp(1.8rem, 5vw, 2.5rem);
            font-weight: 800;
        }

        .content-text {
            text-align: left;
            margin-bottom: 2.5rem;
        }

        p {
            color: var(--text-dark);
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        /* --- Buttons --- */
        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 14px 30px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-red {
            background: var(--danger);
            color: white;
            box-shadow: 0 8px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-red:hover {
            background: var(--danger-dark);
            transform: translateY(-3px);
            box-shadow: 0 12px 20px rgba(239, 68, 68, 0.4);
        }

        /* --- Footer --- */
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
            <h1>Tentang <span style="color: var(--primary);">VisionLab</span></h1>

            <div class="content-text">
                <p>
                    <strong>VisionLab</strong> adalah platform digital yang dirancang untuk membantu individu mendeteksi gangguan persepsi warna sejak dini. Kami menggunakan metode <strong>Farnsworth-Munsell</strong>, yang merupakan standar global dalam dunia medis untuk mengukur akurasi penglihatan warna secara mendalam.
                </p>
                <p>
                    Misi kami adalah menyediakan akses edukasi dan alat bantu diagnostik awal yang mudah digunakan oleh siapa saja, kapan saja, melalui perangkat digital Anda.
                </p>
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