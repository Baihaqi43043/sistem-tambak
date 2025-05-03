<?php

namespace App\Http\Controllers;

use App\Models\SiklusBudidaya;
use App\Models\Tambak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiklusBudidayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SiklusBudidaya::with('tambak');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('jenis_budidaya', 'like', '%' . $search . '%')
                    ->orWhere('spesies', 'like', '%' . $search . '%')
                    ->orWhereHas('tambak', function ($q) use ($search) {
                        $q->where('nama_tambak', 'like', '%' . $search . '%');
                    });
            });
        }

        $siklusBudidaya = $query->paginate(10);

        return view('siklus.index', compact('siklusBudidaya'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tambaks = Tambak::all(); // Menampilkan semua tambak
        $selectedTambakId = $request->id_tambak;

        return view('siklus.create', compact('tambaks', 'selectedTambakId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tambak' => 'required|exists:tambaks,id_tambak',
            'jenis_budidaya' => 'required|in:udang,ikan',
            'spesies' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'jumlah_tebar' => 'required|integer|min:1',
            'status_siklus' => 'required|in:aktif,selesai',
            'catatan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('siklus-budidaya.create')
                ->withErrors($validator)
                ->withInput();
        }

        SiklusBudidaya::create($request->all());

        return redirect()->route('siklus.index')
            ->with('success', 'Siklus Budidaya berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id_siklus)
    {
        $id_siklus->load('tambak');
        return view('siklus.show', compact('siklusBudidaya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siklusBudidaya = SiklusBudidaya::findOrFail($id);
        $tambaks = Tambak::all(); // Atau bisa menggunakan filter tertentu jika diperlukan

        return view('siklus.edit', compact('siklusBudidaya', 'tambaks'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_siklus)
    {
        $validator = Validator::make($request->all(), [
            'id_tambak' => 'required|exists:tambaks,id_tambak',
            'jenis_budidaya' => 'required|in:udang,ikan',
            'spesies' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'jumlah_tebar' => 'required|integer|min:1',
            'status_siklus' => 'required|in:aktif,selesai',
            'catatan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('siklus.edit', $id_siklus)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $siklusBudidaya = SiklusBudidaya::findOrFail($id_siklus);
            $siklusBudidaya->update($request->all());

            return redirect()->route('siklus.index')
                ->with('success', 'Siklus Budidaya berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('siklus.edit', $id_siklus)
                ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_siklus)
    {
        try {
            $siklusBudidaya = SiklusBudidaya::findOrFail($id_siklus);
            $siklusBudidaya->delete();

            return redirect()->route('siklus.index')
                ->with('success', 'Siklus Budidaya berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('siklus.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }


    /**
     * Display all siklus budidaya for a specific tambak.
     */
    public function byTambak(Tambak $tambak)
    {
        $siklusBudidaya = SiklusBudidaya::where('id_tambak', $tambak->id_tambak)->get();
        return view('siklus.by_tambak', compact('siklusBudidaya', 'tambak'));
    }
}
