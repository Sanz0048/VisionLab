<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk – VisionLab</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

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
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card {
            background: var(--bg-card);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            text-align: center;
        }

        h2 {
            margin: 0 0 10px 0;
            font-weight: 800;
            font-size: 2rem;
            color: var(--text-dark);
        }

        p.subtitle {
            margin-bottom: 25px;
            opacity: 0.8;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-size: 0.85rem;
            font-weight: 700;
            display: block;
            margin-bottom: 6px;
            margin-left: 5px;
        }

        input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 50px;
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s;
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
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(59, 130, 246, 0.3);
        }

        .btn-outline {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.5);
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.85rem;
            margin-top: 12px;
            transition: 0.2s;
        }

        .btn-outline:hover {
            background: white;
        }

        .alert {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid rgba(185, 28, 28, 0.1);
        }

        .footer-link {
            margin-top: 20px;
            display: block;
            font-size: 0.85rem;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 600;
        }

        .footer-link span {
            color: var(--primary);
            font-weight: 800;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Masuk</h2>
        <p class="subtitle">Silakan login untuk mengakses VisionLab</p>

        {{-- Notifikasi error login --}}
        @if(session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
        @endif

        {{-- Error validasi --}}
        @if($errors->any())
        <div class="alert">
            <ul style="margin:0; padding-left:15px">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button class="btn" type="submit">Masuk Sekarang</button>
        </form>

        <a href="{{ route('home') }}" class="btn-outline">← Kembali ke Beranda</a>

        <a href="/register" class="footer-link">Belum punya akun? <span>Daftar Disini</span></a>
    </div>

</body>

</html>