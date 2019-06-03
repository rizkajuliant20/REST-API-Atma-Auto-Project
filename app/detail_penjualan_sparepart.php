<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_penjualan_sparepart extends Model
{
    protected $table="detail_penjualan_sparepart";
    protected $primaryKey="ID_PENJUALAN_SPAREPART";
    public $timestamps=true;
    protected $fillable=[
        'ID_TRANSAKSI','ID_SPAREPARTS','JUMLAH_SPAREPART','SUBTOTAL_SPAREPART','HARGA_TAMPUNG_JUAL'
    ];

    public function transaksi_penjualan()
    {
        return $this->belongsTo(transaksi_penjualan::class,'ID_TRANSAKSI');
    }
    public function sparepart()
    {
        return $this->belongsTo(sparepart::class,'ID_SPAREPARTS');
    }
}
