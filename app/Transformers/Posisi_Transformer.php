<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\posisi;
class Posisi_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param posisi $posisi
     */
    public function transform(posisi $posisi)
    {
        return [
            'KODE_PENEMPATAN' => $posisi->KODE_PENEMPATAN,
            'KETERANGAN' => $posisi->KETERANGAN
        ];
    }
}