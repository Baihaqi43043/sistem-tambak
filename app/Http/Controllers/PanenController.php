<?php

namespace App\Http\Controllers;

use App\Models\Panen;
use App\Models\SiklusBudidaya;
use Illuminate\Http\Request;
use Exception;

class PanenController extends Controller
{
    public function index()
    {
        try {
            $data = Panen::all();
            return view('panen.index', compact('data'));
        } catch (Exception $e) {
            return back()->with('error', 'Gagal memuat data panen: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $siklusList = SiklusBudidaya::all();
        return view('panen.create', compact('siklusList'));
    }

    public function store(Request $request)
    {
        try {
            // Normalisasi input 'harga' ke format angka murni
            $request->merge([
                'harga' => preg_replace('/\D/', '', $request->input('harga'))
            ]);

            $validated = $request->validate([
                'id_siklus'        => 'required|exists:siklus_budidaya,id_siklus',
                'tanggal_panen'    => 'required|date',
                'harga'            => 'required|numeric|min:0',
                'berat_total'      => 'nullable|numeric',
                'catatan'          => 'nullable|string|max:255',
            ]);
            // dd($validated);

            Panen::create($validated); // Harga sekarang sudah ikut

            return redirect()->route('panen.index')->with('success', 'Data panen berhasil ditambahkan');
        } catch (Exception $e) {
            dd($e);
            return back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }



    public function edit($id)
    {
        try {
            $panen = Panen::findOrFail($id);
            $siklusList = SiklusBudidaya::all();
            return view('panen.edit', compact('panen', 'siklusList'));
        } catch (Exception $e) {
            return back()->with('error', 'Data tidak ditemukan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input dari form
            $validated = $request->validate([
                'id_siklus'        => 'required|exists:siklus_budidaya,id_siklus',
                'tanggal_panen'    => 'required|date',
                'harga'            => 'required|numeric|min:0',  // Menambahkan validasi untuk harga
                'berat_total'      => 'nullable|numeric',
                'catatan'          => 'nullable|string|max:255',
            ]);

            // Menangani format harga, menghapus titik dan mengonversi ke angka
            $validated['harga'] = (float) str_replace('.', '', $request->input('harga'));

            // Memperbarui data panen
            $panen = Panen::findOrFail($id);
            $panen->update($validated);

            return redirect()->route('panen.index')->with('success', 'Data panen berhasil diperbarui');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $panen = Panen::findOrFail($id);
            $panen->delete();

            return redirect()->route('panen.index')->with('success', 'Data panen berhasil dihapus');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
