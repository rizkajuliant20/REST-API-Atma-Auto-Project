<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_penjualan_jasa extends Model
{
    protected $table="detail_penjualan_jasa";
    protected $primaryKey="ID_DETAIL_PENJUALAN_JASA";
    public $timestamps=true;
    protected $fillable=[
        'ID_TRANSAKSI','ID_JASA','ID_MONTIR_ONDUTY','SUBTOTAL_JASA','STATUS_JASA'
    ];

    public function transaksi_penjualan()
    {
        return $this->belongsTo(transaksi_penjualan::class,'ID_TRANSAKSI');
    }
    public function jasa_service()
    {
        return $this->belongsTo(jasa_service::class,'ID_JASA');
    }
    public function montir_onduty()
    {
        return $this->belongsTo(motor::class,'ID_MONTIR_ONDUTY');
    }
}
