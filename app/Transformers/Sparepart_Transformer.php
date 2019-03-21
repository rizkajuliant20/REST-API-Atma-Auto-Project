<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\sparepart;
class Sparepart_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param sparepart $sparepart
     */
    public function transform(sparepart $sparepart)
    {
        return [
            'ID_SPAREPARTS' => $sparepart->ID_SPAREPARTS,
            'KODE_PENEMPATAN' => $sparepart->KODE_PENEMPATAN,
            'NAMA_SPAREPART' => $sparepart->NAMA_SPAREPART,
            'HARGA_BELI' => $sparepart->HARGA_BELI,
            'HARGA_JUAL' => $sparepart->HARGA_JUAL,
            'STOK_MINIMAL' => $sparepart->STOK_MINIMAL,
            'STOK_BARANG' => $sparepart->STOK_BARANG,
            'GAMBAR' => $sparepart->GAMBAR,
            'TIPE' => $sparepart->TIPE,
           
            
        ];
    }
}