<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\pegawai;
class Pegawai_Transformer extends TransformerAbstract
{
    /**
     * Transform Barang.
     *
     * @param pegawai $pegawai
     */
    public function transform(pegawai $pegawai)
    {
        return [
            'ID_PEGAWAI' => $pegawai->ID_PEGAWAI,
            'ID_CABANG' => $pegawai->ID_CABANG,
            'NAMA_PEGAWAI' => $pegawai->NAMA_PEGAWAI,
            'ALAMAT_PEGAWAI' => $pegawai->ALAMAT_PEGAWAI,
            'TELEPON_PEGAWAI' => $pegawai->TELEPON_PEGAWAI,
            'GAJI_PEGAWAI' => $pegawai->GAJI_PEGAWAI,
            'USERNAME' => $pegawai->USERNAME,
            'PASSWORD' => $pegawai->PASSWORD,
            'ROLE' => $pegawai->ROLE,
           
            
        ];
    }
}