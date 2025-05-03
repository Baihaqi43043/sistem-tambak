<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetambakRequest extends FormRequest
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
            'nama_petambak' => 'required|string|max:100',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'email' => 'nullable|email|max:100',
            'tanggal_registrasi' => 'required|date',
            'status_aktif' => 'boolean',
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
            'nama_petambak.required' => 'Nama petambak harus diisi',
            'nama_petambak.max' => 'Nama petambak maksimal 100 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'nomor_telepon.required' => 'Nomor telepon harus diisi',
            'nomor_telepon.max' => 'Nomor telepon maksimal 15 karakter',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 100 karakter',
            'tanggal_registrasi.required' => 'Tanggal registrasi harus diisi',
            'tanggal_registrasi.date' => 'Format tanggal tidak valid',
        ];
    }
}
