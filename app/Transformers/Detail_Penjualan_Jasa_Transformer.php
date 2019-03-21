<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\detail_penjualan_jasa;
class Detail_Penjualan_Jasa_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param detail_penjualan_jasa $detail_penjualan_jasa
     */
    public function transform(detail_penjualan_jasa $detail_penjualan_jasa)
    {
        return [
            'ID_DETAIL_PENJUALAN_JASA' => $detail_penjualan_jasa->ID_DETAIL_PENJUALAN_JASA,
            'ID_TRANSAKSI' => $detail_penjualan_jasa->ID_TRANSAKSI,
            'ID_JASA' => $detail_penjualan_jasa->ID_JASA,
            'ID_MONTIR_ONDUTY' => $detail_penjualan_jasa->ID_MONTIR_ONDUTY,
            'SUBTOTAL_JASA' => $detail_penjualan_jasa->SUBTOTAL_JASA,
            'STATUS_JASA' => $detail_penjualan_jasa->STATUS_JASA,
        
        ];
    }
}