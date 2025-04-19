<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komoditas extends Model
{
    use SoftDeletes;

    protected $table = 'komoditas';

    protected $fillable = [
        'nama',
        'jenis',
        'kode',
        'keterangan',
    ];

    public function tebarBibit()
    {
        return $this->hasMany(TebarBibit::class);
    }
}

class TebarBibit extends Model
{
    use SoftDeletes;

    protected $table = 'tebar_bibit';

    protected $fillable = [
        'kolam_id',
        'komoditas_id',
        'tanggal_tebar',
        'jumlah_bibit',
        'bobot_rata_rata',
        'harga_bibit',
        'supplier',
        'tanggal_target_panen',
        'status',
        'keterangan',
    ];

    protected $dates = [
        'tanggal_tebar',
        'tanggal_target_panen',
    ];

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }

    public function monitoringPertumbuhan()
    {
        return $this->hasMany(MonitoringPertumbuhan::class);
    }

    public function penyakitPengobatan()
    {
        return $this->hasMany(PenyakitPengobatan::class);
    }
}

class MonitoringPertumbuhan extends Model
{
    protected $table = 'monitoring_pertumbuhan';

    protected $fillable = [
        'tebar_bibit_id',
        'tanggal_pengukuran',
        'bobot_rata_rata',
        'panjang_rata_rata',
        'jumlah_sampling',
        'estimasi_jumlah_hidup',
        'tingkat_kelangsungan_hidup',
        'keterangan',
    ];

    protected $dates = [
        'tanggal_pengukuran',
    ];

    public function tebarBibit()
    {
        return $this->belongsTo(TebarBibit::class);
    }
}

class PenyakitPengobatan extends Model
{
    protected $table = 'penyakit_pengobatan';

    protected $fillable = [
        'tebar_bibit_id',
        'tanggal_ditemukan',
        'nama_penyakit',
        'gejala',
        'jenis_obat',
        'cara_pengobatan',
        'tanggal_pengobatan',
        'hasil',
        'keterangan',
    ];

    protected $dates = [
        'tanggal_ditemukan',
        'tanggal_pengobatan',
    ];

    public function tebarBibit()
    {
        return $this->belongsTo(TebarBibit::class);
    }
}
