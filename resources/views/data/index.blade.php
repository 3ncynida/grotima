<!-- filepath: /C:/laragon/www/grotima/resources/views/data/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Index</title>
</head>
<body>
    @foreach ($data as $month => $records)
        <h2>{{ $month }}</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Marketplace</th>
                    <th>Ekspedisi</th>
                    <th>Admin</th>
                    <th>Stok</th>
                    <th>Stok Terambil</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->marketplace->marketplace_name }}</td>
                    <td>{{ $d->ekspedisi->ekspedisi_name }}</td>
                    <td>{{ $d->user->name }}</td>
                    <td>{{ $d->stok->jumlah_stok }}</td>
                    <td>{{ $d->stok->stok_terambil }}</td>
                    <td>{{ $d->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>