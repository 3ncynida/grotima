@extends('layouts.app')

@section('title', 'Create Note Marketplace')

@section('content')
<div class="container">
    <h1>Create Marketplace</h1>
    <form action="{{ route('marketplace.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Marketplace Name</label>
            <input type="text" class="form-control" id="marketplace_name" name="marketplace_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection