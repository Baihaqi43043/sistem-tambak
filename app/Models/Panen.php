<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    protected $table = 'panens';
    protected $primaryKey = 'id_panen';

    protected $fillable = [
        'id_siklus',
        'tanggal_panen',
        'harga',
        'berat_total',
        'catatan',
    ];

    public function siklus()
    {
        return $this->belongsTo(SiklusBudidaya::class, 'id_siklus');
    }
}
