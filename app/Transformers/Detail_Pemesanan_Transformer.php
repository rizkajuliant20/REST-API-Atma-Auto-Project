<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\detail_pemesanan;
class Detail_Pemesanan_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param detail_pemesanan $detail_pemesanan
     */
    public function transform(detail_pemesanan $detail_pemesanan)
    {
        return [
            'ID_DETAIL_PEMESANAN' => $detail_pemesanan->ID_DETAIL_PEMESANAN,
            'ID_SPAREPARTS' => $detail_pemesanan->ID_SPAREPARTS,
            'ID_PEMESANAN' => $detail_pemesanan->ID_PEMESANAN,
            'JUMLAH_PEMESANAN' => $detail_pemesanan->JUMLAH_PEMESANAN,
            'HARGA_BELI_PEMESANAN' => $detail_pemesanan->HARGA_BELI_PEMESANAN,
            'JUMLAH_PEMESANAN' => $detail_pemesanan->JUMLAH_PEMESANAN,
            'SATUAN' => $detail_pemesanan->SATUAN,
        ];
    }
}