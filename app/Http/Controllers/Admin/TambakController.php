<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tambak;
use Illuminate\Support\Facades\Auth;

class TambakController extends Controller
{
    public function index()
    {
        $tambaks = Tambak::all();
        return view('admin.tambak.index', compact('tambaks'));
    }

    public function create()
    {
        return view('admin.tambak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'luas' => 'required|numeric',
            'jenis' => 'required|string|max:50',
            'tanggal_pembuatan' => 'required|date',
            'status' => 'required|in:aktif,nonaktif,maintenance',
            'keterangan' => 'nullable|string',
        ]);

        $tambak = new Tambak();
        $tambak->nama = $request->nama;
        $tambak->lokasi = $request->lokasi;
        $tambak->luas = $request->luas;
        $tambak->jenis = $request->jenis;
        $tambak->tanggal_pembuatan = $request->tanggal_pembuatan;
        $tambak->status = $request->status;
        $tambak->keterangan = $request->keterangan;
        $tambak->save();

        return redirect()->route('admin.tambak.index')
            ->with('success', 'Tambak berhasil ditambahkan!');
    }

    public function show($id)
    {
        $tambak = Tambak::findOrFail($id);
        return view('admin.tambak.show', compact('tambak'));
    }

    public function edit($id)
    {
        $tambak = Tambak::findOrFail($id);
        return view('admin.tambak.edit', compact('tambak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:150',
            'luas' => 'required|numeric',
            'jenis' => 'required|string|max:50',
            'tanggal_pembuatan' => 'required|date',
            'status' => 'required|in:aktif,nonaktif,maintenance',
            'keterangan' => 'nullable|string',
        ]);

        $tambak = Tambak::findOrFail($id);
        $tambak->nama = $request->nama;
        $tambak->lokasi = $request->lokasi;
        $tambak->luas = $request->luas;
        $tambak->jenis = $request->jenis;
        $tambak->tanggal_pembuatan = $request->tanggal_pembuatan;
        $tambak->status = $request->status;
        $tambak->keterangan = $request->keterangan;
        $tambak->save();

        return redirect()->route('admin.tambak.index')
            ->with('success', 'Tambak berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tambak = Tambak::findOrFail($id);
        $tambak->delete();

        return redirect()->route('admin.tambak.index')
            ->with('success', 'Tambak berhasil dihapus!');
    }
}
