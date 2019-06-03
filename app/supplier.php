<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table="supplier";
    protected $primaryKey="ID_SUPPLIER";
    public $incrementing =false;
    public $timestamps=true;
    protected $fillable=[
        'NAMA_SUPPLIER','ALAMAT_SUPPLIER','TELEPON_SUPPLIER','NAMA_SALES','TELEPON_SALES'
    ];

    public function pemesanan_sparepart()
    {
        
        return $this->hasMany(pemesanan_sparepart::class, 'ID_PEMESANAN');
    }
}
