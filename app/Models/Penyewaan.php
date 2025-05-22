<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
class Penyewaan extends Model
{
    protected $fillable = ['kendaraan_id', 'penyewa', 'no_ktp','no_sim','alamat','tanggal_sewa', 'tanggal_kembali'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

        public function setNoktpAttribute($noktp)
    {
        $this->attributes['no_ktp'] = Crypt::encryptString($noktp);
    }

        public function setNosimAttribute($nosim)
    {
       $this->attributes['no_sim'] = Crypt::encryptString($nosim);
    }

        

        public function getNoKtpAttribute($noktp)
    {
        return Crypt::decryptString($noktp);
    }
        public function getNoSimAttribute($nosim)
    {
        return Crypt::decryptString($nosim);
    }
      
}
