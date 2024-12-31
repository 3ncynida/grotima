@extends('layouts.app')
@section('title', 'List Note Marketplace')

@section('content')
<div class="container">
    <h1>Marketplaces</h1>
    <a href="{{ route('marketplaces.create') }}" class="btn btn-primary mb-3">Add New Marketplace</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($market as $marketplace)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $marketplace->marketplace_name }}</td>
                <td>
                    <a href="{{ route('marketplaces.edit', $marketplace->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('marketplaces.destroy', $marketplace->id) }}" method="POST" style="display:inline-block;">
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