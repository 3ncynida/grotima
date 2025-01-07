<!-- filepath: /C:/laragon/www/grotima/resources/views/note/create.blade.php -->
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
                                    <option value="{{ $m->id }}">{{ $m->marketplace_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ekspedisi">Ekspedisi:</label>
                            <select name="ekspedisi" id="ekspedisi" class="form-control" required>
                                <option value="">Select Ekspedisi</option>
                                @foreach ($ekspedisi as $e)
                                    <option value="{{ $e->id }}">{{ $e->ekspedisi_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stok_terambil">Stok Terambil:</label>
                            <input type="number" name="stok_terambil" id="stok_terambil" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="dropshipper">Dropshipper:</label>
                            <select name="dropshipper" id="dropshipper" class="form-control" required>
                                <option value="">Select Dropshipper</option>
                                @foreach ($dropshipper as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama_dropshipper }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection