<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petambak extends Model
{

    /**
     * Primary key
     */
    protected $primaryKey = 'id_petambak';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_petambak',
        'alamat',
        'nomor_telepon',
        'email',
        'tanggal_registrasi',
        'status_aktif',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_registrasi' => 'date',
        'status_aktif' => 'boolean',
    ];

    /**
     * Get the tambaks for the petambak.
     */
    public function tambaks()
    {
        return $this->hasMany(Tambak::class, 'id_petambak');
    }
}
