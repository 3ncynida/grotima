@extends('layouts.app')

@section('title', 'List Note Stok')

@section('content')
<div class="container">
    <h1>Stok</h1>
    <a href="{{ route('stok.create') }}" class="btn btn-primary mb-3">Add More Stok</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jumlah Stok</th>
                <th>Stok Diambil</th>
                <th>Tanggal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stok as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->jumlah_stok }}</td>
                <td>{{ $item->stok_terambil ?? 'None' }}</td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('stok.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('stok.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
