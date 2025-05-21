<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
class Kendaraan extends Model
{
    protected $fillable = ['nama_kendaraan', 'plat_nomor', 'kategori_id', 'pemilik_id'];
    public function kategori()
{
    return $this->belongsTo(Kategori::class);
}

public function pemilik()
{
    return $this->belongsTo(Pemilik::class);
}

public function penyewaans()
{
    return $this->hasMany(Penyewaan::class);
}

public function setPlatNomorAttribute($value)
{
    $this->attributes['plat_nomor'] = Crypt::encryptString($value);
}

public function getPlatNomorAttribute($value)
{
    return Crypt::decryptString($value);
}

}
