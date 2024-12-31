@extends('layouts.app')

@section('title', 'Edit Note Eksepedisi')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0">Edit Ekspedisi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('ekspedisi.update', $ekspedisi->id) }}" method="POST">
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
                            <label for="ekspedisi_name">Ekspedisi Name:</label>
                            <input type="text" name="ekspedisi_name" id="ekspedisi_name" class="form-control" value="{{ $ekspedisi->ekspedisi_name }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection