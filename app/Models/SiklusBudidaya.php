<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiklusBudidaya extends Model
{
    // use HasFactory;

    protected $table = 'siklus_budidaya';
    protected $primaryKey = 'id_siklus';

    protected $fillable = [
        'id_tambak',
        'jenis_budidaya',
        'spesies',
        'tanggal_mulai',
        'tanggal_panen_estimasi',
        'jumlah_tebar',
        'status_siklus',
        'catatan',
    ];

    public function tambak()
    {
        return $this->belongsTo(Tambak::class, 'id_tambak');
    }

    public function panens()
    {
        return $this->hasMany(Panen::class, 'id_siklus');
    }
}
