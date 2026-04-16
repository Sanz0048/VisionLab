<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Saya – VisionLab</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <style>
        /* Gaya untuk Pagination */
        .pagination-wrapper {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        /* Jika Anda menggunakan Tailwind (bawaan Laravel), ini sudah otomatis bagus. 
   Jika tidak, ini styling sederhana untuk tombolnya: */
        .pagination-wrapper nav {
            display: flex;
            gap: 5px;
        }

        .pagination-wrapper a,
        .pagination-wrapper span {
            padding: 8px 14px;
            background: white;
            border-radius: 8px;
            text-decoration: none;
            color: var(--primary);
            font-weight: 700;
            font-size: 0.8rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .pagination-wrapper .active {
            background: var(--primary);
            color: white;
        }

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

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.4);
            padding: 5px 15px 5px 6px;
            border-radius: 50px;
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

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .wrap {
            max-width: 850px;
            width: 100%;
            background: var(--bg-card);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            margin: 0 0 20px 0;
            font-size: 1.8rem;
            font-weight: 800;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.5);
            padding: 15px;
            border-radius: 15px;
            text-align: center;
        }

        .stat-box span {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--primary);
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

        .badge {
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            background: #e5e7eb;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.8);
            color: var(--text-dark);
            margin-right: 10px;
        }

        footer {
            text-align: center;
            padding: 2rem;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <header>
        <a href="{{ route('welcomelogin') }}" class="logo">VisionLab</a>
        @auth
        <div class="user-profile">
            <div class="avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <span style="font-weight: 700; font-size: 0.85rem;">{{ Auth::user()->name }}</span>
        </div>
        @endauth
    </header>

    <main>
        <div class="wrap">
            <h1>Riwayat Tes Pribadi</h1>

            <div style="text-align: center; margin-bottom: 25px;">
                <a href="{{ route('welcomelogin') }}" class="btn btn-secondary">← Beranda</a>
                <a href="{{ route('farnsworth.test') }}" class="btn btn-primary">Mulai Tes Baru</a>

                <a href="{{ route('riwayat.download') }}" class="btn btn-primary" style="background-color: #10b981; margin-left: 10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 8px;">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                    </svg>
                    Unduh Rekap PDF
                </a>
            </div>

            <div class="stats-grid">
                <div class="stat-box">
                    <strong>Total Tes Anda</strong><br>
                    <span>
                        @php
                        $totalPribadi = Auth::user()->tesButaWarna()->count();
                        @endphp

                        @if($totalPribadi > 0)
                        {{ $totalPribadi }}
                        @else
                        Belum pernah
                        @endif
                    </span>
                </div>

                <div class="stat-box">
                    <strong>Skor Terbaik</strong><br>
                    <span>
                        {{ Auth::user()->tesButaWarna()->min('skor') ?? 'Belum pernah' }}
                    </span>
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- Tampilkan kolom Nama User hanya untuk Admin --}}
                            @if(Auth::user()->role === 'admin')
                            <th>Pengguna</th>
                            @endif
                            <th>Skor</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results as $result)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            {{-- Data Nama User untuk Admin --}}
                            @if(Auth::user()->role === 'admin')
                            <td style="font-weight: 600;">
                                {{ $result->user->name ?? 'User Terhapus' }}
                                <div style="font-size: 0.7rem; color: #9ca3af; font-weight: 400;">
                                    {{ $result->user->email ?? '-' }}
                                </div>
                            </td>
                            @endif

                            <td style="font-weight: 800; color: var(--primary);">{{ $result->skor }}</td>
                            <td><span class="badge">{{ $result->kategori }}</span></td>
                            <td style="color: #6b7280; font-size: 0.85rem;">{{ $result->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            {{-- Colspan disesuaikan: 5 jika admin, 4 jika user --}}
                            <td colspan="{{ Auth::user()->role === 'admin' ? 5 : 4 }}" style="text-align: center; padding: 40px; color: #9ca3af;">
                                Belum ada data riwayat tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        &copy; 2026 VisionLab. Hanya menampilkan data untuk {{ Auth::user()->name }}.
    </footer>

</body>

</html>