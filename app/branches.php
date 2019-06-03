<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    

    protected $table="branches";
    protected $primaryKey="ID_CABANG";
    public $incrementing =false;
    public $timestamps=true;
    protected $fillable=[
        'NAMA_CABANG','ALAMAT_CABANG','TELEPON_CABANG'
    ];

    public function pegawai()
    {
        return $this->hasMany(pegawai::class, 'ID_CABANG');
    }

    public function transaksi_penjualan()
    {
        return $this->hasMany(transaksi_penjualan::class, 'ID_CABANG');
    }


}
