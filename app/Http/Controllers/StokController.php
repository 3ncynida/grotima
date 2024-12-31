<?php
namespace App\Http\Controllers;

use App\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::orderBy('created_at', 'desc')->get();
        return view('data.stok.index', compact('stok'));
    }

    public function create()
    {
        return view('data.stok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_stok' => 'required|integer|min:0',
            'stok_terambil' => 'nullable|integer|min:0',
        ]);

        Stok::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $stok = Stok::findOrFail($id);
        return view('data.stok.edit', compact('stok'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_stok' => 'required|integer|min:0',
            'stok_terambil' => 'nullable|integer|min:0',
        ]);

        $stok = Stok::findOrFail($id);
        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Stok::where('id', $id)->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus.');
    }
}