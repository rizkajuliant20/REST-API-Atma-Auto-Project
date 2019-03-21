<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\kendaraan_pelanggan;
class Kendaraan_Pelanggan_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param kendaraan_pelanggan $kendaraan_pelanggan
     */
    public function transform(kendaraan_pelanggan $kendaraan_pelanggan)
    {
        return [
            'ID_KENDARAAN_PEL' => $kendaraan_pelanggan->ID_KENDARAAN_PEL,
            'ID_MOTOR' => $kendaraan_pelanggan->ID_MOTOR,
            'ID_PELANGGAN' => $kendaraan_pelanggan->ID_PELANGGAN,
            'NO_PLAT' => $kendaraan_pelanggan->NO_PLAT,
            
        ];
    }
}