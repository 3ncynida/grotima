@extends('layouts.app')

@section('title', 'Create Note Marketplace')

@section('content')
<div class="container">
    <h1>Ekspedisi</h1>
    <a href="{{ route('ekspedisi.create') }}" class="btn btn-primary mb-3">Add New Ekspedisi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ekspedisi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->ekspedisi_name }}</td>
                <td>
                    <a href="{{ route('ekspedisi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('ekspedisi.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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