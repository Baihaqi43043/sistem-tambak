<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambakRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_petambak' => 'required|exists:petambaks,id_petambak',
            'nama_tambak' => 'required|string|max:50',
            'lokasi' => 'required|string|max:200',
            'luas_area' => 'required|numeric|min:0',
            'kedalaman' => 'required|numeric|min:0',
            'tanggal_pembuatan' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif,perbaikan',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'id_petambak.required' => 'Petambak harus dipilih',
            'id_petambak.exists' => 'Petambak tidak ditemukan',
            'nama_tambak.required' => 'Nama tambak harus diisi',
            'nama_tambak.max' => 'Nama tambak maksimal 50 karakter',
            'lokasi.required' => 'Lokasi harus diisi',
            'lokasi.max' => 'Lokasi maksimal 200 karakter',
            'luas_area.required' => 'Luas area harus diisi',
            'luas_area.numeric' => 'Luas area harus berupa angka',
            'luas_area.min' => 'Luas area tidak boleh negatif',
            'kedalaman.required' => 'Kedalaman harus diisi',
            'kedalaman.numeric' => 'Kedalaman harus berupa angka',
            'kedalaman.min' => 'Kedalaman tidak boleh negatif',
            'tanggal_pembuatan.required' => 'Tanggal pembuatan harus diisi',
            'tanggal_pembuatan.date' => 'Format tanggal tidak valid',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ];
    }
}
