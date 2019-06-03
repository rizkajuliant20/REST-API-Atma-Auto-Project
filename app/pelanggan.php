<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    protected $table="pelanggan";
    protected $primaryKey="ID_PELANGGAN";
    public $incrementing =false;
    public $timestamps=true;
    protected $fillable=[
        'NAMA_PELANGGAN','TELEPON_PELANGGAN','ALAMAT_PELANGGAN'
    ];

    public function kendaraan_pelanggan()
    {
        
        return $this->hasMany(kendaraan_pelanggan::class, 'ID_PELANGGAN');
    }

    public function transaksi_penjualan()
    {
        
        return $this->hasMany(transaksi_penjualan::class, 'ID_PELANGGAN');
    }
}
