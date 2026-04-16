<!DOCTYPE html>
<html>

<head>
    <title>Rekap Riwayat VisionLab</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Rekap Riwayat Tes VisionLab</h2>
        <p>Dicetak pada: {{ date('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Skor</th>
                <th>Kategori</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $result->user->name ?? 'User Terhapus' }}</td>
                <td>{{ $result->skor }}</td>
                <td>{{ $result->kategori }}</td>
                <td>{{ $result->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>