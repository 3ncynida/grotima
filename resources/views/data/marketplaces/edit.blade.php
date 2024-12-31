@extends('layouts.app')

@section('title', 'Edit Note Marketplace')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0">Edit Marketplace</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('marketplaces.update', $marketplace->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops! Ada masalah dengan input Anda:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="marketplace_name">Marketplace Name:</label>
                            <input type="text" name="marketplace_name" id="marketplace_name" class="form-control" value="{{ $marketplace->marketplace_name }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection