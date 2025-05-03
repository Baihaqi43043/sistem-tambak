<?php

namespace App\Http\Controllers;

use App\Models\Tambak;
use App\Models\Petambak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TambakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tambaks = Tambak::with('petambak')->get();
        return view('tambak.index', compact('tambaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $petambaks = Petambak::where('status_aktif', true)->get();
        $selectedPetambakId = $request->petambak_id;

        return view('tambak.create', compact('petambaks', 'selectedPetambakId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_petambak' => 'required|exists:petambaks,id_petambak',
            'nama_tambak' => 'required|string|max:50',
            'lokasi' => 'required|string|max:200',
            'luas_area' => 'required|numeric|min:0',
            'kedalaman' => 'required|numeric|min:0',
            'tanggal_pembuatan' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif,perbaikan',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambak.create')
                ->withErrors($validator)
                ->withInput();
        }

        Tambak::create($request->all());

        return redirect()->route('tambak.index')
            ->with('success', 'Data tambak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tambak $tambak)
    {
        $tambak->load('petambak');
        return view('tambak.show', compact('tambak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tambak $tambak)
    {
        $petambaks = Petambak::where('status_aktif', true)->get();
        return view('tambak.edit', compact('tambak', 'petambaks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tambak $tambak)
    {
        $validator = Validator::make($request->all(), [
            'id_petambak' => 'required|exists:petambaks,id_petambak',
            'nama_tambak' => 'required|string|max:50',
            'lokasi' => 'required|string|max:200',
            'luas_area' => 'required|numeric|min:0',
            'kedalaman' => 'required|numeric|min:0',
            'tanggal_pembuatan' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif,perbaikan',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambak.edit', $tambak->id_tambak)
                ->withErrors($validator)
                ->withInput();
        }

        $tambak->update($request->all());

        return redirect()->route('tambak.index')
            ->with('success', 'Data tambak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tambak $tambak)
    {
        $tambak->delete();

        return redirect()->route('tambak.index')
            ->with('success', 'Data tambak berhasil dihapus.');
    }

    /**
     * Display all tambaks for a specific petambak.
     */
    public function byPetambak(Petambak $petambak)
    {
        $tambaks = Tambak::where('id_petambak', $petambak->id_petambak)->get();
        return view('tambak.by_petambak', compact('tambaks', 'petambak'));
    }
}
