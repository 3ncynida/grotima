<!-- filepath: /C:/laragon/www/grotima/resources/views/dropshipper/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create Dropshipper')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0">Create Dropshipper</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dropshipper.store') }}" method="POST">
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
                            <label for="nama_dropshipper">Nama Dropshipper:</label>
                            <input type="text" name="nama_dropshipper" id="nama_dropshipper" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection