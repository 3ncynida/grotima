@extends('layouts.app')

@section('title', 'Create Note')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0">Create Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('data.store') }}" method="POST">
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
                            <label for="marketplace">Marketplace:</label>
                            <select name="marketplace" id="marketplace" class="form-control" required>
                                <option value="">Select Marketplace</option>
                                @foreach ($marketplace as $m)            
                                <option value="{{ $m->id }}" @if (old('marketplace')==$m->id) selected @endif>{{ $m->marketplace_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ekspedisi">Ekspedisi:</label>
                            <select name="ekspedisi" id="ekspedisi" class="form-control" required>
                                <option value="">Select Ekspedisi</option>
                                @foreach ($ekspedisi as $e)            
                                <option value="{{ $e->id }}" @if (old('ekspedisi')==$e->id) selected @endif>{{ $e->ekspedisi_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <input type="number" name="stok" id="stok" class="form-control" value="{{ $stok->jumlah_stok }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="stok_terambil">Stok Diambil:</label>
                            <input type="number" name="stok_terambil" id="stok_terambil" class="form-control" value="{{ old('stok_terambil') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection