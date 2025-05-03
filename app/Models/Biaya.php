<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    // use HasFactory;

    protected $primaryKey = 'id_biaya';
    protected $fillable = [
        'id_siklus',
        'id_kategori',
        'tanggal_pengeluaran',
        'jumlah',
        'harga_satuan',
        'total_biaya',
        'keterangan'
    ];

    public function kategoriBiaya()
    {
        return $this->belongsTo(KategoriBiaya::class, 'id_kategori', 'id_kategori');
    }

    // Sesuaikan nama relasi dengan SiklusBudidaya
    public function siklusBudidaya()
    {
        return $this->belongsTo(SiklusBudidaya::class, 'id_siklus', 'id_siklus');
    }
}
