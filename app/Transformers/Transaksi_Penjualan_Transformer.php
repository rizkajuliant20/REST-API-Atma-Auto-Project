<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\transaksi_penjualan;
class Transaksi_Penjualan_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param transaksi_penjualan $transaksi_penjualan
     */
    public function transform(transaksi_penjualan $transaksi_penjualan)
    {
        return [
            'ID_TRANSAKSI' => $transaksi_penjualan->ID_TRANSAKSI,
            'ID_CABANG' => $transaksi_penjualan->ID_CABANG,
            'ID_PELANGGAN' => $transaksi_penjualan->ID_PELANGGAN,
            'TGL_TRANSAKIS' => $transaksi_penjualan->TGL_TRANSAKIS,
            'SUBTOTAL' => $transaksi_penjualan->SUBTOTAL,
            'DISKON' => $transaksi_penjualan->DISKON,
            'GRANDTOTAL' => $transaksi_penjualan->GRANDTOTAL,
            'STATUS_TRANSAKSI' => $transaksi_penjualan->STATUS_TRANSAKSI,
          
           
            
        ];
    }
}