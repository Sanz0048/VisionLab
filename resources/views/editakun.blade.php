<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Akun – VisionLab</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
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
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: rgba(173, 255, 47, 0.9);
            backdrop-filter: blur(8px);
            padding: 0.8rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-weight: 800;
            font-size: 1.5rem;
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

        .wrap {
            max-width: 500px;
            width: 100%;
            background: var(--bg-card);
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 800;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid #ddd;
            font-family: inherit;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .helper-text {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 5px;
        }

        .error-msg {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 5px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <header>
        <a href="{{ route('welcomelogin') }}" class="logo">VisionLab</a>
    </header>

    <main>
        <div class="wrap">
            <h1>Edit Akun</h1>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name') <div class="error-msg">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                </div>

                <div class="form-group" style="margin-bottom: 10px;">
                    <label>Password Baru</label>
                    <input type="password" name="password" placeholder="••••••••">
                    <div class="helper-text">*Kosongkan jika tidak ingin mengubah password</div>
                    @error('password') <div class="error-msg">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn-submit">Simpan Perubahan</button>
                <a href="{{ route('kelolaakun') }}" class="btn-back">Batal & Kembali</a>
            </form>
        </div>
    </main>

</body>

</html>