<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai_onduty extends Model
{
    protected $table="pegawai_onduty";
    protected $primaryKey="ID_PEGAWAI_ONDUTY";
    public $timestamps=true;
    protected $fillable=[
        'ID_TRANSAKSI','ID_PEGAWAI'
    ];



    public function transaksi_penjualan()
    {
        return $this->belongsTo(transaksi_penjualan::class,'ID_TRANSAKSI');
    }

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class,'ID_PEGAWAI');
    }


}
