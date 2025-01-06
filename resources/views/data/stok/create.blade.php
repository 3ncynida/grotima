@extends('layouts.app')

@section('title', 'Create Note Stok')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0">Create Stok</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('stok.store') }}" method="POST">
                        @csrf

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
                            <label for="jumlah_stok">Tambah Jumlah Stok:</label>
                            <input type="number" name="jumlah_stok" id="jumlah_stok" class="form-control" value="{{ $stok ? $stok->jumlah_stok : '' }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection