<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>VisionLab – Bantuan</title>
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
            max-width: 750px;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            text-align: center;
            margin: 0 0 2rem;
            font-size: clamp(1.8rem, 5vw, 2.5rem);
            font-weight: 800;
        }

        .help-item {
            background: rgba(255, 255, 255, 0.4);
            margin-bottom: 1rem;
            padding: 1.2rem;
            border-radius: 15px;
            text-align: left;
        }

        .help-item h3 {
            margin: 0 0 0.5rem;
            font-size: 1.1rem;
            color: var(--primary-dark);
        }

        .help-item p {
            margin: 0;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .btn-group {
            margin-top: 2rem;
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
            <h1>Pusat <span style="color: var(--primary);">Bantuan</span></h1>

            <div class="help-content">
                <div class="help-item">
                    <h3>Bagaimana cara memulai tes?</h3>
                    <p>Klik tombol "Mulai Tes Sekarang" di beranda. Anda akan diminta menyusun balok warna sesuai urutan gradasi yang benar.</p>
                </div>

                <div class="help-item">
                    <h3>Apakah tes ini akurat?</h3>
                    <p>Metode Farnsworth-Munsell adalah standar medis, namun tes online ini hanya bersifat deteksi dini. Untuk hasil medis resmi, silakan konsultasi ke dokter spesialis mata.</p>
                </div>

                <div class="help-item">
                    <h3>Kenapa saya harus login?</h3>
                    <p>Dengan masuk ke akun Anda, hasil riwayat tes akan tersimpan sehingga Anda bisa memantau hasil dari tes dari waktu ke waktu.</p>
                </div>
                <div class="help-item">
                    <h3>Hubungi</h3>
                    <p>Gmail : Hasanz13579@gmail.com</p>
                </div>
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