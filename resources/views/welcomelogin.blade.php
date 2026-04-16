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
            padding: 0.8rem 5%;
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

        .user-nav {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.4);
            padding: 5px 15px 5px 6px;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .avatar {
            width: 35px;
            height: 35px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.9rem;
            text-transform: uppercase;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .user-name {
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--text-dark);
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--danger);
            font-weight: 700;
            font-size: 0.85rem;
            cursor: pointer;
            padding: 0;
            text-decoration: none;
        }

        .logout-btn:hover {
            text-decoration: underline;
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
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            margin: 0 0 1rem;
            font-size: clamp(1.8rem, 5vw, 2.8rem);
            font-weight: 800;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white !important;
        }

        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(59, 130, 246, 0.4);
            background: var(--primary-dark);
        }

        /* --- Footer --- */
        footer {
            background: rgba(173, 255, 47, 0.9);
            padding: 2rem;
            text-align: center;
            font-size: 0.875rem;
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
        <div class="container">
            <h1>Selamat Datang di <br><span style="color: var(--primary);">VisionLab</span></h1>
            <p>
                Akses dashboard penuh Anda. Pantau kesehatan persepsi warna dan lihat perkembangan skor tes Anda.
            </p>

            <div style="display: flex; flex-direction: column; gap: 15px; align-items: center;">
                <a class="btn" href="{{ route('farnsworth.test') }}">Mulai Tes Sekarang</a>

                {{-- Cek apakah user yang login memiliki role admin --}}
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('kelolaakun') }}" style="color: var(--primary); font-weight: 700; text-decoration: none; font-size: 1rem; padding: 10px 25px; border: 2px solid var(--primary); border-radius: 50px; transition: all 0.3s ease;">
                    Kelola Akun
                </a>
                @endif

                <a href="{{ route('riwayat') }}" style="color: var(--text-dark); font-weight: 600; text-decoration: none; font-size: 0.9rem; margin-top: 5px;">
                    Lihat Riwayat Tes
                </a>
            </div>
        </div>
    </main>

    <footer>
        <p style="margin: 0; font-weight: 600;">&copy; 2026 VisionLab. Dibuat untuk tujuan edukasi.</p>
    </footer>

</body>

</html>