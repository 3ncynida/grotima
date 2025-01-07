<!-- filepath: /C:/laragon/www/grotima/resources/views/note/index.blade.php -->
@extends('layouts.app')

@section('title', 'List Note')

@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('data.create') }}" class="btn btn-primary">Create New Data</a>
            <a href="{{ route('data.total_sales_per_day') }}" class="btn btn-secondary">View Total Sales Per Day</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($data as $date => $records)
                    <h2>{{ $date }}</h2>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Marketplace</th>
                                <th>Ekspedisi</th>
                                <th>Admin</th>
                                <th>Dropshipper</th>
                                <th>Stok Diambil</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->marketplace->marketplace_name }}</td>
                                <td>{{ $d->ekspedisi->ekspedisi_name }}</td>
                                <td>{{ $d->user->name }}</td>
                                <td>{{ $d->dropshipper->nama_dropshipper }}</td>
                                <td>{{ $d->stok_terambil }}</td> <!-- Menampilkan jumlah stok sebelumnya -->
                                <td>{{ $d->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('data.edit', $d->data_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('data.destroy', $d->data_id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection