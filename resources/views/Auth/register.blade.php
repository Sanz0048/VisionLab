<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun – VisionLab</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --danger: #ef4444;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --bg-body: url('/images/splatt.png');
            /* Menggunakan putih transparan (Glassmorphism) agar konsisten dengan Login */
            --bg-card: rgba(255, 255, 255, 0.95);
            --input-bg: #f9fafb;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-image: var(--bg-body);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #f3f4f6;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card {
            background: var(--bg-card);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            width: 92%;
            max-width: 420px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            text-align: center;
        }

        h2 {
            margin: 0 0 8px 0;
            font-weight: 800;
            font-size: 1.85rem;
            color: var(--text-dark);
            letter-spacing: -0.025em;
        }

        p.subtitle {
            margin-bottom: 28px;
            color: var(--text-muted);
            font-size: 0.95rem;
            font-weight: 400;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 18px;
            text-align: left;
        }

        label {
            font-size: 0.85rem;
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            margin-left: 4px;
            color: var(--text-dark);
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.95rem;
            background: var(--input-bg);
            transition: all 0.2s ease;
            color: var(--text-dark);
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            background: white;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 10px;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
        }

        .btn-outline {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background: transparent;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            font-weight: 500;
            font-size: 0.85rem;
            margin-top: 16px;
            transition: all 0.2s;
        }

        .btn-outline:hover {
            background: #f9fafb;
            color: var(--text-dark);
            border-color: #d1d5db;
        }

        .alert {
            background: #fef2f2;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid #fee2e2;
        }

        .footer-link {
            margin-top: 24px;
            display: block;
            font-size: 0.9rem;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 400;
        }

        .footer-link span {
            color: var(--primary);
            font-weight: 600;
        }

        .footer-link span:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Daftar</h2>
        <p class="subtitle">Buat akun VisionLab untuk menyimpan hasil tes Anda</p>

        {{-- Error validasi Laravel --}}
        @if($errors->any())
        <div class="alert">
            <ul style="margin:0; padding-left:15px">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Min. 6 karakter" required>
            </div>

            <button class="btn" type="submit">Daftar Sekarang</button>
        </form>

        <a href="{{ route('home') }}" class="btn-outline">← Kembali ke Beranda</a>

        <a href="/login" class="footer-link">Sudah punya akun? <span>Masuk Disini</span></a>
    </div>

</body>

</html>