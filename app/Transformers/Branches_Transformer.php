<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\branches;
class Branches_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param branches $branches
     */
    public function transform(branches $branches)
    {
        return [
            'ID_CABANG' => $branches->ID_CABANG,
            'NAMA_CABANG' => $branches->NAMA_CABANG,
            'ALAMAT_CABANG' => $branches->ALAMAT_CABANG,
            'TELEPON_CABANG' => $branches->TELEPON_CABANG,
        ];
    }
}