<?php

namespace App\Http\Controllers;

use App\Models\Petambak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetambakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petambaks = Petambak::all();
        return view('petambak.index', compact('petambaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petambak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_petambak' => 'required|string|max:100',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'email' => 'nullable|email|max:100',
            'tanggal_registrasi' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('petambak.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Set status_aktif ke false jika tidak ada di request
        $status_aktif = $request->has('status_aktif') ? true : false;

        Petambak::create([
            'nama_petambak' => $request->nama_petambak,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'tanggal_registrasi' => $request->tanggal_registrasi,
            'status_aktif' => $status_aktif,
        ]);

        return redirect()->route('petambak.index')
            ->with('success', 'Data petambak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petambak $petambak)
    {
        return view('petambak.show', compact('petambak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petambak $petambak)
    {
        return view('petambak.edit', compact('petambak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petambak $petambak)
    {
        $validator = Validator::make($request->all(), [
            'nama_petambak' => 'required|string|max:100',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'email' => 'nullable|email|max:100',
            'tanggal_registrasi' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('petambak.edit', $petambak->id_petambak)
                ->withErrors($validator)
                ->withInput();
        }

        // Set status_aktif ke false jika tidak ada di request
        $status_aktif = $request->has('status_aktif') ? true : false;

        $petambak->update([
            'nama_petambak' => $request->nama_petambak,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'tanggal_registrasi' => $request->tanggal_registrasi,
            'status_aktif' => $status_aktif,
        ]);

        return redirect()->route('petambak.index')
            ->with('success', 'Data petambak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petambak $petambak)
    {
        $petambak->delete();

        return redirect()->route('petambak.index')
            ->with('success', 'Data petambak berhasil dihapus.');
    }
}
