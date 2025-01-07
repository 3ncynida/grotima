<?php
namespace App\Http\Controllers;

use App\Dropshipper;
use Illuminate\Http\Request;

class DropshipperController extends Controller
{
    public function index()
    {
        $dropshippers = Dropshipper::all();
        return view('dropshipper.index', compact('dropshippers'));
    }

    public function create()
    {
        return view('dropshipper.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dropshipper' => 'required|string|max:255',
        ]);

        Dropshipper::create($request->all());

        return redirect()->route('dropshipper.index')->with('success', 'Dropshipper berhasil ditambahkan.');
    }
}