<?php

namespace App\Http\Controllers;

use App\Models\KategoriBiaya;
use Illuminate\Http\Request;

class KategoriBiayaController extends Controller
{
    public function index()
    {
        $kategori_biayas = KategoriBiaya::all();
        return view('kategori_biaya.index', compact('kategori_biayas'));
    }

    public function create()
    {
        return view('kategori_biaya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        KategoriBiaya::create($request->all());

        return redirect()->route('kategori-biaya.index')
            ->with('success', 'Kategori biaya berhasil dibuat!');
    }

    public function show(KategoriBiaya $kategori_biaya)
    {
        return view('kategori_biaya.show', compact('kategori_biaya'));
    }

    public function edit(KategoriBiaya $kategori_biaya)
    {
        return view('kategori_biaya.edit', compact('kategori_biaya'));
    }

    public function update(Request $request, KategoriBiaya $kategori_biaya)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        $kategori_biaya->update($request->all());

        return redirect()->route('kategori-biaya.index')
            ->with('success', 'Kategori biaya berhasil diperbarui!');
    }

    public function destroy(KategoriBiaya $kategori_biaya)
    {
        $kategori_biaya->delete();

        return redirect()->route('kategori-biaya.index')
            ->with('success', 'Kategori biaya berhasil dihapus!');
    }
}
