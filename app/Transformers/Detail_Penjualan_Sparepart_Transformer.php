<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\detail_penjualan_sparepart;
class Detail_Penjualan_Sparepart_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param detail_penjualan_sparepart $detail_penjualan_sparepart
     */
    public function transform(detail_penjualan_sparepart $detail_penjualan_sparepart)
    {
        return [
            'ID_PENJUALAN_SPAREPART' => $detail_penjualan_sparepart->ID_PENJUALAN_SPAREPART,
            'ID_TRANSAKSI' => $detail_penjualan_sparepart->ID_TRANSAKSI,
            'ID_SPAREPARTS' => $detail_penjualan_sparepart->ID_SPAREPARTS,
            'ID_MONTIR_ONDUTY' => $detail_penjualan_sparepart->ID_MONTIR_ONDUTY,
            'JUMLAH_SPAREPART' => $detail_penjualan_sparepart->JUMLAH_SPAREPART,
            'SUBTOTAL_SPAREPART' => $detail_penjualan_sparepart->SUBTOTAL_SPAREPART,
            'HARGA_TAMPUNG_JUAL' => $detail_penjualan_sparepart->HARGA_TAMPUNG_JUAL,
        ];
    }
}