<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use App\Stok;
use App\Marketplace;
use App\Ekspedisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::with('user', 'stok', 'marketplace', 'ekspedisi')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($date) {
                return \Carbon\Carbon::parse($date->created_at)->format('F Y'); // grouping by months
            });

        return view('note.index', compact('data'));
    }
    public function create()
    {
        $user = User::all();
        $marketplace = Marketplace::all();
        $ekspedisi = Ekspedisi::all();
        $stok = Stok::orderBy('created_at', 'desc')->first(); // Ambil stok terbaru

        return view('note.create', compact('user', 'marketplace', 'ekspedisi', 'stok'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'marketplace' => 'required',
            'ekspedisi' => 'required',
            'stok' => 'required|integer|min:0',
            'stok_terambil' => 'required|integer|min:0|max:' . $request->stok,
        ]);
    
        // Hitung jumlah_stok
        $jumlah_stok = $request->stok - $request->stok_terambil;
    
        // Check if jumlah_stok is 0
        if ($jumlah_stok == 0) {
            return redirect()->back()->withErrors(['stok' => 'Jumlah stok tidak boleh 0.']);
        }
    
        // Buat stok baru
        $stok = Stok::create([
            'jumlah_stok' => $jumlah_stok,
            'stok_terambil' => $request->stok_terambil,
        ]);
    
        // Tambahkan stok_id, marketplace_id, ekspedisi_id, dan user_id ke data yang divalidasi
        $validated['stok_id'] = $stok->id;
        $validated['marketplace_id'] = $request->marketplace;
        $validated['ekspedisi_id'] = $request->ekspedisi;
        $validated['user_id'] = Auth::id();
    
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
        $stok = Stok::orderBy('created_at', 'desc')->get();

        return view('note.edit', compact('data', 'marketplace', 'ekspedisi', 'stok'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'marketplace' => 'required',
            'ekspedisi' => 'required',
            'jumlah_stok' => 'required|integer|min:0',
            'stok_terambil' => 'nullable|integer|min:0',
        ]);

        // Update stok
        $stok = Stok::findOrFail($request->stok_id);
        $stok->update([
            'jumlah_stok' => $request->jumlah_stok,
            'stok_terambil' => $request->stok_terambil,
        ]);

        // Update data
        $data = Data::findOrFail($id);
        $data->update([
            'marketplace_id' => $request->marketplace,
            'ekspedisi_id' => $request->ekspedisi,
            'stok_id' => $stok->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('data.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Data::where('data_id', $id)->delete();
        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus.');
    }
}
