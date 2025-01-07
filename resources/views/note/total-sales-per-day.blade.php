<!-- filepath: /C:/laragon/www/grotima/resources/views/note/total-sales-per-day.blade.php -->
@extends('layouts.app')

@section('title', 'Total Sales Per Day')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total Sales Per Day</h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('data.total_sales_per_day') }}">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="marketplace_id">Marketplace</label>
                        <select name="marketplace_id" id="marketplace_id" class="form-control">
                            <option value="">Select Marketplace</option>
                            @foreach ($marketplaces as $marketplace)
                                <option value="{{ $marketplace->id }}" {{ request('marketplace_id') == $marketplace->id ? 'selected' : '' }}>{{ $marketplace->marketplace_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="ekspedisi_id">Ekspedisi</label>
                        <select name="ekspedisi_id" id="ekspedisi_id" class="form-control">
                            <option value="">Select Ekspedisi</option>
                            @foreach ($ekspedisis as $ekspedisi)
                                <option value="{{ $ekspedisi->id }}" {{ request('ekspedisi_id') == $ekspedisi->id ? 'selected' : '' }}>{{ $ekspedisi->ekspedisi_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="user_id">Admin</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">Select Admin</option>
                            @foreach ($admins as $admin)
                                <option value="{{ $admin->id }}" {{ request('user_id') == $admin->id ? 'selected' : '' }}>{{ $admin->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="dropshipper_id">Dropshipper</label>
                        <select name="dropshipper_id" id="dropshipper_id" class="form-control">
                            <option value="">Select Dropshipper</option>
                            @foreach ($dropshippers as $dropshipper)
                                <option value="{{ $dropshipper->id }}" {{ request('dropshipper_id') == $dropshipper->id ? 'selected' : '' }}>{{ $dropshipper->nama_dropshipper }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Total Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $record)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($record->date)->format('d M Y') }}</td>
                            <td>{{ $record->total_sales }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection