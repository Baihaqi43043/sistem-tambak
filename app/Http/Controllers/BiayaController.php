<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\KategoriBiaya;
use App\Models\SiklusBudidaya; // Sesuaikan nama model dengan struktur database Anda
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    public function index()
    {
        // // Debug: Cek apakah model SiklusBudidaya dapat mengambil data
        // $siklus = SiklusBudidaya::all();
        // dd('Siklus data:', $siklus->count(), $siklus->take(3));

        // // Debug: Cek data Biaya tanpa eager loading
        // $biayas = Biaya::all();
        // dd('Biaya data:', $biayas->count(), $biayas->take(3));

        // Debug: Cek data dengan eager loading
        $biayas = Biaya::with(['kategoriBiaya', 'siklusBudidaya'])->get();
        // dd('Biaya with relations:', $biayas->count(), $biayas->take(3)->toArray());

        return view('biaya.index', compact('biayas'));
    }

    public function create()
    {
        $kategori_biayas = KategoriBiaya::all();
        // Gunakan model SiklusBudidaya dan ambil hanya siklus yang aktif
        $siklus = SiklusBudidaya::where('status_siklus', 'aktif')->get();
        return view('biaya.create', compact('kategori_biayas', 'siklus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siklus' => 'required|exists:siklus_budidaya,id_siklus',
            'id_kategori' => 'required|exists:kategori_biayas,id_kategori',
            'tanggal_pengeluaran' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['total_biaya'] = $request->jumlah * $request->harga_satuan;

        Biaya::create($data);

        return redirect()->route('biaya.index')
            ->with('success', 'Data biaya berhasil dibuat!');
    }

    public function show(Biaya $biaya)
    {
        // Pastikan data siklus dan kategori telah dimuat
        $biaya->load(['kategoriBiaya', 'siklusBudidaya']);
        return view('biaya.show', compact('biaya'));
    }

    public function edit(Biaya $biaya)
    {
        $kategori_biayas = KategoriBiaya::all();
        // Tampilkan semua siklus, aktif maupun tidak, untuk menghindari masalah jika siklus sudah selesai
        $siklus = SiklusBudidaya::all();
        return view('biaya.edit', compact('biaya', 'kategori_biayas', 'siklus'));
    }

    public function update(Request $request, Biaya $biaya)
    {
        $request->validate([
            'id_siklus' => 'required|exists:siklus_budidaya,id_siklus',
            'id_kategori' => 'required|exists:kategori_biayas,id_kategori',
            'tanggal_pengeluaran' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['total_biaya'] = $request->jumlah * $request->harga_satuan;

        $biaya->update($data);

        return redirect()->route('biaya.index')
            ->with('success', 'Data biaya berhasil diperbarui!');
    }

    public function destroy(Biaya $biaya)
    {
        $biaya->delete();

        return redirect()->route('biaya.index')
            ->with('success', 'Data biaya berhasil dihapus!');
    }
}
