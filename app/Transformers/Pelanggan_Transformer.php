<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\pelanggan;
class Pelanggan_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param pelanggan $pelanggan
     */
    public function transform(pelanggan $pelanggan)
    {
        return [
            'ID_PELANGGAN' => $pelanggan->ID_PELANGGAN,
            'NAMA_PELANGGAN' => $pelanggan->NAMA_PELANGGAN,
            'TELEPON_PELANGGAN' => $pelanggan->TELEPON_PELANGGAN,
            'ALAMAT_PELANGGAN' => $pelanggan->ALAMAT_PELANGGAN,
           
           
            
        ];
    }
}