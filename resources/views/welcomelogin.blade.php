<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard – VisionLab</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --danger: #ef4444;
            --text-dark: #1f2937;
            --text-light: #4b5563;
            --bg-body: url('/images/splatt.png');
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
            padding: 1rem 8%;
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

        .user-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.5);
            padding: 6px 16px 6px 6px;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .avatar {
            width: 32px;
            height: 32px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.8rem;
        }

        .user-name {
            font-weight: 700;
            font-size: 0.85rem;
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--danger);
            font-weight: 700;
            font-size: 0.85rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            opacity: 0.7;
        }

        /* --- Main Content (Grid Layout) --- */
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

        /* --- Sisi Kiri: Preview Simulator --- */
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
            gap: 8px;
            margin: 20px 0;
        }

        .color-box {
            aspect-ratio: 1/1;
            border-radius: 10px;
        }

        /* --- Sisi Kanan: Dashboard Card --- */
        .content-card {
            background: rgba(255, 255, 255, 0.32);
            /* Glassmorphism transparan sesuai hafalan */
            padding: 50px;
            border-radius: 32px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        h1 {
            font-size: clamp(2rem, 4vw, 2.8rem);
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 1.2rem;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
            color: var(--text-light);
        }

        /* --- Buttons --- */
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 16px 36px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.5);
        }

        .btn-secondary {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            font-size: 0.95rem;
            padding: 12px 30px;
            border: 2px solid var(--primary);
            border-radius: 50px;
            transition: 0.3s;
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: white;
        }

        .history-link {
            color: var(--text-dark);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.9rem;
            opacity: 0.7;
            transition: 0.3s;
            margin-left: 10px;
        }

        .history-link:hover {
            opacity: 1;
            text-decoration: underline;
        }

        /* --- Footer --- */
        footer {
            background: rgba(173, 255, 47, 0.95);
            padding: 2.5rem 8%;
            text-align: center;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 968px) {
            main {
                grid-template-columns: 1fr;
                padding: 40px 5%;
                text-align: center;
            }

            .button-group {
                align-items: center;
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
        }
    </style>
</head>

<body>

    <header>
        <a href="{{ route('home') }}" class="logo">VisionLab</a>

        <div class="user-nav">
            @auth
            <div class="user-profile">
                <div class="avatar">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <span class="user-name">{{ Auth::user()->name }}</span>
            </div>

            <form action="{{ route('logout') }}" method="POST" style="margin: 0; display: flex;">
                @csrf
                <button type="submit" class="logout-btn">Keluar</button>
            </form>
            @else
            <a href="{{ route('login') }}" style="text-decoration: none; color: var(--text-dark); font-weight: 700;">Masuk</a>
            @endauth
        </div>
    </header>

    <main>
        <section class="preview-section">
            <div class="test-mockup">
                <div style="font-weight: 800; color: #94a3b8; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px; text-align: center;">
                    Dashboard Overview
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

                <div style="width: 100%; height: 12px; background: #f1f5f9; border-radius: 20px; position: relative; overflow: hidden;">
                    <div style="width: 75%; height: 100%; background: var(--primary); border-radius: 20px;"></div>
                </div>
                <div style="text-align: center; margin-top: 15px; font-size: 0.8rem; color: #64748b; font-weight: 600;">Preview</div>
            </div>
        </section>

        <section class="content-section">
            <div class="content-card">
                <h1>Halo, <span style="color: var(--primary);">{{ Auth::user()->name }}</span></h1>
                <p>
                    Selamat datang. Pantau kesehatan persepsi warna Anda dan tingkatkan akurasi melalui tes rutin secara berkala.
                </p>

                <div class="button-group">
                    <a class="btn" href="{{ route('farnsworth.test') }}">Mulai Tes Sekarang</a>

                    @if(Auth::user()->role === 'admin')
                    <a href="{{ route('kelolaakun') }}" class="btn-secondary">
                        Kelola Semua Akun
                    </a>
                    @endif

                    <a href="{{ route('riwayat') }}" class="history-link">
                        Lihat Riwayat & Grafik Perkembangan →
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p style="margin: 0; font-weight: 700; font-size: 0.85rem;">&copy; 2026 VisionLab. Dashboard Pengguna Terverifikasi.</p>
    </footer>

</body>

</html>