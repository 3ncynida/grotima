<?php

namespace App\Http\Controllers;

use App\Data;
use App\User;
use App\Stok;
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
        $data = Data::with('user', 'stok')->get();
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
        $stok = Stok::orderBy('created_at', 'desc')->first();

        return view('data.create', compact('user', 'stok'));
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
            'marketplace' => 'required|in:Lazada,Shopee,Tokopedia',
            'ekspedisi' => 'required|in:Ninja,JNT',
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

        // Tambahkan stok_id dan user_id ke data yang divalidasi
        $validated['stok_id'] = $stok->id;
        $validated['user_id'] = Auth::id();

        // Menyimpan data ke database
        $data = Data::create($validated);

        // Redirect atau response
        return redirect()->route('data.index')->with('success', 'Data berhasil disimpan.');
    }

    // Methods lainnya...
}