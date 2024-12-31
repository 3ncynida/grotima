<?php
namespace App\Http\Controllers;

use App\Marketplace;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index()
    {
        $market = Marketplace::all();
        return view('data.marketplaces.index', compact('market'));
    }

    public function create()
    {
        return view('data.marketplaces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marketplace_name' => 'required|string|max:255',
        ]);

        Marketplace::create($request->all());

        return redirect()->route('marketplaces.index')->with('success', 'Marketplace berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $marketplace = Marketplace::findOrFail($id);
        return view('data.marketplaces.edit', compact('marketplace'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'marketplace_name' => 'required|string|max:255',
        ]);

        $marketplace = Marketplace::findOrFail($id);
        $marketplace->update($request->all());

        return redirect()->route('marketplaces.index')->with('success', 'Marketplace berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Marketplace::where('id', $id)->delete();
        return redirect()->route('marketplaces.index')->with('success', 'Marketplace berhasil dihapus.');
    }
}