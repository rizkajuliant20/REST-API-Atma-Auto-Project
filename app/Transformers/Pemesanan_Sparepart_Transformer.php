<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\pemesanan_sparepart;
class Pemesanan_Sparepart_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param pemesanan_sparepart $pemesanan_sparepart
     */
    public function transform(pemesanan_sparepart $pemesanan_sparepart)
    {
        return [
            'ID_PEMESANAN' => $pemesanan_sparepart->ID_PEMESANAN,
            'ID_SUPPLIER' => $pemesanan_sparepart->ID_SUPPLIER,
            'TGL_PEMESANAN' => $pemesanan_sparepart->TGL_PEMESANAN,
            'GRANDTOTAL_PEMESANAN' => $pemesanan_sparepart->GRANDTOTAL_PEMESANAN,
            'STATUS_PEMESANAN' => $pemesanan_sparepart->STATUS_PEMESANAN,
            
            
        ];
    }
}