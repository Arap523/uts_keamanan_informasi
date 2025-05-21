<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $fillable = ['kendaraan_id', 'penyewa', 'tanggal_sewa', 'tanggal_kembali'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
