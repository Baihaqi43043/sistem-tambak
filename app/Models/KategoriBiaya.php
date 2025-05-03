<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBiaya extends Model
{
    // use HasFactory;

    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'deskripsi'];

    public function biayas()
    {
        return $this->hasMany(Biaya::class, 'id_kategori', 'id_kategori');
    }
}
