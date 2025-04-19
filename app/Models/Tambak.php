<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tambak extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'lokasi',
        'luas',
        'jenis',
        'tanggal_pembuatan',
        'status',
        'keterangan',
    ];

    protected $dates = [
        'tanggal_pembuatan',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kolams()
    {
        return $this->hasMany(Kolam::class);
    }

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function asets()
    {
        return $this->hasMany(Aset::class);
    }
}
