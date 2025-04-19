<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komoditas;

class KomoditasController extends Controller
{
    public function index()
    {
        $komoditas = Komoditas::all();
        return view('admin.komoditas.index', compact('komoditas'));
    }

    public function create()
    {
        return view('admin.komoditas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis' => 'required|string|max:50',
            'kode' => 'nullable|string|max:20',
            'keterangan' => 'nullable|string',
        ]);

        Komoditas::create($request->all());

        return redirect()->route('admin.komoditas.index')
            ->with('success', 'Komoditas berhasil ditambahkan!');
    }

    // Method lainnya: show, edit, update, destroy
}
