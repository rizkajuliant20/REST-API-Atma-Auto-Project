<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_penjualan_sparepart extends Model
{
    protected $table="detail_penjualan_sparepart";
    protected $primaryKey="ID_PENJUALAN_SPAREPART";
    public $timestamps=true;
    protected $fillable=[
        'ID_TRANSAKSI','ID_SPAREPARTS','ID_MONTIR_ONDUTY','JUMLAH_SPAREPART','SUBTOTAL_SPAREPART','HARGA_TAMPUNG_JUAL'
    ];

    public function transaksi_penjualan()
    {
        return $this->belongsTo(transaksi_penjualan::class,'ID_TRANSAKSI');
    }
    public function sparepart()
    {
        return $this->belongsTo(sparepart::class,'ID_SPAREPARTS');
    }
    public function montir_onduty()
    {
        return $this->belongsTo(montir_onduty::class,'ID_MONTIR_ONDUTY');
    }
}
