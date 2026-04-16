<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Akun – VisionLab</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --danger: #ef4444;
            --success: #10b981;
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
            max-width: 950px;
            width: 100%;
            background: var(--bg-card);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 800;
        }

        .table-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f3f4f6;
            padding: 15px;
            text-align: left;
            font-weight: 700;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #f3f4f6;
        }

        /* Buttons */
        .btn {
            padding: 8px 16px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-edit {
            background: var(--primary);
            color: white;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background: var(--primary-dark);
        }

        .btn-delete {
            background: var(--danger);
            color: white;
        }

        .btn-delete:hover {
            opacity: 0.8;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.8);
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .badge-user {
            background: #dcfce7;
            color: #166534;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .alert {
            padding: 15px;
            background: var(--success);
            color: white;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <header>
        <a href="{{ route('welcomelogin') }}" class="logo">VisionLab Admin</a>
        <div style="font-weight: 700;">Panel Kelola Akun</div>
    </header>

    <main>
        <div class="wrap">
            <a href="{{ route('welcomelogin') }}" class="btn btn-back">← Kembali ke Dashboard</a>

            <h1>Kelola Akun Pengguna</h1>

            @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
            @endif

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="font-weight: 600;">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge-user">{{ strtoupper($user->role) }}</span></td>
                            <td style="text-align: center;">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: #9ca3af;">
                                Tidak ada data akun pengguna.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer style="text-align: center; padding: 2rem; font-size: 0.8rem; font-weight: 600;">
        &copy; 2026 VisionLab Admin System
    </footer>

</body>

</html>