@extends('layouts.app')

@section('title', 'Edit Note Stok')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0">Edit Stok</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('stok.update', $stok->id) }}" method="POST">
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
                            <label for="jumlah_stok">Jumlah Stok:</label>
                            <input type="number" name="jumlah_stok" id="jumlah_stok" class="form-control" value="{{ $stok->jumlah_stok }}" required>
                        </div>

                        <div class="form-group">
                            <label for="stok_terambil">Stok Terambil:</label>
                            <input type="number" name="stok_terambil" id="stok_terambil" class="form-control" value="{{ $stok->stok_terambil }}">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection