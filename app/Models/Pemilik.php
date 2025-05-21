<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $fillable = ['nama', 'kontak'];

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class);
    }
}
