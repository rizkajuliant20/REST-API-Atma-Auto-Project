<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class montir_onduty extends Model
{
    protected $table="montir_onduty";
    protected $primaryKey="ID_MONTIR_ONDUTY";
    public $timestamps=true;
    protected $fillable=[
        'ID_PEGAWAI','ID_KENDARAAN_PEL'
    ];

    public function detail_penjualan_jasa()
    {
        return $this->hasMany(detail_penjualan_jasa::class,'ID_MONTIR_ONDUTY');
    }
    public function detail_penjualan_sparepart()
    {
        return $this->hasMany(detail_penjualan_sparepart::class,'ID_MONTIR_ONDUTY');
    }
    public function pegawai()
    {
        return $this->belongsTo(pegawai::class,'ID_PEGAWAI');
    }
    public function kendaraan_pelanggan()
    {
        return $this->belongsTo(kendaraan_pelanggan::class,'ID_KENDARAAN_PEL');
    }
}
