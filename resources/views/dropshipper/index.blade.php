<!-- filepath: /C:/laragon/www/grotima/resources/views/dropshipper/index.blade.php -->
@extends('layouts.app')

@section('title', 'List Dropshipper')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('dropshipper.create') }}" class="btn btn-primary">Create New Dropshipper</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dropshipper</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dropshippers as $dropshipper)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dropshipper->nama_dropshipper }}</td>
                            <td>
                                <!-- Add actions if needed -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection