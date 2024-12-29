<!-- filepath: /c:/laragon/www/grotima/resources/views/data/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Marketplace</th>
                <th>Ekspedisi</th>
                <th>Name</th>
                <th>Stok</th>
                <th>Stok Terambil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->marketplace }}</td>
                <td>{{ $d->ekspedisi }}</td>
                <td>{{ $d->user->name }}</td>
                <td>{{ $d->stok->jumlah_stok }}</td>
                <td>{{ $d->stok->stok_terambil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>