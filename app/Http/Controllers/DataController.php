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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::with('user', 'stok', 'marketplace', 'ekspedisi')
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->groupBy(function($date) {
                        return \Carbon\Carbon::parse($date->created_at)->format('F Y'); // grouping by months
                    });

        return view('data.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $marketplace = Marketplace::all();
        $ekspedisi = Ekspedisi::all();
        $stok = Stok::orderBy('created_at', 'desc')->first();

        return view('data.create', compact('user','marketplace', 'ekspedisi', 'stok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    // Methods lainnya...
}