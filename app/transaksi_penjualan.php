<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_penjualan extends Model
{
    protected $table="transaksi_penjualan";
    protected $primaryKey="ID_TRANSAKSI";
    public $timestamps=true;
    protected $fillable=[
        'ID_CABANG','ID_PELANGGAN','TGL_TRANSAKSI','SUBTOTAL','DISKON','GRANDTOTAL','STATUS_TRANSAKSI','JENIS_TRANSAKSI',
    ];
    
    public $incrementing = false;
    public function branches()
    {
        return $this->belongsTo(branches::class,'ID_CABANG');
    }

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class,'ID_PELANGGAN');
    }
    public function pegawai_onduty()
    {
        return $this->hasMany(pegawai_onduty::class,'ID_TRANSAKSI');
    }
    public function detail_penjualan_jasa()
    {
        return $this->hasMany(detail_penjualan_jasa::class,'ID_TRANSAKSI');
    }
    public function detail_penjualan_sparepart()
    {
        return $this->hasMany(detail_penjualan_sparepart::class,'ID_TRANSAKSI');
    }

}
