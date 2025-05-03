<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tambak extends Model
{
    /**
     * Primary key
     */
    protected $primaryKey = 'id_tambak';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_petambak',
        'nama_tambak',
        'lokasi',
        'luas_area',
        'kedalaman',
        'tanggal_pembuatan',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_pembuatan' => 'date',
        'luas_area' => 'decimal:2',
        'kedalaman' => 'decimal:2',
    ];

    /**
     * Get the petambak that owns the tambak.
     */
    public function petambak()
    {
        return $this->belongsTo(Petambak::class, 'id_petambak');
    }

    /**
     * Get the siklus budidaya for the tambak.
     */
    public function siklusBudidayas()
    {
        return $this->hasMany(SiklusBudidaya::class, 'id_tambak');
    }

    /**
     * Set the route key name for the model.
     */
    public function getRouteKeyName()
    {
        return 'id_tambak';
    }
}
