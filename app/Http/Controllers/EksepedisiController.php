<?php
namespace App\Http\Controllers;

use App\Ekspedisi;
use Illuminate\Http\Request;

class EksepedisiController extends Controller
{
    public function index()
    {
        $ekspedisi = Ekspedisi::all();
        return view('data.ekspedisi.index', compact('ekspedisi'));
    }

    public function create()
    {
        return view('data.ekspedisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ekspedisi_name' => 'required|string|max:255',
        ]);

        Ekspedisi::create($request->all());

        return redirect()->route('ekspedisi.index')->with('success', 'Ekspedisi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);
        return view('data.ekspedisi.edit', compact('ekspedisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ekspedisi_name' => 'required|string|max:255',
        ]);

        $ekspedisi = Ekspedisi::findOrFail($id);
        $ekspedisi->update($request->all());

        return redirect()->route('ekspedisi.index')->with('success', 'Ekspedisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Ekspedisi::where('id', $id)->delete();
        return redirect()->route('ekspedisi.index')->with('success', 'Ekspedisi berhasil dihapus.');
    }
}