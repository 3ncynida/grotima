@extends('layouts.app')

@section('title', 'Create Note Eksepedisi')

@section('content')
<div class="container">
    <h2>Create Ekspedisi</h2>
    <form action="{{ route('ekspedisi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="ekspedisi_name" name="ekspedisi_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection