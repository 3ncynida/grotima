<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use App\Stok;
use App\Marketplace;
use App\Ekspedisi;
use App\Dropshipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $query = Data::query();
    
        if ($request->has('marketplace_id')) {
            $query->where('marketplace_id', $request->marketplace_id);
        }
    
        if ($request->has('ekspedisi_id')) {
            $query->where('ekspedisi_id', $request->ekspedisi_id);
        }
    
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }
    
        $data = $query->orderBy('created_at', 'desc')->get()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('d M Y'); // Group by date
        });
    
        return view('note.index', compact('data'));
    }
    public function create()
    {
        $user = User::all();
        $marketplace = Marketplace::all();
        $ekspedisi = Ekspedisi::all();
        $dropshipper = Dropshipper::all();
    
        return view('note.create', compact('user', 'marketplace', 'ekspedisi', 'dropshipper'));
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'marketplace' => 'required',
            'ekspedisi' => 'required',
            'stok_terambil' => 'required|integer|min:0',
            'dropshipper' => 'required',
        ]);
    
        // Tambahkan marketplace_id, ekspedisi_id, user_id, dropshipper_id, dan stok_terambil ke data yang divalidasi
        $validated['marketplace_id'] = $request->marketplace;
        $validated['ekspedisi_id'] = $request->ekspedisi;
        $validated['user_id'] = Auth::id();
        $validated['dropshipper_id'] = $request->dropshipper;
    
        // Menyimpan data ke database
        $data = Data::create($validated);
    
        // Redirect atau response
        return redirect()->route('data.index')->with('success', 'Data berhasil disimpan.');
    }
    
    public function edit($id)
    {
        $data = Data::findOrFail($id);
        $marketplace = Marketplace::all();
        $ekspedisi = Ekspedisi::all();
        $dropshipper = Dropshipper::all();
    
        return view('note.edit', compact('data', 'marketplace', 'ekspedisi', 'dropshipper'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'marketplace' => 'required',
            'ekspedisi' => 'required',
            'stok_terambil' => 'nullable|integer|min:0',
            'dropshipper' => 'required',
        ]);
    
        // Update data
        $data = Data::findOrFail($id);
        $data->update([
            'marketplace_id' => $request->marketplace,
            'ekspedisi_id' => $request->ekspedisi,
            'user_id' => auth()->id(),
            'dropshipper_id' => $request->dropshipper,
            'stok_terambil' => $request->stok_terambil, // Update stok_terambil in data table
        ]);
    
        return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Data::where('data_id', $id)->delete();
        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus.');
    }

    public function totalSalesPerDay(Request $request)
    {
        $marketplaces = Marketplace::all();
        $ekspedisis = Ekspedisi::all();
        $admins = User::all();
        $dropshippers = Dropshipper::all();
    
        $query = Data::query();
    
        if ($request->has('marketplace_id') && $request->marketplace_id != '') {
            $query->where('marketplace_id', $request->marketplace_id);
        }
    
        if ($request->has('ekspedisi_id') && $request->ekspedisi_id != '') {
            $query->where('ekspedisi_id', $request->ekspedisi_id);
        }
    
        if ($request->has('user_id') && $request->user_id != '') {
            $query->where('user_id', $request->user_id);
        }
    
        if ($request->has('dropshipper_id') && $request->dropshipper_id != '') {
            $query->where('dropshipper_id', $request->dropshipper_id);
        }
    
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        }
    
        $data = $query->selectRaw('DATE(created_at) as date, SUM(stok_terambil) as total_sales')
                    ->groupBy('date')
                    ->orderBy('date', 'desc')
                    ->get();
    
        return view('note.total-sales-per-day', compact('data', 'marketplaces', 'ekspedisis', 'admins', 'dropshippers'));
    }
}
